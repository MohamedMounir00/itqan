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
}

