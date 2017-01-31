<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Method for returning home view ect. page
    public function index() {
    	return view('home');
    }

    //Getting data from the Subscribe form and writing data to the database
    public function createSubscription(Request $request) {

    	/*$this->validate($request->all(), [
    		'subscribeEmail' => 'required|email|unique|max:255'
    	]);*/

    	//dd($request->all());

    	if (Request::ajax()) {
    		//return response()->json(['responseText' => 'This is ajax call'], 200);
    		
    		dd('Hello World');
    	}


    	//Return message status if everything is OK
    	//return response()->json(['responseText' => 'Success!'], 200);
    	//return response()->json(['responseText' => $request->all()], 200);
    }
}
