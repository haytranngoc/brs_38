<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FollowersTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(LikesTableSeeder::class);
    }
}
