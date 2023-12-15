<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update([
            ...$request->validated(),
            'is_admin' => $request->is_admin === 'on' ? true : false
        ]);

        return to_route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('admin.users.index');
    }
}
