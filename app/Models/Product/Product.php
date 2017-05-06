<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	//Fillable data table fields
	protected $fillable = [
		'category_id',
		'title',
		'product_link',
		'img_url',
		'description',
		'price',
		'cta_link',
	];

	//Method for retriving all product items
	public function getAllProductItems()
	{
		//Get all product from product table (return $this->all()) and paginate all result by number we define, default is 15 items per page
		return $this->paginate(5);
	}

	//Method for retriving all random product items
	public function getAllRandomProductItems()
	{
		//Return random results and paginated
		return $this->orderByRaw('RAND(4)')->paginate(5);
	}

	//Method for getting single producst item 
	public function getSingleProductItem(int $productId)
	{
		//Find single item from products table by ID and return the result
		return $this->find($productId);
	}
}
