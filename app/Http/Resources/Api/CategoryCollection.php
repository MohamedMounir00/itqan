<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>unserialize($this->name)[$request->lang],
            'image'=>url($this->image),
            'price_category'=>isset($this->price)?$this->price:'',
            'price_emergency'=>isset($this->rice_emergency)?$this->rice_emergency:'',
            'system_clocks'=>isset($this->system_clocks)?$this->system_clocks:'',

        ];
    }
}
