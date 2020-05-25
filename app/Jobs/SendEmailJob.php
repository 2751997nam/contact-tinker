<?php

namespace App\Jobs;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

     public $email;
     public $data;

    public function __construct($email, $data)
    {
        $this->email = $email;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info("Doing job");
        \Log::info($this->email);
        $emails = explode("," $this->email);
        foreach ($emails as $key => $value) {
            $emails[$key] = trim($value);
        }
        Mail::to('quanbka.cntt@gmail.com')
        ->cc($emails)
        ->send(new NewContact($this->data));
    }


}
