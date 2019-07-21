<?php

namespace App\Http\Controllers\Backend;

use App\CategoryProduct;
use App\Http\Requests\Backend\DataRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class CategoryProductController extends Controller
{

    //
    function __construct()
    {
        $this->middleware('permission:category_product-list');
        $this->middleware('permission:category_product-create', ['only' => ['create','store']]);
        $this->middleware('permission:category_product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category_product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {


        return view('category_product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('category_product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataRequest $request)
    {

               $c= CategoryProduct::create(['name' => serialize($request->name)]);
               if ($c)
                Alert::success(trans('backend.created'))->persistent(trans('backend.close2'));

                return redirect()->route('category_product.index');

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

        $data = CategoryProduct::findOrFail($id);

        return view('category_product.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataRequest $request, $id)
    {

                $data = CategoryProduct::findOrFail($id);

                $data->update(['name' => serialize($request->name)]);

                if ($data)
                    Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));
                return redirect()->route('category_product.index');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CategoryProduct::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }




    public function getAnyDate()
    {
        $data = CategoryProduct::all();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $actions='';
                if (auth()->user()->can('category_product-edit'))
                    $actions.= '<a href="' . route('category_product.edit', $data->id) . '" class="btn btn-primary btn-square"> '.trans('backend.update').'</a>';
                if (auth()->user()->can('category_product-delete'))
                    $actions.= ' <button class="btn btn-delete btn btn-danger btn-square" data-remote="category_product/' . $data->id . '">'.trans('backend.delete').'</button>
    
                ';
              return $actions;
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

            })

            ->rawColumns(['action', 'name'])
            ->make(true);
    }








}
