<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index(Request $request): View
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 403);

        $users = User::with('votes')->whereNotIn('role_id', [User::SUPER_ADMIN, User::ADMIN]);

        $users->when(!empty($request->search), function ($users) use ($request) {
            $users->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->search}%")
                    ->orWhere('username', 'LIKE', "%{$request->search}%")
                    ->orWhere('class', 'LIKE', "%{$request->search}%");
            });
        });

        $votes[] = Vote::all()->map(function ($item) {
            return $item->user_id;
        });

        $users = $users->whereIn('id', $votes[0])->orderBy('role_id', 'desc')->orderBy('class')->paginate(36);

        $users = new UserCollection($users);

        $totalValidUsers = User::query()->whereIn('role_id', [User::STAFF, User::TEACHER, User::STUDENT])->count();
        $totalValidUsersAlreadyCount =  Vote::query()->where('label', 'OSIS')->count();

        $notYetVoting = $totalValidUsers - $totalValidUsersAlreadyCount;

        return view('admin.votes.index', compact('users', 'notYetVoting'));
    }

    public function liveCount(): JsonResponse
    {
        $candidates = Candidate::query()
            ->select('name', 'label', 'number')
            ->withCount('votes')
            ->orderBy('number')
            ->get();

        $osis = $candidates->where('label', 'OSIS');
        $mpk = $candidates->where('label', 'MPK');

        return response()->json([
            'osis' => [
                'labels' => $osis->pluck('name'),
                'data' => $osis->pluck('votes_count')
            ],
            'mpk' => [
                'labels' => $mpk->pluck('name'),
                'data' => $mpk->pluck('votes_count')
            ]
        ]);
    }
}
