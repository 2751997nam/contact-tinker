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
        if (isset($this->data['title'])) {
            $title = $this->data['title'];
        } else {
            $title = "Có liên hệ mới";
        }
        return ($this->from(config('mail.from.address'))
<<<<<<< HEAD
            ->subject("Khách Ecpark mới")
=======
            ->subject($title)
>>>>>>> 75cc348cfd2276e320e82fe50d45db6e788e85f8
            ->view('emails.new-contact'));
    }

}