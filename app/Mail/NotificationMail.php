<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{

    use Queueable;
    use SerializesModels;
    public $request;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$subject)
    {
        $this->request = $request;
        $this->subject($subject);
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.companyMail', ['request' => $this->request]);
    }
}
