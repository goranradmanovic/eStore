<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //Defining fillable for protecting from mass assigment
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'email',
    	'message'
    ];

    //Method for creating new entry to contacts data base
	public function createNewContact(array $inputData)
	{
		//Creating new entry to the contact table
		$this->create([
			'first_name' => $inputData['firstName'],
			'last_name' => $inputData['lastName'],
			'email' => $inputData['email'],
			'message' => $inputData['message']
		]);
	}
}