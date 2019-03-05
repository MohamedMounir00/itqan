<?php
/**
 * Created by PhpStorm.
 * User: Shrkaty_10
 * Date: 20/11/2018
 * Time: 11:53 ص
 */

namespace App\Helper;
use App\NotfiyOrder;
use App\Storge;

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

}

