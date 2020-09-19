<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile', ['user' => Auth::user()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id)
            ],
            'avatar' => 'nullable|image'
        ]);

         $user = Auth::user();
         $user->edit($request->all());
         $user->generatePassword($request->get('password'));
         $user->uploadAvatar($request->file('avatar'));

         return redirect()->back()->with('status', 'Profile successfully updated!');
    }
}
