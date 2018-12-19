<?php

namespace App\Http\Controllers\Backend;

use App\CategoryProduct;
use App\Http\Requests\Backend\ProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Project;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class ProductController extends Controller
{
    public function index()
    {


        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $main = CategoryProduct::all();

        return view('product.create',compact('main'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        if ($request->hasFile('image')) {

            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/product/'), $img_name);
            $db_name = 'uploads/product/' . $img_name;

        }
        Product::create([
            'name'=>serialize($request->name),
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'image'=>$db_name
            ]);
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('product.index');


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
        $main = CategoryProduct::all();

        $data = Product::findOrFail($id);

        return view('product.edit', compact('data','main'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($data->image != '') {

                if (File::exists(public_path($data->image))) { // unlink or remove previous image from folder
                    unlink(public_path($data->image));
                }
                $img_name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/product/'), $img_name);
                $db_name =  'uploads/product/' . $img_name;


            } else {
                $img_name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/product/'), $img_name);
                $db_name = 'uploads/product/' . $img_name;
            }
        } else
            $db_name = $data->image;
        $data->update([
            'name'=>serialize($request->name),
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'image'=>$db_name
        ]);

        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data = Product::with('category')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('product.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
              <button class="btn btn-delete btn btn-round  btn-danger" data-remote="product/' . $data->id . '"><i class="fa fa-remove"></i></button>
    
                ';
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

            })
            ->addColumn('category', function ($data) {
                return unserialize($data->category->name)[LaravelLocalization::getCurrentLocale()];

            })
            ->addColumn('image', function ($data) { $url=asset($data->image);
                return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />'; })
            ->rawColumns(['action', 'name','image','category'])
            ->make(true);
    }
}
