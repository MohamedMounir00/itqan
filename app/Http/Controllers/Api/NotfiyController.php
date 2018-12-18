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
    $seen    =       $request->seen;
    $notfay  =       NotfiyOrder::findOrFail($id);
    $notfay  ->      seen=$seen;
    $notfay  ->      save();

}

}