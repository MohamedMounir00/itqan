<?php

namespace App\Http\Controllers\Backend;

use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class CurrencyControler extends Controller
{
    //



    public function index()
    {


        return view('currency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->name['ar']==null ||$request->name['en']==null)
        {
            session()->flash('error' ,trans('backend.filds_required'));
            return back();

        }
        else
        {
            Currency::create(['name'=>serialize($request->name)]);
            Alert::success(trans('backend.created'))->persistent("Close");

            return redirect()->route('currency.index');
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

        $data = Currency::findOrFail($id);

        return view('currency.edit', compact('data'));

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
        $data = Currency::findOrFail($id);
        if ($request->name['ar']==null ||$request->name['en']==null)
        {
            session()->flash('error' ,trans('backend.filds_required'));
            return back();

        }
        else {
            $data->update(['name' => serialize($request->name)]);

            Alert::success(trans('backend.updateFash'))->persistent("Close");

            return redirect()->route('currency.index');
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
        $data = Currency::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data = Currency::all();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('currency.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
              <button class="btn btn-delete btn btn-round  btn-danger" data-remote="currency/' . $data->id . '"><i class="fa fa-remove"></i></button>
    
                ';
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

            })

            ->rawColumns(['action', 'name'])
            ->make(true);
    }



}
