<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'name','main','sub_id','image'
    ];


    public  function  main(){
        return $this->belongsTo(Category::class,'sub_id')->withTrashed();

    }
}
