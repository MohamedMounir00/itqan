<?php

namespace App\Http\Controllers\Backend;

use App\Promotional_code;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('coupons.index');
    }


    public function coupons($id)
    {


        return view('coupons.index',compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('coupons.create');
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

        $data = Promotional_code::findOrFail($id);

        return view('coupons.edit', compact('data'));

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

                $data = Promotional_code::findOrFail($id);

                $data->update([

                    'price'      =>$request->price,
                    'type'       =>$request->type,



                ]);

                Alert::success(trans('backend.updateFash'))->persistent("Close");

                return redirect()->route('coupons',$data->order_id);
            }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Promotional_code::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate($id)
    {
        $data = Promotional_code::where('order_id',$id)->get();
         $lang=LaravelLocalization::getCurrentLocale();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('coupons.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
             ';
            })
         //   'warranty', 'coupon'
            ->addColumn('type_status', function ($data) {
                if ($data->type_status=='warranty')
                    return trans('backend.warranty_order') ;
                else
                    return trans('backend.coupon') ;

            })
            //'percentage', 'currency
            ->addColumn('type', function ($data) {
                if ($data->type=='percentage')
                return trans('backend.percentage') ;
                else
                    return trans('backend.currency') ;

            })
            ->rawColumns(['action', 'name','type'])
            ->make(true);
    }


}
