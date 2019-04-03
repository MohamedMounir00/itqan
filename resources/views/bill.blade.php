<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>

    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>فاتوره تصليح</h2><h3 class="pull-right">طلب رقم #{{$order->id}}</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>مقدم الطلب:</strong><br>
                        {{$order->user->name}}<br>
                        {{$order->user->phone}}<br>

                    </address>
                </div>
                <div class="col-xs-6">
                    <address>
                        <strong>الفنى:</strong><br>
                        {{$order->technical->name}}<br>
                        {{$order->technical->phone}}<br>

                    </address>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-6 ">
                    <address>
                        <strong>تاريخ الطلب</strong><br>
                       {{$order->date}}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>المنتجات المضافه لهذا الطلب</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            @if($order->proudect->count() !=0)
                            <tr>
                                <td><strong>المنتج</strong></td>
                                <td class="text-center"><strong>السعر</strong></td>
                                <td class="text-center"><strong>الكميه</strong></td>
                                <td class="text-right"><strong>السعر الكلى</strong></td>
                            </tr>
                                @endif
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            @if($order->proudect->count() !=0)
                            @foreach($order->proudect as $item)
                            <tr>
                                <td>{{unserialize($item->name)['ar']}}</td>
                                <td class="text-center">{{$item->price}} ريال</td>
                                <td class="text-center">{{$item->pivot->amount}}</td>
                                <td class="text-right">{{($item->pivot->amount *$item->price)}}</td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="text-center">لا يوجد منتجات مضافه لهذا الطلب</td>


                                </tr>
                                @endif

                            <br>
                            <br>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>سعر المنتجات</strong></td>
                                <td class="thick-line text-right">{{$price_product}}ريال </td>
                            </tr>
                            <br>
                            <br>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>سعر الطلب</strong></td>
                                <td class="thick-line text-right">{{$price_cat1}} ريال</td>
                            </tr>
                            <br>
                            <br>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>الخصم على الطلب</strong></td>
                                <td class="no-line text-right">{{$discount}}</td>
                            </tr>
                            <br>
                            <br>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>السعر الكلى</strong></td>
                                <td class="no-line text-right">{{$total_price}} ريال</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>