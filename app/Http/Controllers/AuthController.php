<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.registerForm');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required'
        ]);
        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('pages.loginForm');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $result = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        if ($result) return redirect('/');

        return redirect()->back()->with('status', 'Wrong "Email" or "Password"');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }
}
