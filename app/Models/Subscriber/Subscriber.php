<?php

namespace App\Models\Subscriber;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //Defining fillable for protecting from mass assignable.
    protected $fillable = [
    	'email',
    	'confirmed',
    ];

    //Method for adding new insert into subscribers table
    public function createSusbcribeEmail($email)
    {
    	$this->create(['email' => $email]);
    }

    //Method for getting last subscriber email ID from the subscribers table
    public function getLastSubscriberEmail()
    {
        return $this->latest()->first(['id']);
    }

    //Method for checking if email address exists in the database table. If email exist return true value in outher case return false value
    public function isEmailExists($emailId)
    {
        return (bool) $this->where('id', $emailId)->first(['id']) ?? true;
    }

    //Method for cheking if user is already confirm his email, because in that case we just want to redirect him to home page
    //without updating table again
    public function isEmailConfirmed($emailId)
    {
        //If user is already confirmed his email address return true,in other case return false
        return (bool) $this->where('id', $emailId)->first(['confirmed'])->confirmed ?? true;
    }

    //Method for updating email confirmed column in subscribe table
    public function updateEmailConfirmed($emailId)
    {
        $this->where('id', $emailId)->update(['confirmed' => 1]);
    }
}
