<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    public $contactName;
    public $contactEmail;
    public $contactMessage;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactInfo)
    {

        $this->contactName = $contactInfo['contactName'];
        $this->contactEmail = $contactInfo['email'];
        $this->contactMessage = $contactInfo['message'];



    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('harrykim.dev@gmail.com')
                    ->view('hsite.contactEmail');

    }
}
