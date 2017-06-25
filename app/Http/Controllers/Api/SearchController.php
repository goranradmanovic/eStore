<?php

namespace App\Http\Controllers\Api;

use App\Models\Product\Product;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //Search metod (for search form)
    public function search($query)
    {
    	//First we define the error message we are going to show if no keywords exists or if no results found
    	$error = ['error' => 'No results found, please try with different keywords.'];

        //Using Laravel Scout syntax to search the product table
        $posts = Product::search($query)->get(['title', 'img_url', 'product_link']);

        //If there are results return them, if none, return error message
        return $posts->count() ? response()->json($posts) : response()->json($error); 
    }
}