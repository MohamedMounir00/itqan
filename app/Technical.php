<?php

namespace App;

use App\Http\Controllers\Backend\CategoryProductController;
use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    protected  $fillable=[
        'user_id'  ,'type','identification','category_id','latitude','longitude'
    ];

       public  function category()
          {
    return $this->belongsTo(Category::class,'category_id');
            }
    public  function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
