<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    if ($request->lang =='ar')
    {
if ($this->status=='new')
    $status= 'جارى تعين الفنى';
elseif ($this->status=='wating')
    $status= 'تم تعين الفني';
elseif ($this->status=='done')
    $status= 'تم التصليح';
elseif ($this->status=='can_not')
    $status= 'لايمكن اصلاحه';
elseif ($this->status=='consultation')
    $status= ' يتطلب استشاره خبير';
elseif ($this->status=='delay')
    $status= 'تاجيل لرغبه العميل';
elseif ($this->status=='need_parts')
    $status= 'يحتاج قطع غيار';
    }
    else{
        if ($this->status=='new')
            $status= 'New Order';
        elseif ($this->status=='wating')
            $status= 'فى الانتظار';
        elseif ($this->status=='done')
            $status= 'Waiting';
        elseif ($this->status=='can_not')
            $status= 'Can not be Fixed';
        elseif ($this->status=='consultation')
            $status= 'Requires expert consultation';
        elseif ($this->status=='delay')
            $status= 'Suspension of customer desire';
        elseif ($this->status=='need_parts')
            $status= 'Needs spare parts';
    }
        return [
            'id'=>$this->id,
            'desc'=>$this->desc,
            'date'=>$this->date,
            'client'=>$this->user->name,
            'technical'=>isset($this->technical->name ) ? $this->technical->name : '',
            'status'=>$status,
            'cat'=>($request->lang =='ar') ? 'تصليح '.  unserialize($this->cat->main->name)[$request->lang]:'Repairing' .unserialize($this->cat->main->name)[$request->lang] ,
            'address'=>new AddressCollection($this->address),
            'time'=>new TimeCollection($this->time),
            'storge'=>StorgeCollection::collection($this->storge),
            'proudect'=>ProudctCollection::collection($this->proudect),
        ];
    }
}
