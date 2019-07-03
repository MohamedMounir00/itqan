<?php

namespace App\Http\Controllers\Backend;

use App\City;
use App\Country;
use App\Http\Requests\Backend\CitiesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class CitiesController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:city-list');
        $this->middleware('permission:city-create', ['only' => ['create','store']]);
        $this->middleware('permission:city-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $cities = City::where('country_id',178)->get();
        return view('cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationality = Country::orderBy('ordering','asc')->get();

        return view('cities.create',compact('nationality'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitiesRequest $request)
    {
        $city=new City();
        $city->name_ar= $request->name_ar ;
        $city->name_en= $request->name_en ;
        $city->country_id= $request->country_id ;

        $city->save();



        //dd($medicalSuppliesDescription);


        Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));
        return redirect()->route('cities.index');
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
        $nationality = Country::orderBy('ordering','asc')->get();

        $city = City::find($id) ;
        return view('cities.edit' , compact('nationality','city' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitiesRequest $request, $id)
    {
        $c=City::find($id);

        $c->name_ar= $request->name_ar ;
        $c->name_en= $request->name_en ;
        $c->country_id= $request->country_id ;
        $c->save();






        Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c =City::find($id);
        $c->delete() ;
        session()->flash('success' , trans('backend.nationality_deleted_successfully'));

        // return to a specific view
        return redirect()->route('cities.index');
    }


}
