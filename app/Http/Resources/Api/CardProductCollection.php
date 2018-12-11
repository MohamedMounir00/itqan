<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CardProductCollection extends JsonResource
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
            'id_product_not_active'=>$this->id,
            'order_id'=>$this->order_id,
            'product'=>new  ProudctCollection($this->product)
        ];
    }
}
