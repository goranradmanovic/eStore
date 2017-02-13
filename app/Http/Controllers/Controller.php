<?php

namespace App\Http\Controllers;

use JavaScript;
use Illuminate\{
    Foundation\Bus\DispatchesJobs,
    Routing\Controller as BaseController,
    Foundation\Validation\ValidatesRequests,
    Foundation\Auth\Access\AuthorizesRequests,
    Support\Facades\Mail,
    Http\Request
};
use App\Mail\EmailSubscriber;
use App\Models\{
    Subscriber\Subscriber,
    Category\Category,
    Product\Product
};

class Controller extends BaseController
{
    //This is traits
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    //Method for returning home view ect. page
    public function index()
    {
        //New instance of Product class
        $product = new Product;

        //Getting all product items for displying on home page
        $allProductItems = $product->getAllProductItems();

        //Transforming PHP vars to JS vars for using in VueJS object
        JavaScript::put(['allProductItems' => $allProductItems]);

        return view('home'); //Return home page
    }

    public function getAllProducts()
    {
        //New instance of Product class
        $product = new Product;

        //Getting all product items for displying on home page
        $allProductItems = $product->getAllProductItems();

        //Return JSON response with data
        return response()->json($allProductItems);
    }

    //Getting data from the Subscribe form and writing data to the database , 
    public function createSubscription(Request $request)
    {
        //Validate user form input ect. user email
        $this->validate($request, ['subscribeEmail' => 'required|email|unique:subscribers,email|max:255']);

        //Creating new entry to the Subscriber table
        Subscriber::create(['email' => $request->input('subscribeEmail')]);
    
        //Sending email message to the user subscriber email (email.subscriber template new EmailSubscriber())
        Mail::to($request->input('subscribeEmail'))->send(new EmailSubscriber());

        //Return message status if everything is OK
        return response()->json(['responseText' => 'You are successfuly subscribed. Please check your email inbox.'], 200);
    }
}