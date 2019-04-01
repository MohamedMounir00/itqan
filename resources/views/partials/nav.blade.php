@php

    $lang = LaravelLocalization::getCurrentLocale();

@endphp

<div class="top_nav hidden-print">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown" style=" margin-left: 30px">


                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="fa fa-language"></i>
                        {{-- <div class="notify"><span class="heartbit"></span><span class="point"></span></div> --}}
                    </a>

                    <ul class="dropdown-menu dropdown-tasks animated slideInUp">



                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>



                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img width="20px"  src='{{ asset("$localeCode-flag.png") }}' alt="">
                                    {{ $properties['native'] }}
                                </a>



                            </li>
                        @endforeach


                    </ul>

                </li>
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{\App\Helper\Helper::countNotify()}}</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        @foreach(\App\Helper\Helper::Get_four_Notify() as $notfay)
                        <li>
                            <a href="{{route('order.show', $notfay->order_id)}}">
                                <span>
                          <span class="time">
                              {{Carbon\Carbon::parse($notfay->created_at)->diffForHumans()}}
                              </span>
                        </span>
                                <span class="message">
                {{unserialize($notfay->message)[$lang]}}
                                </span>
                            </a>
                        </li>
                        @endforeach

                        <li>
                            <div class="text-center">
                                <a href="{{route('notifications.index')}}">

                                <strong>{{trans('backend.all_notify')}}</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>
