<?php
/**
 * Created by PhpStorm.
 * User: Shrkaty_10
 * Date: 20/11/2018
 * Time: 11:53 ص
 */

namespace App\Helper;
use App\Appseting;
use App\Assian;
use App\NotfiyOrder;
use App\Storge;
use App\User;
use Illuminate\Support\Facades\File;
use DB;
class Helper
{
    public static function Notifications($order_id,$user_id,$message,$type,$seen)
{
    NotfiyOrder::create([
        'order_id' =>$order_id,
        'user_id' =>$user_id,
        'message' =>serialize($message),
        'type' =>$type,
        'seen' =>$seen,
    ]);
}

    public static function Notificationsuodate($id,$seen)
    {
        $n=NotfiyOrder::findOrFail($id);
        $n->update([
            'seen' =>$seen,
        ]);
    }

    public static function UploadImge($request,$path,$input)
    {
        if ($request->hasFile($input)) {

            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path($path), $img_name);
            $db_name = $path . $img_name;
            return $db_name;
        }
        else
            $db_name ='';
        return $db_name;

    }

public static function UpdateImage($request,$path,$input,$model)
{
    if ($request->hasFile($input)) {
        if ($model != '') {

            if (File::exists(public_path($model))) { // unlink or remove previous image from folder
                unlink(public_path($model));
            }
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path($path), $img_name);
            $db_name =  $path . $img_name;
            return $db_name;


        } else {
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path($path), $img_name);
            $db_name = $path . $img_name;
            return $db_name;

        }
    } else
        $db_name = $model;
    return $db_name;

}

public static function make_decision()
{
    return Appseting::where('key','make_decision_time')->first();
}

public  static function  assignDynamic($order)
{

    $date= $order->date;
    $time= $order->time_id;

    $technical= User::whereHas('technical', function ($q) {
        $q->where('type', 'technical');
        $q->where('active', 1);
    })->whereHas('time', function ($q)use($time) {
        $q->where('time_id', $time);
    })->whereDoesntHave('check', function ($q)use($time,$date) {
        $q->where('time_id','=', $time)->where('date','=',$date);
    })
        ->join('technicals', function ($join) {
            $join->on('users.id', '=', 'technicals.user_id');
        })->selectRaw((DB::raw('*, ( 6367 * acos( cos( radians(' . $order->address->latitude . ') ) 
     * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $order->address->longitude . ') )
     + sin( radians(' . $order->address->latitude . ') ) *
     sin( radians( latitude ) ) ) ) AS distance')))
        ->orderBy('distance', 'ASC')->first();

    $id = $order->id;


    $assin = Assian::create([
        'order_id' => $id,
        'user_id' => $order->user_id,
        'technical_id' => $technical->user_id,
        'status' => 'watting',
    ]);
    $order->reply = 'yes';
    $order->save();

    $name = [
        'ar' => ' للعمل على طلبك ' . ' ' . trans('api.repairing', [], 'ar') . unserialize($order->category->main->name)['ar'] . ' ' . $technical->name . ' تم تعين  ',
        'en' => $technical->name . ' ' . ' assien techamnal ' . trans('api.repairing', [], 'en') . unserialize($order->category->main->name)['en'],

    ];
    Helper::Notifications($assin->order_id, $assin->user_id, $name, 'order', 0);

}




    public  static function  assignDynamicForRescheduleds($order)
    {

        $date= $order->date;
        $time= $order->time_id;

        $technical= User::whereHas('technical', function ($q) {
            $q->where('type', 'technical');
            $q->where('active', 1);
        })->whereHas('time', function ($q)use($time) {
            $q->where('time_id', $time);
        })->whereDoesntHave('check', function ($q)use($time,$date) {
            $q->where('time_id','=', $time)->where('date','=',$date);
        })
            ->join('technicals', function ($join) {
                $join->on('users.id', '=', 'technicals.user_id');
            })->selectRaw((DB::raw('*, ( 6367 * acos( cos( radians(' . $order->address->latitude . ') ) 
     * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $order->address->longitude . ') )
     + sin( radians(' . $order->address->latitude . ') ) *
     sin( radians( latitude ) ) ) ) AS distance')))
            ->orderBy('distance', 'ASC')->first();

        $id = $order->id;


        $assin = Assian::create([
            'order_id' => $id,
            'user_id' => $order->user_id,
            'technical_id' => $technical->user_id,
            'status' => 'agree',
        ]);

      return $technical->user_id ;
    }

}

