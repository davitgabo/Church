<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * log in function
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard',['page'=>'dashboard']);
        }
        return redirect()->back();
    }

    /**
     * log out function
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        return to_route('login');
    }

    /**
     * change admin password
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->with("error","Current password does not match !");
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }

}
