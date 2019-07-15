<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Suggestions\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName.' '.$faker->lastName,
        'username' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'is_admin' => 0,
        'remember_token' => Str::random(10),
    ];
});
