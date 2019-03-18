@extends('layouts.app')

@section('content')




                    <div class="x_panel">
                        <div class="x_title">
                            <h3>{{trans('backend.update')}}</h3>

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

                            {!! Form::open(['route'=>['clients.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true,'autocomplete'=>'off']) !!}

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.user_name')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="name" required class="form-control col-md-7 col-xs-12" value="{{$data->name}}">

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.email')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="first-name" name="email" required class="form-control col-md-7 col-xs-12" value="{{$data->email}}" autocomplete="new_email">

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.password')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="first-name" name="password"  class="form-control col-md-7 col-xs-12" autocomplete="new_password">

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.phone')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="phone" required class="form-control col-md-7 col-xs-12" value="{{$data->phone}}" >

                                </div>
                            </div>

                            @if($data->client->type=='personal')

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.type_hose')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="house" id="heard" class="form-control"  required>
                                  <option value="flat" {{($data->client->house=='flat')?'selected':''}}>{{trans('backend.flat')}}</option>
                                  <option value="villa" {{($data->client->house=='villa')?'selected':''}}>{{trans('backend.villa')}}</option>
                                  <option value="palace" {{($data->client->house=='palace')?'selected':''}}>{{trans('backend.palace')}}</option>
                                    </select>
                                </div>
                            </div>
                       @endif
                            @if($data->client->type=='government')

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.minstry_of')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="minstry_id" id="heard" class="form-control"  required>
                                        @foreach($ministry as $data1)
                                            <option value="{{$data1->id}}" {{($data->client->minstry_id==$data1->id)?'selected':''}}>{{unserialize($data1->name)[ LaravelLocalization::getCurrentLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                                @if($data->client->type=='company')

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.company_of')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="company_id" id="heard" class="form-control"  required>
                                        @foreach($company as $data2)
                                            <option value="{{$data2->id}}" {{($data->client->company_id==$data2->id)?'selected':''}}>{{unserialize($data2->name)[ LaravelLocalization::getCurrentLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.nationality')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control m-bot15" name="country_id" required>

                                        @foreach($nationality as $c)
                                            @if(app()->getLocale()=='ar')
                                                <option value="{{$c->id}}" {{($data->country_id==$c->id)?'selected':''}}>{{$c->name_ar}}</option>
                                            @else
                                                <option value="{{$c->id}}" {{($data->country_id==$c->id)?'selected':''}}>{{$c->name_en}}</option>
                                            @endif>
                                        @endforeach


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
                                                type="file">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.image')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="image view view-first">
                                            @if($data->image !='')

                                            <img controls style="width: 300px; display: block;"src="{{url($data->image)}}">
                                                @else
                                                <img controls style="width: 300px; display: block;"src="https://www.mycustomer.com/sites/all/modules/custom/sm_pp_user_profile/img/default-user.png">

                                            @endif

                                        </div>

                                    </div>
                                </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                                    <a href="{{route('clients.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

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
