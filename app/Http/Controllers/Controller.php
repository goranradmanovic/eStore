<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Models\Subscriber\Subscriber;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Method for returning home view ect. page
    public function index() {
    	return view('home');
    }

    //Getting data from the Subscribe form and writing data to the database
    public function createSubscription(Request $request) {

        //Validate user form input ect. user email
    	$this->validate($request, [
    		'subscribeEmail' => 'required|email|unique:subscribers,email|max:255'
    	]);

        //If form fields validation fails
        if () {

        }


        //Creating new entry to the Subscriber table
        Subscriber::create(['email' => $request->input('subscribeEmail')]);

    	/*if (Response::ajax()) {
            //return response()->json(['responseText' => 'OK'], 200);
            
    	}*/

      
           /* if($request->ajax())
            {
                return response()->json(array(
                    'success' => false,
                    'message' => 'There are incorect values in the form!',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 422);
            }*/

            /*return response()->json(array(
                    'success' => false,
                    'message' => 'There are incorect values in the form!',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 422);*/

        //return response()->view('hello', $data, 200);
       

    	//Return message status if everything is OK
    	return response()->json(['responseText' => 'Success!'], 200);
    	//return response()->json(['responseText' => $request->all()], 200);
    }
}
