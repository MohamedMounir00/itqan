<?php

    namespace App\Http\Controllers\Backend;

    use App\Category;
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
            $main = Category::where('type', 'main')->get();

            return view('category.create', compact('main'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(CategoryRequest $request)
        {


            if ($request->hasFile('image')) {

                $img_name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/category/'), $img_name);
                $db_name = 'uploads/category/' . $img_name;

            }


            $category = new Category();
            $type = $request->sub_id;
            if ($type == 0) {
                $category->type = 'main';
            } else {
                $category->type = 'sub';
                $category->sub_id = $request->sub_id;
            }
            $category->name = serialize($request->name);
            $category->image = $db_name;
            if ($category->save()) {
                Alert::success(trans('backend.created'))->persistent("Close");

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
            $main = Category::where('type', 'main')->get();

            $data = Category::findOrFail($id);

            return view('category.edit', compact('data', 'main'));

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

            if ($request->hasFile('image')) {
                if ($category->image != '') {

                    if (File::exists(public_path($category->image))) { // unlink or remove previous image from folder
                        unlink(public_path($category->image));
                    }
                    $img_name = time() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move(public_path('uploads/category/'), $img_name);
                    $db_name = 'avatars/' . $img_name;


                } else {
                    $img_name = time() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move(public_path('uploads/category/'), $img_name);
                    $db_name = 'uploads/category/' . $img_name;
                }
            } else
                $db_name = $category->image;

            $type = $request->sub_id;
            if ($type == 0) {
                $category->type = 'main';
            } else {
                $category->type = 'sub';
                $category->sub_id = $request->sub_id;
            }
            $category->name = serialize($request->name);
            $category->image = $db_name;
            if ($category->save())
                Alert::success(trans('backend.updateFash'))->persistent("Close");

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
            Alert::success(trans('backend.deleteFlash'))->persistent("Close");

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
            Alert::success(trans('backend.deleteFlash'))->persistent("Close");

            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }


        public function getAnyDate()
        {
            $data = Category::where('type', 'main')->get();

            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('category.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
              <button class="btn btn-delete btn btn-round  btn-danger" data-remote="category/' . $data->id . '"><i class="fa fa-remove"></i></button>
    
                ';
                })
                ->addColumn('name', function ($data) {
                    return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];


                })
                ->addColumn('sub', function ($data) {
                    return '<a href="' . route('category.sub', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-eye"></i></a>';


                })->addColumn('image', function ($data) { $url=asset($data->image);
                    return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />'; })
                ->rawColumns(['action', 'name', 'sub','image'])
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
                    return '<a href="' . route('category.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
              <button class="btn btn-delete btn btn-round  btn-danger" data-remote="category_sub_delete/' . $data->id . '"><i class="fa fa-remove"></i></button>
    
                ';
                })
                ->addColumn('name', function ($data) {
                    return unserialize($data->name)[LaravelLocalization::getCurrentLocale()];

                })->addColumn('image', function ($data) { $url=asset($data->image);
                    return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />'; })
                ->rawColumns(['action', 'name','image'])
                ->make(true);
        }


    }
