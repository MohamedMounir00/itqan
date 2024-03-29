<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assian extends Model
{
    //
    protected $fillable = [
        'order_id',
        'user_id',
        'technical_id',
        'status',
        'reason_rejection'
];
    public  function  user(){
        return $this->belongsTo(User::class,'technical_id');
    }

    public  function  order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
