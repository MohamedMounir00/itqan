@extends('layouts.app')

@section('content')




    <div class="x_panel">
        <div class="x_title">
            <h3>{{trans('backend.add_techanel')}}</h3>


            <div class="clearfix"></div>
        </div>

        @if(isset($errors) > 0)
            @if(Session::has('errors'))

                <div class="alert alert-danger " >
                    <ul >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif

        <div class="x_content">

            {!! Form::open(['route'=>['get_product_view.refused_request',$id],'method'=>'DELETE','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}




            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.reason')}}<span
                    >*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="reason" required class="form-control col-md-7 col-xs-12">
                </div>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.delete')}}</button>

                </div>
            </div>

            {!! Form::close() !!}



        </div>
    </div>


@endsection


