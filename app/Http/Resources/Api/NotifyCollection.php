<?php

namespace App\Http\Resources\Api;

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
        return [
          'id'=>$this->id,
          'message'=>unserialize($this->message)[$request->lang],
          'technical'=> new  ProfileCollection($this->technical),
          'order'=> new  OrderCollection($this->order),
        ];
    }
}
