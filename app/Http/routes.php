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

Route::get('/', 'HomeController@index');

Route::get('login', 'HomeController@index');

Route::group(['prefix' => 'register'], function(){
	Route::get('/', 'RegisterController@index');
	Route::post('/', 'RegisterController@save');
});

Route::get('profile/{username}', 'ProfileController@index');


/* 
Route::group(['before' => 'auth|csrf', function() {
  dd();
}]);
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
