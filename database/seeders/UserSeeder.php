<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        $role_lead = Role::where('name', 'companyLead')->first();

        $role_user = Role::where('name', 'user')->first();



        // create user with admin role
        $admin = new User();
        $admin->name = 'Connor Mattless';
        $admin->email = 'cm@gmail.com';
        $admin->password = Hash::make('password');
        $admin->company_id = 1;
        $admin->save();

        $admin->roles()->attach($role_admin);
        $admin->roles()->attach($role_lead);

        //create new user with user role
        $user = new User();
        $user->name = 'Greg Davis';
        $user->email = 'bruh@gmail.com';
        $user->password = Hash::make('password');
        $user->company_id = 2;
        $user->save();

        $user->roles()->attach($role_user);
    }
}
