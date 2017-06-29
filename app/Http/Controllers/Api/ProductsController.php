<?php

//Name space of controller
namespace App\Http\Controllers\Api;

use App\Models\{
	Category\Category,
	Product\Product
};

use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
	//Functi. for getting all data about product and sending in JSON response
    public function getAllProducts()
    {
        //New instance of Product class
        $product = new Product; //New instance of Product class

        //Getting all product items for displying on home page
        $allProductItems = $product->getAllProductItems();

        //Return JSON response with data
        return response()->json($allProductItems);
    }

    //Function for shown all items (products) from single category. Param is category id from URL
    public function getSingleCategorieProducts($category_id)
    {
        //New instance of Category class
        $categories = new Category;

        if ((int) $category_id === 4)
        {
            //New instance of Product class
            $product = new Product;

            //Getting all radnom product items from Product table
            $randomProductItems = $product->getAllRandomProductItems();

            //Returning all random product items 
            return response()->json($randomProductItems);
        }

        //Getting all products from single category
        $allProducts = $categories->getAllCategoriesItems($category_id);

        //Return all data as JSON response
        return response()->json($allProducts);
    }

    //Function for shown single product item. Param is product ID
    public function getSingleProduct($product_id)
    {
        //New instance of Product class etc. model
        $product = new Product;

        //Record for single product item
        $singleItem = $product->getSingleProductItem($product_id);

        //Return all data as JSON response
        return response()->json($singleItem);
    }
}