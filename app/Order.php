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
        return $this->belongsToMany(Product::class,'cart_orders','order_id')->where('status',1)->where('status_admin',1)->where('warranty',0)->withPivot('amount','id')->withTrashed();
    }

    public function proudectnotactive()
    {
        return $this->belongsToMany(Product::class,'cart_orders','order_id')->where('status',0)->where('status_admin',1)->where('warranty',0)->withPivot('amount','id')->withTrashed();
    }
    public function proudect_wating_admin()
    {
        return $this->belongsToMany(Product::class,'cart_orders','order_id')->where('status',0)->where('status_admin',0)->where('warranty',0)->withPivot('amount','id')->withTrashed();
    }

    public  function  category(){
    return $this->belongsTo(Category::class,'category_id')->with('main')->withTrashed();

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
    public  function  assiens(){
        return $this->hasMany(Assian::class,'order_id');

    }
}
