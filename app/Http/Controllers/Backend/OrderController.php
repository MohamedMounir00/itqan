<?php

namespace App\Http\Controllers\Backend;
use App\Assian;
use App\Helper\Helper;
use App\Http\Controllers\Controller;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Alert;
class OrderController extends Controller
{

    public function index()
    {
        return view('project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $data = Order::findOrFail($id);
         $users= User::whereHas('technical', function ($q){
             $q->where('type', 'technical');
         })->get();
        return view('project.edit', compact('data','users'));

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
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function getAnyDate()
    {
        $data = Order::where('technical_id',null)->orderByDesc('created_at')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('project.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>';
            })
           ->addColumn('delete', function ($data) {
                return '<button class="btn btn-delete btn btn-round  btn-danger" data-remote="project/' . $data->id . '"><i class="fa fa-remove"></i></button>';
            })
            ->rawColumns(['action', 'delete'])
            ->make(true);
    }

    public function  assien(Request $request)
    {
        $id=$request->order_id;
        $data = Order::findOrFail($id);
$assien = Assian::where('order_id',$id)->where('status','watting')->count();
if (!$assien >0)
{
        $assin=Assian::create([
            'order_id'=>$id,
            'user_id'=> $data->user_id,
            'technical_id'=> $request->technical_id,
            'status'=> 'watting',
        ]);
        $name =[
            'ar'=>'تم تعين  فنى لطلبك',
            'en'=>'assien techamnal',

        ];
        Helper::Notifications($assin->order_id,$assin->user_id,$name,'order',0);

        Alert::success('تم تعين الفنى لهذا الطلب')->persistent("Close");
        return redirect()->route('project.index');
}
else{
    Alert::success('هذا الطلب قد رشح له فنى من قبل')->persistent("Close");
    return redirect()->route('project.index');
}
    }
}
