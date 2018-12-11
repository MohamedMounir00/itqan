<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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
        'country_id', 'city_id'
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
}
