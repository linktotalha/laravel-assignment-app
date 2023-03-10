<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // seeder for user
    public function run()
    {
        $user = User::create([
            'name'=>'user',
            'email'=>'user@user.com',
            'password'=>Hash::make('password')
        ]);
        $user->assignRole('user');
    }
}
