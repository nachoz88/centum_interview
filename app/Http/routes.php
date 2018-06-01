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

Route::resource('/', 'BetsController');

// Route::resource('/', 'Auth\AuthController@__construct');

Route::auth();
Route::get('/send', 'EmailController@send');
Route::resource('/admin', 'AdminController');
Route::resource('/admin-teams', 'AdminTeamsController');
Route::get('/admin-teams-deactivate/{id}', 'AdminTeamsController@deactivate');
Route::get('admin-teams-activate/{id}', 'AdminTeamsController@activate');
Route::get('/home', 'BetsController@index');
