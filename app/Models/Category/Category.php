<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Fillable field
    protected $fillable = ['category_name'];

    //Relationship to Products database table
    public function product()
    {
    	return $this->hasOne('App\Models\Product\Product');
    }

    //Method for getting all product items from one category. Arg. is category ID (1 - Tea, 2 - Food Supplement, 3 - Fitness Gear)
    public function getAllCategoryItems(int $categoryID)
    {
    	//This will return all product items from one category
    	return $this->find($categoryID)->product()->get();
    }
}
