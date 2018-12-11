<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Http\Resources\Api\OrderCollection;
use App\Http\Resources\Api\StatusCollection;
use App\Order;
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
        $status = $request->status;
        $id = $request->order_id;
        if (auth()->user()->type == 'technical') {
            $order = Order::findOrFail($id);
            $order->status = $status;
            $order->save();
            return new StatusCollection(true, 'تم تغير حاله الطلب');
        }
        return new StatusCollection(false, 'ليس لديك صلاحيه الفنى ');


    }

    public function makeProudectForOrder(Request $request)
    {
        $id = $request->order_id;
        if (auth()->user()->type == 'technical') {
            $order = Order::findOrFail($id);
            if ($order->status == 'done' || 'can_not')
                return new StatusCollection(false, 'هذ الطلب لايمكن اضافه منتجات فيه ');
            else {
                $order->proudect()->sync(explode(',', $request->producet_id));
                foreach (explode(',', $request->producet_id) as $value) {
                    Cart::create([
                        'producet_id' => $value,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                return new StatusCollection(true, 'تم اضافه منتج الى الطلب');
            }

        }
    }
}
