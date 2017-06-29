<?php

namespace App\Http\Controllers;

use Illuminate\{
    Foundation\Bus\DispatchesJobs,
    Routing\Controller as BaseController,
    Foundation\Validation\ValidatesRequests,
    Foundation\Auth\Access\AuthorizesRequests
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
}