<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\CartOrder;
use App\CouponRel;
use App\Helper\Helper;
use App\Http\Resources\Api\OrderCollection;
use App\Http\Resources\Api\StatusCollection;
use App\Mail\SendNotifyMail;
use App\Order;
use App\Promotional_code;
use App\StatusOrder;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderTechnicalController extends Controller
{
    //

    public function allOrderForTechnical(Request $request)
    {
        $status = $request->status; //['current','old']

        if ($status == 'current')
            $statuses_Array = ['wating', 'consultation', 'delay', 'need_parts','another_visit_works'];
        else
            $statuses_Array = ['done', 'can_not'];
            $order = Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')
                ->whereIn('status', $statuses_Array)
                ->where('technical_id', auth()->user()->id)->orderByDesc('created_at')
                ->get();
            return OrderCollection::collection($order);

    }

    public function updateStatusOrder(Request $request)
    {
        $lang   = $request->lang;
        $status = $request->status;
        $id     = $request->order_id;
        $reason = $request->reason;
        $working_hours = $request->working_hours;
        $date= $request->date;
        $user   = User::findOrFail(auth()->user()->id);
        if ($user->technical->type == 'technical')
        {
            $order = Order::findOrFail($id);
            $order->status = $status;

            $order->save();
            StatusOrder::create([
                'status'=>$status,
                'user_id'=>auth()->user()->id,
                'order_id'=>$id,
                'reason'=>$reason
            ]);
            $name =[
                'ar'=>trans('api.status_uodated',[],'ar').unserialize($order->category->main->name)['ar'].'',
                'en'=>trans('api.status_uodated',[],'ar').unserialize($order->category->main->name)['en'].''
            ];
            Helper::Notifications($order->id,$order->user_id,$name,'status',0);
            if ($status=='can_not'||$status=='done')

            {
                $key = mt_rand(100000, 999999);
                $order->working_hours=$working_hours;
                $order->save();
                if ($status=='can_not')
                {
                    $coupon=Promotional_code::create([

                        'code'=>$key,
                        'expires_at'=>$date,
                        'type_status'=>'coupon'
                    ]);
                }
                elseif($status=='done'){
                    $coupon=Promotional_code::create([
                        'price'=>'100',
                        'type'=>'percentage',
                        'code'=>$key,
                        'expires_at'=>$date,
                        'type_status'=>'warranty'
                    ]);

                }
                CouponRel::create([

                    'order_id'=>$order->id,
                    'code_id'=>$coupon->id
                ]);
            //    Mail::to()->send(new SendNotifyMail($coupon->code));
              Helper::mail($order->user->email,new SendNotifyMail($coupon->code));
                $name2 =[
                    'ar'=>trans('api.select_payment',[],'ar'),
                    'en'=>trans('api.select_payment',[],'ar')
                ];
                Helper::Notifications($order->id,$order->user_id,$name2,'payment',0);

            }
            return new StatusCollection(true, trans('api.status_uodated_order',[],$lang));
        }
        return new StatusCollection(false, trans('api.no_premssion',[],$lang));


    }

    public function makeProudectForOrder(Request $request)
    {
        $lang  = $request->lang;
        $id    = $request->order_id;
        $user  = User::findOrFail(auth()->user()->id);
        $order = Order::findOrFail($id);

        if ($user->technical->type == 'technical') {
            if ($order->status == 'done'||$order->status == 'done')
                return new StatusCollection(false, trans('api.can_not_add_product',[],$lang));
            else
                {
                foreach (explode(',', $request->product_id) as $key=> $value) {
                    if (explode(',', $request->amount)[$key] != 0) {

                        CartOrder::create([
                            'product_id' => $value,
                            'order_id' => $order->id,
                            'status' => 0,
                            'user_id' => auth()->user()->id,

                            'amount' => explode(',', $request->amount)[$key],

                        ]);
                    }
                }
             
                return new StatusCollection(true, trans('api.watting_product',[],$lang));
            }

        }
    }

}
