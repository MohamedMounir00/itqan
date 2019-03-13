<?php

namespace App\Http\Controllers\Backend;

use App\Appseting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class AppSettingController extends Controller
{
    //


    public function get_setting()
    {
        $settings= Appseting::get();
        return view('settings.index',compact('settings'));
    }

    public function post_settings(Request $request)
    {
        $settings= Appseting::get();
        foreach ($settings as $setting)
        {
            $setting->update([
                'value'=> $request[$setting->key],
            ]);
        }
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return back();
    }

}
