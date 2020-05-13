<?php

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register','UserController@register');
Route::post('login','UserController@authenticate');
Route::get('articles','ArticleControler@index');
Route::group(['middleware' => 'jwt.verify'], function() {
    //articles
    Route::get('articles/{article}','ArticleControler@show');
    Route::post('articles','ArticleControler@store');
    Route::put('articles/{article}','ArticleControler@update');
    Route::delete('articles/{article}','ArticleControler@delete');

    //comments
    Route::get('articles/{article}/comments','CommentController@index');
    Route::get('articles/{article}/comments/{comment}','CommentController@show');
    Route::post('articles/{article}/comments','CommentController@store');
    Route::put('articles/{article}/comments/{comment}','CommentController@update');
    Route::delete('articles/{article}/comments/{comment}','CommentController@delete');
});
