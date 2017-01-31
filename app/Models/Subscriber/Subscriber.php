<?php

namespace App\Models\Subscriber;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //Defining fillable for protecting from mass assignable.
    protected $fillable = ['email'];

    //Method for adding new insert into subscribers table
    public function createSusbcribeEmail($email)
    {
    	
    }
}
