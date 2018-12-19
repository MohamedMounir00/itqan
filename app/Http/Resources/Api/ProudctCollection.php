<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProudctCollection extends JsonResource
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
                'name'=>unserialize($this->name)[$request->lang],
                'price'=>$this->price,
                'image'=>'',
                'amount'=>isset($this->pivot->amount)?$this->pivot->amount:'',
                'id_rel'=>isset($this->pivot->id)?$this->pivot->id:'',

            ];
        }



}
