<?php

namespace App\Http\Controllers\Backend;

use App\CategoryProduct;
use App\Currency;
use App\Helper\Helper;
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

    function __construct()
    {
        $this->middleware('permission:product-list');
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

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
        $currency = Currency::all();

        return view('product.create', compact('main', 'currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {


              $p=  Product::create([
                    'name' => serialize($request->name),
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'currency_id' => $request->currency_id,
                    'image' => Helper::UploadImge($request, 'uploads/product/', 'image'),
                ]);
        if ($p)
                Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));

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
        $product= Product::withTrashed()->findOrFail($id);

        return view('product.show',compact('product'));

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
        $currency = Currency::all();

        $data = Product::findOrFail($id);

        return view('product.edit', compact('data', 'main', 'currency'));

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
                $data->update([
                    'name' => serialize($request->name),
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'currency_id' => $request->currency_id,
                    'image' => Helper::UpdateImage($request, 'uploads/category/', 'image', $data->image)
                ]);
if ($data)
                Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));

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
        Alert::success(trans('backend.deleteFlash'))->persistent(trans('backend.close2'));

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Product::with('category')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $actions='';
                if (auth()->user()->can('product-edit'))
                $actions .= '<a href="' . route('product.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i>'.trans('backend.update').'</a>';
                if (auth()->user()->can('product-delete'))
                    $actions .= ' <button class="btn btn-delete btn btn-round  btn-danger" data-remote="product/' . $data->id . '"><i class="fa fa-remove"></i>'.trans('backend.delete').'</button>';
                $actions .= ' <a href="' . route('product.show', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i>'.trans('backend.details').'</a>
    
                ';
                return $actions;
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

            })
            ->addColumn('category', function ($data) {
                return unserialize($data->category->name)[LaravelLocalization::getCurrentLocale()];

            })
            ->addColumn('currency', function ($data) {
                return unserialize($data->currency->name)[LaravelLocalization::getCurrentLocale()];

            })
            ->addColumn('image', function ($data) {
                $url = asset($data->image);
                return '<img src=' . $url . ' border="0" width="40" class="img-rounded" align="center"  />';
            })
            ->rawColumns(['action', 'name', 'image', 'category', 'currency'])
            ->make(true);
    }
}
