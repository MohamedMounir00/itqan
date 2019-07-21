


<div class="kt-portlet__body">
        @if($order->status_admin=='waiting')
        <div class="row">
            {{-- <div class="col-md-6 col-sm-6 antigen12 " style="height: 382px">
                <div class="x_panel">
        
                    <div class="x_content">
        
                        <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron">
                                <h3>{{trans('backend.project_order_status')}}</h3>
                                <p>{{trans('backend.desc_project_order_status')}} </p>
                                <a href="{{route('order.agree_project', $order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.yes')}}</span></a>
                                <a href="{{route('order.disagree_project', $order->id)}}"><span class="btn btn-brand btn-danger btn-pill"> {{trans('backend.no')}}</span></a>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div> --}}


            <div class="col-sm-12">

            <div class="mySection" style="background-color:#b4517e;color:#FFF">
                    <h2 style="font-size: 25px;">{{trans('backend.project_order_status')}}</h2>
                    <p style="font-size: 16px;">{{trans('backend.desc_project_order_status')}} </p>
                    <a  href="{{route('order.agree_project', $order->id)}}"><span style="width: 80px !important;" class="btn btn-brand btn-success btn-pill"> {{trans('backend.yes')}}</span></a>
                    <a href="{{route('order.disagree_project', $order->id)}}"><span style="width: 80px !important;background-color:red" class="btn btn-brand btn-danger btn-pill"> {{trans('backend.no')}}</span></a>           
                     </div>
            </div>

        @endif




        <div class="row">
            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.assigen_in_order')}}</h2>
                        <p>{{trans('backend.desc_assigen')}} </p>
                        <a href="{{url('order/get_status_view/'.$order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.details')}}</span></a>
                    </div>
            </div>




            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.store')}}</h2>
                        <p>{{trans('backend.desc_store')}}</p>
                        @if($order->status =='done'||$order->status =='can_not'||$order->status_admin=='waiting'||$order->status_admin=='dis_agree')
                        <a><span class="btn btn-brand btn-elevate btn-pill disabled" > {{trans('backend.add')}}</span></a>
                        @else
                        <a href="{{url('order/get_store_view/'.$order->id)}}"><span class="btn btn-brand btn-elevate btn-pill">{{trans('backend.add')}}</span></a>
                        @endif
                    </div>
            </div>




            









            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.add_techanel')}}</h2>
                        <p>{{trans('backend.desc_add_techanel')}}</p>

                        @if($order->status =='done'||$order->status =='can_not'||$order->status_admin=='waiting'||$order->status_admin=='dis_agree')
                            <a><span class="btn btn-brand btn-elevate btn-pill disabled" > {{trans('backend.junior')}}</span></a>
                            <a ><span class="btn btn-brand btn-elevate btn-pill disabled" > {{trans('backend.senior')}}</span></a>
                            @else
                            <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.junior')}}</span></a>
                            <a href="{{route('assigen_senior', $order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.senior')}}</span></a>
                        @endif
                    </div>
            </div>





            










            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.update_status_order')}}</h2>
                        <p>{{trans('backend.desc_update_status_order')}}</p>
                        @if($order->status =='done'||$order->status =='can_not'||$order->status =='new')
                            <a><span class="btn btn-brand btn-elevate btn-pill disabled" > {{trans('backend.update')}}</span></a>
                        @else
                            <a href="{{url('order/update_status/'.$order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.update')}}</span></a>
                        @endif
                    </div>
            </div>

















            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.add_techanel_period')}}</h2>
                        <p>{{trans('backend.desc_add_techanel_period')}}</p>
                        @if($order->warranty==true)
    
                        <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.add_techanel')}}</span></a>
                         @else
                            <a><span class="btn btn-brand btn-elevate btn-pill disabled"> {{trans('backend.add_techanel')}}</span></a>
    
                        @endif
                    </div>
            </div>










            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.product_assign_techinal')}}</h2>
                        <p>{{trans('backend.desc_product_assign_techinal')}}</p>
                        @if($order->status =='done'||$order->status =='can_not')
                            <a><span class="btn btn-brand btn-elevate btn-pill disabled" > {{trans('backend.details')}}</span></a>
    
                        @else
                            <a href="{{url('get_product_view/'.$order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.details')}}</span></a>
    
                        @endif

                        
                    </div>
            </div>











            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.coupons')}}</h2>
                        <p>{{trans('backend.desc_coupons')}}</p>
                        <a href="{{route('coupons',$order->id)}}"><span class="btn btn-brand btn-elevate btn-pill">{{trans('backend.details')}}</span></a>
                    </div>
            </div>




            













            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.reschedules_order')}}</h2>
                        <p>{{trans('backend.reschedules_order_desc')}}</p>
                        @if($order->status =='done'||$order->status =='can_not')
                            <a><span class="btn btn-brand btn-elevate btn-pill disabled"> {{trans('backend.details')}}</span></a>
    
                        @else
                        <a href="{{route('show_reschedules', $order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.details')}}</span></a>
    
                         @endif


                        
                    </div>
            </div>






            










            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.update_time_date')}}</h2>
                        <p>{{trans('backend.desc_update_time_date')}}</p>
                        @if($order->status =='done'||$order->status =='can_not'||$order->status_admin=='waiting'||$order->status_admin=='dis_agree')
                                        <a><span class="btn btn-brand btn-elevate btn-pill disabled"> {{trans('backend.details')}}</span></a>
            
                                    @else
                                    <a href="{{route('editdataorder', $order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.details')}}</span></a>
            
                                    @endif


                        
                    </div>
            </div>

       
            










            <div class="col-md-6 col-lg-4">
                    <div class="mySection">
                        <h2>{{trans('backend.bill')}}</h2>
                        <p>{{trans('backend.desc_bill')}}</p>
                        @if($order->status =='done'||$order->status =='can_not')
                                        <a href="{{route('bill', $order->id)}}"><span class="btn btn-brand btn-elevate btn-pill"> {{trans('backend.print')}}</span></a>
            
                                    @else
                                        <a><span class="btn btn-brand btn-elevate btn-pill disabled"> {{trans('backend.print')}}</span></a>
            
                                    @endif


                        
                    </div>
            </div>














        </div>
        
</div>




{{-- 
@if($order->status_admin=='waiting')
<div class="row">
    <div class="col-md-6 col-sm-6 antigen12 " style="height: 382px">
        <div class="x_panel">

            <div class="x_content">

                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                        <h3>{{trans('backend.project_order_status')}}</h3>
                        <p>{{trans('backend.desc_project_order_status')}} </p>
                        <a href="{{route('order.agree_project', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.yes')}}</span></a>
                        <a href="{{route('order.disagree_project', $order->id)}}"><span class="btn btn-danger"> {{trans('backend.no')}}</span></a>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endif



<div class="row">
<div class="col-md-6 col-sm-6 antigen12 " style="height: 382px">
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
























<div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.store')}}</h3>
                     <p>{{trans('backend.desc_store')}} </p>
                    @if($order->status =='done'||$order->status =='can_not'||$order->status_admin=='waiting'||$order->status_admin=='dis_agree')
                        <a><span class="btn btn-primary" disabled> {{trans('backend.add')}}</span></a>

                    @else
                        <a href="{{url('order/get_store_view/'.$order->id)}}"><span class="btn btn-primary "> {{trans('backend.add')}}</span></a>

                    @endif
                </div>
            </div>

        </div>
    </div>
</div>






















<div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.add_techanel')}}</h3>
                    <p>{{trans('backend.desc_add_techanel')}} </p>

                    @if($order->status =='done'||$order->status =='can_not'||$order->status_admin=='waiting'||$order->status_admin=='dis_agree')
                        <a><span class="btn btn-primary" disabled> {{trans('backend.junior')}}</span></a>
                        <a ><span class="btn btn-primary" disabled> {{trans('backend.senior')}}</span></a>
                        @else
                        <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.junior')}}</span></a>
                        <a href="{{route('assigen_senior', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.senior')}}</span></a>

                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
























<div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.update_status_order')}}</h3>
                    <p>{{trans('backend.desc_update_status_order')}} </p>


                    @if($order->status =='done'||$order->status =='can_not'||$order->status =='new')
                        <a><span class="btn btn-primary disabled"> {{trans('backend.update')}}</span></a>

                    @else
                        <a href="{{url('order/update_status/'.$order->id)}}"><span class="btn btn-primary"> {{trans('backend.update')}}</span></a>

                    @endif
                </div>
            </div>

        </div>
    </div>
</div>




















<div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.add_techanel_period')}}</h3>
                    <p>{{trans('backend.desc_add_techanel_period')}} </p>
                    @if($order->warranty==true)

                    <a href="{{route('order.edit', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.add_techanel')}}</span></a>
                     @else
                        <a ><span class="btn btn-primary disabled"> {{trans('backend.add_techanel')}}</span></a>

                    @endif
                </div>
            </div>

        </div>
    </div>
</div>














<div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.product_assign_techinal')}}</h3>
                    <p>{{trans('backend.desc_product_assign_techinal')}} </p>


                    @if($order->status =='done'||$order->status =='can_not')
                        <a><span class="btn btn-primary disabled"> {{trans('backend.details')}}</span></a>

                    @else
                        <a href="{{url('get_product_view/'.$order->id)}}"><span class="btn btn-primary"> {{trans('backend.details')}}</span></a>

                    @endif

                </div>
            </div>

        </div>
    </div>
</div>




















    <div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
        <div class="x_panel">

            <div class="x_content">

                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                        <h3>{{trans('backend.coupons')}}</h3>
                        <p>{{trans('backend.desc_coupons')}} </p>


                        <a href="{{route('coupons',$order->id)}}"><span class="btn btn-primary"> {{trans('backend.details')}}</span></a>


                    </div>
                </div>

            </div>
        </div>
    </div>











<div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
    <div class="x_panel">

        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h3>{{trans('backend.reschedules_order')}}</h3>
                    <p>{{trans('backend.reschedules_order_desc')}} </p>

                    @if($order->status =='done'||$order->status =='can_not')
                        <a><span class="btn btn-primary disabled"> {{trans('backend.details')}}</span></a>

                    @else
                    <a href="{{route('show_reschedules', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.details')}}</span></a>

                     @endif
                </div>
            </div>

        </div>
    </div>
</div>





















    <div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
        <div class="x_panel">

            <div class="x_content">

                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                        <h3>{{trans('backend.update_time_date')}}</h3>
                        <p>{{trans('backend.desc_update_time_date')}} </p>

                        @if($order->status =='done'||$order->status =='can_not'||$order->status_admin=='waiting'||$order->status_admin=='dis_agree')
                            <a><span class="btn btn-primary disabled"> {{trans('backend.details')}}</span></a>

                        @else
                        <a href="{{route('editdataorder', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.details')}}</span></a>

                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>





















    <div class="col-md-6 col-sm-6 col-xs-12" style="height: 382px">
        <div class="x_panel">

            <div class="x_content">

                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                        <h3>{{trans('backend.bill')}}</h3>
                        <p>{{trans('backend.desc_bill')}} </p>

                        @if($order->status =='done'||$order->status =='can_not')
                            <a href="{{route('bill', $order->id)}}"><span class="btn btn-primary"> {{trans('backend.print')}}</span></a>

                        @else
                            <a><span class="btn btn-primary disabled"> {{trans('backend.print')}}</span></a>

                        @endif

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

</div> --}}