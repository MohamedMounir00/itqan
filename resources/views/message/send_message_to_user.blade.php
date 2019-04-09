


@extends('layouts.app')

@section('content')

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
            {!! Form::open(['route'=>['send_message_user',$id],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}




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

    </div>


@endsection