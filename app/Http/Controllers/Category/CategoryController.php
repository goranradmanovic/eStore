<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	//Function for displaying page for all data from single category
    public function showSingleCategorie()
    {
        //Return view and display data with VUJE from api/caterory/{category_id}
        return view('/pages/category');
    }
}