<?php

namespace App\Http\Resources\Api;

use App\Rating;
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
        $rating=Rating::where('order_id',$this->id)->count();

        $lang=$request->lang;
        if ($this->status=='new')
            $status=trans('api.watting_techaincall',[],$lang);
        elseif ($this->status=='wating')
            $status=trans('api.new_order',[],$lang);
        elseif ($this->status=='done')
            $status=trans('api.done_order',[],$lang);
        elseif ($this->status=='can_not')
            $status=trans('api.can_not',[],$lang);
        elseif ($this->status=='consultation')
            $status=trans('api.consultation',[],$lang);
        elseif ($this->status=='delay')
            $status=trans('api.delay',[],$lang);
        elseif ($this->status=='need_parts')
            $status=trans('api.need_parts',[],$lang);
        elseif ($this->status=='another_visit_works')
            $status=trans('api.another_visit_works',[],$lang);
        return [
            'id'=>$this->id,
            'desc'=>$this->desc,
            'date'=>$this->date,
            'client'=>$this->user->name,
            'phone'=>isset($this->user->phone)?$this->user->phone :'',
            'technical'=>isset($this->technical->name ) ? $this->technical->name : '',
            'status'=>$status,
            'category'=>trans('api.repairing',[],$lang).unserialize($this->category->main->name)[$lang],
            // ($request->lang =='ar') ? 'تصليح '.  unserialize($this->category->main->name)[$request->lang]:'Repairing' .unserialize($this->category->main->name)[$request->lang] ,
            'address'=>new AddressCollection($this->address),
            'time'=>new TimeCollection($this->time),
            'storge'=>StorgeCollection::collection($this->storge),
            'product'=>ProudctCollection::collection($this->proudect),
            'total_price_of_product'=>$this->proudect->sum('price'),
            'real_status'=>$this->status,
            'rating'=>($rating==0)?false:true
        ];
    }
}
