
@extends('layouts.app')

@section('content')
    @include('partials.messages')


    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{trans('backend.store')}}
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body">
            {!! Form::open(['route'=>['add_product'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}




            <div class="row form-group">
                <label class="col-form-label col-sm-12 col-md-2" for="">{{trans('backend.categoriesOfProduct')}} 
                </label>
                <div class="col-sm-12 col-md-10">
                    <input type="hidden" name="order_id" value="{{$id}}">
                    <select class="  form-control  " data-live-search="true" data-placeholder="Select a State"
                            name="category_id"  required data-region-id="one" id="cat">
                        <option value="" >{{trans('backend.chosse_category_product')}}</option>
                        @foreach($category as $data)
                            <option value="{{$data->id}}">{{unserialize($data->name)[ LaravelLocalization::getCurrentLocale()]}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           



            <div class="row form-group">
                <label class="col-form-label col-sm-12 col-md-2" for="">{{trans('backend.product')}}
                </label>
                <div class="col-sm-12 col-md-10">
                    <select class="  form-control select2 "
                            name="product_id[]" required  id="one" multiple style="width: 100%;">

                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="myBtn">
                    <button id="send" type="submit" class="btn btn-success btn-square">{{trans('backend.save')}}</button>
                    <button  class="btn btn-primary btn-square"><a style="color:#FFF" href="{{route('order.show', $id)}}
                                ">{{trans('backend.back')}}</a></button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>




















{{-- 

    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.store')}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>



            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::open(['route'=>['add_product'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}




            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.categoriesOfProduct')}} <span
                    >*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="order_id" value="{{$id}}">
                    <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                            name="category_id"  required data-region-id="one" id="cat">
                        <option value="" >{{trans('backend.chosse_category_product')}}</option>
                        @foreach($category as $data)
                            <option value="{{$data->id}}">{{unserialize($data->name)[ LaravelLocalization::getCurrentLocale()]}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="clearfix"></div>
            <br>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.product')}} <span
                    >*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="  form-control select2 "
                            name="product_id[]" required  id="one" multiple style="width: 100%;">

                    </select>
                </div>
            </div>


            <br>
            <br><br>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.save')}}</button>
                    <button  class="btn btn-default"><a href="{{route('order.show', $id)}}
                                ">{{trans('backend.back')}}</a></button>
                </div>
            </div>

            {!! Form::close() !!}
            </div>
        </div>
    </div> --}}
@endsection
@section('scripts')

    <script type="application/javascript">
        function getCities(category) {
            $.ajax({
                url: "{{route('get_product')}}",
                data: {"_token": "{{ csrf_token() }}",'category_id' : category},
                type:"POST",
                success: function(result){
                    console.log(result)
                    var $dropdown = $("#one");
                    $dropdown.empty()
                    $.each(result.data, function() {

                        $dropdown.append($("<option img-url='"+this.image+"' />").val(this.id).html(this.name+' - {{trans('backend.price')}} '+this.price));
                    });
                }});
        }

        $('#cat').on('change', function() {
            getCities(this.value)
        });
    </script>
    <script type="text/javascript">
        function formatState (state) {

            if (!state.id) { return state.text; }
            var image_url = $(state.element).attr('img-url');
            var $state = $(
                '<span><img src="' +  image_url +
                '" class="img-flag" height="35" /> ' +
                state.text +     '</span>'
            );
            return $state;
        };
        $('.select2').select2({
            templateResult: formatState,
            placeholder: '{{trans('backend.chosse_category_product')}}'
        });
    </script>
@endsection

