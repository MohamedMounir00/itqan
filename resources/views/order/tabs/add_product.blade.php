
{!! Form::open(['route'=>['add_product'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}




<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.categoriesOfProduct')}} <span
        >*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
<input type="hidden" name="order_id" value="{{$order->id}}">
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

    </div>
</div>

{!! Form::close() !!}




