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
            $title = "Có liên hệ mới từ " . $_SERVER['HTTP_REFERER'];
        }
        return ($this->from(config('mail.from.address'))
            ->subject($title)
            ->view('emails.new-contact'));
    }

}
