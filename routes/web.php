<?php

//Setting up headers for accessing data on the server via AJAX request
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

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

//Route for creating new database entry for subscription table
Route::post('/', 'Subscriber\SubscriberController@createSubscription');

//Route for confirmed email address
Route::get('/email/confirmed/{id}', 'Subscriber\SubscriberController@confirmedEmail')->name('confirmed');

//Route for displaying all data from single category
Route::get('/pages/category/{category_id}', 'Category\CategoryController@showSingleCategorie')->name('category');

//Route for displaying single product item
Route::get('/pages/product/{product_id}', 'Product\ProductController@showSingleItem');

//Route for contact page
Route::get('/contact', 'Contact\ContactController@index');

//Route for creating new database entry for contact table
Route::post('/contact', 'Contact\ContactController@createContact');