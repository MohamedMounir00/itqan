
@extends('layouts.app')

@section('content')


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
                        @if($user->image=='')

                        <img class="img-responsive avatar-view"
                             src="{{$user->image}}"


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
                        @if($user->client->type=='personal')
                            {{trans('backend.personal')}}
                        @elseif($user->client->type=='government')
                            {{trans('backend.government')}}

                        @else
                         {{trans('backend.company')}}
                        @endif
                    </li>

                    <li class="m-top-xs">
                        <i class="fa fa-mobile user-profile-icon"></i>
                        {{$user->phone}}
                    </li>
                </ul>

                <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>&nbsp;{{trans('backend.update')}}</a>
                <br/>



            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="profile_title">
                    <div class="col-md-6">
                        <h2>{{$user->name}}</h2>
                    </div>

                </div>
                <!-- start of user-activity-graph -->
                <div id="graph_bar" style="width:100%; height:280px;"></div>
                <!-- end of user-activity-graph -->

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                                                  role="tab" data-toggle="tab"
                                                                  aria-expanded="true">فعالیت اخیر</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content3" role="tab"
                                                            id="profile-tab2" data-toggle="tab"
                                                            aria-expanded="false">پروفایل</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                             aria-labelledby="home-tab">

                            <!-- start recent activity -->

                            <!-- end recent activity -->

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                             aria-labelledby="profile-tab">
                            <p>در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
