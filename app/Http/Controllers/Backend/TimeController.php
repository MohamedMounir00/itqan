<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\RequestTime;
use App\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
class TimeController extends Controller
{
    public function index()
    {


        return view('time.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('time.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTime $request)
    {

        $data = Time::create([
            'from'=>$request->from,
            'to'=>$request->to,
            'timing'=>$request->timing,
            'ordering'=>$request->ordering,
        ]);
        if ($data)
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('time_work.index');
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

        $data = Time::findOrFail($id);

        return view('time.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTime $request, $id)
    {
        //
        $data = Time::findOrFail($id);
        $data->update([
            'from'=>$request->from,
            'to'=>$request->to,
            'timing'=>$request->timing,
            'ordering'=>$request->ordering,

        ]);
        if ($data)
        Alert::success(trans('backend.updateFash'))->persistent(trans('backend.close2'));

        return redirect()->route('time_work.index');
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

    public function delete($id)
    {
        //
        $data = Time::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent(trans('backend.close2'));

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Time::orderBy('ordering','asc')->where('id','!=',10)->get();

        return Datatables::of($data)

            ->addColumn('action', function ($data) {
                return '<a href="' . route('time_work.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i>'.trans('backend.update').'</a>
                <button class="btn btn-delete btn btn-round  btn-danger" data-remote="time_work/' . $data->id . '"><i class="fa fa-remove"></i>'.trans('backend.delete').'</button>

            ';
            })
            ->addColumn('timing', function ($data) {
                if ($data->timing=='am')
                return trans('api.am');
                else
                    return trans('api.pm');
            })

            ->rawColumns(['action','timing'])
            ->make(true);
    }
}
