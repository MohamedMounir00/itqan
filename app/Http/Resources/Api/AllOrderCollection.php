<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AllOrderCollection extends Resource
{
    private $courntorder , $oldorder;
    function __construct($courntorder,$oldorder)
    {
        $this->courntorder=$courntorder;
        $this->oldorder=$oldorder;

    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'current'=> OrderCollection::collection($this->courntorder),
            'old'=>OrderCollection::collection($this->oldorder)
        ];
    }
}
