<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotfiyOrder extends Model
{
    //

    public  function  technical(){
        return $this->belongsTo(User::class,'technical_id');

    }
    public  function  order(){
        return $this->belongsTo(Order::class,'order_id');

    }
}
