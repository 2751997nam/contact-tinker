<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $retval = [
            'status' => 'fail'
        ];
        if ($request->has('mailTo')) {
            $data = $request->except('mailTo');
            $mails = explode(',', $request->mailTo);
            foreach ($mails as $mail) {
                dispatch(new SendEmailJob($mail, $data));
            }

            $retval = [
                'status' => 'successful'
            ];
        }

        return $retval;
    }
}
