<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //

    protected $fillable = [
        'user_id','latitude','longitude','address','note'
    ];

}
