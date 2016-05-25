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

Route::get('/', function () {
    return view('welcome');
});

Route::get('ftp/setup',  ['middleware' => 'auth', 'uses' => 'FtpController@setup']);
Route::post('ftp/update', 'FtpController@update');
Route::get('ftp', 'FtpController@show');
Route::get('group', 'GroupController@show');
//Route::get('group/edit', 'GroupController@editGroup');
Route::get('group/edit/{id}', 'GroupController@editUser');
Route::post('group/edit/{id}', 'GroupController@updateUser');

Route::auth();

Route::get('/home', 'HomeController@index');
