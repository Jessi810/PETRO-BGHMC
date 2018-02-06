<?php

namespace Petro\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function showProfile(Request $request) {
        $user = Auth::user();

        return view('profile.index', ['user' => $user]);
    }

    public function updateProfile(Request $request) {
        $picture = $request->file('profile_picture')->store('img/profile_pictures', 'profile_picture');

        $user = Auth::user();
        $user->profile_picture = $picture;
        $user->update($request->all());

        $request->session()->flash('alert-success', 'Profile updated successfully!');
        return redirect()->route('profile.index');
    }
}
