<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'comment'=>$this->comment,
            'image'=>isset($this->user->image)?url($this->user->image):'',
            'name'=>$this->user->name,
        ];
    }
}
