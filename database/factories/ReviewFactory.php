<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Review::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'book_id' => App\Models\Book::all()->random()->id,
        'content' => $faker->text(10),
    ];
});
