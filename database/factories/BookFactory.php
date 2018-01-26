<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Book::class, function (Faker $faker) {
    return [
    	'category_id' => App\Models\Category::all()->random()->id,
        'title' => $faker->name,
        'publish_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'author' => $faker->name,
        'number_pages' => $faker->numberBetween(),
    ];
});
