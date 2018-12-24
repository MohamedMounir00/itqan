<?php

namespace App\Http\Controllers\Api;

use App\Helper\Helper;
use App\Http\Requests\Api\RatingRequest;
use App\Http\Resources\Api\StatusCollection;
use App\Order;
use App\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    //
    public function addRating(RatingRequest $request)
    {
        $lang= $request->lang;
        $order_id= $request->order_id;
        $order = Order::findOrFail($order_id);
        $rating=Rating::where('order_id',$order_id)->count();
        if (!$rating >0)
        {
   if ($order->status =='done'||$order->status =='can_not')
   {
        Rating::create([
            'order_id'                 =>$order_id,
            'user_id'                  =>auth()->user()->id,
            'technical_id'             =>$order->technical_id,
           // 'rating_stars'             =>$request->rating_stars,
            'rating_time'              =>$request->rating_time,
            'rating_clean_workspace'   =>$request->rating_clean_workspace,
            'rating_skill_repairs'     =>$request->rating_skill_repairs,
            'rating_explain_problem'   =>$request->rating_explain_problem,
            'comment'                  =>$request->comment
        ]);
        $name =[
            'ar'=> trans('api.add_rating_noty',[],'ar').unserialize($order->category->main->name)['ar'].'',
            'en'=>trans('api.add_rating_noty',[],'en').unserialize($order->category->main->name)['en'].''
        ];
        Helper::Notifications($order_id,$order->technical_id,$name,'rating',0);

        return new StatusCollection(true, trans('api.add_rating',[],$lang));
   }
   else
       return new StatusCollection(false, trans('api.order_not_done',[],$lang));

    }
    else
        return new StatusCollection(false, trans('api.any_more',[],$lang));


    }
}
