<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventParticipateReplyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message2;

    /**
     * Create a new message instance.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->message2 = $message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('admin.mail.event_participate_reply_mail')
            ->subject('Bangladesh National Group');
    }
}
