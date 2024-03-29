<?php

namespace App\Http\Controllers\Backend;

use App\Currency;
use App\Http\Requests\Backend\DataRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class CurrencyControler extends Controller
{
    //

    function __construct()
    {
        $this->middleware('permission:currency-list');
        $this->middleware('permission:currency-create', ['only' => ['create','store']]);
        $this->middleware('permission:currency-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:currency-delete', ['only' => ['destroy']]);
    }

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
    public function store(DataRequest $request)
    {


           $c= Currency::create(['name'=>serialize($request->name)]);
           if ($c)
            Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));

            return redirect()->route('currency.index');




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
    public function update(DataRequest $request, $id)
    {
        $data = Currency::findOrFail($id);

            $data->update(['name' => serialize($request->name)]);
         if ($data)
            Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));

            return redirect()->route('currency.index');
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
        Alert::success(trans('backend.deleteFlash'))->persistent(trans('backend.close2'));

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data = Currency::all();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $actions='';
                if (auth()->user()->can('currency-edit'))
                $actions .= '<a href="' . route('currency.edit', $data->id) . '" class=" cb btn btn-primary btn-square">'.trans('backend.update').'</a>';
                if (auth()->user()->can('currency-delete'))
                    $actions .= '<button class=" cb btn btn-delete btn btn-danger btn-square" data-remote="currency/' . $data->id . '"><i class="fa fa-remove"></i>'.trans('backend.delete').'</button>
    
                ';
                return $actions;
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

            })

            ->rawColumns(['action', 'name'])
            ->make(true);
    }



}
