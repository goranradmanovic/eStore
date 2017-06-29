<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
	//Function for displaying page for single product item
    public function showSingleItem()
    {
        //Return view and display data with VUEJS drom api/product/{product_id}
        return view('pages/product');
    } 
}