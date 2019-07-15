<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Suggestions\User;
use Suggestions\Song;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create 10 songs
        factory(Song::class, 10)->create()->each(function($song) {
            //Select all non-admin users
            $users = User::where('is_admin', false)->get();
            
            //Populate song_user table
            $song->users()->saveMany($users);
        });
    }
}
