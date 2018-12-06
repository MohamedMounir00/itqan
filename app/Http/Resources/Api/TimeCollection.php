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
      if ($this->timing =='am')
           $am=($request->lang == 'ar') ? 'صباحا' : 'Am';
       else
           $am=($request->lang == 'ar') ? 'مساءا' : 'Pm';

       return [
            'id'=>$this->id,
         'time'=>($request->lang=='ar')?' من'.$this->from .'الى '.$this->to .'-'.$am :'from '.$this->from .' to '.$this->to .'-'.$am
      ];
    }
}
