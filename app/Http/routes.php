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

// Home
Route::get('/', 'WelcomeController@index');

// Users
Route::get('user', 'UsersController@index');
Route::get('user/{user}/edit', 'UsersController@edit');
Route::post('user/{user}', 'UsersController@update');

// Favs
Route::get('favs/manage', 'FavsController@manage');
Route::get('favs/without-category', 'FavsController@withoutCategory');
Route::get('favs/category/{slug}', 'FavsController@byCategory');
Route::resource('favs', 'FavsController');

// Categories
Route::get('categories/{category}/edit', 'CategoriesController@edit');
Route::post('categories/{category}', 'CategoriesController@update');
Route::get('categories/manage', 'CategoriesController@manage');
Route::get('categories/create', 'CategoriesController@create');
Route::post('categories', 'CategoriesController@store');
Route::delete('categories/{category}', 'CategoriesController@destroy');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');