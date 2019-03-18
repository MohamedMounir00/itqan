<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    //
    use SoftDeletes;

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
