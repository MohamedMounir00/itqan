<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatProduct extends Model
{
    //
    public function products()
    {
      return  $this->hasMany(Product::class,'cat_id')->take(10);
    }
}
