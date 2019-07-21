@extends('layouts.app')

@section('content')



<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.category_order_create')}}
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


                {!! Form::open(['route'=>['category.store'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}


                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                {{-- <ul id="myTab" class="nav nav-tabs bar_tabs right" role="tablist">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <li role="presentation" class="{{$loop->iteration === 2 ? 'active' : '' }}"><a href="#{{ $properties['native'] }}" role="tab" id="profile-tab"
                                                                            data-toggle="tab" aria-expanded="false">{{trans('backend.'.$properties['name'])}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div id="myTabContent" class="tab-content">

                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <div role="tabpanel" class="tab-pane fade   {{$loop->iteration == 2 ? 'active' : '' }} in" id="{{$properties['native']}}"
                                             aria-labelledby="profile-tab">
                                            <div class="tab-pane " id="{{ $properties['native'] }}">
                                                <div class="row form-group">
                                                    <label class="col-form-label col-sm-12 col-md-2" for="name">{{trans('backend.name_'.$properties['name'])}} <span
                                                        >*</span>
                                                    </label>
                                                    <div class="col-sm-12 col-md-10">
                                                        <input type="text" id="first-name" name="name[{{$localeCode}}]" required class="form-control " maxlength="25">
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    @endforeach

                                </div> --}}


                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="row form-group">
                                        <label class="col-form-label col-sm-12 col-md-2" for="name">{{trans('backend.name_'.$properties['name'])}}
                                        </label>
                                        <div class="col-sm-12 col-md-10">
                                            <input type="text" id="first-name" name="name[{{$localeCode}}]" required class="form-control " maxlength="25" placeholder="{{trans('backend.name_'.$properties['name'])}}">
                                        </div>
                                    </div>
                                @endforeach


                                <div class="row form-group">
                                    <label class="col-form-label col-sm-12 col-md-2" for="name">{{trans('backend.price')}} 
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" id="first-name" name="price" required class="form-control" value="{{old('price')}}" maxlength="10" placeholder="{{trans('backend.price')}} ">
                                    </div>
                                </div>





                                <div class="row form-group">
                                    <label class="col-form-label col-sm-12 col-md-2" for="name">{{trans('backend.price_emergency')}} 
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" id="first-name" name="price_emergency" required class="form-control" value="{{old('price_emergency')}}" placeholder="{{trans('backend.price_emergency')}} ">
                                    </div>
                                </div>






                                <div class="row form-group">
                                    <label class="col-form-label col-sm-12 col-md-2" for="">{{trans('backend.currency')}} 
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        <select  name="currency_id" id="heard" class="form-control" >
                                            <option value=""> {{trans('backend.chosse_currency')}}</option>
                                            @foreach($currency as $c)
                                                <option value="{{$c->id}}">{{unserialize($c->name)[ LaravelLocalization::getCurrentLocale()]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>






                                <div class="row form-group">
                                    <label class="col-form-label col-sm-12 col-md-2" for="">{{trans('backend.categories')}} 
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        <select  name="sub_id" id="heard" class="form-control" >
                                            <option value="0">{{trans('backend.main_cat')}}</option>
                                            @foreach($main as $data)
                                                <option value="{{$data->id}}">{{unserialize($data->name)[ LaravelLocalization::getCurrentLocale()]}}</option>
                                            @endforeach
                                        </select>                                </div>
                                </div>








                                <div class="row form-group">
                                    <label class="col-form-label col-sm-12 col-md-2" for="">{{trans('backend.system_clocks')}} 
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        <select  name="system_clocks" id="heard" class="form-control" >
                                                <option value="yes">{{trans('backend.yes')}}</option>
                                                <option value="no">{{trans('backend.no')}}</option>
                                        </select>
                                    </div>
                                </div>







                                <div class="row form-group">
                                    <label class="col-form-label col-sm-12 col-md-2" for="">{{trans('backend.upload_image')}}
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        <input id="" class="form-control col-md-7 col-xs-12 dropify"
                                               name="image"
                                               required="required" type="file">
                                    </div>
                                </div>






                                <div class="form-group">
                                    <div class="myBtn">
                                        <button id="send" type="submit" class="btn btn-success btn-square">{{trans('backend.save')}}</button>
                                        <a href="{{route('category.index')}}"  class="btn btn-primary btn-square">{{trans('backend.back')}}</a>

                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}
            </div>
</div>





























{{-- 


            <div class="clearfix"></div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>{{trans('backend.category_order_create')}}</h3>

                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">

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

                            {!! Form::open(['route'=>['category.store'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}


                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs right" role="tablist">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <li role="presentation" class="{{$loop->iteration === 2 ? 'active' : '' }}"><a href="#{{ $properties['native'] }}" role="tab" id="profile-tab"
                                                                            data-toggle="tab" aria-expanded="false">{{trans('backend.'.$properties['name'])}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div id="myTabContent" class="tab-content">

                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <div role="tabpanel" class="tab-pane fade   {{$loop->iteration == 2 ? 'active' : '' }} in" id="{{$properties['native']}}"
                                             aria-labelledby="profile-tab">
                                            <div class="tab-pane " id="{{ $properties['native'] }}">
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.name_'.$properties['name'])}} <span
                                                        >*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="first-name" name="name[{{$localeCode}}]" required class="form-control col-md-7 col-xs-12" maxlength="25">
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                                <div class="clearfix"></div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.price')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="price" required class="form-control col-md-7 col-xs-12" value="{{old('price')}}" maxlength="10">
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.price_emergency')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="price_emergency" required class="form-control col-md-7 col-xs-12" value="{{old('price_emergency')}}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.currency')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  name="currency_id" id="heard" class="form-control" >
                                            <option value=""> {{trans('backend.chosse_currency')}}</option>
                                            @foreach($currency as $c)
                                                <option value="{{$c->id}}">{{unserialize($c->name)[ LaravelLocalization::getCurrentLocale()]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.categories')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  name="sub_id" id="heard" class="form-control" >
                                            <option value="0">{{trans('backend.main_cat')}}</option>
                                            @foreach($main as $data)
                                                <option value="{{$data->id}}">{{unserialize($data->name)[ LaravelLocalization::getCurrentLocale()]}}</option>
                                            @endforeach
                                        </select>                                </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.system_clocks')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  name="system_clocks" id="heard" class="form-control" >
                                                <option value="yes">{{trans('backend.yes')}}</option>
                                                <option value="no">{{trans('backend.no')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.upload_image')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" class="form-control col-md-7 col-xs-12 dropify"
                                               name="image"
                                               required="required" type="file">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-success">{{trans('backend.save')}}</button>
                                        <a href="{{route('category.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div> --}}


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
