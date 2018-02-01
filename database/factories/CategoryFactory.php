<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'images' => $faker->image(config('setting.images_path'),300, 200, null, false) ,
    ];
});
