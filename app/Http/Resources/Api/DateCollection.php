<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class DateCollection extends Resource
{
 //   private  $times,$date;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __construct($times,$date='')
    {
       // $this->times = $times;
    }
    public function toArray($request)
    {

      //  for($i = 1; $i <=  date('t'); $i++)
       // {
           // $dates[]= date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT) ."-".date("l", mktime(0,0,0,date('m'),str_pad($i, 2, '0', STR_PAD_LEFT),date('Y'))) ;
            // $dates[] =$dd;
       // }
        return array(
            //'times'=>TimeCollection::collection($this->times),
             //   'date'=>$dates
        );
    }
}
