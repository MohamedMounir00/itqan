<?php

namespace App\Http\Controllers\Api;

use App\Appseting;
use App\ContactAdmin;
use App\Http\Resources\Api\StatusCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    //




    public function send_message_admin(Request $request)
    {
        $lang=$request->lang;
        ContactAdmin::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>auth()->user()->id
        ]);
        return  new StatusCollection(true,trans('api.done_message',[],$lang));
    }


    public function condition(Request $request)
    {
        $lang=$request->lang;
        if ($lang=='en')
            $condition=Appseting::where('key','conditions_en')->first();
        else
            $condition=Appseting::where('key','conditions_ar')->first();

          return response()->json(['data'=>$condition->value]);

    }

    public function how_it_wor(Request $request)
    {
        $lang=$request->lang;
        if ($lang=='en')
            $how_it_wor=Appseting::where('key','how_it_work_en')->first();
        else
            $how_it_wor=Appseting::where('key','how_it_work_ar')->first();

        return response()->json(['data'=>$how_it_wor->value]);

    }

    public function contact(Request $request)
    {
        $lang=$request->lang;
        if ($lang=='en')
            $contact=Appseting::where('key','contact_us_en')->first();
        else
            $contact=Appseting::where('key','contact_us_ar')->first();

        return response()->json(['data'=>$contact->value]);

    }

}
