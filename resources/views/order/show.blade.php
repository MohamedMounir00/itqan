@extends('layouts.app')

@section('content')

    @php
        $lang= Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()



    @endphp

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{trans('backend.details_order')}}</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{trans('backend.details_order')}}</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab1" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb"
                                                                          role="tab" data-toggle="tab"
                                                                          aria-controls="home"
                                                                          aria-expanded="true">{{trans('backend.details_order')}}</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb"
                                                                    data-toggle="tab" aria-controls="profile"
                                                                    aria-expanded="false">{{trans('backend.prossing_in_order')}}</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content33" role="tab" id="profile-tabb3"
                                                                    data-toggle="tab" aria-controls="profile"
                                                                    aria-expanded="false">{{trans('backend.actions')}}</a>
                                </li>


                            </ul>
                            <div id="myTabContent2" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content11"
                                     aria-labelledby="home-tab">
                              @include('order.tabs.details')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content22"
                                     aria-labelledby="profile-tab">
                                    @include('order.tabs.status')

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content33"
                                     aria-labelledby="profile-tab">
                                    @include('order.tabs.actions')
                                </div>


                            </div>
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
                {{$order->address->longitude}}
        var lat = {{$order->address->latitude}}
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#table2').DataTable({

            });

        });
    </script>
    <script>
        $(document).ready(function () {
            $('#table3').DataTable({

            });

        });
    </script>




@endsection