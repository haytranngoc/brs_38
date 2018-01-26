<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Activity::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'content' => $faker->realText,
        'activitytable_id' => $faker->numberBetween(0, 5),
        'activitytable_type' => $faker->numberBetween(0, 5),
    ];
});
