<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\{
    Foundation\Bus\DispatchesJobs,
    Routing\Controller as BaseController,
    Foundation\Validation\ValidatesRequests,
    Foundation\Auth\Access\AuthorizesRequests,
    Http\Request
};
use App\Models\Subscriber\Subscriber;

class Controller extends BaseController
{
    //This is traits
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    //Method for returning home view ect. page
    public function index()
    {
    	return view('home'); //Return home page
    }

    //Getting data from the Subscribe form and writing data to the database , 
    public function createSubscription(Request $request)
    {
        //Validate user form input ect. user email (Koristimo $this->validate() m. iz traita ValidatesRequests,da nije trait ne bi se ovako mogao korsititi). validate() m. automaticly send json response to the client
    	$validator = Validator::make($request->all(), [
    		'subscribeEmail' => 'required|email|unique:subscribers,email|max:255',
    	])->validate();

        //Checking if validation rules fails
        if ($validator->fails())
        {
            //Checking if request is ajax
            if($request->ajax())
            {
                //Return response with 
                return response()->json(array(
                    'success' => false,
                    'message' => 'There are incorect values in the form!',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 422);
            }
            else
            {
                //Fallback if call is not ajax call
                return redirect('/')->withErrors($validator)->withInput($request->except('email'));
            }
        }

        //Creating new entry to the Subscriber table
        Subscriber::create(['email' => $request->input('subscribeEmail')]);

        //Sending email message to the user subscriber email
        //Implementing email service

    	//Return message status if everything is OK
    	return response()->json(['responseText' => 'You are successfuly subscribed.'], 200);
    }
}