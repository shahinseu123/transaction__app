<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', ['user' => $user]);
    }

    public function delete_user($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'User deleted succesfully');
    }

    public function make_user($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();
        return redirect()->back();
    }
    public function make_admin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
