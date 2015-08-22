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

Route::get('/', 'UsersController@index');
Route::resource('users','UsersController');
Route::get('usersearch/{q}','UsersController@searchUser');

Route::resource('tags','TagsController');
Route::get('tagsearch/{q}','TagsController@searchTag');

Route::get('relation/{id}','RelationshipController@show');
Route::post('relation','RelationshipController@store');

