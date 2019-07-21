<?php

namespace App\Http\Controllers\Backend;

use App\NotificationBackent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
use DB;
class NotificationsController extends Controller
{
    //

    public function index()
    {


        return view('notifications.notify');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataRequest $request)
    {


    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataRequest $request, $id)
    {


    }

    public function seen(Request $request)
    {

        if($request->ajax())
        {

       $notify=  NotificationBackent::find($request->id);
       $notify->seen=1;
       $notify->save();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = NotificationBackent::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent(trans('backend.close2'));

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data = NotificationBackent::orderBy('created_at','DESC');

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '
              <button class="btn btn-delete btn btn-square  btn-danger" data-remote="notifications/' . $data->id . '">'.trans('backend.delete').'</button>
              
    
                ';
            })
            ->addColumn('message', function ($data) {
                return '<a   href="' . route('order.show', $data->order_id) . '">'.unserialize($data->message)[LaravelLocalization::getCurrentLocale()].'</a>';


            })
            ->addColumn('created_at', function ($data) {
                $language = LaravelLocalization::getCurrentLocale();

                Carbon::setLocale($language);
                    return  Carbon::parse($data->created_at)->diffForHumans();



            })

            ->rawColumns(['action', 'message'])
            ->make(true);
    }


}
