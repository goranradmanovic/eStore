<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    //ContactEmail properties
    private $firstName;
    private $lastName;
    private $userEmail;
    private $userMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $contactData)
    {
        $this->firstName = $contactData['firstName'];
        $this->lastName = $contactData['lastName'];
        $this->userEmail = $contactData['email'];
        $this->userMessage = $contactData['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')->with(['firstName' => $this->firstName, 'lastName' => $this->lastName, 'userEmail' => $this->userEmail,'userMessage' => $this->userMessage]);
    }
}
