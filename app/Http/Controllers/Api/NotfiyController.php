<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\NotifyCollection;
use App\NotfiyOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotfiyController extends Controller
{
    //

    public function getNotifay(Request $request)
    {
        $offset = $request->offset_id;

        $notify=NotfiyOrder::with('order')
            ->where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take(10)->get();
        return NotifyCollection::collection($notify);
    }

    public function updateNotify(Request $request)
{
    $id      =       $request->id;
    $notfay  =       NotfiyOrder::findOrFail($id);
    $notfay  ->      seen=1;
    $notfay  ->      save();
    return response()->json(['data'=>'seen']);

}



    public function countNotifay(Request $request)
    {

        $notify=NotfiyOrder::
          where('user_id',auth()->user()->id)->where('seen',0)->count();

        return response()->json(['data'=>$notify]);
    }

}