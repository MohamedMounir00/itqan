<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rescheduled extends Model
{
    //
    protected  $fillable=['user_id','order_id','reason','date','time_id','reply'];


}