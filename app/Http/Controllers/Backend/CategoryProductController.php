<?php

namespace App\Http\Controllers\Backend;

use App\CategoryProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Alert;
class CategoryProductController extends Controller
{

    //


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
    public function store(Request $request)
    {
        if ($request->name['ar'] == null || $request->name['en'] == null) {
            session()->flash('error', trans('backend.filds_required'));
            return back();

        } else {
            if (strlen($request->name['ar']) > 40 || strlen($request->name['en']) > 40) {
                session()->flash('error', trans('backend.litter'));
                return back();
            } else {
               $c= CategoryProduct::create(['name' => serialize($request->name)]);
               if ($c)
                Alert::success(trans('backend.created'))->persistent("Close");

                return redirect()->route('category_product.index');

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
    public function update(Request $request, $id)
    {
        if ($request->name['ar'] == null || $request->name['en'] == null) {
            session()->flash('error', trans('backend.filds_required'));
            return back();

        } else {
            if (strlen($request->name['ar']) > 40 || strlen($request->name['en']) > 40) {
                session()->flash('error', trans('backend.litter'));
                return back();
            } else {
                $data = CategoryProduct::findOrFail($id);

                $data->update(['name' => serialize($request->name)]);

                if ($data)
                    Alert::success(trans('backend.updateFash'))->persistent("Close");
                return redirect()->route('category_product.index');
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
                return '<a href="' . route('category_product.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i> '.trans('backend.update').'</a>
              <button class="btn btn-delete btn btn-round  btn-danger" data-remote="category_product/' . $data->id . '"><i class="fa fa-remove"></i>'.trans('backend.delete').'</button>
    
                ';
            })
            ->addColumn('name', function ($data) {
                return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

            })

            ->rawColumns(['action', 'name'])
            ->make(true);
    }








}
