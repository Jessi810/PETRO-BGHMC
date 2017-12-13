<?php

use Illuminate\Database\Seeder;
use Petro\User;
use Petro\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $admin = new User();
        $admin->name = 'Admin Mina';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('admina');
        $admin->save();
        $admin->roles()->attach($role_admin);
        
        $user = new User();
        $user->name = 'User Usher';
        $user->email = 'user@mail.com';
        $user->password = bcrypt('admina');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
