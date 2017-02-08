<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\{
    Foundation\Bus\DispatchesJobs,
    Routing\Controller as BaseController,
    Foundation\Validation\ValidatesRequests,
    Foundation\Auth\Access\AuthorizesRequests,
    Support\Facades\Mail,
    Http\Request
};
use App\Mail\EmailSubscriber;
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
        //Validate user form input ect. user email
        $this->validate($request, ['subscribeEmail' => 'required|email|unique:subscribers,email|max:255']);

        //Creating new entry to the Subscriber table
        Subscriber::create(['email' => $request->input('subscribeEmail')]);
    
        //Sending email message to the user subscriber email
        //Mail::to($request->input('subscribeEmail'))->send(new EmailSubscriber());

        //Return message status if everything is OK
        return response()->json(['responseText' => 'You are successfuly subscribed.'], 200);
    }
}