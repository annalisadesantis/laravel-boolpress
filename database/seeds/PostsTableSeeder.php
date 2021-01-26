<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) {

            $new_post = new Post();
            $new_post->title = $faker->sentence(3);
            $new_post->author = $faker->name();
            $new_post->text = $faker->text(100);
            $new_post->date = $faker->date();
            $new_post->time = $faker->time();
            // Genero lo slug
            $slug = Str::slug($new_post->title);
            // Salvo lo slug generato in una variabile base
            $slug_base = $slug;
            // Verifico che lo slug non esista nel database
            $post_presente = Post::where('slug', $slug)->first();
            // Creo il contatore per il ciclo while
            $contatore = 1;
            // Entro nel ciclo while SOLO se ho trovato un post con lo stesso $slug
            while($post_presente) {
                // Genero un nuovo slug aggiungendo il contatore alla fine
                $slug = $slug_base . '-' . $contatore;
                // Aumento di uno il contatore
                $contatore++;
                $post_presente = Post::where('slug', $slug)->first();
            }
            // Quando esco dal while sono sicuro che lo slug non esiste nel db
            // Assegno lo slug al post
            $new_post->slug = $slug;
            $new_post->save();
        }
    }
}
