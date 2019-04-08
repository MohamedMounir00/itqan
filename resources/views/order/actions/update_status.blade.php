





@extends('layouts.app')

@section('content')
    @include('partials.messages')

    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.update_status_order')}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>



            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::open(['route'=>['order.update_status'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}




            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.update_status_order')}} <span
                    >*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <select class="  form-control  "
                            name="status"  >
                        <option value="wating" {{($order->status=='wating'?'selected':'')}} >{{trans('api.new_order')}}</option>
                        <option value="done" {{($order->status=='done'?'selected':'')}} >{{trans('api.done_order')}}</option>
                        <option value="can_not" {{($order->status=='can_not'?'selected':'')}} >{{trans('api.can_not')}}</option>
                        <option value="consultation" {{($order->status=='consultation'?'selected':'')}} >{{trans('api.consultation')}}</option>
                        <option value="delay" {{($order->status=='delay'?'selected':'')}} >{{trans('api.delay')}}</option>
                        <option value="need_parts" {{($order->status=='need_parts'?'selected':'')}} >{{trans('api.need_parts')}}</option>
                        <option value="another_visit_works" {{($order->status=='another_visit_works'?'selected':'')}} >{{trans('api.another_visit_works')}}</option>

                    </select>
                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.update_status_order_reason')}} <span
                    >*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                <textarea name="reason" class="  form-control  " required></textarea>
                </div>
            </div>
        </div>
            <br>
            <div class="clearfix"></div>
            <br>



            <br>
            <br><br>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                    <button  class="btn btn-default"><a href="{{route('order.show', $order->id)}}
                                ">{{trans('backend.back')}}</a></button>
                </div>
            </div>

            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection

