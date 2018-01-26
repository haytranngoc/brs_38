<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Follower::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'follower_id' => App\Models\User::all()->random()->id,
        'status' => $faker->numberBetween(0, 1),
    ];
});
