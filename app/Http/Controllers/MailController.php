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
            dispatch(new SendEmailJob($request->mailTo, $data));

            $retval = [
                'status' => 'successful'
            ];
        }

        return $retval;
    }

    public function sendForm(Request $request)
    {
        $retval = [
            'status' => 'fail'
        ];

        if ($request->input('ladipage_id') == "5ebebb37f051fb6f28f72929") {
            $to = "nthiepvn@gmail.com,tuanh.dhtm@gmail.com,thuhoivon@gmail.com";
            $data = $request->all();

            foreach ($data as $key => $value) {
                $data[$key] = json_encode($value);
            }


             dispatch(new SendEmailJob($to, $data));
             $retval = [
                     'data' => [],
                     'code' => 200
                 ];
        }




        // if ($request->has('mailTo')) {
        //     $data = $request->except('mailTo');
        //     dispatch(new SendEmailJob($request->mailTo, $data));
        //
        //     $retval = [
        //         'status' => 'successful'
        //     ];
        // }

        return $retval;
    }
}
