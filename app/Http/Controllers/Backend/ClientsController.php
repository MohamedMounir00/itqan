<?php

namespace App\Http\Controllers\Backend;

use App\Client;
use App\Country;
use App\Helper\Helper;
use App\Ministry;
use App\Order;
use App\TypeCompany;
use App\User;
use App\Verification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class ClientsController extends Controller
{
    //


    function __construct()
    {
        $this->middleware('permission:client-list');
        $this->middleware('permission:client-create', ['only' => ['create','store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy']]);
    }

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
    public function store(Request $request)
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
        //'new','wating','done','can_not','consultation','delay','need_parts','another_visit_works'
        $user= User::with('client')->findOrFail($id);
        $new=Order::where('status','new')->where('user_id',$id)->count();
        $wating=Order::where('status','wating')->where('user_id',$id)->count();
        $done=Order::where('status','done')->where('user_id',$id)->count();
        $can_not=Order::where('status','can_not')->where('user_id',$id)->count();
        $consultation=Order::where('status','consultation')->where('user_id',$id)->count();
        $delay=Order::where('status','delay')->where('user_id',$id)->count();
        $need_parts=Order::where('status','need_parts')->where('user_id',$id)->count();
        $another_visit_works=Order::where('status','another_visit_works')->where('user_id',$id)->count();
        $code= Verification::where('user_id',$id)->latest()->first();
        if (isset($code))
        $activation=$code->code;
        else
            $activation='';

        return View('clients.show',compact('user','new','wating','done','can_not','consultation','delay','need_parts','another_visit_works','activation'));
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
        $nationality=Country::all();
        $ministry= Ministry::all();
        $company=TypeCompany::all();
        return view('clients.edit',compact('data','nationality','ministry','company'));

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

        $data=User::findOrFail($id);
        $request->validate([

            'name'=>'required',
            'email' => 'required|email|unique:users,email,'. $data->id,
            'password' => 'nullable|min:6',
            'phone'=>'required|min:6',
            'country_id'=>'required',

        ]);


        $data->name     = $request->name;
        $data->email      = $request->email;
        $data->phone       = $request->phone;
        $data->verification       = $request->verification;
        $data->image       = Helper::UpdateImage($request,'uploads/avatars/','image',$data->image);
        $data->country_id  = $request->country_id;
        if (isset($request->password))
            $data->password = bcrypt($request->password);
        $data->save();
        $data->client->update([
            'house'         => $request->house,
            'name_of_head' => $request->name_of_head,
            'company_id'   => $request->company_id,
            'minstry_id'   => $request->minstry_id,

        ]);

       if ($data)
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('clients.index');


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
                $actions='';
                $actions .='<a href="' . route('clients.show', $data->id) . '" class=" cb btn btn-primary btn-square">'.trans('backend.details').'</a>';
                if (auth()->user()->can('client-edit'))
                    $actions .='<a href="' . route('clients.edit', $data->id) . '" class=" cb btn btn-primary btn-square"> '.trans('backend.update').'</a>';
                if (auth()->user()->can('client-delete'))
                    $actions .='<button class=" cb btn btn-delete btn-danger btn-square" data-remote="clients/' . $data->id . '"><i class="fa fa-remove"></i> '.trans('backend.delete').'</button>';
                return $actions;

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


            ->rawColumns(['action', 'country','image'])
            ->make(true);
    }
}
