<?php

namespace App\Http\Resources\Api;

use App\Assian;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NotifyCollection extends jsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $assin = Assian::with('user')->where('order_id',$this->order_id)->where('status','watting')->first();

   if ($this->type =='order')
   {
       return [
           'id'=>$this->id,
           'type'=>$this->type,

           'message'=>unserialize($this->message)[$request->lang],
           'assin'=>isset( $assin->id) ?  $assin->id : '',
           'technical'=> isset($assin->user->name) ?  $assin->user->name : '',
           'technical_id'=>isset( $assin->user->id) ?  $assin->user->id : '',
           'order'=> new  OrderCollection($this->order),
       ];
   }
        else{
            return [
                'id'=>$this->id,
                'type'=>$this->type,
                'message'=>unserialize($this->message)[$request->lang],
                'technical'=> isset($this->order->technical->name) ?  $this->order->technical->name : '',
                'technical_id'=>isset( $this->order->technical->id) ? $this->order->technical->id : '',
                'order'=> new  OrderCollection($this->order),
                'new_product'=>   ProudctCollection::collection($this->order->proudectnotactive),
            ];
        }


    }
}
