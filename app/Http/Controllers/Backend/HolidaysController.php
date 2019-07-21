<?php

namespace App\Http\Controllers\Backend;

use App\Holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
class HolidaysController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:holiday-list');

    }

    public function index()
    {


        return view('holidays.index');
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
    public function store()
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
    public function update($id)
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
        $data = Holiday::findOrFail($id);
        if ($data->day_number != 5) {
            if ($data->active == 1)
                $data->active = 0;
            else
                $data->active = 1;

            $data->save();

            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }

    }


    public function getAnyDate()
    {
        $data = Holiday::all();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                if ($data->active==0)
                {
                    return '
              <button class="btn btn-delete btn btn-square  btn-danger" data-remote="holidays/' . $data->id . '">'.trans('backend.dis_active').'</button>
    
                ';
                }
             else{
                 return '
              <button class="btn btn-delete btn btn-square  btn-success" data-remote="holidays/' . $data->id . '">'.trans('backend.active').'</button>
    
                ';
             }
            })
            ->addColumn('day', function ($data) {
                return unserialize($data->day)[LaravelLocalization::getCurrentLocale()];

            })

            ->rawColumns(['action', 'name'])
            ->make(true);
    }

}
