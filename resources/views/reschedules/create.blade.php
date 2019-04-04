@extends('layouts.app')

@section('content')




                    <div class="x_panel">
                        <div class="x_title">
                            <h3>{{trans('backend.update_time_date')}}</h3>

                            <ul class="nav navbar-right panel_toolbox">

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

                            {!! Form::open(['route'=>['updatedataorder',$data->id],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.time_reschedules')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="time_id" id="heard" class="form-control select2"   required>
                                        @foreach($times as $t)
                                            <option value="{{$t->id}}"
                                                {{($t->id==$data->time_id)?'selected':''}}
                                                        >

                                                {{trans('backend.from').$t->from .'-'.trans('backend.to').$t->to.'-'.($t->timing=='am' ? trans('backend.am') : trans('backend.pm'))}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.date_reschedules')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="date" id="heard" class="form-control select2"   required>
                                        @foreach($dates2 as $d)
                                            <option value="{{$d}}"
                                                    {{($d==$data->date)?'selected':''}}
                                            >
                                                {{$d}}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                                    <a href="{{ route('order.show',$data->id)}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

                                </div>
                            </div>

                            {!! Form::close() !!}



                        </div>
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
