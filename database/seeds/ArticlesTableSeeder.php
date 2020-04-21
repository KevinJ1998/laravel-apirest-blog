<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Vaciar la tabla
       Article::truncate();
       $faker = \Faker\Factory::create();

       // Crear articulos ficticios en la tabla
        for($i = 0;$i < 50; $i++ ){
            Article::create([
                'title' => $faker -> sentence, 'body' => $faker -> paragraph
            ]);
        }
    }
}
