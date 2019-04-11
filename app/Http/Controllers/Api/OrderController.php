<?php

namespace App\Http\Controllers\Api;

use App\Assian;
use App\Cart;
use App\CartOrder;
use App\CouponRel;
use App\Helper\Helper;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\Api\AllOrderCollection;
use App\Http\Resources\Api\CardProductCollection;
use App\Http\Resources\Api\OrderCollection;
use App\Http\Resources\Api\ProudctCollection;
use App\Http\Resources\Api\StatusCollection;
use App\Mail\Bill;
use App\Order;
use App\Product;
use App\Promotional_code;
use App\Rescheduled;
use App\Technical;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function PHPSTORM_META\type;
use DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
class OrderController extends Controller
{
    //

    public function AddOrder(OrderRequest $request)
    {
        $lang = $request->lang;

        if (auth()->user()->id) {
            $status_cde=false;
             if ($request->code != null)
             {
                 $coupon = Promotional_code::where('code', $request->code)->first();
                 if (!isset($coupon->id))
                 {
                     $status_cde=false;

                     return new StatusCollection(false, trans('هذا الكبون غير صحيح'));
                 }
                 elseif($coupon->expires_at < Carbon::now())
                 {
                     $status_cde = false;
                     return new StatusCollection(false, trans('هذا الكود تم انتهاء مده صلاحيته'));
                 }
                 else{
                     $checkusescode = CouponRel::where('code_id', $coupon->id)->first();
                     if (isset($checkusescode))
                     {
                         $status_cde=false;
                         return new StatusCollection(false, trans('هذا الكبون مستخدم من قبل'));
                     }
                     else{
                         $status_cde=true;

                     }
                 }
             }
            $express = $request->express == "1" ? "1" : "0";
            $order = new  Order();
            $order->desc = $request->desc;
            $order->category_id = $request->category_id;
            if ($express == 0)
            {
                $order->reply='yes';
                $order->time_id = $request->time_id;
                $order->date = $request->date;

            }
            else
            {
                $order->time_id = 10;
                $order->date = "لم يتم اختيار تاريخ بعد";
            }
            if ($request->type=='project')
            {
                $order->type='project';
                $order->status_admin='waiting';
                $order->time_id = 10;
                $order->date = "لم يتم اختيار تاريخ بعد";

            }


            $order->address_id = $request->address_id;
            $order->status = 'new';
            $order->user_id = auth()->user()->id;
            $order->express = $express;
            $order->save();
            if ($status_cde)
            {
                CouponRel::create([
                    'order_id'=>$order->id,
                    'code_id'=>$coupon->id
                ]);
            }
            if ($request->file_id != "")
                $order->storge()->sync(explode(',', $request->file_id));
            if ($request->product_id != "") {
                foreach (explode(',', $request->product_id) as $key => $value) {
                    if (explode(',', $request->amount)[$key] != 0) {
                        CartOrder::create([
                            'product_id' => $value,
                            'order_id' => $order->id,
                            'status' => 1,
                            'status_admin' => 1,
                            'user_id' => auth()->user()->id,

                            'amount' => explode(',', $request->amount)[$key],
                        ]);
                    }
                }
                foreach (explode(',', $request->product_id) as $key => $value) {
                    if (explode(',', $request->amount)[$key] != 0) {
                        Cart::create([
                            'product_id' => $value,
                            'user_id' => auth()->user()->id,
                            'amount' => explode(',', $request->amount)[$key],

                        ]);
                    }
                }
            }
            if ($order->express != 1 && $order->type!='project')
                Helper::assignDynamic($order);



            $name = [
                'ar' => trans('api.order_created', [], 'ar'),
                'en' => trans('api.order_created', [], 'en')
            ];
            Helper::NotificationsBackend($order->id, $order->user_id, $name, 0);
            return new StatusCollection(true, trans('api.add_order_done', [], $lang));

        }
        else
            return new StatusCollection(false, trans('api.not_login', [], $lang));

    }
    //}

    public function allOrdersForClient()
    {
        $statuses_Array1 = ['new', 'wating', 'consultation', 'delay', 'need_parts', 'another_visit_works'];
        $statuses_Array2 = ['done', 'can_not'];

        $courntorder = Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')
            ->whereIn('status', $statuses_Array1)
            ->where('user_id', auth()->user()->id)->orderByDesc('created_at')
            ->get();

        $oldorder = Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')
            ->whereIn('status', $statuses_Array2)
            ->where('user_id', auth()->user()->id)->where('status_admin','agree')
            ->orderByDesc('created_at')
            ->get();
        return new AllOrderCollection($courntorder, $oldorder);

    }
    public function order_details(Request $request)
    {
        $id=$request->order_id;
        $odder= Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')->findOrFail($id);
        return new OrderCollection($odder);
    }

    public function showOrder(Request $request)
    {
        $id = $request->order_id;
        $order = Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')
            ->findOrFail($id);
        return new OrderCollection($order);

    }

    public function assienTechnical(Request $request)
    {
        // assien techainal fore order;

        $lang = $request->lang;
        $notyfiy = $request->notyfiy_id;
        $id = $request->order_id;
        $status = $request->status;//yes Or no
        $technical_id = $request->technical_id;
        $assin_id = $request->assign_id;
        $reason = $request->reason_rejection;

        $order = Order::findOrFail($id);
        $date=$order->date;
        $time=$order->time_id;

        $assin = Assian::findOrFail($assin_id);
        $technical = Assian::where('technical_id',$technical_id)->where('status', 'agree')
            ->whereHas('order', function ($q)use($date,$time) {

                $q->where('time_id','=', $time)->where('date','=',$date);

            })->count();
            if ($technical!=0)
            {
                $assin->update([

                    'status' => 'dis_agree',
                    'reason_rejection'=>$reason


                ]);
                Helper::Notificationsuodate($notyfiy, 1);

                $name2 = [
                    'ar' => trans('api.pleas_chooce_new_time_back', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                    'en' => trans('api.pleas_chooce_new_time_back', [], 'en') . unserialize($order->category->main->name)['en'] . ''
                ];
                Helper::NotificationsBackend($order->id,$order->user_id,$name2,0);
                return new StatusCollection(false, trans('api.pleas_chooce_new_time_services', [], $lang));


            }
            else{



        if ($status == 'yes') {
            $assin->update(['status' => 'agree']);
            $order->status = 'wating';
            $order->technical_id = $technical_id;
            $order->save();
            Helper::Notificationsuodate($notyfiy, 1);
            $name = [
                'ar' => trans('api.add_techainel_order', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                'en' => trans('api.add_techainel_order', [], 'en') . unserialize($order->category->main->name)['en'] . ''
            ];
            Helper::Notifications($id, $technical_id, $name, 'order', 0);
            $name2 = [
                'ar' => trans('api.add_techainel_to_order', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                'en' => trans('api.add_techainel_to_order', [], 'en') . unserialize($order->category->main->name)['en'] . ''
            ];
            Helper::NotificationsBackend($order->id,$order->user_id,$name2,0);
            return new StatusCollection(true, trans('api.accpeted_techaincal', [], $lang));

        } else {
            $order->reply = 'no';
            $order->save();

            $assin->update([

                'status' => 'dis_agree',
                'reason_rejection'=>$reason


            ]);
            $name2 = [
                'ar' => trans('api.refused_techaincal', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                'en' => trans('api.refused_techaincal', [], 'en') . unserialize($order->category->main->name)['en'] . ''
            ];
            Helper::NotificationsBackend($order->id,$order->user_id,$name2,0);
            Helper::Notificationsuodate($notyfiy, 1);

            return new StatusCollection(true, trans('api.refused_techaincal', [], $lang));

        }
            }
    }

    /////////////////////////////////////////////getproduct Not active add By Techaincal

    public function getproduct(Request $request)
    {
        $id = $request->order_id;
        $order = Order::findOrFail($id);
        $cart = CartOrder::with('product')->where('status', 0)->where('status_admin', 1)->where('order_id', $order->id)->get();
        return CardProductCollection::collection($cart);
    }

    public function updateproduct(Request $request)
    {
        $lang = $request->lang;
        $order_id = $request->order_id;
        $order = Order::findOrFail($order_id);
        $status = $request->status;
        if ($status == 'yes') {


            foreach (explode(',', $request->id_rel) as $value) {
                $product = CartOrder::findOrFail($value);

                $product->update([
                    'status' => 1,
                    'status_admin' => 1,

                ]);
            }
            foreach (explode(',', $request->id_rel) as $value) {
                $product = CartOrder::findOrFail($value);

                Cart::create([
                    'product_id' => $product->product_id,
                    'user_id' => auth()->user()->id,
                    'amount' => $product->amount,
                ]);
            }
            $name = [
                'ar' => trans('api.accpeted_product', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                'en' => trans('api.accpeted_product', [], 'en') . unserialize($order->category->main->name)['en'] . ''
            ];
            Helper::Notifications($order_id, $order->technical_id, $name, 'product', 0);
            $name2 = [
                'ar' => trans('api.accpeted_product', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                'en' => trans('api.accpeted_product', [], 'en') . unserialize($order->category->main->name)['en'] . ''
            ];
            Helper::NotificationsBackend($order->id,$order->user_id,$name2,0);
            return new StatusCollection(true, trans('api.addedProduct', [], $lang));
        } else {
            $product = CartOrder::findOrFail($request->id_rel);

            $product->delete();
            return new StatusCollection(true, trans('api.deleteProduct', [], $lang));

        }
    }


    public function SendProductToOrder(Request $request)
    {
        $lang = $request->lang;
        $order_id = $request->order_id;
        $order = Order::findOrFail($order_id);
        if (auth()->user()->client) {
            foreach (explode(',', $request->product_id) as $key => $value) {
                $like_product = CartOrder::where('product_id', $value)->where('order_id', $order->id)->count();
                if (explode(',', $request->amount)[$key] != 0) {
                    if ($like_product == 0) {


                        CartOrder::create([
                            'product_id' => $value,
                            'order_id' => $order->id,
                            'status' => 1,
                            'user_id' => auth()->user()->id,
                            'status_admin' => 1,

                            'amount' => explode(',', $request->amount)[$key],
                        ]);

                    } else {
                        $add_product = CartOrder::where('product_id', $value)->where('order_id', $order->id)->first();
                        $add_product->update([
                            'amount' => $add_product->amount + explode(',', $request->amount)[$key],
                        ]);
                    }
                }
            }
            foreach (explode(',', $request->product_id) as $key => $value) {

                Cart::create([
                    'product_id' => $value,
                    'user_id' => auth()->user()->id,
                    'amount' => explode(',', $request->amount)[$key],

                ]);
            }
            $name = [
                'ar' => trans('api.addProduct', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                'en' => trans('api.addProduct', [], 'en') . unserialize($order->category->main->name)['en'] . ''
            ];
            Helper::NotificationsBackend($order->id, $order->user_id, $name, 0);
            return new StatusCollection(true, trans('api.addedProduct', [], $lang));
        }
        return new StatusCollection(true, trans('api.addedProduct_fals', [], $lang));

    }

    public function GetCurrentOrderWithPrice()
    {
        $statuses_Array1 = ['new', 'wating', 'consultation', 'delay', 'need_parts', 'another_visit_works'];

        $courntorder = Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')
            ->whereIn('status', $statuses_Array1)
            ->where('user_id', auth()->user()->id)->orderByDesc('created_at')
            ->get();

        return OrderCollection::collection($courntorder);
    }


  public function  rescheduled_order(Request $request)
  {
      $order = Order::findOrFail($request->order_id);
      $city= $order->user->city_id;

      $date= $request->date;
      $time= $request->time_id;
      $lang = $request->lang;
      $count=Rescheduled::where('order_id',$request->order_id)->where('reply',0)->count();
     if ($count==0) {
         $technical = User::where('city_id',$city)->whereHas('technical', function ($q) {
             $q->where('type', 'technical');
             $q->where('active', 1);
         })

             ->whereHas('time', function ($q) use ($time) {
             $q->where('time_id', $time);
         })->whereDoesntHave('check', function ($q) use ($time, $date) {
             $q->where('time_id', '=', $time)->where('date', '=', $date);
         })->join('technicals', function ($join) {
                 $join->on('users.id', '=', 'technicals.user_id');
             })->selectRaw((DB::raw('*, ( 6367 * acos( cos( radians(' . $order->address->latitude . ') ) 
     * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $order->address->longitude . ') )
     + sin( radians(' . $order->address->latitude . ') ) *
     sin( radians( latitude ) ) ) ) AS distance')))
             ->orderBy('distance', 'ASC')->count();

//return $technical;
         if ($technical == 0)
             return new StatusCollection(false, trans('api.select_anoter_time', [], $lang));

         else {
             Rescheduled::create([
                 'technical_id' => Helper::assignDynamicForRescheduleds($order, $date, $time),
                 'order_id' => $request->order_id,
                 'date' => $request->date,
                 'time_id' => $request->time_id,
                 'status' => $request->status,

             ]);
             $name2 = [
                 'ar' => trans('api.rescheduled_order_client', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                 'en' => trans('api.rescheduled_order_client', [], 'en') . unserialize($order->category->main->name)['en'] . ''
             ];
             Helper::NotificationsBackend($order->id, $order->user_id, $name2, 0);
             return new StatusCollection(true, trans('api.rescheduled_order', [], $lang));
         }
     }
     else
         return new StatusCollection(false, trans('api.rescheduled_order_alredy', [], $lang));

  }

  public  function check_time_order(Request $request){
        $date= $request->date;
        $time= $request->time_id;
      $lang = $request->lang;

        $technical= User::where('city_id',1991)->whereHas('technical', function ($q) {
            $q->where('type', 'technical');
           $q->where('active', 1);
        })

            ->whereHas('time', function ($q)use($time) {
            $q->where('time_id', $time);
        })
            ->whereDoesntHave('check', function ($q)use($time,$date) {
            $q->where('time_id','=', $time)->where('date','=',$date);
        })->count();





         if ($technical==0)
             return new StatusCollection(false, trans('api.select_anoter_time', [], $lang));

         else
             return new StatusCollection(true, trans('api.continue', [], $lang));


  }

/////////////////////////agree or disagree reschedule by client
     public function reschedule_reply(Request $request)
     {
         $lang = $request->lang;
         $notfiy = $request->notfiy_id;
         $id = $request->reschedule_id;
         $status = $request->status;//yes Or no

         if (auth()->user()->client){
             $reschedule=Rescheduled::findOrFail($id);

            // $count=Rescheduled::where('order_id',$reschedule->order_id)->where('reply',0)->count();
            // if ($count > 0)
              //   return new StatusCollection(false, trans('api.rescheduled_order_alredy', [], $lang));

             $order = Order::findOrFail($reschedule->order_id);
            if ($status=='yes')
            {
                $reschedule->reply=1;
                $reschedule->save();
                $order->technical_id=$reschedule->technical_id;
                $order->time_id=$reschedule->time_id;
                $order->date=$reschedule->date;
                $order->save();

                Helper::Notificationsuodate($notfiy, 1);
                $name1 = [
                    'ar' => trans('api.rescheduled_agree_from_client', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                    'en' => trans('api.rescheduled_agree_from_client', [], 'en') . unserialize($order->category->main->name)['en'] . ''
                ];
                Helper::NotificationsBackend($order->id, $order->user_id, $name1, 0);
                return new StatusCollection(true, trans('api.done_agree_rescheduled', [], $lang));

            }
            else{
                $reschedule->reply=1;
                $reschedule->save();
                Helper::Notificationsuodate($notfiy, 1);

                $name2 = [
                    'ar' => trans('api.rescheduled_disagree_from_client', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                    'en' => trans('api.rescheduled_disagree_from_client', [], 'en') . unserialize($order->category->main->name)['en'] . ''
                ];
                Helper::NotificationsBackend($order->id, $order->user_id, $name2, 0);
                return new StatusCollection(true, trans('api.done_disagree_rescheduled', [], $lang));

            }
         }
         else{
             return new StatusCollection(false, trans('api.no_permiision', [], $lang));
         }
     }


     public function activeWarranty(Request $request)
     {
         $id = $request->order_id;
         $order = Order::findOrFail($id);
         if ($order->status == 'done') {
             $status_cde = false;
             if ($request->code != null) {
                 $coupon = Promotional_code::where('code', $request->code)->where('type_status','warranty')->where('order_id',$id)->first();
                 if (!isset($coupon->id)) {
                     $status_cde = false;

                     return new StatusCollection(false, trans('هذا الكبون غير صحيح'));
                 }   elseif($coupon->expires_at < Carbon::now())
                 {
                     $status_cde = false;
                     return new StatusCollection(false, trans('هذا الكبون تم انتهاء مده صلاحيته'));
                 }
                 else {
                     $checkusescode = CouponRel::where('code_id', $coupon->id)->first();
                     if (isset($checkusescode)) {
                         $status_cde = false;
                         return new StatusCollection(false, trans('هذا الكبون مستخدم من قبل'));

                     }

                     else {
                         $status_cde = true;

                     }
                 }
             }
             $order->status='new';
             $order->warranty=1;
             $order->time_id = 10;
             $order->date = "لم يتم اختيار تاريخ بعد";
             $order->technical_id=null;
             $order->save();
             $products = CartOrder::where('order_id',$order->id)->get();

             foreach ($products as $product ) {

                 $product->update([
                     'warranty' => true,

                 ]);
             }
             if ($status_cde) {
                 CouponRel::create([
                     'order_id' => $order->id,
                     'code_id' => $coupon->id
                 ]);
             }
             $name2 = [
                 'ar' => trans('api.activeWarranty', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                 'en' => trans('api.activeWarranty', [], 'en') . unserialize($order->category->main->name)['en'] . ''
             ];
             Helper::NotificationsBackend($order->id, $order->user_id, $name2, 0);
             return new StatusCollection(true, trans('تم تفعيل فتره الضمان برجاء انتظار  تعين فنى وقت من الاداره'));

         }else{

             if ($request->code != null)
             {
                 $coupon = Promotional_code::where('code', $request->code)->where('type_status','coupon')->first();
                 if (!isset($coupon->id))
                 {
                     $status_cde=false;

                     return new StatusCollection(false, trans('هذا الكبون غير صحيح'));
                 }
                 elseif($coupon->expires_at < Carbon::now())
                 {
                     $status_cde = false;
                     return new StatusCollection(false, trans('هذا الكبون تم انتهاء مده صلاحيته'));
                 }
                 else{
                     $checkusescode = CouponRel::where('code_id', $coupon->id)->first();
                     if (isset($checkusescode))
                     {
                         $status_cde=false;
                         return new StatusCollection(false, trans('هذا الكبون مستخدم من قبل'));
                     }
                     else{
                         $status_cde=true;

                     }
                 }
             }
             if ($status_cde) {
                 CouponRel::create([
                     'order_id' => $order->id,
                     'code_id' => $coupon->id
                 ]);
             }

             return new StatusCollection(true, trans('تم تفعيل كوبون الخصم الخاص بك'));

         }
        // return new StatusCollection(false, trans('هذا الطلب ليس منتهى حتى يتم تفعيل فتره ضمان له'));

     }


    public function bill(Request $request)
    {
        $lang=$request->lang;
        $id=$request->order_id;
        $order = Order::with('proudect')->find($id);
        if ($order->status=='done'||$order->status=='can_not') {
            $discount = 0;
            $price_product = 0;
            $code_rel = CouponRel::where('order_id', $id)->first();

            if ($order->express == 1) {
                $price_cat1 = ($order->category->price_emergency * $order->working_hours);
                $price_cat = $price_cat1;
            } else {
                $price_cat1 = ($order->category->price * $order->working_hours);
                $price_cat = $price_cat1;

            }

            if (isset($code_rel)) {
                $coupon = Promotional_code::where('id', $code_rel->code_id)->first();

                if ($coupon->type == 'currency') {
                    $discount = $coupon->price . 'ريال';
                    $price_cat = ($price_cat1 - $coupon->price);
                } else {
                    $price_cat = (($price_cat1) - ($price_cat1 * $coupon->price / 100));
                    $discount = $coupon->price . '%';

                }
            }

            if ($order->status == 'done' || $order->status == 'can_not') {
                if ($order->proudect->count() != 0) {


                    foreach ($order->proudect as $p) {
                        $p2['nn'] = ($p->pivot->amount * $p->price);

                        $povit[] = $p2;

                    }
                    $price_product = array_sum(array_map(
                            function ($povit) {
                                return $povit['nn'];
                            }, $povit)
                    );

                    $total_price = ($price_product + $price_cat);

                } else {
                    $total_price = $price_cat;

                }
            }
            $pdf = PDF::loadView('bill', compact('order', 'total_price', 'discount', 'price_cat1', 'price_product'));

            $pdf->save(public_path('uploads/receipt/receipt') . $order->id . '.pdf');
            $url = 'uploads/receipt/receipt' . $order->id . '.pdf';
            $email = $order->user->email;
            $name = $order->user->name;


            Helper::mail($email, new Bill($url, $name));


            return new StatusCollection(true, trans('api.send_bil', [], $lang));
        }
        else
            return new StatusCollection(false, trans('api.order_not_finsh', [], $lang));

    }

}
