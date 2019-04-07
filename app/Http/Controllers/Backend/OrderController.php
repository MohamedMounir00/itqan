<?php

namespace App\Http\Controllers\Backend;

use App\Assian;
use App\CartOrder;
use App\CategoryProduct;
use App\CouponRel;
use App\Helper\Helper;
use App\Http\Controllers\Controller;

use App\Http\Resources\Api\ProudctCollection;
use App\Mail\Bill;
use App\Mail\SendNotifyMail;
use App\NotfiyOrder;
use App\Order;
use App\Product;
use App\Promotional_code;
use App\Technical;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Yajra\Datatables\Datatables;
use Alert;
use DB;
class OrderController extends Controller
{

    public function index()
    {


        return view('order.index');
    }

//'consultation','delay','need_parts','another_visit_works'
    public function get_order_view()
    {


        return view('order.assigen');
    }

    public function get_consultation_view()
    {


        return view('order.consultation');
    }

    public function get_delay_view()
    {


        return view('order.delay');
    }

    public function get_need_parts_view()
    {


        return view('order.need_parts');
    }

    public function get_another_visit_works_view()
    {


        return view('order.another_visit_works');
    }
    public function get_finish_view()
    {


        return view('order.finish');
    }

    ////////////////////////////////////////actions//////////////////
    public function get_status_view($id)
    {

        $actions = Assian::where('order_id', $id)->get();

        return view('order.actions.actions',compact('actions'));
    }
    ////////////////////////////////////////actions//////////////////
    public function get_store_view($id)
    {

        $category = CategoryProduct::all();

        return view('order.actions.add_product',compact('category','id'));
    }
    ////////////////////////////// update sratus
    public function update_status_view($id)
    {
        $order = Order::findOrFail($id);

        return view('order.actions.update_status',compact('order'));
    }

    ////////////////////////////// update sratus post
    public function update_status(Request $request)
    {

        $order = Order::findOrFail($request->order_id);
        if ($order->status =='done'||$order->status =='can_not')
            Alert::success(trans('backend.cant_not'))->persistent("Close");
else {
    $order->status = $request->status;
    $order->save();
    $name = [
        'ar' => trans('api.status_uodated', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
        'en' => trans('api.status_uodated', [], 'ar') . unserialize($order->category->main->name)['en'] . ''
    ];
    Helper::Notifications($order->id, $order->user_id, $name, 'order', 0);
    Alert::success(trans('backend.updateFash'))->persistent("Close");

    return back();
}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $status = NotfiyOrder::where('order_id', $id)->get();
        $order = Order::with('storge', 'proudect', 'category', 'address', 'time', 'user', 'technical')->findOrFail($id);
        $code_rel = CouponRel::where('order_id', $id)->first();
        if ($order->working_hours==0)
            $order_hores=1;
        else
            $order_hores=$order->working_hours;
        if ($order->express==1)
        {
            $price_cat1=($order->category->price_emergency * $order_hores);
            $price_cat=$price_cat1;
        }

        else
        {
            $price_cat1=($order->category->price* $order_hores);
            $price_cat=$price_cat1;

        }

        if (isset($code_rel))
        {
            $coupon = Promotional_code::where('id', $code_rel->code_id)->first();

            if ($coupon->type=='currency')
            {
                $price_cat=($price_cat1-$coupon->price);
            }
            else{
                $price_cat=(($price_cat1)-($price_cat1*$coupon->price/100));

            }
        }


          if ($order->proudect->count()!=0)
        {


        foreach ($order->proudect as $p)
         {
          $p2['nn']=($p->pivot->amount * $p->price);

          $povit[]=$p2;

        }
         $price_product=array_sum(array_map(
            function($povit) {
                return $povit['nn'];
            }, $povit)
         );


        $total_price= ($price_product+$price_cat);

        }
        else{
    $total_price= $price_cat;

        }

       // dd($total_price);
        return view('order.show', compact('order', 'status','total_price'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        // assigen junior

        $data = Order::findOrFail($id);

    $users=Technical::where('active',1)->where('role','junior')->select(DB::raw('*, ( 6367 * acos( cos( radians(' . $data->address->latitude . ') ) 
     * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $data->address->longitude . ') )
     + sin( radians(' . $data->address->latitude . ') ) *
     sin( radians( latitude ) ) ) ) AS distance'))
    ->orderBy('distance', 'asc')->with('user')->get();
        return view('order.edit', compact('data', 'users'));

    }

    public function assigen_senior($id)
    {
        // assigen senior

        $data = Order::findOrFail($id);

        $users=Technical::where('active',1)->where('role','senior')->select(DB::raw('*, ( 6367 * acos( cos( radians(' . $data->address->latitude . ') ) 
     * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $data->address->longitude . ') )
     + sin( radians(' . $data->address->latitude . ') ) *
     sin( radians( latitude ) ) ) ) AS distance'))
            ->orderBy('distance', 'asc')->with('user')->get();
        return view('order.senior', compact('data', 'users'));

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
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

////////////  get  all order
    public function getAnyDate()
    {
        $data = Order::orderByDesc('id')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i>'.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';

            })
            ->addColumn('status', function ($data) {
                if ($data->status=='new')
                    return  trans('api.watting_techaincall');
                elseif ($data->status=='wating')
                   return  trans('api.new_order');
                elseif ($data->status=='done')
                    return  trans('api.done_order');
                elseif ($data->status=='can_not')
                    return  trans('api.can_not');
                elseif ($data->status=='consultation')
                    return  trans('api.consultation');
                elseif ($data->status=='delay')
                    return  trans('api.delay');
                elseif ($data->status=='need_parts')
                    return  trans('api.need_parts');
                elseif ($data->status=='another_visit_works')
                    return  trans('api.another_visit_works');
            })
            ->rawColumns(['action', 'client'])
            ->make(true);
    }

    // Order Requests require consulting
    public function get_consultation()
    {
        $data = Order::with('category')->where('status', 'consultation')->orderBy('updated_at', 'DESC')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i>'.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';
            })
            ->rawColumns(['action', 'client'])
            ->make(true);
    }

    ///////////////////////// Order Requests are deferred to the clients wishes
    public function get_delay()
    {
        $data = Order::with('category')->where('status', 'delay')->orderBy('updated_at', 'DESC')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i> '.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return $data->user->name;
            })
            ->rawColumns(['action', 'client'])
            ->make(true);
    }

////////////////////////Order Requests for spare parts
    public function get_need_parts()
    {
        $data = Order::with('category')->where('status', 'need_parts')->orderBy('updated_at', 'DESC')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i> '.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';
            })
            ->rawColumns(['action', 'client'])
            ->make(true);
    }

/////////////////////////////Order request for another visit
    public function get_another_visit_works()
    {
        $data = Order::with('category')->where('status', 'another_visit_works')->orderBy('updated_at', 'DESC')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i> '.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';
            })
            ->rawColumns(['action', 'client'])
            ->make(true);
    }


    /////////////////////////////Order request for finish
    public function get_finish()
    {
        $status=[ 'done', 'can_not'];
        $data = Order::with('category')->whereIn('status',$status)->orderBy('updated_at', 'DESC')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i> '.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';
            })
            ->addColumn('status', function ($data) {
                      if ($data->status=='done')
                    return  trans('api.done_order');
                elseif ($data->status=='can_not')
                    return  trans('api.can_not');

            })
            ->rawColumns(['action', 'client','status'])
            ->make(true);
    }

//////////////////////// Technical appointment

    public function assien(Request $request)
    {
        $id = $request->order_id;
        $data = Order::with('category')->findOrFail($id);
        if ($data->time_id==10)
        {
            Alert::success(trans('backend.select_date_time'))->persistent(trans('backend.close2'));
            return back();
        }
    $assien = Assian::where('order_id', $id)->where('status', 'watting')->count();
    if ($assien==0) {

        $assin = Assian::create([
            'order_id' => $id,
            'user_id' => $data->user_id,
            'technical_id' => $request->technical_id,
            'status' => 'watting',
        ]);
        $data->reply = 'yes';
        $data->save();
        $technical = User::findOrFail($request->technical_id);
        $name = [
            'ar' => 'تم تعيين ' . $technical->name . " " . trans('api.repairing', [], 'ar') . unserialize($data->category->main->name)['ar'] ,
           // 'ar' => ' للعمل على طلبك ' . ' ' . trans('api.repairing', [], 'ar') . unserialize($data->category->main->name)['ar'] . ' ' . $technical->name . ' تم تعين  ',
            'en' => $technical->name . ' ' . ' assign technical ' . trans('api.repairing', [], 'en') . unserialize($data->category->main->name)['en'],

        ];
        Helper::Notifications($assin->order_id, $assin->user_id, $name, 'order', 0);

        Alert::success(trans('backend.assigen_techinal_sccusse'))->persistent(trans('backend.close2'));
        return redirect()->route('order.show', $id);

    }
    else
    {
        Alert::success(trans('backend.assigen_technical_alredy'))->persistent(trans('backend.close2'));
        return redirect()->route('order.show', $id);
    }

    }


/////////////////////////// new Order
    public function getAnyAssien()
    {
        $data = Order::where('technical_id', null)->orderByDesc('updated_at')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-plus-square"></i>'.trans('backend.add').'</a>';
            })
            ->addColumn('reply', function ($data) {
                if ($data->reply == 'yes')
                    return trans('backend.reply_yes');
                else
                    return trans('backend.reply_no');
            })
            ->addColumn('created_at', function ($data) {
                $language = LaravelLocalization::getCurrentLocale();
                $time=Helper::make_decision()->value;
                Carbon::setLocale($language);
                if ($data->created_at > Carbon::now()->subMinutes($time)|| $data->reply == 'yes')
                    return '<span class="btn btn-default">' . Carbon::parse("$data->created_at")->diffForHumans() . '</span>';

                else
                return '<span class="btn btn-danger">' . Carbon::parse("$data->created_at")->diffForHumans() . '</span>';

            })
            ->addColumn('details', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i> '.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';
            })
            ->rawColumns(['action', 'details', 'reply', 'created_at', 'client'])
            ->make(true);
    }

    ////////////////////////////////get product for order By category id
    public function product(Request $request)
    {
        $language = LaravelLocalization::getCurrentLocale();
        $request->lang = $language;
        $id = $request->category_id;

        if ($request->has('category_id')) {
            $value = Product::where('category_id', $id)->get();     // return $city;
            // return $city;
            return ProudctCollection::collection($value);

        } else
            return response()->json(['status' => 'fail', 'please enter current category']);
    }


    public function add_product(Request $request)
    {
        $id = $request->order_id;
        // $user  = User::findOrFail(auth()->user()->id);
        $order = Order::findOrFail($id);

        if ($order->status == 'done' || $order->status == 'done') {
            Alert::success(trans('backend.can_not_add_product'))->persistent(trans('backend.close2'));
            return back();
        }
        else {
            foreach ($request->product_id as $key => $value) {
                CartOrder::create([
                    'product_id' => $value,
                    'order_id' => $order->id,
                    'status' => 0,
                    'status_admin' => 1,
                    'user_id' => auth()->user()->id,

                    'amount' => 1,

                ]);
            }
            $name = [
                'ar' => trans('api.admin_add_prodect', [], 'ar') . unserialize($order->category->main->name)['ar'] . '',
                'en' => trans('api.admin_add_prodect', [], 'en') . unserialize($order->category->main->name)['en'] . ''
            ];
            Helper::Notifications($order->id, $order->user_id, $name, 'product', 0);
            Alert::success(trans('backend.product_done'))->persistent("Close");
            return back();
        }
    }


    ////////////////////////////////////////get   the products from the technician for approval//////////////////
    public function get_product_fromTechinel_view($id)
    {

       // $cart = CartOrder::with('product')->where('order_id',$id)->where('status',0)->where('status_admin',0)->get();

        return view('order.actions.get_product',compact('id'));
    }

    public function getAnyProduct($id)
    {

        $data =  CartOrder::with('product')->where('order_id',$id)->where('status',0)->where('status_admin',0)->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '
              <button class="btn btn-delete btn btn-round  btn-danger" data-remote="refused_request/' . $data->id . '"><i class="fa fa-remove"></i></button>
               <button class="btn btn-agree btn btn-round  btn-success"  data-remote="accpet_request/' . $data->id . '"><i class="fa fa-remove"></i></button>
    
               ';
            })
            ->addColumn('name', function ($data) {
                return'<a href="' . route('product.show', $data->product->id) . '">'.unserialize($data->product->name)[LaravelLocalization::getCurrentLocale()].'</a>';
            })
            ->addColumn('price', function ($data) {
                return$data->product->price;
            })
            ->addColumn('currency', function ($data) {
                return unserialize($data->product->currency->name)[LaravelLocalization::getCurrentLocale()];


            })

            ->rawColumns(['action', 'name','price'])
            ->make(true);
    }

    public function refused_request($id)
    {
        $data = CartOrder::findOrFail($id);

        $data->delete();
        //Alert::success(trans('backend.refusedFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
    public function accpet_request($id)
    {
        $data = CartOrder::findOrFail($id);
        $order = Order::findOrFail($data->order_id);

        $data->status_admin=true;
        $data->save();
    //    Alert::success(trans('backend.accpetdFlash'))->persistent("Close");
                $name = [
                    'ar' =>  trans('api.tech_add_prodect',[],'ar'). unserialize($order->category->main->name)['ar'] . '',
                    'en' => trans('api.tech_add_prodect',[],'en') . unserialize($order->category->main->name)['en'] . ''
                ];
                Helper::Notifications($order->id, $order->user_id, $name, 'product', 0);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }



   // ////////////////////////////////////الضمان

    public function get_warranty_view()
    {


        return view('order.warranty');
    }


    public function get_warranty()
    {
        $data = Order::with('category')->where('warranty', 1)->orderBy('updated_at', 'DESC');

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i> '.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';
            })
            ->rawColumns(['action', 'client'])
            ->make(true);
    }

///////////////////////////// bill

    public function bill($id)
    {
        $order=Order::with('proudect')->find($id);
         $discount=0;
        $price_product=0;
        $code_rel = CouponRel::where('order_id', $id)->first();

        if ($order->express==1)
        {
            $price_cat1=($order->category->price_emergency * $order->working_hours);
            $price_cat=$price_cat1;
        }

        else
        {
            $price_cat1=($order->category->price* $order->working_hours);
            $price_cat=$price_cat1;

        }

        if (isset($code_rel))
        {
            $coupon = Promotional_code::where('id', $code_rel->code_id)->first();

            if ($coupon->type=='currency')
            {
                $discount= $coupon->price.'ريال';
                $price_cat=($price_cat1-$coupon->price);
            }
            else{
                $price_cat=(($price_cat1)-($price_cat1*$coupon->price/100));
                $discount= $coupon->price.'%';

            }
        }

        if ($order->status=='done'||$order->status=='can_not')
        {
            if ($order->proudect->count()!=0)
            {


                foreach ($order->proudect as $p)
                {
                    $p2['nn']=($p->pivot->amount * $p->price);

                    $povit[]=$p2;

                }
                $price_product=array_sum(array_map(
                        function($povit) {
                            return $povit['nn'];
                        }, $povit)
                );

                $total_price= ($price_product+$price_cat);

            }
            else{
                $total_price= $price_cat;

            }
    }
      $pdf = PDF::loadView('bill',compact('order','total_price','discount','price_cat1','price_product'));

        $pdf->save(public_path('uploads/receipt/receipt').$order->id.'.pdf');
        $url='uploads/receipt/receipt'.$order->id.'.pdf';
        $email=$order->user->email;
        $name=$order->user->name;


       Helper::mail($email,new Bill($url,$name));


        return $pdf->stream('receipt'.$order->id.'.pdf');
      //return view('bill',compact('order','total_price','discount','price_cat1','price_product'));
    }


    public function ordderByIdStatus($id,$status)
    {


        return view('order.order_user',compact('id','status'));
    }

    public function getorderForeUsere($id,$status)
    {
        $data = Order::where('user_id',$id)->where('status',$status)->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('order.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i>'.trans('backend.details').'</a>';
            })
            ->addColumn('client', function ($data) {
                return'<a href="' . route('clients.show', $data->user_id) . '">'.$data->user->name.'</a>';

            })
            ->addColumn('status', function ($data) {
                if ($data->status=='new')
                    return  trans('api.watting_techaincall');
                elseif ($data->status=='wating')
                    return  trans('api.new_order');
                elseif ($data->status=='done')
                    return  trans('api.done_order');
                elseif ($data->status=='can_not')
                    return  trans('api.can_not');
                elseif ($data->status=='consultation')
                    return  trans('api.consultation');
                elseif ($data->status=='delay')
                    return  trans('api.delay');
                elseif ($data->status=='need_parts')
                    return  trans('api.need_parts');
                elseif ($data->status=='another_visit_works')
                    return  trans('api.another_visit_works');
            })
            ->rawColumns(['action', 'client'])
            ->make(true);
    }

}