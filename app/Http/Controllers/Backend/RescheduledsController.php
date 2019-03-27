<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Helper;
use App\Order;
use App\Rescheduled;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class RescheduledsController extends Controller
{
    //


    public function index()
    {


        return view('reschedules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Rescheduled::findOrFail($id);

            $order=Order::find($data->order_id);
            $order->technical_id=$data->technical_id;
            $order->time_id=$data->time_id;
            $order->date=$data->date;
            $order->save();
            $data->reply=1;
            $data->save();

        $name = [
            'ar' => trans('backend.reschedules_notify', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
            'en' => trans('backend.reschedules_notify', [], 'en') . unserialize($order->category->main->name)['en'] . ''
        ];
        Helper::Notifications($order->id, $order->user_id, $name, 'order', 0);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data = Rescheduled::where('reply',0)->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-delete btn btn-round  btn-success" data-remote="reschedules/' . $data->id . '">'.trans('backend.reschedules').'</button> ';
            })
            ->addColumn('order', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i>'.trans('backend.details').'</a>';
            })

            ->addColumn('status', function ($data) {
                if ($data->status=='new')
                    return  trans('api.watting_techaincall');
                elseif ($data->status=='wating')
                    return  trans('api.new_order');
                elseif ($data->status=='done')
                    return  trans('api.done_order');
                elseif ($data->status=='can_not')
                    return  trans('api.can_not');
                elseif ($data->status=='consultation')
                    return  trans('api.consultation');
                elseif ($data->status=='delay')
                    return  trans('api.delay');
                elseif ($data->status=='need_parts')
                    return  trans('api.need_parts');
                elseif ($data->status=='another_visit_works')
                    return  trans('api.another_visit_works');
            })
            ->addColumn('time', function ($data) {
                $lang= LaravelLocalization::getCurrentLocale();

                if ($data->time->timing =='am')
                  return trans('api.from',[],$lang).$data->time->from .trans('api.to',[],$lang).$data->time->to .'-'.trans('api.am',[],$lang);

                else
                  return trans('api.from',[],$lang).$data->time->from .trans('api.to',[],$lang).$data->time->to .'-'.trans('api.pm',[],$lang);

            })

            ->addColumn('technical', function ($data) {
                return'<a href="' . route('technical.show', $data->technical_id) . '">'.$data->technical->name.'</a>';
            })

            ->rawColumns(['action','time','status','order','technical'])
            ->make(true);
    }



}
