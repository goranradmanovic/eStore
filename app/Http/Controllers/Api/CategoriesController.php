<?php

//Name space of controller
namespace App\Http\Controllers\Api;

use App\Models\Category\Category;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
	//Function for getting all items from one category
    public function getAllCategories()
    {
        //New instance of Category class
        $category = new Category;

        //Get all categories items for displying on page
        $categoriesItems = $category->getCategories();

        //Return JSON response with data
        return response()->json($categoriesItems);
    }
}
