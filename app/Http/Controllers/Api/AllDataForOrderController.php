<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\CategoryProduct;
use App\Http\Resources\Api\CategoryCollection;
use App\Http\Resources\Api\CategoryProductCollection;
use App\Http\Resources\Api\DateCollection;
use App\Http\Resources\Api\ProfileCollection;
use App\Http\Resources\Api\ProudctCollection;
use App\Http\Resources\Api\TimeCollection;
use App\Product;
use App\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Date;

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
                Date::setLocale('ar');

                $dates1[] =Date::now()->addDays($i)->format(' l j F Y');

            }
               }

        for ($i = 1; $i <= 7; $i++) {

            {
                Date::setLocale('en');

                $dates2[] =Date::now()->addDays($i)->format(' l j F Y');

            }
        }
        return  response()->json(['data_ar'=>$dates1,'data_en'=>$dates2]);


          }

    public function AllCats(Request $request){
        $cat = Category::where('type','main')->get();
        return CategoryCollection::collection($cat);
    }
    public function AllSubCat(Request $request){

        $id=$request->id;
        $cat = Category::where('sub_id',$id)
          ->get();
        return CategoryCollection::collection($cat);
    }

    public function AllCatProudect()
{
    $cat= CategoryProduct::with('products')->get();
    return CategoryProductCollection::collection($cat);

}
    public function FourCatProudect()
    {
        $cat= CategoryProduct::with('products')->take(4)->get();
        return CategoryProductCollection::collection($cat);

    }
    public function AllProudect(Request $request)
    {
        $id= $request->id;
        $offset = $request->offset_id;

        $p= Product::where('category_id',$id)->skip($offset)
            ->take(10)->get();
        return ProudctCollection::collection($p);

    }

    public function serchProduct(Request $request)
    {
        $offset = $request->offset_id;
        $serch = $request->name;

        $p= Product::where('name','LIKE','%'.$serch.'%')->skip($offset)
            ->take(10)->get();
        return ProudctCollection::collection($p);

    }
}
