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

        $ladipage_id = $request->input('ladipage_id');
        switch ($ladipage_id) {
            case '5ebebb37f051fb6f28f72929':
            $to = "nthiepvn@gmail.com,tuanh.dhtm@gmail.com,thuhoivon@gmail.com";
            break;

            case '5e9a9ff9f16f4f5ac39125db':
            $to = "nthiepvn@gmail.com,tuanh.dhtm@gmail.com,thuhoivon@gmail.com";
            break;

            default:
            $to = "quanbka.cntt@gmail.com";
            break;
        }

        $data = $request->all();

        $data = $data['form_data'];

        foreach ($data as $key => $value) {
            $data[$key] = json_encode($value);
        }

        $data['title'] = "Có contact mới từ " . $_SERVER["HTTP_REFERER"];

        dispatch(new SendEmailJob($to, $data));

        $retval = [
            'data' => [],
            'code' => 200
        ];

        return $retval;
    }
}
