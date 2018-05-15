<?php

namespace Petro\Http\Controllers;
use Petro\User;
use Petro\Role;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UserController extends Controller
{
	public function adduser(request $request)
	{
		return view('user.add_user');
	}

	public function addusersave(request $request)
	{
		$user = new User;
        $user->name         =$request->name;
        $user->email     	=$request->email;
        $user->password     =Hash::make($request->password);
        $user->save();
        $user->roles()->attach(Role::where('name', 'User')->first());
        return redirect('/home');
	}

	public function listuser()
	{
		$users = User::get();
		return view('user.list_user')
			->with('users', $users);
	}

	public function edituser($id)
	{
		$user = User::where('id', $id);
		return $user;
		return view('user.edit_user');
	}
}