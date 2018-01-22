<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas Autenticación
Auth::routes();

Route::get('/', function() {
    return view('welcome');
});

Route::get('/home', 'TweetController@index');

Route::get('/profile','ProfileController@myProfile');
Route::get('/profile/{id}','ProfileController@getProfile');

Route::get('tweet/create','TweetController@create');
Route::get('tweet/{tweet}','TweetController@show');
Route::get('tweet/{tweet}/edit','TweetController@edit');
Route::post('tweet','TweetController@store')->name('addTweet');
Route::put('tweet/{tweet}','TweetController@update')->name('updateTweet');
Route::delete('/tweet/{tweet}','TweetController@delete')->name('deleteTweet');

Route::get('tweet/{tweet}/fav','TweetController@fav');
Route::get('tweet/{tweet}/rt','TweetController@rt');