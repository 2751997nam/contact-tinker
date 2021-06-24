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
        $returnType = $request->get('return-type', 'json');
        if ($request->has('mailTo')) {
            $data = $request->except('mailTo');
            $mails = explode(',', $request->mailTo);
            foreach ($mails as $mail) {
                dispatch(new SendEmailJob($mail, $data));
            }
            if($returnType == 'json') {
                return [
                    'status' => 'successful'
                ];
            } elseif ($returnType == 'html') {
                return view('thank-you');
            }
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

            case '5ebce8c3853d8b259bc16dd2':
            $to = "cskh.sungrouprealestate@gmail.com,thuhoivon@gmail.com";
            break;

            case '5f64206bbd9674411c2d6d45':
            $to = "batdongsandautu.quangninh@gmail.com";
            break;

            default:
            $to = "quanbka.cntt@gmail.com";
            break;
        }

        $data = $request->all();

        $data = $data['form_data'];
//	dd($data);
        foreach ($data as $key => $value) {
            $data[$key] = json_encode($value);
        }

       if(isset($data[0]))
        {
            $data['contact'] = $data[0];
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
