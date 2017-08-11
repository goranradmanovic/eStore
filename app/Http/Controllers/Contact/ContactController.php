<?php

namespace App\Http\Controllers\Contact;

use Illuminate\{
    Support\Facades\Mail,
    Http\Request
};
use App\Mail\ContactEmail;
use App\Http\Controllers\Controller;
use App\Models\Contact\Contact;

class ContactController extends Controller
{
	//My email address for sending user email to
	private $myEmail = 'goranradmanovic@gmail.com';

	//Method for displaying contact page
	public function index()
	{
		return view('/pages/contact');
	}

	//Method for making new entry to contact table
	public function createContact(Request $request)
	{
		//Create new instance of Contact class
		$contact = new Contact;

		//Validating user input data
		$this->validate($request, [
			'firstName' => 'required|max:30',
			'lastName' => 'required|max:50',
			'emailAddress' => 'required|email|max:255',
			'message' => 'required|max:255'
		]);

		//Creating array for easier passing data to the Contact model
		$userData = [
			'firstName' => $request->input('firstName'),
			'lastName' => $request->input('lastName'),
			'email' => $request->input('emailAddress'),
			'message' => $request->input('message'),
		];

		//Passing data to Contact model
		$contact->createNewContact($userData);

		//Mailing user message to my email address
		Mail::to($this->myEmail)->cc($userData['email'])->send(new ContactEmail($userData));

		//Return message status if everything is OK
		return response()->json(['responseText' => 'Your message is send successfuly. Thank\'s.'], 200);
	}
}