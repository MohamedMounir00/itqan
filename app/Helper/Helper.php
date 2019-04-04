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
use App\CouponRel;
use App\NotfiyOrder;
use App\NotificationBackent;
use App\Order;
use App\Promotional_code;
use App\Storge;
use App\User;
use Illuminate\Support\Facades\File;
use DB;
use Illuminate\Support\Facades\Mail;

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
     //$city= $order->user->city_id;
    $technical= User::where('city_id',"1991")->whereHas('technical', function ($q) {
        $q->where('type', 'technical');
        $q->where('active', 1);
    })

        ->whereHas('time', function ($q)use($time) {
        $q->where('time_id', $time);
    })
        ->whereDoesntHave('check', function ($q)use($time,$date) {
        $q->where('time_id','=', $time)->where('date','=',$date);
    })
        ->first();

    $id = $order->id;


    $assin = Assian::create([
        'order_id' => $id,
        'user_id' => $order->user_id,
        'technical_id' => $technical->id,
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




    public  static function  assignDynamicForRescheduleds($order,$date,$time)
    {
        $city= $order->user->city_id;

        $technical= User::where('city_id',$city)->whereHas('technical', function ($q) {
            $q->where('type', 'technical');
            $q->where('active', 1);
        })->whereHas('time', function ($q)use($time) {
            $q->where('time_id', $time);
        })

            ->whereDoesntHave('check', function ($q)use($time,$date) {
            $q->where('time_id','=', $time)->where('date','=',$date);
        })
            ->first();

        $id = $order->id;


        $assin = Assian::create([
            'order_id' => $id,
            'user_id' => $order->user_id,
            'technical_id' => $technical->id,
            'status' => 'agree',
        ]);

return $technical->id ;
    }

    public static function NotificationsBackend($order_id,$user_id,$message,$seen)
    {
        NotificationBackent::create([
            'order_id'=>$order_id,
            'user_id'=>$user_id,
            'message' =>serialize($message),
            'seen'=>$seen
        ]);
    }
 public static  function  mail($email,$view)
 {
     Mail::to($email)->send($view);

 }

 public static  function totalPrice($id)

 {
     $order = Order::findOrFail($id);
     $code_rel = CouponRel::where('order_id', $id)->first();
     if ($order->working_hours==0)
         $order_hores=1;
     else
         $order_hores=$order->working_hours;

              if ($order->express==1)
              {
                  $price_cat1=($order->category->price_emergency * $order_hores);
                  $price_cat=$price_cat1;
              }

              else
              {
                  $price_cat1=($order->category->price* $order_hores);
                  $price_cat=$price_cat1;

              }

              if (isset($code_rel))
              {
                  $coupon = Promotional_code::where('id', $code_rel->code_id)->first();

                  if ($coupon->type=='currency')
                  {
                      $price_cat=($price_cat1-$coupon->price);
                  }
                  else{
                      $price_cat=(($price_cat1)-($price_cat1*$coupon->price/100));

                  }
              }

         if ($order->proudect->count()!=0)
         {


             foreach ($order->proudect as $p)
             {
                 $p2['amount']=($p->pivot->amount * $p->price);

                 $povit[]=$p2;

             }
             $price_product=array_sum(array_map(
                     function($povit) {
                         return $povit['amount'];
                     }, $povit)
             );


            return $total_price= ($price_product+$price_cat).' ريال ';

         }
         else{
           return  $total_price= $price_cat .' ريال ';

         }
    
 }

///////////////////////// get notifcation in backend
     public static  function  Get_four_Notify()
{
   $notfit= NotificationBackent::where('seen',0)->orderBy('created_at','desc')->take(4)->get();
   return  $notfit;
}

    public static  function  countNotify()
{
    $count= NotificationBackent::where('seen',0)->count();
    return  $count;
}


    public static  function fixingPrice($id)

    {
        $order = Order::findOrFail($id);
        $code_rel = CouponRel::where('order_id', $id)->first();
        if ($order->working_hours==0)
            $order_hores=1;
            else
          $order_hores=$order->working_hours;

            if ($order->express==1)
            {
                $price_cat1=($order->category->price_emergency * $order_hores);
                $price_cat=$price_cat1;
            }

            else
            {
                $price_cat1=($order->category->price* $order_hores);
                $price_cat=$price_cat1;

            }

            if (isset($code_rel))
            {
                $coupon = Promotional_code::where('id', $code_rel->code_id)->first();

                if ($coupon->type=='currency')
                {
                    $price_cat=($price_cat1-$coupon->price);
                }
                else{
                    $price_cat=(($price_cat1)-($price_cat1*$coupon->price/100));

                }
            }

            if ($order->proudect->count()!=0)
            {


                foreach ($order->proudect as $p)
                {
                    $p2['amount']=($p->pivot->amount * $p->price);

                    $povit[]=$p2;

                }
                $price_product=array_sum(array_map(
                        function($povit) {
                            return $povit['amount'];
                        }, $povit)
                );


                return $total_price= $price_cat.' ريال ';

            }
            else{
                return  $total_price= $price_cat .' ريال ';

            }

    }



}

