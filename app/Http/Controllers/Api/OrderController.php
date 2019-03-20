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
use Carbon\Carbon;
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
        $ordercount = Order::where('user_id', auth()->user()->id)
            ->where('created_at', '>=', Carbon::now()->subMinutes(1))
            ->count();

        if ($ordercount != 0) {
            return new StatusCollection(true, trans('عفو لا يمكنك اضافه طلب قبل 15 دقيقه'));

        } else {
            $order = new  Order();
            $order->desc = $request->desc;
            $order->category_id = $request->category_id;
            $order->time_id = $request->time_id;
            $order->date = serialize($name);
            $order->address_id = $request->address_id;
            $order->status = 'new';
            $order->user_id = auth()->user()->id;
            $order->express = $request->express;
            $order->save();
            if ($request->file_id != "")
                $order->storge()->sync(explode(',', $request->file_id));
            if ($request->product_id != "") {
                foreach (explode(',', $request->product_id) as $key => $value) {
                        if ( explode(',', $request->amount)[$key]!=0) {
                            CartOrder::create([
                                'product_id' => $value,
                                'order_id' => $order->id,
                                'status' => 1,
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


            return new StatusCollection(true, trans('api.add_order_done', [], $lang));

        }
    }

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
    public function oeder_details(Request $request)
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
        $assin = Assian::findOrFail($assin_id);
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
        $status = $request->status;
        if ($status == 'yes') {


            foreach (explode(',', $request->id_rel) as $value) {
                $product = CartOrder::findOrFail($value);

                $product->update([
                    'status' => 1,
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
        foreach (explode(',', $request->product_id) as $key => $value) {
            $like_product = CartOrder::where('product_id', $value)->where('order_id', $order->id)->count();
            if ($like_product == 0) {
                if (explode(',', $request->amount)[$key] != 0) {

                    CartOrder::create([
                        'product_id' => $value,
                        'order_id' => $order->id,
                        'status' => 1,
                        'user_id' => auth()->user()->id,

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

        return new StatusCollection(true, trans('api.addedProduct', [], $lang));
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

    //// open warranty


}
