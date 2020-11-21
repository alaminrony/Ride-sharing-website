<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HelpAndSupport;
use App\User;
use DB;
use Mail;
use Validator;

class ContactController extends Controller {

    public function index() {
        return view('frontEnd.contact');
    }
    
    public function helpAndSupport(Request $request) {
//        echo "<pre>"; print_r($request->all());exit;
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $contact = new HelpAndSupport;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        $admins = User::where('status', '1')->select(DB::raw("CONCAT(first_name,' ',last_name) as adminName"), 'email')->get();

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'body_message' => $request->message,
        ];
        $fromName = $request->first_name . ' ' . $request->last_name;
        $fromEmail = $request->email;
        $subject = $request->subject;

        $mailArr = [];
        if ($admins->isNotEmpty()) {
            foreach ($admins as $admin) {
                $mailArr[] = $admin->email;
                $toEmail = $admin->email;
                $toName = $admin->adminName;
                Mail::send('email-template.helpCenter', $data, function($message) use($toEmail, $toName, $fromEmail, $subject, $fromName) {
                    $message->to($toEmail, $toName)->subject($subject);
                    // $message->from($fromEmail, $fromName);
                });
            }
        }

        return response()->json(['response' => 'success', 'message' => 'Email Sent Successfully', 'toMail' => $mailArr, 'fromMail' => $fromEmail]);
    }

}
