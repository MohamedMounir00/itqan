
{!! Form::open(['route'=>['add_product'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}




<div class="row form-group">
    <label class="col-form-label col-sm-12 col-md-2" for="">{{trans('backend.categoriesOfProduct')}} 
    </label>
    <div class="col-sm-12 col-md-10">
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

    </div>
</div>

{!! Form::close() !!}





