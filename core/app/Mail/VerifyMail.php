<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $template;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$template,$subject)
    {
        $this->data = $data;
        $this->template = $template;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->template)->subject($this->subject)->with($this->data);
    }
}
