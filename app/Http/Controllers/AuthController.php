<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        return to_route('login');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if (Hash::check($request->input('current_password'), Auth::user()->password)) {
            $user = Auth::user();
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect()->back()->with("success","Password changed successfully !");
        } else {
            return redirect()->back()->with("error","Current password does not match !");
        }
    }

}
