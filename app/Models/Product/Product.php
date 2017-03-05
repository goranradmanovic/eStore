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
}
