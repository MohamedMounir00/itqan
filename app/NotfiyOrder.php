<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotfiyOrder extends Model
{
    //
    protected $fillable=['order_id','user_id','type','message','seen'];


    public  function  order(){
        return $this->belongsTo(Order::class,'order_id');

    }


}
