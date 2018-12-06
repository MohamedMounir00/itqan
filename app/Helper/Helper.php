<?php
/**
 * Created by PhpStorm.
 * User: Shrkaty_10
 * Date: 20/11/2018
 * Time: 11:53 ص
 */

namespace App\Helper;
use App\Storge;

class Helper
{
    public static function Uploadfile($request,$file)
{
    if($request->hasFile($file)) {

        $image       = $request->file($file);
        $img_name = time().'-'.rand(999,999999).$filee->getClientOriginalName();
        $image->move(public_path('files/images/order'), $img_name);
        $db_name = 'files/images/order' . $img_name;
        Storge::create([
          //  'url'=>$db_name,
           // 'order_id'=>$item_id,

        ]);

    }
}
}