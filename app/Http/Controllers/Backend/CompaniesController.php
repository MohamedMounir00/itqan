<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CompaniesRequest;
use App\TypeCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:company-list');
        $this->middleware('permission:company-create', ['only' => ['create','store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }
    public function index()
    {


        return view('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request)
    {

        $c= TypeCompany::create(['name' => serialize($request->name)]);
        if ($c)
            Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));

        return redirect()->route('companies.index');

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

        $data = TypeCompany::findOrFail($id);

        return view('companies.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesRequest $request, $id)
    {

        $data = TypeCompany::findOrFail($id);

        $data->update(['name' => serialize($request->name)]);

        if ($data)
            Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));
        return redirect()->route('companies.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TypeCompany::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent(trans('backend.close2'));

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data = TypeCompany::all();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $actions='';
                if (auth()->user()->can('company-edit'))
                    $actions .= '<a href="' . route('companies.edit', $data->id) . '" class="btn btn-round  btn-primary btn-square"> '.trans('backend.update').'</a>';
                if (auth()->user()->can('company-delete'))
                    $actions .= ' <button class="btn btn-delete btn btn-square  btn-danger" data-remote="companies/' . $data->id . '">'.trans('backend.delete').'</button>
    
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
