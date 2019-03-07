
<div class="col-md-6 col-sm-6 antigen12">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h1>{{trans('backend.assigen_in_order')}}</h1>
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
                    <h1>{{trans('backend.store')}}</h1>
                    <p>{{trans('backend.desc_store')}} </p>


                    <a href="{{url('order/get_store_view/'.$order->id)}}"><span class="btn btn-primary"> {{trans('backend.add')}}</span></a>

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
                    <h1>{{trans('backend.add_techanel')}}</h1>
                    <p>{{trans('backend.desc_add_techanel')}} </p>


                    <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.add_techanel')}}</span></a>

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
                    <h1>{{trans('backend.add_techanel_period')}}</h1>
                    <p>{{trans('backend.desc_add_techanel_period')}} </p>



                </div>
            </div>

        </div>
    </div>
</div>


