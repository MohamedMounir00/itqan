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
        if ($request->details['ar'] == null || $request->details['en'] == null) {
            session()->flash('error', trans('backend.filds_required'));
            return back();

        }
        else{   Promotional_code::create([
              'details'    => serialize($request->details),
              'price'      =>$request->price,
              'type'       =>$request->type,
              'code'       =>$request->code,
              'expires_at' =>$request->expires_at,
              'uses'       =>$request->uses,
        ]);
                Alert::success(trans('backend.created'))->persistent("Close");

                return redirect()->route('coupons.index');

            }
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
        if ($request->details['ar'] == null || $request->details['en'] == null) {
            session()->flash('error', trans('backend.filds_required'));
            return back();

        } else {

                $data = Promotional_code::findOrFail($id);

                $data->update([

                    'details'    => serialize($request->details),
                    'price'      =>$request->price,
                    'type'       =>$request->type,
                    'code'       =>$request->code,
                    'expires_at' =>$request->expires_at,
                    'uses'       =>$request->uses,


                ]);

                Alert::success(trans('backend.updateFash'))->persistent("Close");

                return redirect()->route('coupons.index');
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
        $data = Promotional_code::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Promotional_code::all();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('coupons.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
              <button class="btn btn-delete btn btn-round  btn-danger" data-remote="coupons/' . $data->id . '"><i class="fa fa-remove"></i></button>
    
                ';
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }


}
