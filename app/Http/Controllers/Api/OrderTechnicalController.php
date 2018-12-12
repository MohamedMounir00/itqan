<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\CartOrder;
use App\Helper\Helper;
use App\Http\Resources\Api\OrderCollection;
use App\Http\Resources\Api\StatusCollection;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderTechnicalController extends Controller
{
    //

    public function allOrderForTechnical(Request $request)
    {
        $status = $request->status; //['current','old']

        if ($status == 'current')
            $statuses_Array = ['wating', 'consultation', 'delay', 'need_parts'];
        else
            $statuses_Array = ['done', 'can_not'];
            $order = Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')
                ->whereIn('status', $statuses_Array)
                ->where('technical_id', auth()->user()->id)
                ->get();
            return OrderCollection::collection($order);

    }

    public function updateStatusOrder(Request $request)
    {
        $lang=$request->lang;
        $status = $request->status;
        $id = $request->order_id;
        $user= User::findOrFail(auth()->user()->id);
        if ($user->technical->type == 'technical')
        {
            $order = Order::findOrFail($id);
            $order->status = $status;
            $order->save();
            $name =[
                'ar'=>trans('api.status_uodated',[],'ar').unserialize($order->category->main->name)['ar'].'',
                'en'=>trans('api.status_uodated',[],'ar').unserialize($order->category->main->name)['en'].''
            ];
            Helper::Notifications($order->id,$order->user_id,$name,'order',0);
            return new StatusCollection(true, trans('api.status_uodated_order',[],$lang));
        }
        return new StatusCollection(false, trans('api.no_premssion',[],$lang));


    }

    public function makeProudectForOrder(Request $request)
    {
        $id = $request->order_id;
        $user= User::findOrFail(auth()->user()->id);
        $order = Order::findOrFail($id);

        if ($user->technical->type == 'technical') {
            if ($order->status == 'done') {
                return new StatusCollection(false, 'هذ الطلب لايمكن اضافه منتجات فيه ');

            } else {
                foreach (explode(',', $request->product_id) as $key=> $value) {
                    CartOrder::create([
                        'product_id' => $value,
                        'order_id' => $order->id,
                        'status' => 0,
                        'amount' => explode(',', $request->amount)[$key],

                    ]);
                }
                $name = [
                    'ar' => '  لقد قام الفنى لاضافه منتجات الى طلب تصليح ' . unserialize($order->category->main->name)['ar'] . '',
                    'en' => 'The technician added products to a repair request' . unserialize($order->category->main->name)['en'] . ''
                ];
                Helper::Notifications($order->id, $order->user_id, $name, 'product', 0);
                return new StatusCollection(true, 'تم اضافه منتج الى الطلب');
            }

        }
    }

}
