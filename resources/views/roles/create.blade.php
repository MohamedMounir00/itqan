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
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="{{ route('roles.index') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                {{trans('backend.back')}}
                            </a>
                        </div>
                    </div>
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

                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row form-group">
                            <strong class="col-form-label col-sm-12 col-md-2">{{trans('backend.name')}}:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control required col-sm-12 col-md-10')) !!}
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <strong class="col-form-label col-sm-12 col-md-2">{{trans('backend.permission')}}:</strong>
                        <br><br><br>
                        <div class="row form-group">
                           
                            @foreach($permission as $value)
                                {{-- <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ trans('backend.'.$value->name) }}
                                </label> --}}

                                <label class="col-sm-12 col-md-6 col-lg-2 col-form-label"> {{ trans('backend.'.$value->name) }}</label>
                                        <div class="col-sm-12 col-md-6 col-lg-2">
                                            <span class="kt-switch">
                                                <label>
                                                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>


                            @endforeach

                        </div>
                    </div>





{{-- 
                    <div class="kt-portlet">
                           
                            <div class="kt-portlet__body">

                                <!--begin::Form-->
                                <form class="kt-form">
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Default Switch</label>
                                        <div class="col-3">
                                            <span class="kt-switch">
                                                <label>
                                                    <input type="checkbox" checked="checked" name="">
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                        <label class="col-3 col-form-label">With Icon</label>
                                        <div class="col-3">
                                            <span class="kt-switch kt-switch--icon">
                                                <label>
                                                    <input type="checkbox" checked="checked" name="">
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                               
                                </form>

                                <!--end::Form-->
                            </div>
                        </div> --}}







                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="myBtn">
                                <button type="submit" class="btn btn-primary btn-square">{{trans('backend.create')}}</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
</div>



























{{-- 


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>{{trans('backend.create')}}</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{trans('backend.back')}}</a>
            </div>
        </div>
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

    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{trans('backend.name')}}:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{trans('backend.permission')}}:</strong>
                <br/>
                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ trans('backend.'.$value->name) }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{trans('backend.create')}}</button>
        </div>
    </div>
    {!! Form::close() !!} --}}


@endsection