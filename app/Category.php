<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //


    public  function  main(){
        return $this->belongsTo(Category::class,'sub_id');

    }
}
