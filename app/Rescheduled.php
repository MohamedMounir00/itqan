<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rescheduled extends Model
{
    //
    protected  $fillable=['technical_id','order_id','reason','date','time_id','reply','status'];

    public  function  time(){
        return $this->belongsTo(Time::class,'time_id');

    }
    public  function  technical(){
        return $this->belongsTo(User::class,'technical_id');

    }
}
