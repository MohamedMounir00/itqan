@extends('layouts.app')

@section('content')

    @php
        $lang= Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()
    @endphp


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

    </div>
@endsection