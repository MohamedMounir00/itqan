<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Country;
use App\Http\Resources\Api\CityCollection;
use App\Http\Resources\Api\CompanyCollection;
use App\Http\Resources\Api\CountryCollection;
use App\Http\Resources\Api\MintstryCollection;
use App\Ministry;
use App\TypeCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataRegisterController extends Controller
{
    //

    public function country(Request $request)
    {
       $country= Country::orderBy('ordering','asc')->get();
       return CountryCollection::collection($country);
    }

    public function city(Request $request)
    {
        $id=$request->country_id;
        $city= City::where('country_id',$id)->get();
        return CityCollection::collection($city);
    }

    public function minstry(Request $request)
    {
        $min= Ministry::all();
        return MintstryCollection::collection($min);
    }
    public function company(Request $request)
    {
        $company= TypeCompany::all();
        return CompanyCollection::collection($company);
    }

}
