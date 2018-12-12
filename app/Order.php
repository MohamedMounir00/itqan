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
        return $this->belongsToMany(Product::class,'cart_orders','order_id')->where('status',1)->withPivot('amount');
    }
    public function proudectnotactive()
    {
        return $this->belongsToMany(Product::class,'cart_orders','order_id')->where('status',0);
    }

    public  function  category(){
    return $this->belongsTo(Category::class,'category_id')->with('main');

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
