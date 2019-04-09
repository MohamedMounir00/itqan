@extends('layouts.app')

@section('content')
    @php
        $lang= Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()



    @endphp

    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.profile')}}

            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        @if($user->image!=null)

                            <img class="img-responsive avatar-view"
                                 src="{{url($user->image)}}"


                                 alt="Avatar"
                                 title="Change the avatar">
                        @else
                            <img class="img-responsive avatar-view"
                                 src="https://www.mycustomer.com/sites/all/modules/custom/sm_pp_user_profile/img/default-user.png"


                                 alt="Avatar"
                                 title="Change the avatar">
                        @endif
                    </div>
                </div>
                <h3>{{$user->name}}</h3>

                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-envelope user-profile-icon"></i>
                        {{$user->email}}

                    </li>

                    <li>
                        <i class="fa fa-briefcase user-profile-icon"></i>
                        {{trans('backend.technical_')}}
                        {{ unserialize($user->technical->category->name)[$lang]}}

                    </li>

                    <li class="m-top-xs">
                        <i class="fa fa-mobile user-profile-icon"></i>
                        {{$user->phone}}
                    </li>


                    <li class="m-top-xs">
                        <i class="fa fa-id-card user-profile-icon"></i>
                        {{ $user->technical->identification}}


                    </li>

                </ul>

                <a href="{{route('technical.edit', $user->id)}}" class="btn btn-success"><i
                            class="fa fa-edit m-right-xs"></i>&nbsp;{{trans('backend.update')}}</a>
                <a href="{{route('technical.index')}}" class="btn btn-primary">{{trans('backend.back')}}</a>
                <a href="{{route('send_message_user_view', $user->id)}}" class="btn btn-warning"><i
                            class="fa fa-envelope-o m-right-xs"></i>&nbsp;{{trans('backend.send')}}</a>
                <br/>


            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="profile_title">
                    <div class="col-md-6">
                        <h2>{{$user->name}}</h2>
                    </div>

                </div>
                <!-- start of user-activity-graph -->
                <div id="graph_bar" style="width:100%; height:280px;">

                    <div id="map" style="width: 100%; height: 300px;"></div>

                </div>
                <br>
                <!-- end of user-activity-graph -->
                <div class="clearfix"></div>
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                                                  role="tab" data-toggle="tab"
                                                                  aria-expanded="true">{{trans('backend.count_order')}}</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content3" role="tab"
                                                            id="profile-tab2" data-toggle="tab"
                                                            aria-expanded="false">{{trans('backend.profile')}}</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content4" role="tab"
                                                            id="profile-tab2" data-toggle="tab"
                                                            aria-expanded="false">{{trans('backend.time_id')}}</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                             aria-labelledby="home-tab">


                            <a  href="{{route('order.get_order_technical_view',[$user->id,'wating'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$wating}}</span>
                                {{trans('api.new_order')}}
                            </a>

                            <a  href="{{route('order.get_order_technical_view',[$user->id,'done'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$done}}</span>
                                {{trans('api.done_order')}}
                            </a>

                            <a  href="{{route('order.get_order_technical_view',[$user->id,'can_not'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$can_not}}</span>
                                {{trans('api.can_not')}}
                            </a>

                            <a  href="{{route('order.get_order_technical_view',[$user->id,'consultation'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$consultation}}</span>
                                {{trans('api.consultation')}}
                            </a>

                            <a  href="{{route('order.get_order_technical_view',[$user->id,'delay'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$delay}}</span>
                                {{trans('api.delay')}}
                            </a>

                            <a  href="{{route('order.get_order_technical_view',[$user->id,'need_parts'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$need_parts}}</span>
                                {{trans('api.need_parts')}}
                            </a>

                            <a  href="{{route('order.get_order_technical_view',[$user->id,'another_visit_works'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$another_visit_works}}</span>
                                {{trans('api.another_visit_works')}}
                            </a>
                            <!-- end recent activity -->

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                             aria-labelledby="profile-tab">

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.user_name')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="name" required
                                           class="form-control col-md-7 col-xs-12" value="{{$user->name}}" disabled>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.email')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="first-name" name="email" required
                                           class="form-control col-md-7 col-xs-12" value="{{$user->email}}"
                                           autocomplete="new_email" disabled>

                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <br>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.phone')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="phone" required
                                           class="form-control col-md-7 col-xs-12" value="{{$user->phone}}" disabled>

                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <br>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.identification')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="identification" required
                                           class="form-control col-md-7 col-xs-12"
                                           value="{{$user->technical->identification}}" disabled>

                                </div>
                            </div>
                            <div class="clearfix"></div>


                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content4"
                             aria-labelledby="profile-tab">
                            @foreach($user->time as $t)


                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">


                                        <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                               value=" {{trans('backend.from').$t->from .'-'.trans('backend.to').$t->to.'-'.($t->timing=='am' ? trans('backend.am') : trans('backend.pm'))}}"
                                               disabled>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBROO3Md6_fZD5_fd1u8VTlRxd4VdJnAWU&libraries=places&sensor=false"></script>

    <script type="text/javascript">
        var lang =
                {{$user->technical->longitude}}
        var lat = {{$user->technical->latitude}}
                function initialize() {
                var latlng = new google.maps.LatLng(lat, lang);
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: latlng,
                    zoom: 13
                });
                var marker = new google.maps.Marker({
                    map: map,
                    position: latlng,
                    draggable: false,
                    anchorPoint: new google.maps.Point(0, -29)
                });
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', function () {
                    var iwContent = '<div id="iw_container">' +
                        '<div class="iw_title"><b>Location</b> : Noida</div></div>';
                    // including content to the infowindow
                    infowindow.setContent(iwContent);
                    // opening the infowindow in the current map and at the current marker location
                    infowindow.open(map, marker);
                });
            }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>




@endsection