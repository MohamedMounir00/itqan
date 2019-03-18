<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    //
    protected $fillable=[
        'product_id',
        'order_id',
        'status',
        'amount',
        'user_id',
        'status_admin'
        ];

    public function product(){
        return $this->belongsTo(Product::class , 'product_id')->withTrashed() ;
    }




}
