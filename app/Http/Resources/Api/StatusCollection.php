<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class StatusCollection extends Resource
{
    private  $message , $status;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __construct($status,$message)
    {
        $this->status = $status;
        $this->message = $message;
    }
    public function toArray($request)
    {
        return [
            'status'=>$this->status,
            'message'=>$this->message,
        ];
    }
}
