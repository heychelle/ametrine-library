<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin1';
        $user->email = 'admin1@test.com';
        $user->password = Hash::make('admin12345');
        $user->role = '0';
        $user->save();

        $user = new User();
        $user->name = 'user1';
        $user->email = 'user1@test.com';
        $user->password = Hash::make('user12345');
        $user->role = '1';
        $user->save();
    }
}
