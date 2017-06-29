<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//API route for getting all data about products in JSON
Route::get('/products', 'Api\ProductsController@getAllProducts')->middleware('api');

//API route for getting all data about categorey in JSON
Route::get('/categories', 'Api\CategoriesController@getAllCategories')->middleware('api');

//API Route for getting category single items
Route::get('/category/{category_id}', 'Api\ProductsController@getSingleCategorieProducts')->middleware('api');

//API Route for getting single product item
Route::get('/product/{product_id}', 'Api\ProductsController@getSingleProduct')->middleware('api');

//API Route for getting search product data
Route::get('/search/{query}', 'Api\SearchController@search')->middleware('api');