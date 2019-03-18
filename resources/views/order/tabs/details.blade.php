<div class="col-md-4 col-sm-4 col-xs-12">
    <h3> {{trans('backend.product')}}</h3>
    <div class="product_gallery">
        @foreach($order->proudect as $item)


            <a href="{{route('product.show', $item->id)}}">
                {{unserialize($item->name)[$lang]}}
                <img src="{{url($item->image)}}" alt="..."/>
            </a>
        @endforeach
    </div>


</div>

<div class="col-md-4 col-sm-4 col-xs-12">
    <h3> {{trans('backend.photo_order')}}</h3>

    <div class="product_gallery">
        @foreach($order->storge as $item)


            <a>
                <img src="{{url($item->path.'/'.'thumbnail'.'-'.$item->name.'.'.$item->extention)}}"
                     alt="..."/>
            </a>
        @endforeach
    </div>


</div>


<div class="col-md-4 col-sm-4 col-xs-12" style="border:0px solid #e5e5e5;">

    <h3 class="prod_title">{{trans('api.repairing').unserialize($order->category->main->name) [$lang]}}</h3>

    <p>
        {{$order->desc}}
    </p>
    <br/>

    <div class="">
        <h2>{{trans('backend.status')}}</h2>
        <ul class="list-inline prod_color">
            <li>


                @if ($order->status=='new')
                    {{trans('api.watting_techaincall',[],$lang)}}
                @elseif ($order->status=='wating')
                    {{ trans('api.new_order',[],$lang)}}
                @elseif ($order->status=='done')
                    {{trans('api.done_order',[],$lang)}}
                @elseif ($order->status=='can_not')
                    {{trans('api.can_not',[],$lang)}}
                @elseif ($order->status=='consultation')
                    {{trans('api.consultation',[],$lang)}}
                @elseif ($order->status=='delay')
                    {{trans('api.delay',[],$lang)}}
                @elseif ($order->status=='need_parts')
                    {{trans('api.need_parts',[],$lang)}}
                @elseif ($order->status=='another_visit_works')
                    {{trans('api.another_visit_works',[],$lang)}}

                @endif
            </li>
        </ul>
    </div>
    <br/>
    <div class="">
        <h2>
            {{trans('backend.date')}}
        </h2>
        <ul class="list-inline prod_size">
            <li>
                <span> {{unserialize($order->date)[$lang]}}</span>
            </li>

        </ul>
    </div>
    <br/>
    <div class="">
        <h2>
            {{trans('backend.time')}}
        </h2>
        <ul class="list-inline prod_size">
            <li>

                @if ($order->timing =='am')
                    <span> {{trans('api.from',[],$lang).$order->time->from .trans('api.to',[],$lang).$order->time->to .'-'.trans('api.am',[],$lang)}}</span>

                @else
                    <span> {{trans('api.from',[],$lang).$order->time->from .trans('api.to',[],$lang).$order->time->to .'-'.trans('api.pm',[],$lang)}}</span>
                @endif
            </li>

        </ul>
    </div>


    <div class="">
        <div class="product_price">
            <h1 class="price">800,000 ریال</h1>
            <br>
        </div>
    </div>


</div>

<div class="">
    <h2 style="text-align: center">
        {{trans('backend.address')}}
    </h2>
    <ul class="list-inline prod_size">

        <h6 style="text-align: center">
            {{$order->address->address}}
        </h6>


        <div id="map" style="width: 100%; height: 300px;"></div>


    </ul>
</div>