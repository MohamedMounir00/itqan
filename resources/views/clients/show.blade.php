
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
                        @if($user->client->type=='personal')
                            {{trans('backend.personal')}}
                        @elseif($user->client->type=='government')
                            {{trans('backend.government')}}
                            --
                            {{trans('backend.minstry_of') . unserialize($user->client->minstry->name)[$lang]}}
                        @else
                         {{trans('backend.company')}}
                            --
                            {{trans('backend.company_of') . unserialize($user->client->company->name)[$lang]}}

                        @endif
                    </li>

                    <li class="m-top-xs">
                        <i class="fa fa-mobile user-profile-icon"></i>
                        {{$user->phone}}
                    </li>
                    @if($user->client->type=='personal')


                    <li class="m-top-xs">
                        <i class="fa fa-house user-profile-icon">{{trans('backend.type_hose')}}</i>
                       @if($user->client->house=='flat')
                            {{trans('backend.flat')}}
                           @elseif($user->client->house=='villa')
                            {{trans('backend.villa')}}
                           @else
                            {{trans('backend.palace')}}
                        @endif

                    </li>
                    @endif

                    <li><i class="fa fa-code user-profile-icon"></i>
                        {{$activation}}

                    </li>
                </ul>
                @can('client-edit')
                <a href="{{route('clients.edit', $user->id)}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>&nbsp;{{trans('backend.update')}}</a>
                @endcan
                <a href="{{route('clients.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>
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
                <div id="graph_bar" style="width:100%; height:280px;"></div>
                <!-- end of user-activity-graph -->

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
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                             aria-labelledby="home-tab">

                            <!-- start recent activity          //'new','wating','done','can_not','consultation','delay','need_parts','another_visit_works'
     -->

                            <a  href="{{route('order.get_order_user_view',[$user->id,'new'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$new}}</span>
                              {{trans('api.watting_techaincall')}}
                            </a>


                            <a  href="{{route('order.get_order_user_view',[$user->id,'wating'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$wating}}</span>
                                {{trans('api.new_order')}}
                            </a>

                            <a  href="{{route('order.get_order_user_view',[$user->id,'done'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$done}}</span>
                                {{trans('api.done_order')}}
                            </a>

                            <a  href="{{route('order.get_order_user_view',[$user->id,'can_not'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$can_not}}</span>
                                {{trans('api.can_not')}}
                            </a>

                            <a  href="{{route('order.get_order_user_view',[$user->id,'consultation'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$consultation}}</span>
                                {{trans('api.consultation')}}
                            </a>

                            <a  href="{{route('order.get_order_user_view',[$user->id,'delay'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$delay}}</span>
                                {{trans('api.delay')}}
                            </a>

                            <a  href="{{route('order.get_order_user_view',[$user->id,'need_parts'])}}" class="btn btn-app">
                                <span class="badge bg-red">{{$need_parts}}</span>
                                {{trans('api.need_parts')}}
                            </a>

                            <a  href="{{route('order.get_order_user_view',[$user->id,'another_visit_works'])}}" class="btn btn-app">
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






                            @if($user->client->type=='personal')
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="">{{trans('backend.type_account')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required
                                               class="form-control col-md-7 col-xs-12" value="{{trans('backend.personal')}}" disabled>

                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <br>


                            @elseif($user->client->type=='government')
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="">{{trans('backend.government')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name"  required
                                               class="form-control col-md-7 col-xs-12" value="{{trans('backend.minstry_of') . unserialize($user->client->minstry->name)[$lang]}}" disabled>

                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <br>


                            @else
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="">{{trans('backend.company')}} <span
                                        >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name"  required
                                               class="form-control col-md-7 col-xs-12" value="{{trans('backend.company_of') . unserialize($user->client->company->name)[$lang]}}" disabled>

                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <br>


                            @endif


                                        <div class="clearfix"></div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
