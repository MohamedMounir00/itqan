<?php

namespace App\Http\Controllers\Api;

use App\Assian;
use App\Cart;
use App\CartOrder;
use App\Helper\Helper;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\Api\AllOrderCollection;
use App\Http\Resources\Api\CardProductCollection;
use App\Http\Resources\Api\OrderCollection;
use App\Http\Resources\Api\ProudctCollection;
use App\Http\Resources\Api\StatusCollection;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //

    public function AddOrder(OrderRequest $request)
    {

        $lang = $request->lang;

        $name = [
            'en' => $request->date_en,
            'ar' => $request->date_ar,

        ];
        $order = new  Order();
        $order->desc =          $request->desc;
        $order->category_id =   $request->category_id;
        $order->time_id     =   $request->time_id;
        $order->date        =   serialize($name);
        $order->address_id  =   $request->address_id;
        $order->status      =   'new';
        $order->user_id     =    auth()->user()->id;
        $order->save();
        if ($request->file_id != "")
            $order->storge()->sync(explode(',', $request->file_id));
        if ($request->product_id != "")
        {
            foreach (explode(',', $request->product_id) as $key => $value)
            {

                CartOrder::create([
                    'product_id' => $value,
                    'order_id' => $order->id,
                    'status' => 1,
                    'amount' => explode(',', $request->amount)[$key],
                ]);
            }
            foreach (explode(',', $request->product_id) as $key => $value)
            {

                Cart::create([
                    'product_id' => $value,
                    'user_id' => auth()->user()->id,
                    'amount' => explode(',', $request->amount)[$key],

                ]);
            }
        }


        return new StatusCollection(true, trans('api.add_order_done', [], $lang));

    }

    public function allOrdersForClient()
    {
        $statuses_Array1 = ['new', 'wating', 'consultation', 'delay', 'need_parts'];
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
        $assin_id = $request->assin_id;

        $order = Order::findOrFail($id);
        $assin = Assian::findOrFail($assin_id);
        if ($status == 'yes')
        {
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

            return new StatusCollection(true, trans('api.accpeted_techaincal', [], $lang));

        }
        else
            {
            $assin->update([

                'status' => 'dis_agree',

            ]);
            Helper::Notificationsuodate($notyfiy, 1);

            return new StatusCollection(true, trans('api.refused_techaincal', [], $lang));

        }

    }

    /////////////////////////////////////////////getproduct Not active add By Techaincal

    public function getproduct(Request $request)
    {
        $id = $request->order_id;
        $order = Order::findOrFail($id);
        $cart = CartOrder::with('product')->where('status', 0)->where('order_id', $order->id)->get();
        return CardProductCollection::collection($cart);
    }

    public function updateproduct(Request $request)
    {
        $lang = $request->lang;
        $order_id = $request->order_id;
        $order = Order::findOrFail($order_id);
        foreach (explode(',', $request->id_product_not_active) as $value)
        {
            $product = CartOrder::findOrFail($value);

            $product->update([
                'status' => 1,
            ]);
        }
        foreach (explode(',', $request->id_product_not_active) as $value)
        {
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
        return new StatusCollection(true, trans('api.accpeted_product', [], $lang));
    }
}
