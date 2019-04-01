
<div class="col-md-6 col-sm-6 antigen12">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.assigen_in_order')}}</h3>
                    <p>{{trans('backend.desc_assigen')}} </p>
                    <a href="{{url('order/get_status_view/'.$order->id)}}"><span class="btn btn-primary"> {{trans('backend.details')}}</span></a>

                </div>
            </div>

        </div>
    </div>
</div>


<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.store')}}</h3>
                     <p>{{trans('backend.desc_store')}} </p>
                    @if($order->status =='done'||$order->status =='can_not')
                        <a href="{{url('order/get_store_view/'.$order->id)}}"><span class="btn btn-primary disabled"> {{trans('backend.add')}}</span></a>

                    @else
                    <a href="{{url('order/get_store_view/'.$order->id)}}"><span class="btn btn-primary"> {{trans('backend.add')}}</span></a>
                  @endif
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.add_techanel')}}</h3>
                    <p>{{trans('backend.desc_add_techanel')}} </p>

                    @if($order->status =='done'||$order->status =='can_not')
                        <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-primary disabled"> {{trans('backend.add_techanel')}}</span></a>

                        @else
                        <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.add_techanel')}}</span></a>

                    @endif

                </div>
            </div>

        </div>
    </div>
</div>



<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.update_status_order')}}</h3>
                    <p>{{trans('backend.desc_update_status_order')}} </p>


                    <a href="{{url('order/update_status/'.$order->id)}}"><span class="btn btn-primary"> {{trans('backend.update')}}</span></a>

                </div>
            </div>

        </div>
    </div>
</div>


<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.add_techanel_period')}}</h3>
                    <p>{{trans('backend.desc_add_techanel_period')}} </p>
                    @if($order->warranty==true)

                    <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.add_techanel')}}</span></a>
                     @else
                        <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-primary disabled"> {{trans('backend.add_techanel')}}</span></a>

                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.product_assign_techinal')}}</h3>
                    <p>{{trans('backend.desc_product_assign_techinal')}} </p>


                    <a href="{{url('order/get_product_view/'.$order->id)}}"><span class="btn btn-primary"> {{trans('backend.details')}}</span></a>


                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.reschedules_order')}}</h3>
                    <p>{{trans('backend.reschedules_order_desc')}} </p>


                    <a href="{{route('reschedules.show', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.details')}}</span></a>


                </div>
            </div>

        </div>
    </div>
</div>