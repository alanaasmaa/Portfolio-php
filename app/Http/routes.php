<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('/', 'PageController@index');
Route::get('tags/{slug}', 'BlogController@tags');
Route::get('categories/{slug}', 'BlogController@categories');
Route::get('blog', 'BlogController@index');
Route::get('article/{slug}', 'BlogController@article');
Route::get('portfolio', 'BlogController@portfolio');
Route::get('portfolio/{slug}', 'BlogController@portfolioItem');

Route::group(['middleware' => 'admin', 'namespace' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile/{id}', ['as' => '{id}', 'uses' => 'ProfilesController@show']);
});
