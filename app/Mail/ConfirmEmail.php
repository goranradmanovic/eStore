<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmEmail extends Mailable
{
    use Queueable, SerializesModels;

    //Property for storing subscribe email id
    private $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($latestEmailId)
    {
        $this->id = $latestEmailId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmed')->with(['id' => $this->id]);
    }
}
