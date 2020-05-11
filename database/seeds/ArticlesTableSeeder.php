<?php

use Illuminate\Database\Seeder;
use App\Article;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        // Article::truncate();
        $faker = \Faker\Factory::create();
        $users = App\User::all();

        foreach ($users as $user) {
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);

            //con el usuario creamos algunos articulos
            $num_articles = 5;
            for ($i = 1; $i < $num_articles; $i++) {
                Article::create([
                    'title' => $faker->sentence,
                    'body' => $faker->paragraph,
                    'category_id' => $faker->numberBetween(1, 3)
                ]);
            }
        }
    }
}
