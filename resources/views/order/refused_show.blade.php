@extends('layouts.app')

@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.refused_product')}}
                    </h3>
                </div>
            </div>


            <div class="kt-portlet__body">
                    @if(isset($errors) > 0)
                    @if(Session::has('errors'))
        
                        <div class="alert alert-danger " >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                            <ul >

                                @foreach ($errors->all() as $error)
                                    <li class="myError">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif

                {!! Form::open(['route'=>['get_product_view.refused_request',$id],'method'=>'DELETE','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}




                <div class="row form-group">
                    <label class="col-form-label col-sm-12 col-md-2" for="">{{trans('backend.reason')}}
                    </label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" id="first-name" name="reason" required class="form-control" placeholder="{{trans('backend.reason')}}">
                    </div>
                </div>
    
    
                <div class="form-group">
                    <div class="myBtn">
                        <button id="send" type="submit" class="btn btn-success btn-square">{{trans('backend.delete')}}</button>
    
                    </div>
                </div>
    
                {!! Form::close() !!}
            </div>
</div>




















{{-- 


    <div class="x_panel">
        <div class="x_title">
            <h3>{{trans('backend.refused_product')}}</h3>


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
    </div> --}}


@endsection


