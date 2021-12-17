<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register_page()
    {
        return view('register');
    }

    public function register_action(REquest $request)
    {
        $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
        $pre_user = User::orderBy('id', 'desc')->first();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($pre_user === null) {
            $user->role = 'admin';
        } else {
            $user->role = 'user';
        }
        $user->password = Hash::make($request->password);
        $user->save();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.transaction');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}
