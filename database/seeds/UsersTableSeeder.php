<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Suggestions\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create 10 users
        factory(User::class, 10)->create();

        //Create admin account
        DB::table('users')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
