<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //

    protected $table = "categories_products";
   protected $fillable= ['name'];
    public function products()
    {
      return  $this->hasMany(Product::class,'category_id')->take(10);
    }
}
