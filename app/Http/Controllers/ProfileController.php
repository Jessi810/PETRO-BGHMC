<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function showProfile(Request $request) {
        $user = Auth::user();

        return view('profile.index', ['user' => $user]);
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();
        $user->update($request->all());

        $request->session()->flash('alert-success', 'Profile updated successfully!');
        return redirect()->route('profile.index');
    }
}