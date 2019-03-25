<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    //
    protected  $fillable=['user_id','order_id','reason','status'];

}
