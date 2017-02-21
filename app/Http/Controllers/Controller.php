<?php

namespace App\Http\Controllers;

use Illuminate\{
    Foundation\Bus\DispatchesJobs,
    Routing\Controller as BaseController,
    Foundation\Validation\ValidatesRequests,
    Foundation\Auth\Access\AuthorizesRequests,
    Support\Facades\Mail,
    Http\Request
};
use App\Mail\ConfirmEmail;
use App\Mail\EmailSubscriber;
use App\Models\{
    Subscriber\Subscriber,
    Product\Product
};

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
        $subscriber = new Subscriber;

        //Validate user form input ect. user email
        $this->validate($request, ['subscribeEmail' => 'required|email|unique:subscribers,email|max:255']);

        //Creating new entry to the Subscriber table
        $subscriber->createSusbcribeEmail($request->input('subscribeEmail'));

        //Getting last email ID for passing to the ConfirmEmail for conforming
        $latesSubscriberEmailId = $subscriber->getLastSubscriberEmail()->id;
     
        //Sending email message to the user subscriber email (email.subscriber template new EmailSubscriber())
        Mail::to($request->input('subscribeEmail'))->send(new ConfirmEmail($latesSubscriberEmailId));

        //Return message status if everything is OK
        return response()->json(['responseText' => 'Please check your email inbox to confirm your email address.'], 200);
    }

    //Method for getting URL param ect. email ID
    public function confirmedEmail(Request $request, $id)
    {   
        $subscriber = new Subscriber;

        //Getting the email ID and cating it to integer
        $subscribeEmailId = (int) $request->id;

        //Checking if email address don't exists in database table
        if(!$subscriber->isEmailExists($subscribeEmailId))
        {
            //Return user to home page with message
            return redirect()->route('home')->with('messageError', 'This email address do not exist in our system!');
        }

        //Check if user is already confirmed his email address
        if (!$subscriber->isEmailConfirmed($subscribeEmailId))
        {
            //Updating subscrebers confiremd column
            $subscriber->updateEmailConfirmed($subscribeEmailId);

            //Redirecting user to home page with confirm message
            return redirect()->route('home')->with('massageSuccess', 'Great, you are successfully confirmed your email address.');
        }

        //If user is already confirmed his email address. Redirecting user to home page with confirm message
        return redirect()->route('home')->with('messageWarning', 'You are already successfully confirmed your email address.');
    }

    //*** API Functions ***//
    
    //Functi. for getting all data about product and sending in JSON response
    public function getAllProducts()
    {
        //New instance of Product class
        $product = new Product;

        //Getting all product items for displying on home page
        $allProductItems = $product->getAllProductItems();

        //Return JSON response with data
        return response()->json($allProductItems);
    }
}