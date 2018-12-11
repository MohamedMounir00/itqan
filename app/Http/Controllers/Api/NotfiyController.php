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
        $notify=NotfiyOrder::with('order')
            ->where('user_id',auth()->user()->id)->where('seen',0)->orderBy('created_at', 'desc')
            ->get();
        return NotifyCollection::collection($notify);
    }
}
