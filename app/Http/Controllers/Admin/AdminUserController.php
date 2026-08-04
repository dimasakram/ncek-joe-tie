<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminUserRequest;
use App\Http\Requests\Admin\UpdateAdminUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $admins = User::latest()->paginate(10);

        return view('admin.admins.index', compact('admins'));
    }

    public function create(): View
    {
        return view('admin.admins.create');
    }

    public function store(StoreAdminUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('admins', 'public');
        }

        User::create($data);

        return redirect()->route('admin.admin.index')->with('success', 'Admin baru berhasil ditambahkan.');
    }

    public function edit(User $admin): View
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminUserRequest $request, User $admin): RedirectResponse
    {
        $data = $request->validated();

        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('photo')) {
            if ($admin->photo) {
                Storage::disk('public')->delete($admin->photo);
            }
            $data['photo'] = $request->file('photo')->store('admins', 'public');
        }

        $admin->update($data);

        return redirect()->route('admin.admin.index')->with('success', 'Data admin berhasil diperbarui.');
    }

    public function destroy(User $admin): RedirectResponse
    {
        if ($admin->id === auth()->id()) {
            return back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        if ($admin->photo) {
            Storage::disk('public')->delete($admin->photo);
        }

        $admin->delete();

        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
