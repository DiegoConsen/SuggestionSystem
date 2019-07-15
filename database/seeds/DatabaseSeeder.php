<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Call all seeders
        $this->call(UsersTableSeeder::class);
        $this->call(SongsTableSeeder::class);
    }
}
