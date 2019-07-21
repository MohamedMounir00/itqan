


@extends('layouts.app')

@section('content')



<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.send_message')}}
                    </h3>
                </div>
            </div>


            <div class="kt-portlet__body">
                    {!! Form::open(['route'=>['send_message'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}

                    <div class="row form-group">
                        <label class="col-form-label col-sm-12 col-md-2">{{trans('backend.send_to')}}</label>
                        <div class="col-sm-12 col-md-10">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="type" value="1" data-parsley-multiple="gender" data-parsley-id="12"> &nbsp; الفنيين &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="type" value="0" data-parsley-multiple="gender"> العملاء
                                </label>
                            </div>
                        </div>
                    </div>
        
        
                    <div class="row form-group">
                        <label class="col-form-label col-sm-12 col-md-2">{{trans('backend.title_message')}}</label>
                        <div class="col-sm-12 col-md-10">
                         <input type="text" class="form-control" name="title" placeholder="{{trans('backend.title_message')}}">
                        </div>
                    </div>
        


                    <div class="row form-group">
                        <label class="col-form-label col-sm-12 col-md-2">{{trans('backend.body')}}</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="body" class="form-control" placeholder="{{trans('backend.body')}}"></textarea>
                        </div>
                    </div>



        
                    <div class="form-group">
                        <div class="myBtn">
                            <button id="send" type="submit" class="btn btn-success btn-square">{{trans('backend.send')}}</button>
        
                        </div>
                    </div>
        
                {!! Form::close() !!}
            </div>
</div>






























{{-- 

    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.send_message')}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>



                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::open(['route'=>['send_message'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('backend.send_to')}}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="gender" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="type" value="1" data-parsley-multiple="gender" data-parsley-id="12"> &nbsp; الفنيين &nbsp;
                        </label>
                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="type" value="0" data-parsley-multiple="gender"> العملاء
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('backend.title_message')}}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="text" class="form-control" name="title">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('backend.body')}}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="body" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.send')}}</button>

                </div>
            </div>

        {!! Form::close() !!}
        </div>

    </div> --}}


@endsection
