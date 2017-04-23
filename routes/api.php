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
Route::get('/products', 'Controller@getAllProducts')->middleware('api');

//API route for getting all data about categorey in JSON
Route::get('/categories', 'Controller@getAllCategories')->middleware('api');

//API Route for displaying category single items
Route::get('/category/{category_id}', 'Controller@getSingleCategorieProducts')->middleware('api');

//API Route for displaying single product item
Route::get('/product/{product_id}', 'Controller@getSingleProduct')->middleware('api');