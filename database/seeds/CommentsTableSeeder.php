<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        $faker = \Faker\Factory::create();

        $articles = App\Article::all();

        $users = App\User::all();

        foreach ($users as $user) {
            JWTAuth::attempt(['email'=>$user->email,'password'=>'123123']);

            foreach ($articles as $article) {
                Comment::create([
                    'text'=> $faker->paragraph,
                    'article_id'=>$article->id,
                ]);
            }
        }
    }
}
