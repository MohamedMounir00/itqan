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

        if ($request->name['ar'] == null || $request->name['en'] == null) {
            session()->flash('error', trans('backend.filds_required'));
            return back();

        } else {
            if (strlen($request->name['ar']) > 40 || strlen($request->name['en']) > 40) {
                session()->flash('error', trans('backend.litter'));
                return back();
            } else {
                Product::create([
                    'name' => serialize($request->name),
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'currency_id' => $request->currency_id,
                    'image' => Helper::UploadImge($request, 'uploads/product/', 'image'),
                ]);
                Alert::success(trans('backend.created'))->persistent("Close");

                return redirect()->route('product.index');
            }

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
        if ($request->name['ar'] == null || $request->name['en'] == null) {
            session()->flash('error', trans('backend.filds_required'));
            return back();

        } else {
            if (strlen($request->name['ar']) > 40 || strlen($request->name['en']) > 40) {
                session()->flash('error', trans('backend.litter'));
                return back();
            } else {
                $data = Product::findOrFail($id);
                $data->update([
                    'name' => serialize($request->name),
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'currency_id' => $request->currency_id,
                    'image' => Helper::UpdateImage($request, 'uploads/category/', 'image', $data->image)
                ]);

                Alert::success(trans('backend.updateFash'))->persistent("Close");

                return redirect()->route('product.index');
            }
        }
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
