<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //

    use SoftDeletes;

    protected $fillable=['name','price','desc','image','category_id','currency_id'];


    public  function  category(){
        return $this->belongsTo(CategoryProduct::class,'category_id')->withTrashed();

    }


    public  function  currency(){
        return $this->belongsTo(Currency::class,'currency_id')->withTrashed();

    }
}
