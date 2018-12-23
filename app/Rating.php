<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable = ['order_id','user_id','technical_id',
        'rating_stars','rating_time','rating_clean_workspace',
        'rating_skill_repairs','rating_explain_problem','comment'
    ];

    public  function  user(){
        return $this->belongsTo(User::class,'user_id');

    }
}
