@extends('layouts.app')

@section('content')

    @php
        $lang= Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()
    @endphp




<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.details_product')}}
                    </h3>
                </div>
            </div>


            <div class="kt-portlet__body">
                <div class="box">
                        <div class="row">
                                <div class="col-sm-3 col-md-12 col-lg-3">
                                    <div class="OrderImg">
                                            <a href="{{url($product->image)}}" data-lightbox="image-1">
                                                    <img class="img-responsive"  src="{{url($product->image)}}" alt="..."/>
                                            </a>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-md-12 col-lg-9">
                                    <div class="orderDetails">
                                            <div class="kt-section">
                                                    <div class="kt-section__content">
                                                        <table class="table table-bordered table-hover">
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td class="titl">{{trans('backend.name')}}</td>
                                                                    <td><span>{{unserialize($product->name)[$lang]}}</span></td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td class="titl">{{trans('backend.category')}}</td>
                                                                    <td><span class="prod_title">{{unserialize($product->category->name)[$lang]}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="titl">{{trans('backend.price')}}</td>
                                                                    <td><span class="price">{{unserialize($product->currency->name)[$lang].' '.  $product->price}}</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                            @if($product->deleted_at !=null)
                                            <div class="alert alert-danger alert-dismissable text-center">
                                                <h2> {{trans('backend.product_was_deleted')}}  </h2>
                                            </div>
                                            @endif

                                    </div>
                                </div>
            
                            </div>
                </div>
            </div>
</div>


















{{-- 







    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{trans('backend.details_product')}}</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{unserialize($product->name)[$lang]}}</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="product-image">
                                <img src="{{url($product->image)}}" alt="..."/>
                            </div>

                        </div>

                        <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                            <h3 class="prod_title">{{unserialize($product->category->name)[$lang]}}</h3>


                            <br/>



                            <div class="">
                                <div class="product_price">
                                    <h1 class="price">  {{unserialize($product->currency->name)[$lang].' '.  $product->price}}</h1>
                                    <br>
                                </div>
                            </div>


                            @if($product->deleted_at !=null)
                            <div class="alert alert-danger alert-dismissable text-center">
                                <h2> {{trans('backend.product_was_deleted')}}  </h2>
                            </div>

                               @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div> --}}
@endsection

