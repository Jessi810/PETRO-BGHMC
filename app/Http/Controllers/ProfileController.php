<?php

namespace Petro\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;

class ProfileController extends Controller
{
    public function showProfile(Request $request) {
        $user = Auth::user();

        return view('profile.index', ['user' => $user]);
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $picture = $request->file('profile_picture')->store('img/profile_pictures', 'profile_picture');

            $current_picture = $user->profile_picture;

            $user->profile_picture = $picture;

            if ($current_picture != null) {
                // Delete old profile picture
                File::delete(public_path() . '/' . $current_picture);
            }
        }

        $user->update($request->all());

        $request->session()->flash('alert-success', 'Profile updated successfully!');
        return redirect()->route('profile.index');
    }
}
