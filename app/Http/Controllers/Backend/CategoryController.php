<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Currency;
use App\Helper\Helper;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;

class CategoryController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:category_order-list');
        $this->middleware('permission:category_order-create', ['only' => ['create','store']]);
        $this->middleware('permission:category_order-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category_order-delete', ['only' => ['destroy']]);
    }

    public function index()
    {


        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $main = Category::where('type', 'main')->where('id','!=',34)->get();
        $currency = Currency::all();

        return view('category.create', compact('main', 'currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response   'system_clocks','price','price_emergency'
     */
    public function store(CategoryRequest $request)
    {


                $category = new Category();
                $type = $request->sub_id;
                if ($type == 0) {
                    $category->type = 'main';
                } else {
                    $category->type = 'sub';
                    $category->sub_id = $request->sub_id;
                }
                $category->name = serialize($request->name);
                $category->price_emergency = $request->price_emergency;
                $category->price = $request->price;
                $category->system_clocks = $request->system_clocks;
                $category->currency_id = $request->currency_id;
                $category->image = Helper::UploadImge($request, 'uploads/category/', 'image');
                if ($category->save()) {
                    Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));

                    return redirect()->route('category.index');
                }

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
        $main = Category::where('type', 'main')->where('id','!=',34)->get();

        $data = Category::findOrFail($id);
        $currency = Currency::all();

        return view('category.edit', compact('data', 'main', 'currency'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        //
        $category = Category::findOrFail($id);

                $type = $request->sub_id;
                if ($type == 0) {
                    $category->type = 'main';
                } else {
                    $category->type = 'sub';
                    $category->sub_id = $request->sub_id;
                }
                $category->name = serialize($request->name);
                $category->price_emergency = $request->price_emergency;
                $category->price = $request->price;
                $category->system_clocks = $request->system_clocks;
                $category->currency_id = $request->currency_id;

                $category->image = Helper::UpdateImage($request, 'uploads/category/', 'image', $category->image);
                if ($category->save())
                    Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));

                return redirect()->route('category.index');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Category::findOrFail($id);
        if ($data->image != '') {

            if (File::exists(public_path($data->image))) { // unlink or remove previous image from folder
                unlink(public_path($data->image));
            }
        }
        $data->delete();
        if ($data)
            Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function delete($id)
    {
        $data = Category::findOrFail($id);
        if ($data->image != '') {

            if (File::exists(public_path($data->image))) { // unlink or remove previous image from folder
                unlink(public_path($data->image));
            }
        }
        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent(trans('backend.close2'));

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Category::where('type', 'main')->where('id','!=',34)->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $actions='';
                if (auth()->user()->can('category_order-edit'))
                    $actions .='  <a href="' . route('category.edit', $data->id) . '" class="btn btn-primary btn-square">'.trans('backend.update').'</a>';
                if (auth()->user()->can('category_order-delete'))
                    $actions .=' <button class="btn btn-danger btn-delete btn-square" data-remote="category/' . $data->id . '">'.trans('backend.delete').'</button>';
    
               return $actions;
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];


            })
            ->addColumn('sub', function ($data) {
                return '<a href="' . route('category.sub', $data->id) . '" class="btn btn-primary btn-square">'.trans('backend.details').'</a>';


            })->addColumn('image', function ($data) {
                $url = asset($data->image);
                return '<img src=' . $url . ' border="0" width="40" class="img-rounded" align="center" />';
            })
            ->rawColumns(['action', 'name', 'sub', 'image'])
            ->make(true);
    }

    public function AllSub($id)
    {

        return view('category.sub', compact('id'));
    }

    public function getsubDate($id)
    {
        $data = Category::where('sub_id', $id)->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $actions='';
                if (auth()->user()->can('category_order-edit'))
                $actions .=' <a href="' . route('category.edit', $data->id) . '" class="btn btn-primary btn-square">Edit</a>';
                if (auth()->user()->can('category_order-delete'))

                    $actions .=' <button class="btn btn-delete btn-danger btn-square" data-remote="category_sub_delete/' . $data->id . '">Delete</button>';
    
                return $actions;
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

            })->addColumn('image', function ($data) {
                $url = asset($data->image);
                return '<img src=' . $url . ' border="0" width="40" class="img-rounded" align="center" />';
            })
            ->addColumn('system_clocks', function ($data) {
                if ($data->system_clocks == 'yes')
                    return trans('backend.yes');
                elseif ($data->system_clocks == 'no')
                    return trans('backend.no');

            })
            ->addColumn('currency', function ($data) {
                return unserialize($data->currency->name)[LaravelLocalization::getCurrentLocale()];

            })
            ->rawColumns(['action', 'name', 'image', 'system_clocks', 'currency'])
            ->make(true);
    }


}
