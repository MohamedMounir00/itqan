@extends('layouts.app')

@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.get_settings')}}
                    </h3>
                </div>
            </div>

            <div class="kt-portlet__body">
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

                {!! Form::open(['route'=>['post_settings'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}
                <table id="table1" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">

                    @foreach($settings as $setting)
                        <tr>
                            <th>
                                <div class="col-form-label col-sm-12 col-md-3">

                            @if($setting->key=='make_decision_time')
                                    {{trans('backend.make_decision_time')}}
                                @elseif($setting->key=='how_it_work_ar')
                                        {{trans('backend.how_it_work_ar')}}
                                @elseif($setting->key=='how_it_work_en')
                                        {{trans('backend.how_it_work_en')}}
                                @elseif($setting->key=='contact_us_ar')
                                        {{trans('backend.contact_us_ar')}}
                                @elseif($setting->key=='contact_us_en')
                                        {{trans('backend.contact_us_en')}}
                                @elseif($setting->key=='conditions_ar')
                                        {{trans('backend.conditions_ar')}}
                                @elseif($setting->key=='conditions_en')
                                        {{trans('backend.conditions_en')}}
                                @endif
                                </div>
                            </th>

                            <td>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @if($setting->key=='make_decision_time')

                                <input type="number"  name="{{ $setting->key }}" value="{{ $setting->value  }}" class="form-control form-control-line" required>
                                      @else
                                        <textarea name="{{ $setting->key }}" class="form-control form-control-line" required >{{ $setting->value  }}</textarea>
                                        @endif
                                </div>
                            </td>
                        </tr>


                    @endforeach
                </table>


                    <div class="form-group">
                        <div class="myBtn">
                            <button id="send" type="submit" class="btn btn-success btn-square">{{trans('backend.update')}}</button>

                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>




















{{-- 

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>{{trans('backend.get_settings')}}</h3>

                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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

                {!! Form::open(['route'=>['post_settings'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}
                <table id="table1" class="table table-striped table-bordered bulk_action table1">

                    @foreach($settings as $setting)
                        <tr>
                            <th>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                            @if($setting->key=='make_decision_time')
                                    {{trans('backend.make_decision_time')}}
                                @elseif($setting->key=='how_it_work_ar')
                                        {{trans('backend.how_it_work_ar')}}
                                @elseif($setting->key=='how_it_work_en')
                                        {{trans('backend.how_it_work_en')}}
                                @elseif($setting->key=='contact_us_ar')
                                        {{trans('backend.contact_us_ar')}}
                                @elseif($setting->key=='contact_us_en')
                                        {{trans('backend.contact_us_en')}}
                                @elseif($setting->key=='conditions_ar')
                                        {{trans('backend.conditions_ar')}}
                                @elseif($setting->key=='conditions_en')
                                        {{trans('backend.conditions_en')}}
                                @endif
                                </div>
                            </th>
                            <td>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @if($setting->key=='make_decision_time')

                                <input type="number"  name="{{ $setting->key }}" value="{{ $setting->value  }}" class="form-control form-control-line" required>
                                      @else
                                        <textarea name="{{ $setting->key }}" class="form-control form-control-line" required >{{ $setting->value  }}</textarea>
                                        @endif
                                </div>
                            </td>
                        </tr>


                    @endforeach
                </table>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>

                        </div>
                    </div>
                </div>

                {!! Form::close() !!}

        </div>
    </div>
    
 --}}


@endsection

@section('scripts')






@endsection
