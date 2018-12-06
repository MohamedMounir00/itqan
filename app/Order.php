<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //



    public function storge()
    {
        return $this->belongsToMany(Storge::class,'files','order_id');
    }

    public function proudect()
    {
        return $this->belongsToMany(Producet::class,'cart_o_f_orders','order_id');
    }

    public  function  cat(){
    return $this->belongsTo(Category::class,'cat_id')->with('main');

           }

    public  function  address(){
        return $this->belongsTo(Address::class,'address_id');

    }

    public  function  time(){
        return $this->belongsTo(Time::class,'time_id');

    }
    public  function  user(){
        return $this->belongsTo(User::class,'user_id');

    }
    public  function  technical(){
        return $this->belongsTo(User::class,'technical_id');

    }
}
