<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('songs/{song}/users', 'SongController@showUsers');
Route::get('songs/{song}/levels', 'SongController@showLevels');
Route::get('songs/updateLevel/{song_id}&{user_id}&{level}', 'SongController@updateLevel');
Route::get('songs/levels', 'SongController@showAllLevels');
Route::get('songs/all', 'SongController@showAll');
Route::get('users/showInitials', 'UserController@showInitials');
Route::get('users/showNames', 'UserController@showNames');

Route::delete('songs/delete/{song}', 'SongController@destroy');

Route::resource('songs', 'SongController');
Route::resource('users', 'UserController');