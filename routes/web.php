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

//Route for home page
Route::get('/', 'Controller@index')->name('home');
Route::post('/', 'Controller@createSubscription');

//Route for confirmed email address
Route::get('/email/confirmed/{id}', 'Controller@confirmedEmail')->name('confirmed');

//API route for getting all data about products in JSON
Route::get('/products', 'Controller@getAllProducts');

