<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{
    //
    use SoftDeletes;

    protected $table = "categories_products";
   protected $fillable= ['name'];
    public function products()
    {
      return  $this->hasMany(Product::class,'category_id')->take(10);
    }
}
