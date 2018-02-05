<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Suggest::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'book_id' => App\Models\Book::all()->random()->id,
        'owner_id' => App\Models\User::all()->random()->id,
        'status' => $faker->numberBetween(0, 1),
    ];
});
