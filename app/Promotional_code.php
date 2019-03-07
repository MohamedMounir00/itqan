<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotional_code extends Model
{

    protected  $fillable=[
        'price'  ,'type','details','code','expires_at','uses'
    ];
}



