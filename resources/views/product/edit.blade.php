@extends('layouts.app')

@section('content')




                    <div class="x_panel">
                        <div class="x_title">
                            <h3>{{trans('backend.update_product')}}</h3>

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

                            {!! Form::open(['route'=>['product.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}


                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs right" role="tablist">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <li role="presentation" class=""><a href="#{{ $properties['native'] }}" role="tab" id="profile-tab"
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
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.name_'.$properties['name'])}} <span
                                                        >*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="first-name" name="name[{{$localeCode}}]"  maxlength="25" required class="form-control col-md-7 col-xs-12" value="{{unserialize($data->name)[$localeCode]}}">
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    @endforeach

                                </div>

                                <div class="clearfix"></div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.price')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="first-name" name="price" required class="form-control col-md-7 col-xs-12" value="{{$data->price}}">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.categories')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  name="category_id" id="heard" class="form-control" >
                                            @foreach($main as $m)
                                                <option value="{{$m->id}}"{{($data->category_id == $m->id) ? 'selected' : ''}}>{{unserialize($m->name)[LaravelLocalization::getCurrentLocale()]}}</option>
                                            @endforeach
                                        </select>                                </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.currency')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  name="currency_id" id="heard" class="form-control" >
                                            @foreach($currency as $c)
                                                <option value="{{$c->id}}"{{($data->currency_id == $c->id) ? 'selected' : ''}}>{{unserialize($c->name)[LaravelLocalization::getCurrentLocale()]}}</option>
                                            @endforeach
                                        </select>                                </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.upload_image')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" class="form-control col-md-7 col-xs-12 dropify"
                                               name="image"
                                                type="file">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.image')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="image view view-first">
                                            @if(isset($data->image))

                                            <img controls style="width: 300px; display: block;"src="{{url($data->image)}}">
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                                    <a href="{{route('product.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

                                </div>
                            </div>

                            {!! Form::close() !!}



                        </div>
                    </div>


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
