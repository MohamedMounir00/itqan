<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\CatProduct;
use App\Http\Resources\Api\CategoryCollection;
use App\Http\Resources\Api\DateCollection;
use App\Http\Resources\Api\ProfileCollection;
use App\Http\Resources\Api\ProudctCollection;
use App\Http\Resources\Api\TimeCollection;
use App\Producet;
use App\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllDataForOrderController extends Controller
{
    //
    public function timesOrder(Request $request){
     $times = Time::all();


          return TimeCollection::collection($times);
    }
    public function dateOrder(Request $request){
        for ($i = 1; $i <= 7; $i++) {

            {
                Date::setLocale($request->lang);

                $dates[] =Date::now()->addDays($i)->format(' l j F Y');

            }
               }
        return  response()->json(['data'=>$dates]);


          }

    public function AllCats(Request $request){
        $cat = Category::where('type','main')->get();
        return CategoryCollection::collection($cat);
    }
    public function AllSubCat(Request $request){
        $id=$request->id;
        $cat = Category::where('sub_id',$id)->get();
        return CategoryCollection::collection($cat);
    }

    public function AllCatProudect()
    {
        $cat= CatProduct::all();
        return CategoryCollection::collection($cat);

    }
    public function AllProudect(Request $request)
    {
        $id= $request->id;

        $p= Producet::where('cat_id',$id)->get();
        return ProudctCollection::collection($p);

    }
}
