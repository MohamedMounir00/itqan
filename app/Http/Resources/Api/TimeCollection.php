<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lang=$request->lang;
      if ($this->timing =='am')
           $am=trans('api.am',[],$lang);
       else
           $am=trans('api.pm',[],$lang);

       return [
            'id'=>$this->id,
            'time'=>trans('api.from',[],$lang).$this->from .trans('api.to',[],$lang).$this->to .'-'.$am,
            // ($request->lang=='ar')?' من'.$this->from .'الى '.$this->to .'-'.$am :'from '.$this->from .' to '.$this->to .'-'.$am
      ];
    }
}
