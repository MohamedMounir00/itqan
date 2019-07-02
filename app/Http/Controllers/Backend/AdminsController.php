<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\City;
use App\Country;
use App\Helper\Helper;
use App\Http\Requests\Backend\CreateAdminRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Alert;
use DB;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admins.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();

        $nationality=Country::where('id',178)->orderBy('ordering','asc')->get();
        $cities = City::where('country_id',178)->get();

        return view('admins.create',compact('nationality','cities','roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $request)
    {

        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'country_id'  => $request->country_id,
            'city_id'  => $request->city_id,

            'image'       => Helper::UploadImge($request,'uploads/avatars/','image'),
            'password'    => bcrypt($request->password),
            'role' =>'admin'
        ]);
        Admin::create([
            'user_id'          => $user->id,
            'type'             => 'admin',

        ]);

        $user->assignRole($request->input('roles'));


        if ($user)
            Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));

        return redirect()->route('admins.index');
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
        //
        $roles = Role::all();

        $data =User::findOrFail($id);
        $nationality=Country::where('id',178)->orderBy('ordering','asc')->get();
        $cities = City::where('country_id',178)->get();

        return view('admins.edit',compact('data','nationality','cities','roles'));

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
            'phone'=>'required|min:9',
            'country_id'=>'required',
            'city_id'=>'required',

        ]);


        // $data->update([
        $data->name     = $request->name;
        $data->email      = $request->email;
        $data->phone       = $request->phone;
        $data->image       = Helper::UpdateImage($request,'uploads/avatars/','image',$data->image);
        $data->country_id  = $request->country_id;
        $data->city_id  = $request->city_id;
        if (isset($request->password))
            $data->password = bcrypt($request->password);      //  ]);
        $data->save();

      //  if (!$data->hasRole('admin')) {
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $data->assignRole($request->input('roles'));
      //  }
        if ($data)
            Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));

        return redirect()->route('admins.index');


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
        $data2 = Admin::where('user_id',$id)->first();

        $data->delete();
        $data2->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent(trans('backend.close2'));

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data =  User::whereHas('admins', function ($q) {
            $q->where('type', 'admin');
        })->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '
                <a href="' . route('admins.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i>'.trans('backend.update').'</a>
               <button class="btn btn-delete btn btn-round  btn-danger" data-remote="technical/' . $data->id . '"><i class="fa fa-remove"></i>'.trans('backend.delete').'</button>
    
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





            ->rawColumns(['action', 'name','image','category', 'country'])
            ->make(true);
    }
}
