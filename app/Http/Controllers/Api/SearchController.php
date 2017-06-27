<?php

namespace App\Http\Controllers\Api;

use App\Models\Product\Product;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //Search metod (for search form)
    public function search($query)
    {
        //New instance of Product class
        $products = new Product;

        //Search results
        $searchResults = $products->searchProducts($query);

    	//First we define the error message we are going to show if no keywords exists or if no results found
    	$error = ['error' => 'No results found, please try with different keywords.'];

        //If there are results return them, if none, return error message
        return $searchResults->count() ? response()->json($searchResults) : response()->json($error); 
    }
}