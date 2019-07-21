@extends('layouts.app')


@section('content')



<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            Show Role
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
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="col-form-label col-sm-12 col-md-2">الأسم :</strong>
                                <span style="font-size: 15px;">{{ $role->name }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong class="col-form-label col-sm-12 col-md-2">الصلاحيات :</strong>
                                <br><br><br>
                            <div class="row form-group">
                                
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        {{-- <label class="label label-success"> {{ trans('backend.'.$v->name) }}</label> --}}


                                        <label class="col-sm-12 col-md-6 col-lg-2 col-form-label"> {{ trans('backend.'.$v->name) }}</label>
                                        <div class="col-sm-12 col-md-6 col-lg-2">
                                            <span class="kt-switch">
                                                <label>
                                                        {{ Form::checkbox('permission[]', $v->id, true, array('class' => 'kt-checkbox','disabled')) }}
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>

                                    @endforeach
                                @endif
                            </div>
                        </div>
            </div>
</div>


















{{-- 

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{trans('backend.back')}}</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success"> {{ trans('backend.'.$v->name) }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div> --}}
@endsection