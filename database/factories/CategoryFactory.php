<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'images' => $faker->image('public/storage/images',300, 200, null, false) ,
    ];
});
