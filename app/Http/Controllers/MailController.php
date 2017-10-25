<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MailController extends Controller
{
    public function sendReceipt(Request $request)
    {
        $mem_id = $request->input('send');
        $bname = $request->input('bname');
        $bprice = $request->input('bprice');
        $bquantity = $request->input('bquantity');
        $btotal = $request->input('btotal');

        $mem_email = "";
        $results = DB::Select("select * from member where id = $mem_id");
        foreach ($results as $result)
        {
            $mem_email = $result->email;
        }

        $resceiptTime = "Receipt Number: ".time();

        Mail::send('emails.send', ['title' => $resceiptTime, 'content' => $content], function ($message)
        {

            $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to($mem_email);

        });

    }
}
