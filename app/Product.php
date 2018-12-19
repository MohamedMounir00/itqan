<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //

    use SoftDeletes;

    protected $fillable=['name','price','desc','image','category_id'];


    public  function  category(){
        return $this->belongsTo(CategoryProduct::class,'category_id')->withTrashed();

    }
}
