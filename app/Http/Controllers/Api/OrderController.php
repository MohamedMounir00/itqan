<?php

namespace App\Http\Controllers\Api;

use App\Assian;
use App\Cart;
use App\Http\Requests\Api\OrderRequest;
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
        $order->desc=$request->desc;
        $order->cat_id=$request->cat_id;
        $order->time_id=$request->time_id;
        $order->date=$request->date;
        $order->address_id=$request->address_id;
        $order->status='new';
        $order->user_id=auth()->user()->id;
        $order->save();
        $order->storge()->sync(explode(',', $request->file_id));
        $order->proudect()->sync(explode(',', $request->producet_id));
        foreach (explode(',', $request->producet_id) as $value)
        {
          Cart::create([
              'producet_id'=>$value,
              'user_id'=>auth()->user()->id,
          ])  ;
        }

        return new StatusCollection(true,'تم الاضافه بنجاح');

    }
    public function allOrdersForClient(){
        if (auth()->user()->type =='personal'||'government'||'company')
        $order= Order::with('cat','address','time','user','storge','proudect')->where('user_id',auth()->user()->id)
            ->get();
        return  OrderCollection::collection($order);
    }

    public function allOrderForTechnical(Request $request)
    {
        $status= $request->status; //['current','old']

        if ($status == 'current')
            $statuses_Array = ['new','wating','consultation','delay','need_parts'];
        else
            $statuses_Array = ['done', 'can_not'];
           if (auth()->user()->type=='technical' )
            $order= Order::with('cat','address','time','user','storge','proudect')->whereIn('status', $statuses_Array)->where('technical_id',auth()->user()->id)
                ->get();
        return  OrderCollection::collection($order);

    }
    public  function showOrder(Request $request)
    {
        $id = $request->order_id;
        $order= Order::with('cat','address','time','user','storge','proudect')
        ->findOrFail($id);
        return new OrderCollection($order);

    }

    public function updateStatustoWating(Request $request)
    {

      // assien techainal;
        $id= $request->id;
        $status= $request->status;//yes Or no
        $technical_id= $request->technical_id;

        $order= Order::findOrFail($id);
        if ($status == 'yes')
        {
            $assein = Assian::create([
                'order_id'=>$id,
                'user_id'=>auth()->user()->id,
                'status'=>'agree',

            ]);

            $order->status='wating';
            $order->technical_id=$technical_id;
            $order->save();
            return new StatusCollection(true,'تم تعين الفنى لهذه المهمه');

        }
        else{
            $assein = Assian::create([
                'order_id'=>$id,
                'user_id'=>auth()->user()->id,
                'status'=>'dis_agree',

            ]);
            return new StatusCollection(true,'تم رفض الفنى لهذه المهمه');

        }


    }
}
