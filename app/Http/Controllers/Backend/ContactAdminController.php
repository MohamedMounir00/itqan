<?php

namespace App\Http\Controllers\Backend;

use App\ContactAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class ContactAdminController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('permission:admin-message');

    }
    public function index()
    {


        return view('contact_admin.index');
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
    public function update(Request $request, $id)
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
        $data = ContactAdmin::findOrFail($id);
        $data->seen=1;
        $data->update();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data = ContactAdmin::orderBy('created_at', 'DESC')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                if ($data->seen==0)
                return '
              <button class="btn btn-delete btn btn-round  btn-danger" data-remote="contact_admin/' . $data->id . '"><i class="fa fa-eye"></i>'.trans('backend.unseen').'</button>
    
                ';
                else
                    return '
              <button class="btn btn-round  btn-primary" ><i class="fa fa-eye"></i>'.trans('backend.seen').'</button>
    
                ';

            })
            ->addColumn('user', function ($data) {
                if ($data->user->role=='client')
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';
                else
                    return'<a href="' . route('technical.show', $data->user_id) . '">'.$data->user->name.'</a>';

            })

            ->addColumn('email', function ($data) {
                    return $data->user->email;


            })
            ->addColumn('phone', function ($data) {

                return $data->user->phone;

            })

            ->rawColumns(['action', 'user','email','phone'])
            ->make(true);
    }

}
