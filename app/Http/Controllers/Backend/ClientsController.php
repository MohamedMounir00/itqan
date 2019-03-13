<?php

namespace App\Http\Controllers\Backend;

use App\Client;
use App\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class ClientsController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('clients.index');

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnicalRequest $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user= User::with('client')->findOrFail($id);
        return View('clients.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data =User::findOrFail($id);
        $time=Time::all();
        $nationality=Country::all();
        $main = Category::where('type', 'main')->get();

        return view('technical.edit',compact('data','time','nationality','main'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=User::findOrFail($id);
        $request->validate([
            //   'decs'=>'required',

            'name'=>'required',
            'email' => 'required|email|unique:users,email,'. $data->id,
            'password' => 'nullable|min:6',
            'phone'=>'required|min:6',
            'country_id'=>'required',
            'identification'=>'required|min:15|not_in:0',
            'category_id'=>'required',

        ]);


        $data->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'image'       => Helper::UpdateImage($request,'uploads/avatars/','image',$data->image),
            'country_id'  => $request->country_id,
            'password'    => bcrypt($request->password),
        ]);
        $data->technical->update([
            'house'         => $request->house,
            'identification'   => $request->identification,
            'category_id'      => $request->category_id,
        ]);

        $data->time()->sync($request->time_id);

        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('technical.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data2 = Client::where('user_id',$id)->first();

        $data->delete();
        $data2->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data =  User::whereHas('client', function ($q) {
            $type=['personal', 'government', 'company'];
            $q->whereIn('type', $type);
        })->get();;

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('clients.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
               <button class="btn btn-delete btn btn-round  btn-danger" data-remote="clients/' . $data->id . '"><i class="fa fa-remove"></i></button>
    
                ';
            })
            ->addColumn('image', function ($data) { $url=asset($data->image);
                if ($data->image=='')
                    return '<img src="https://www.mycustomer.com/sites/all/modules/custom/sm_pp_user_profile/img/default-user.png" border="0" width="40" class="img-rounded" align="center" />';

                else
                    return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';

            })
            ->addColumn('country', function ($data) {
                if (LaravelLocalization::getCurrentLocale()=='ar')
                return $data->country->name_ar;
                else
                    return $data->country->name_en;


            })

            ->addColumn('city', function ($data) {
                if (LaravelLocalization::getCurrentLocale()=='ar')
                    return $data->city->name_ar;
                else
                    return $data->city->name_en;


            })
            ->rawColumns(['action', 'country','image','city'])
            ->make(true);
    }
}
