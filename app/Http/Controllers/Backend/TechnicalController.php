<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\City;
use App\Country;
use App\Helper\Helper;
use App\Http\Requests\Backend\TechnicalRequest;
use App\Http\Requests\Backend\TechnicalUpdateRequest;
use App\Order;
use App\Technical;
use App\Time;
use App\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class TechnicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('technical.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $main = Category::where('type', 'main')->get();

        $time=Time::where('id','!=',10)->get();
        $nationality=Country::where('id',178)->orderBy('ordering','asc')->get();
        $cities = City::where('country_id',178)->get();

        return view('technical.create',compact('time','nationality','main','cities'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnicalRequest $request)
    {

        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'country_id'  => $request->country_id,
            'city_id'  => $request->city_id,

            'image'       => Helper::UploadImge($request,'uploads/avatars/','image'),
            'password'    => bcrypt($request->password),
            'role' =>'technical'
        ]);
       Technical::create([
            'user_id'          => $user->id,
            'type'             => 'technical',
            'identification'   => $request->identification,
            'category_id'      => $request->category_id,
            'role'      => $request->experiences,
        ]);
        $user->time()->sync($request->time_id);
         if ($user)
        Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));

        return redirect()->route('technical.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user= User::with('technical')->findOrFail($id);
        $wating=Order::where('status','wating')->where('technical_id',$id)->count();
        $done=Order::where('status','done')->where('technical_id',$id)->count();
        $can_not=Order::where('status','can_not')->where('technical_id',$id)->count();
        $consultation=Order::where('status','consultation')->where('technical_id',$id)->count();
        $delay=Order::where('status','delay')->where('technical_id',$id)->count();
        $need_parts=Order::where('status','need_parts')->where('technical_id',$id)->count();
        $another_visit_works=Order::where('status','another_visit_works')->where('technical_id',$id)->count();
        //
        return view('technical.show',compact('user','wating','done','can_not','consultation','delay','need_parts','another_visit_works'));
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
        $time=Time::where('id','!=',10)->get();
        $nationality=Country::where('id',178)->orderBy('ordering','asc')->get();
        $cities = City::where('country_id',178)->get();        $main = Category::where('type', 'main')->get();

        return view('technical.edit',compact('data','time','nationality','main','cities'));

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
            'identification'=>'required|min:10|not_in:0',
            'category_id'=>'required',

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
        $data->technical->update([
            'identification'   => $request->identification,
            'category_id'      => $request->category_id,
            'role'      => $request->experiences,

        ]);

        $data->time()->sync($request->time_id);
        if ($data)
        Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));

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
        $data2 = Technical::where('user_id',$id)->first();

        $data->delete();
        $data2->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent(trans('backend.close2'));

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data =  User::whereHas('technical', function ($q) {
            $q->where('type', 'technical');
        })->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('technical.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i> '.trans('backend.details').'</a>
                <a href="' . route('technical.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i>'.trans('backend.update').'</a>
               <button class="btn btn-delete btn btn-round  btn-danger" data-remote="technical/' . $data->id . '"><i class="fa fa-remove"></i>'.trans('backend.delete').'</button>
    
                ';
            })
            ->addColumn('image', function ($data) { $url=asset($data->image);
            if ($data->image=='')
                return '<img src="https://www.mycustomer.com/sites/all/modules/custom/sm_pp_user_profile/img/default-user.png" border="0" width="40" class="img-rounded" align="center" />';

            else
                return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';

            })
            ->addColumn('category', function ($data) {
                return unserialize($data->technical->category->name)[LaravelLocalization::getCurrentLocale()];

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
