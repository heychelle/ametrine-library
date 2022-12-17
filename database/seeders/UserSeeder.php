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
        $user->review = 'review for book';
        $user->reviewable_id = 1;
        $user->reviewable_type = 'App\Models\Book';
        $user->save();

        $user = new User();
        $user->name = 'user1';
        $user->email = 'user1@test.com';
        $user->password = Hash::make('user12345');
        $user->role = '1';
        $user->review = 'review for magazine';
        $user->reviewable_id = 1;
        $user->reviewable_type = 'App\Models\Magazine';
        $user->save();
    }
}
