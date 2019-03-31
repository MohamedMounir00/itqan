<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationBackent extends Model
{
    //

    protected $fillable=['order_id','user_id','message','seen'];
}
