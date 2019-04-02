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
            $order->time_id = $request->time_id;
            $order->date = $request->date;
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
            if ($order->express != 1)
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
            ->where('user_id', auth()->user()->id)
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
                Helper::Notificationsuodate($notyfiy, 1);
                return new StatusCollection(false, trans('api.pleas_chooce_new_time', [], $lang));


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
         })->count();


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

}
