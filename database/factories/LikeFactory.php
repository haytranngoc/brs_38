<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Like::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'liketable_id' => $faker->numberBetween(0, 5),
        'liketable_type' => $faker->numberBetween(0, 5),
    ];
});
