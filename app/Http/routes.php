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
Route::resource('tags','TagsController');
Route::resource('users','UsersController');

Route::get('/user',function() {
//    $abc = DB::table('users')->where('_id','1')->get();
    $abc = \App\User::find(1);
    return $abc;
});