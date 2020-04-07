<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\article;
use Faker\Generator as Faker;

$factory->define(article::class, function (Faker $faker) {

    $user = \App\User::inRandomOrder()->first();
    return [
        // 'user_id' => $user->id,
    ];
});
