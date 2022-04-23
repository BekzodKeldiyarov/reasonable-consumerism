<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', ['user' => $user, 'roles' => Role::all()]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
