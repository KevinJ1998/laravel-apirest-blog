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
Route::get('articles','ArticleContrler@index');
Route::group(['middleware' => 'jwt.verify'], function() {
    Route::get('user','UserController@getAuthenticate');
    Route::get('articles/{article}','ArticleControler@show');
    Route::post('articles','ArticleContrler@store');
    Route::put('articles/{article}','ArticleControler@update');
    Route::delete('articles/{article}','ArticleContrler@delete');
});
