<?php

namespace App\Http\Controllers\Backend;

use App\Country;
use App\Http\Requests\Backend\NationalRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class CountriesController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:country-list');
        $this->middleware('permission:country-create', ['only' => ['create','store']]);
        $this->middleware('permission:country-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $nationality = Country::where('id',178)->orderBy('ordering','asc')->get();
        return view('nationality.index',compact('nationality'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nationality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NationalRequest $request)
    {
        $nationality=new Country();
        $nationality->name_ar= $request->name_ar ;
        $nationality->name_en= $request->name_en ;
        $nationality->ordering= $request->ordering ;

        $nationality->save();



        //dd($medicalSuppliesDescription);


        Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));
        return redirect()->route('nationality.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nationality = Country::find($id) ;
        return view('nationality.edit' , compact('nationality' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NationalRequest $request, $id)
    {
        $nationality=Country::find($id);

        $nationality->name_ar= $request->name_ar ;
        $nationality->name_en= $request->name_en ;
        $nationality->ordering= $request->ordering ;
        $nationality->save();






        Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));
        return redirect()->route('nationality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nationalty = country::find($id);
        $nationalty->delete() ;
        session()->flash('success' , trans('backend.nationality_deleted_successfully'));

        // return to a specific view
        return redirect()->route('nationality.index');
    }
}
