<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request): View
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 403);


        $settings = Setting::query();

        $settings->when($request->search, function (Builder $query) use ($request) {
            $query->where('attribute', 'LIKE', "%{$request->search}%")
                ->orWhere('value', 'LIKE', "%{$request->search}%");
        });

        $settings = $settings->latest()->paginate(30);

        return view('admin.settings.index')->with(['settings' => $settings]);
    }

    public function create(): View
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 403);

        return view('admin.settings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 403);

        $setting = $request->validate([
            'attribute' => ['required', 'string'],
            'value' => ['required', 'string'],
        ]);

        Setting::query()->create($setting);

        return redirect()->route('admin.settings.index')->with(
            'success',
            'Berhasil menambah setting!'
        );
    }

    public function edit(Setting $setting): View
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 403);

        return view('admin.settings.edit')->with(['setting' => $setting]);
    }

    public function update(Request $request, Setting $setting): RedirectResponse
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 403);

        $data = $request->validate([
            'attribute' => ['required', 'string'],
            'value' => ['required', 'string'],
        ]);

        $setting->update($data);

        return redirect()->route('admin.settings.index')->with(
            'success',
            'Berhasil mengedit setting!'
        );
    }

    public function destroy(Setting $setting): RedirectResponse
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 403);

        $setting->delete();

        return redirect()->route('admin.settings.index')->with(
            'success',
            'Berhasil menghapus setting!'
        );
    }
}
