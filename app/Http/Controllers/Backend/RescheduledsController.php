<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Helper;
use App\Holiday;
use App\Order;
use App\Rescheduled;
use App\Technical;
use App\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
use DB;
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

    public function show_reschedules($id)
    {
        //

        return view('reschedules.index2',compact('id'));

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
        $data = Rescheduled::findOrFail($id);
        $holidays_arr = Holiday::where('active',0)->get()->pluck('day_number')->toArray();

        $times = Time::all();


        for ($i = 0; $i <= (7 + sizeof($holidays_arr)); $i++) {

            {
                Date::setLocale('en');

                $date = Date::now()->addDays($i);

                if(!in_array($date->format('N'), $holidays_arr))
                    $dates2[] = $date->format('d-m-Y');

            }

            $order = Order::findOrFail($data->order_id);

            $users=Technical::select(DB::raw('*, ( 6367 * acos( cos( radians(' . $order->address->latitude . ') ) 
     * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $order->address->longitude . ') )
     + sin( radians(' . $order->address->latitude . ') ) *
     sin( radians( latitude ) ) ) ) AS distance'))
                ->orderBy('distance', 'asc')->with('user')->get();
        }

        return view('reschedules.edit',compact('data','dates2','times','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Rescheduled::findOrFail($id);
        $order=Order::find($data->order_id);

        $data->update([
            'technical_id'=>$request->technical_id,
            'date'=>$request->date,
            'time_id'=>$request->time_id,

        ]);
        $name = [
            'ar' => trans('backend.reschedules_notify_update', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
            'en' => trans('backend.reschedules_notify_update', [], 'en') . unserialize($order->category->main->name)['en'] . ''
        ];
        Helper::Notifications($order->id, $order->user_id, $name, 'reschedule', 0);
        if ($data)
            Alert::success(trans('backend.updateFash_reschedules'))->persistent("Close");

        return redirect()->route('order.show',$order->id);
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
        Helper::Notifications($order->id, $order->user_id, $name, 'reschedule', 0);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function editDataOrder($id)
    {
        //
        $data = Order::findOrFail($id);
        $holidays_arr = Holiday::where('active',0)->get()->pluck('day_number')->toArray();

        $times = Time::all();


        for ($i = 0; $i <= (7 + sizeof($holidays_arr)); $i++) {

            {
                Date::setLocale('en');

                $date = Date::now()->addDays($i);

                if(!in_array($date->format('N'), $holidays_arr))
                    $dates2[] = $date->format('d-m-Y');

            }


            $users=Technical::select(DB::raw('*, ( 6367 * acos( cos( radians(' . $data->address->latitude . ') ) 
     * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $data->address->longitude . ') )
     + sin( radians(' . $data->address->latitude . ') ) *
     sin( radians( latitude ) ) ) ) AS distance'))
                ->orderBy('distance', 'asc')->with('user')->get();
        }

        return view('reschedules.create',compact('data','dates2','times','users'));

    }

    public function updateDataOrder(Request $request, $id)
    {
        $order=Order::find($id);
        $count=Rescheduled::where('order_id',$id)->where('reply',0)->count();
        if ($count==0) {
            $data = Rescheduled::create([
                'technical_id' => $request->technical_id,
                'date' => $request->date,
                'time_id' => $request->time_id,
                'order_id' => $order->id,
                'status' => $order->status


            ]);
            $name = [
                'ar' => trans('backend.date_notify_update', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                'en' => trans('backend.date_notify_update', [], 'en') . unserialize($order->category->main->name)['en'] . ''
            ];
            Helper::Notifications($order->id, $order->user_id, $name, 'reschedule', 0);
            if ($data)
                Alert::success(trans('backend.updateFash_reschedules'))->persistent("Close");

            return redirect()->route('order.show',$id);
        }else {
            Alert::success(trans('backend.wattingreplay_client'))->persistent("Close");

            return redirect()->route('order.show',$id);
        }
    }
    public function destroy_order($id)
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
        Helper::Notifications($order->id, $order->user_id, $name, 'reschedule', 0);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Rescheduled::where('reply',0)->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('reschedules.edit', $data->id) . '" class="btn btn-round  btn-primary">'.trans('backend.update').'</a>
                        <button class="btn btn-delete btn btn-round  btn-success" data-remote="reschedules/' . $data->id . '">'.trans('backend.reschedules').'</button> ';
            })
            ->addColumn('order', function ($data) {
                return '<a href="' . route('order.show', $data->order_id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i>'.trans('backend.details').'</a>';
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
                if ($data->technical_id!=null)
                return'<a href="' . route('technical.show', $data->technical_id) . '">'.$data->technical->name.'</a>';
                else
                    return trans('backend.no_technical');
            })

            ->rawColumns(['action','time','status','order','technical'])
            ->make(true);
    }


    public function get_reschedules_order($id)
    {
        $data = Rescheduled::where('order_id',$id)->get();

        return Datatables::of($data)

            ->addColumn('action', function ($data) {
                if ($data->reply==0)
                {
                    return '<a href="' . route('reschedules.edit', $data->id) . '" class="btn btn-round  btn-primary">'.trans('backend.update').'</a>
                <button class="btn btn-delete btn btn-round  btn-success" data-remote="destroy_order/' . $data->id . '">'.trans('backend.reschedules').'</button> ';
                }
                else
                    return trans('backend.reply_yes');

            })
            ->addColumn('order', function ($data) {
                return '<a href="' . route('order.show', $data->order_id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i>'.trans('backend.details').'</a>';
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
                if ($data->technical_id!=null)

                    return'<a href="' . route('technical.show', $data->technical_id) . '">'.$data->technical->name.'</a>';
                else
                    return trans('backend.no_technical');
            })

            ->rawColumns(['action','time','status','order','technical'])
            ->make(true);
    }




}
