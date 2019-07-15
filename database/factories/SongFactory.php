<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Suggestions\Song;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'artist' => $faker->firstName.' '.$faker->lastName,
        'title' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'genre' => $faker->randomElement($array = array (
            'Rock',
            'Pop',
            'Metal',
            'Ballad',
            'Blues',
            'Jazz',
        )),
        'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        'duration' => $faker->numberBetween($min = 120, $max = 360)
    ];
});
