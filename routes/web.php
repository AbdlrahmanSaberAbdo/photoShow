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
Route::resource('albums', 'AlbumsController');

// Photos controller
Route::get('/photos/create/{id}', 'PhotoController@create');

// Photos store controller
Route::post('/photos/store/{id}', 'PhotoController@store');

// Photos show controller
Route::get('/photos/{id}/{album_id}', 'PhotoController@show');

// Photos Delete controller
Route::delete('/photos/{id}/{album_id}', 'PhotoController@delete');

Route::get('/', function () {
    return view('welcome');
});
