<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable,SoftDeletes;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'phone', 'name_of_head', 'house',
        'type', 'image', 'address',
        'bio', 'minstry_id', 'company_id',
        'country_id', 'city_id','role','verification'
    ];

    /**
     * 'minstry','company','country','city'
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function company()
    {
        return $this->belongsTo(TypeCompany::class);
    }
    public function minstry()
    {
        return $this->belongsTo(Ministry::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Producet::class,'carts','user_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class ,'user_id');
    }

    public function technical()
    {
        return $this->hasOne(Technical::class ,'user_id');
    }
    public function time(){
        return $this->belongsToMany(Time::class,'time_rels','user_id','time_id');
    }
    public function admins()
    {
        return $this->hasOne(Admin::class ,'user_id');
    }


    public  function  check(){
        return $this->hasMany(Order::class,'technical_id');

    }
}
