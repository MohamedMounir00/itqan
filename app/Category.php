<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'name','main','sub_id','image','system_clocks','price','price_emergency'
    ];


    public  function  main(){
        return $this->belongsTo(Category::class,'sub_id')->withTrashed();

    }


    public  function  currency(){
        return $this->belongsTo(Currency::class,'currency_id')->withTrashed();

    }
}
