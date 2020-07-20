<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class reply_messages extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $reply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $reply)
    {
        $this->message = $message;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactmessage = $this->message;
        $reply = $this->reply;
        return $this->to($contactmessage->email)
        ->view('back-end.mails.replay_messages', compact('contactmessage', 'reply'));
    }
}
