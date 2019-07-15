<?php

namespace Suggestions\Http\Controllers;

use Suggestions\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Suggestions\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return User::findOrFail($user->id);
    }

    /**
     * Display all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        return User::all();
    }

    /**
     * Display all specified resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInitials()
    {
        $users =  DB::table('users')->where('is_admin', false)->select('id', 'name')->get();
        $result = [];

        foreach($users as $user) {
            $split = explode(' ', $user->name);
            $initials = "";

            foreach($split as $initial) {
                $initials .= $initial[0];
            }

            array_push($result, $initials);
        }

        return $result;
    }

    /**
     * Display all specified resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function showNames()
    {
        $users =  DB::table('users')->where('is_admin', false)->select('id', 'name')->get();
        $result = [];

        foreach($users as $user) {
            array_push($result, $user->name);
        }

        return $result;
    }
}
