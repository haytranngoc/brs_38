<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 5)->create();
        factory(App\Models\Review::class, 5)->create();
        factory(App\Models\Comment::class, 5)->create();
        $faker = Faker::create();
        $users = App\Models\User::pluck('id')->all();
        $books = App\Models\Book::pluck('id')->all();
        $categories = App\Models\Category::pluck('id')->all();
        App\Models\User::all()->each(function ($user) use ($categories, $faker) { 
            $user->suggests()->attach(
                $categories, 
                [
                    'title' => $faker->word(), 
                    'author' => $faker->name(),
                    'description' => $faker->realText,
                    'link' => $faker->url,
                    'status' => $faker->numberBetween(0,1),
                ]
            ); 
        });
        App\Models\User::all()->each(function ($user) use ($books, $faker) { 
            $user->ratings()->attach(
                $books, 
                [
                    'rating' => $faker->numberBetween(1,5),
                ]
            ); 
        });
        App\Models\User::all()->each(function ($user) use ($books, $faker) { 
            $user->books()->attach(
                $books, 
                [
                    'read_status' => $faker->numberBetween(0,1),
                    'favorite' => $faker->numberBetween(0,1),
                ]
            ); 
        });
        App\Models\User::all()->each(function ($user) use ($books, $faker) { 
            $user->owners()->attach($books); 
        });
    }
}
