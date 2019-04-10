
<!------ Include the above in your HEAD tag ---------->
<style>

    body {
        font-family: Helvetica, sans-serif;
    }

    body {
        font-family: "Ubuntu", sans-serif;
        font-size: 14px;
    }
    .container {
        width: 1200px;
        margin: auto;
    }

    .invoice-title {
        width: 100%;
        overflow: hidden;
    }
    .invoice-title h2 {
        float: left
    }
    .invoice-title h3 {
        float: right
    }
    hr {
        margin-bottom: 20px;
    }
    .in-row {
        overflow: hidden;
        margin-bottom: 30px;
    }
    .in-row .col-xs-6 {
        float: left;
        width: 50%;
    }
    .panel-title {
        text-align: center;
        background-color: #DDD;
        padding: 10px;
    }
    table {
        width: 100%;
        border: 2px solid #DDD;
        text-align: center;
    }
    table thead tr {
        background-color: #F7f7f7;
        padding: 10px;
        border: 1px solid #f00;
    }



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
<body>
<div class="container" style="direction: rtl">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>فاتوره تصليح</h2><h3 class="pull-right">طلب رقم #{{$order->id}}</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">

                        <strong>مقدم الطلب:</strong><br>
                        {{$order->user->name}}<br>
                        {{$order->user->phone}}<br>


                </div>
                <div class="col-xs-6" >

                        <strong>الفنى:</strong><br>
                        {{$order->technical->name}}<br>
                        {{$order->technical->phone}}<br>


                </div>
            </div>
            <div class="row">

                <div class="col-xs-6 ">

                        <strong>تاريخ الطلب</strong><br>
                       {{$order->date}}<br><br>

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
</body>