<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = isset($this->data['customFrom']) ? $this->data['customFrom'] : config('mail.from.address');
        $subject = isset($this->data['customTitle']) ? $this->data['customTitle'] : "Có liên hệ mới";
        return ($this->from($from)
            ->subject($subject)
            ->view('emails.new-contact'));
    }

}
