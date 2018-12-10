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
    $status= 'طلب جديد';
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
            $status= 'Go to the technical report';
        elseif ($this->status=='wating')
            $status= 'New Order';
        elseif ($this->status=='done')
            $status= 'Dne';
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
            'date'=>unserialize($this->date)[$request->lang],
            'client'=>$this->user->name,
            'technical'=>isset($this->technical->name ) ? $this->technical->name : '',
            'status'=>$status,
            'category'=>($request->lang =='ar') ? 'تصليح '.  unserialize($this->category->main->name)[$request->lang]:'Repairing' .unserialize($this->category->main->name)[$request->lang] ,
            'address'=>new AddressCollection($this->address),
            'time'=>new TimeCollection($this->time),
            'storge'=>StorgeCollection::collection($this->storge),
            'proudct'=>ProudctCollection::collection($this->proudect),
        ];
    }
}
