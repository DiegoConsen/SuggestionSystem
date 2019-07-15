<?php

namespace Suggestions\Http\Controllers;

use Suggestions\Song;
use Suggestions\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the request
        $this->validate($request, [
            'title'         => 'required',
            'artist'        => 'required',
            'genre'         => 'required',
            'link'          => 'required',
        ]);

        //Create song entry
        $song = Song::create($request->all());

        //Populate pivot table song_user
        $users = User::where('is_admin', false)->get();
        $song->users()->saveMany($singers);

        return response()->json($song, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Suggestions\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return Song::findOrFail($song->id);
    }

    /**
     * Display all resources.
     *
     * @param  \Suggestions\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $songs = Song::all();
        return response()->json($songs, 200);
    }

    /**
     * Display all related resources.
     *
     * @param  \Suggestions\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function showUsers(Song $song)
    {
        $users = Song::findOrFail($song->id)->users()->get();
        return response()->json($users, 200);
    }

    /**
     * Display song levels.
     *
     * @param  \Suggestions\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function showLevels(Song $song)
    {
        $id = $song->id;
        $levels =  DB::table('song_user')->where('song_id', $id)->select('level')->get();

        return response()->json($levels, 200);
    }

    /**
     * Display all levels.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllLevels()
    {
        $levels =  DB::table('song_user')->select('level')->get();

        return response()->json($levels, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Suggestions\Song  $song_id
     * @param  \Suggestions\User  $user_id
     * @param                     $level
     * @return \Illuminate\Http\Response
     */
    public function updateLevel($song_id, $user_id, $level) 
    {
        $updateLevel = Song::findOrFail($song_id)->users()->updateExistingPivot($user_id, ['level' => $level]);
        return response()->json($updateLevel, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Suggestions\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        Song::find($song->id)->delete();

        return response()->json('Deleted succesfully', 200);
    }
}
