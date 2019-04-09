<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Helper;
use App\Mail\SendMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Alert;

class MessageController extends Controller
{
    //
    public function send_message_view()
    {
        return view('message.send_message');
    }

    public function send_message(Request $request)
    {
      // dd($request->all());

        $body=$request->body;
        $title=$request->title;
        if ($request->type==1)
            $mails=

        User::select('email')->whereHas('technical', function ($q) {
            $q->where('type', 'technical');

        })  ->pluck('email')->toArray();
         else
         {
             $mails =     User::select('email')->whereHas('client', function ($q) {
    $type=['personal', 'government', 'company'];
    $q->whereIn('type', $type);
       })  ->pluck('email')->toArray();

         }

          $array = [];
        $allmails =[];

          Mail::to($mails)->send(new SendMail($body,$title));

  //      foreach ($mails as $mail)
        //{
           // Mail::to($mail)->send((new SendMail($message,$title))->delay(30));

      //  };
       // Mail::to(['mohamedmounir703@gmail.com','text@text.com'])->send(new SendMail($message,$title));

        //  Mail::to($allmails)->send(new SendMail($message,$title));
     //dd($allmails);

        //Helper::mail($allmails,new SendMail($message,$title));

            Alert::success(trans('backend.send_messahe_is_success'))->persistent("Close");
            return back();
    }


    public function send_message_user_view($id)
    {
        return view('message.send_message_to_user',compact('id'));
    }



    public function send_message_user(Request $request,$id)
    {
        // dd($request->all());

        $body=$request->body;
        $title=$request->title;

        $mail=User::find($id);
        Mail::to($mail->email)->send(new SendMail($body,$title));



        Alert::success(trans('backend.send_messahe_is_success'))->persistent("Close");
        return back();
    }
}
