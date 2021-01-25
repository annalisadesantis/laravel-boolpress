<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) {

            $new_post = new Post();
            $new_post->title = $faker->sentence();
            $new_post->subtitle = $faker->sentences();
            $new_post->author = $faker->name();
            $new_post->text = $faker->text();
            $new_post->date = $faker->date();
            $new_post->time = $faker->time();
            $new_post->save();
        }
    }
}
