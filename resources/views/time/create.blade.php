@extends('layouts.app')

@section('content')



<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.create')}}
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

                {!! Form::open(['route'=>['time_work.store'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                            <div class="row form-group">
                                <label class="col-form-label col-sm-12 col-md-2" for="name">{{trans('backend.from')}} 
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="number" id="first-name" name="from" required class="form-control"  placeholder="{{trans('backend.from')}} ">
                                </div>
                            </div>







                            <div class="row form-group">
                                <label class="col-form-label col-sm-12 col-md-2" for="name">{{trans('backend.to')}} 
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="number" id="first-name" name="to" required class="form-control" placeholder="{{trans('backend.to')}} ">
                                </div>
                            </div>






                            <div class="row form-group">
                                <label class="col-form-label col-sm-12 col-md-2" for="name">{{trans('backend.timing')}} 
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <select  name="timing" id="heard" class="form-control" >
                                        <option value="am">{{trans('backend.am')}}</option>
                                        <option value="pm" >{{trans('backend.pm')}}</option>

                                    </select>                                  </div>
                            </div>








                            <div class="row form-group">
                                <label class="col-form-label col-sm-12 col-md-2" for="name">{{trans('backend.order_by')}}
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="number" class="form-control" name="ordering"
                                           required  placeholder="{{ trans('backend.order_by') }}" autocomplete="off" >
                                </div>
                            </div>







                                <div class="form-group">
                                    <div class="myBtn">
                                        <button id="send" type="submit" class="btn btn-success btn-square">{{trans('backend.save')}}</button>
                                        <a href="{{route('time_work.index')}}"  class="btn btn-primary btn-square">{{trans('backend.back')}}</a>

                                    </div>
                                </div>

                            {!! Form::close() !!}
            </div>
</div>



























{{-- 





    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{trans('backend.create')}}</h3>
                </div>


            </div>


            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
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

                                {!! Form::open(['route'=>['time_work.store'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.from')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="from" required class="form-control col-md-7 col-xs-12"  >
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.to')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="to" required class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.timing')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="timing" id="heard" class="form-control" >
                                        <option value="am">{{trans('backend.am')}}</option>
                                        <option value="pm" >{{trans('backend.pm')}}</option>

                                    </select>                                  </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.order_by')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" class="form-control" name="ordering"
                                           required  placeholder="{{ trans('backend.order_by') }}" autocomplete="off" >
                                </div>
                            </div>



                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-success">{{trans('backend.save')}}</button>
                                        <a href="{{route('time_work.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

                                    </div>
                                </div>

                            {!! Form::close() !!}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 --}}

@endsection

@section('scripts')



    <script>

        $('.dropify').dropify({
            tpl: {
                wrap:            '<div class="dropify-wrapper"></div>',
                loader:          '<div class="dropify-loader"></div>',
                message:         '<div class="dropify-message"><span class="file-icon" /> <p>  {{trans("backend.upload_image")}}  </p></div>',
                preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">delete</p></div></div></div>',
                filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton:     '<button type="button" class="dropify-clear">delete</button>',
                errorLine:       '<p class="dropify-error"> error</p>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });
    </script>


@endsection
