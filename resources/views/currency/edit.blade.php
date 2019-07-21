@extends('layouts.app')

@section('content')




<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.update')}}
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

                {!! Form::open(['route'=>['currency.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}


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

                            <div role="tabpanel" class="tab-pane fade  {{$loop->iteration == 2 ? 'active' : '' }} in" id="{{$properties['native']}}"
                                 aria-labelledby="profile-tab">
                                <div class="tab-pane " id="{{ $properties['native'] }}">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.name_'.$properties['name'])}}  <span
                                            >*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" name="name[{{$localeCode}}]" required class="form-control col-md-7 col-xs-12" value="{{unserialize($data->name)[$localeCode]}}">
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
                                <input type="text" id="first-name" name="name[{{$localeCode}}]" required class="form-control" value="{{unserialize($data->name)[$localeCode]}}" placeholder="{{trans('backend.name_'.$properties['name'])}}">
                            </div>
                        </div>
                    @endforeach


                <div class="form-group">
                    <div class="myBtn">
                        <button id="send" type="submit" class="btn btn-success btn-square">{{trans('backend.update')}}</button>
                        <a href="{{route('currency.index')}}"  class="btn btn-primary btn-square">{{trans('backend.back')}}</a>

                    </div>
                </div>

                {!! Form::close() !!}
            </div>
</div>
























{{-- 


                    <div class="x_panel">
                        <div class="x_title">
                            <h3>{{trans('backend.update')}}</h3>

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

                            {!! Form::open(['route'=>['currency.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}


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

                                        <div role="tabpanel" class="tab-pane fade  {{$loop->iteration == 2 ? 'active' : '' }} in" id="{{$properties['native']}}"
                                             aria-labelledby="profile-tab">
                                            <div class="tab-pane " id="{{ $properties['native'] }}">
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.name_'.$properties['name'])}}  <span
                                                        >*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="first-name" name="name[{{$localeCode}}]" required class="form-control col-md-7 col-xs-12" value="{{unserialize($data->name)[$localeCode]}}">
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    @endforeach

                                </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                                    <a href="{{route('currency.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

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
