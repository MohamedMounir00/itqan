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


            return [
                'id'=>$this->id,
                'message'=>unserialize($this->message)[$request->lang],
                'assin'=>isset( $assin->id) ?  $assin->id : '',
                'technical'=> isset($assin->user->name) ?  $assin->user->name : '',
                'technical_id'=>isset( $assin->user->id) ?  $assin->user->id : '',
                'order'=> new  OrderCollection($this->order),
                'type'=>$this->type
            ];


    }
}
