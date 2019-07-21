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
                            {{trans('backend.details_order')}}
                    </h3>
                </div>
            </div>


            <div class="kt-portlet__body">
                    <div class="kt-portlet__body">
                            <ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-2x nav-tabs-line-success" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link myLink active" data-toggle="tab" href="#kt_tabs_6_1" role="tab">{{trans('backend.details_order')}} </a>
                                </li>
                           
                                <li class="nav-item">
                                    <a class="nav-link myLink" data-toggle="tab" href="#kt_tabs_6_2" role="tab">{{trans('backend.prossing_in_order')}} </a>
                                </li>
    
                                <li class="nav-item">
                                    <a class="nav-link myLink" data-toggle="tab" href="#kt_tabs_6_3" role="tab"> {{trans('backend.actions_status')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link myLink" data-toggle="tab" href="#kt_tabs_6_4" role="tab"> {{trans('backend.actions')}}</a>
                                </li>
    
    
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="kt_tabs_6_1" role="tabpanel">
                                                
                                                @include('order.tabs.details')
                                                {{-- <div role="tabpanel" class="tab-pane fade" id="tab_content22"
                                                     aria-labelledby="profile-tab">
                                                    @include('order.tabs.status')
                
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content44"
                                                     aria-labelledby="profile-tab">
                                                    @include('order.tabs.actions_status')
                                                </div>
                                                @can('order-action')

                                                <div role="tabpanel" class="tab-pane fade" id="tab_content33"
                                                     aria-labelledby="profile-tab">
                                                    @include('order.tabs.actions')
                                                </div>
                                                @endcan --}}

                
                                </div>
                                <div class="tab-pane" id="kt_tabs_6_2" role="tabpanel">
                                        @include('order.tabs.status')
                                </div>


                                <div class="tab-pane" id="kt_tabs_6_3" role="tabpanel">
                                        @include('order.tabs.actions_status')
                                </div>


                                @can('order-action')
                                <div class="tab-pane" id="kt_tabs_6_4" role="tabpanel">
                                    @include('order.tabs.actions')
                                </div>
                                @endcan

                            </div>
                        
                         
                        </div>
            </div>
</div>














{{-- 


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
                                <li role="presentation" class=""><a href="#tab_content44" role="tab" id="profile-tabb4"
                                                                    data-toggle="tab" aria-controls="profile"
                                                                    aria-expanded="false">{{trans('backend.actions_status')}}</a>
                                </li>
                                @can('order-action')
                                <li role="presentation" class=""><a href="#tab_content33" role="tab" id="profile-tabb3"
                                                                    data-toggle="tab" aria-controls="profile"
                                                                    aria-expanded="false">{{trans('backend.actions')}}</a>
                                </li>
                                    @endcan
                            </ul>




                            <div id="myTabContent2" class="tab-content">

                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
                                     @include('order.tabs.details')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content22"
                                                     aria-labelledby="profile-tab">
                                                    @include('order.tabs.status')
                
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content44"
                                                     aria-labelledby="profile-tab">
                                                    @include('order.tabs.actions_status')
                                                </div>
                                                @can('order-action')
                
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content33"
                                                     aria-labelledby="profile-tab">
                                                    @include('order.tabs.actions')
                                                </div>
                                                @endcan
                              
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
 --}}



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
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/app/custom/general/crud/datatables/advanced/column-rendering.js')}}"></script>
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