<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected  $fillable=[
      'user_id'  ,'type','minstry_id','company_id','house','name_of_head'
    ];



    public function company()
    {
        return $this->belongsTo(TypeCompany::class);
    }
    public function minstry()
    {
        return $this->belongsTo(Ministry::class);
    }

}
