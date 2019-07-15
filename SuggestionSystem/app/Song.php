<?php

namespace Suggestions;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artist',
        'title', 
        'link', 
        'genre',    
        'duration', //In seconds
    ];

    //Define relation with User
    public function users() {
      return $this->belongsToMany(Song::class, 'song_user', 'song_id', 'user_id')
                  ->withPivot('level')
                  ->withTimestamps();
    }
}
