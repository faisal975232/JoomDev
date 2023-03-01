<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emailtemplate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function addTemplate(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'templateid' => ['required', 'string'],
            'template' => ['required', 'string'],
        ]);


        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }
        //end validation

        $add = Emailtemplate::create([
            'Templateid' => $request->templateid,
            'Template' => $request->template
        ]);

        return redirect()->back()->with('message', 'Template has bee saved successfully!');
    }


    public function showTemplate(Request $request)
    {
        $templates = Emailtemplate::get();

        return view('showtemplates', compact('templates'));
    }

    public function sendEmail(Request $request)
    {

        //validation
        $validator = Validator::make($request->all(), [
            'templateid' => ['required', 'string'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string'],
        ]);



        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }
        //end validation


        $template = Emailtemplate::where('Templateid', $request->templateid)->first();


        if ($template == null) {
            return response()->json([
                'success' => 'False',
                'message' => 'Template Id cannot be found'
            ]);
        }

        $email = $request->email;
        $subject = $request->subject;


        $sentMail = Mail::raw($template->Template, function ($message) use ($email, $subject) {
            $message->to($email);
            $message->subject($subject);
        });

        

        return response()->json([
            'success' => 'True',
            'message' => 'Email has been sent'
        ]);
    }
}
