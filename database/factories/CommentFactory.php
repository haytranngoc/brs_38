<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'review_id' => App\Models\Review::all()->random()->id,
        'content' => $faker->text(10),
    ];
});
