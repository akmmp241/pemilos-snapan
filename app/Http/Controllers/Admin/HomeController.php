<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 403);

        $candidates = Candidate::query()
            ->select('name', 'label', 'number')
            ->withCount('votes')
            ->orderBy('number')
            ->get();

        $osis = $candidates->where('label', 'OSIS');
        $mpk = $candidates->where('label', 'MPK');

        return view('admin.dashboard', compact('osis', 'mpk'));
    }
}
