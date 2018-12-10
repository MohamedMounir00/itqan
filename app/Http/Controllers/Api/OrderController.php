<?php

namespace App\Http\Controllers\Api;

use App\Assian;
use App\Cart;
use App\CartOrder;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\Api\AllOrderCollection;
use App\Http\Resources\Api\OrderCollection;
use App\Http\Resources\Api\StatusCollection;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function AddOrder(OrderRequest $request)
    {
        $order = new  Order();
        $order->desc = $request->desc;
        $order->category_id = $request->category_id;
        $order->time_id = $request->time_id;
        $order->date = $request->date;
        $order->address_id = $request->address_id;
        $order->status = 'new';
        $order->user_id = auth()->user()->id;
        $order->save();
        $order->storge()->sync(explode(',', $request->file_id));

        foreach (explode(',', $request->product_id) as $value) {
            CartOrder::create([
                'product_id' => $value,
                'order_id' => $order->id,
                'status' => 1,
            ]);
        }
        foreach (explode(',', $request->product_id) as $value) {
            Cart::create([
                'product_id' => $value,
                'user_id' => auth()->user()->id,
            ]);
        }

        return new StatusCollection(true, 'تم الاضافه بنجاح');

    }

    public function allOrdersForClient()
    {
        $statuses_Array1 = ['new','wating', 'consultation', 'delay', 'need_parts'];
        $statuses_Array2 = ['done', 'can_not'];

        if (auth()->user()->type == 'personal' || 'government' || 'company')
        {
            $courntorder = Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')->whereIn('status', $statuses_Array1)
                ->where('user_id', auth()->user()->id)->orderByDesc('created_at')
                ->get();

            $oldorder = Order::with('category', 'address', 'time', 'user', 'storge', 'proudect')->whereIn('status', $statuses_Array2)
                ->where('user_id', auth()->user()->id)->orderByDesc('created_at')
                ->get();
            return  new AllOrderCollection($courntorder,$oldorder);
                //OrderCollection::collection($order);
        }

    }



    public function showOrder(Request $request)
    {
        $id = $request->order_id;
        $order = Order::with('cat', 'address', 'time', 'user', 'storge', 'proudect')
            ->findOrFail($id);
        return new OrderCollection($order);

    }

    public function assienTechnical(Request $request)
    {

        // assien techainal;
        $id = $request->order_id;
        $status = $request->status;//yes Or no
        $technical_id = $request->technical_id;

        $order = Order::findOrFail($id);
        if ($status == 'yes') {
            $assein = Assian::create([
                'order_id' => $id,
                'user_id' => auth()->user()->id,
                'status' => 'agree',

            ]);

            $order->status = 'wating';
            $order->technical_id = $technical_id;
            $order->save();
            return new StatusCollection(true, 'تم تعين الفنى لهذه المهمه');

        } else {
            $assein = Assian::create([
                'order_id' => $id,
                'user_id' => auth()->user()->id,
                'status' => 'dis_agree',

            ]);
            return new StatusCollection(true, 'تم رفض الفنى لهذه المهمه');

        }


    }
}
