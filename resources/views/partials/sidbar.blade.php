<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"> <span>
                    @if(app()->getLocale()=='ar' )

                        لوحه تحكم اتقان
                        @else
                    Admin panel
                        @endif
                </span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">

            <div class="profile_pic">
                @if (auth()->user()->image=='')
                <img src="https://www.mycustomer.com/sites/all/modules/custom/sm_pp_user_profile/img/default-user.png" border="0" width="40"  class="img-circle profile_img" />

                @else
               <img src='{{url(auth()->user()->image)}}' border="0" width="40" align="center"  class="img-circle profile_img" />
                    @endif
            </div>

            <div class="profile_info">
                <span>{{trans('backend.admin')}}</span>
            <h2>{{auth()->user()->name}}</h2>
            </div>

        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">


                       @can('admin-list')
                    <li><a><i class="fa fa-edit"></i> {{trans('backend.admins_controller')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admins.index')}}">{{trans('backend.admins')}} </a></li>
                            @can('admin-create')

                            <li><a href="{{route('admins.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                              @endcan
                           @can('technical-list')

                           <li><a><i class="fa fa-edit"></i> {{trans('backend.technical_controller')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('technical.index')}}">{{trans('backend.technical')}} </a></li>
                            @can('technical-create')

                            <li><a href="{{route('technical.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                           @endcan
                           @can('order-list')


                           <li><a><i class="fa fa-edit"></i> {{trans('backend.clients_controller')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('clients.index')}}">{{trans('backend.clients')}} </a></li>


                                            </ul>
                                        </li>


                                        <li><a><i class="fa fa-edit"></i> {{trans('backend.orders')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('reschedules.index')}}"> {{trans('backend.reschedules_order')}} </a></li>

                                                <li><a href="{{route('order.index')}}"> {{trans('backend.all_order')}}</a></li>
                                                <li><a href="{{route('order.get_order_view')}}"> {{trans('backend.order_view')}} </a></li>
                                                <li><a href="{{route('order.get_finish_view')}}"> {{trans('backend.finish_order')}} </a></li>
                                                <li><a href="{{route('order.get_warranty_view')}}"> {{trans('backend.warranty')}} </a></li>

                                                <li><a href="{{route('order.get_consultation_view')}}"> {{trans('backend.consultation_view')}} </a></li>
                                                <li><a href="{{route('order.get_delay_view')}}"> {{trans('backend.delay_view')}} </a></li>
                                                <li><a href="{{route('order.get_need_parts_view')}}">{{trans('backend.need_parts')}} </a></li>
                                                <li><a href="{{route('order.get_another_visit_works_view')}}"> {{trans('backend.another_visit')}} </a></li>
                                                <li><a href="{{route('order.get_view_project')}}"> {{trans('backend.get_order_project')}} </a></li>
                                            </ul>
                                        </li>

                           @endcan
                           @can('category_order-list')


                           <li><a><i class="fa fa-edit"></i> {{trans('backend.categories')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('category.index')}}">{{trans('backend.all_categories')}} </a></li>
                                                @can('category_order-create')

                                                    <li><a href="{{route('category.create')}}">{{trans('backend.create')}} </a></li>
                                                @endcan

                                            </ul>
                                        </li>
                           @endcan
                           @can('category_product-list')
                                        <li><a><i class="fa fa-edit"></i> {{trans('backend.categoriesOfProduct')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('category_product.index')}}">{{trans('backend.all_categories')}} </a></li>
                                                @can('category_product-create')

                                                <li><a href="{{route('category_product.create')}}">{{trans('backend.create')}} </a></li>
                                                @endcan

                                            </ul>
                                        </li>
                           @endcan
                           @can('product-list')

                                        <li><a><i class="fa fa-edit"></i> {{trans('backend.product')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('product.index')}}">{{trans('backend.product_all')}} </a></li>
                                                @can('product-create')

                                                <li><a href="{{route('product.create')}}">{{trans('backend.create')}} </a></li>
                                                @endcan

                                            </ul>
                                        </li>
                           @endcan
                           @can('currency-list')


                                        <li><a><i class="fa fa-edit"></i> {{trans('backend.currency')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('currency.index')}}">{{trans('backend.currency_controller')}} </a></li>
                                                @can('currency-create')

                                                <li><a href="{{route('currency.create')}}">{{trans('backend.create')}} </a></li>
                                                @endcan

                                            </ul>
                                        </li>
                           @endcan
                           @can('time-list')

                           <li><a><i class="fa fa-edit"></i> {{trans('backend.time_work')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('time_work.index')}}">{{trans('backend.time_controller')}} </a></li>
                                                @can('time-create')

                                                <li><a href="{{route('time_work.create')}}">{{trans('backend.create')}} </a></li>
                                                @endcan

                                            </ul>
                                        </li>
                           @endcan
                           @can('ministry-list')

                                     <li><a><i class="fa fa-edit"></i> {{trans('backend.ministries')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('ministries.index')}}">{{trans('backend.ministries')}} </a></li>
                                            @can('ministry-create')

                                            <li><a href="{{route('ministries.create')}}">{{trans('backend.create')}} </a></li>
                                            @endcan

                                        </ul>
                                    </li>
                           @endcan
                           @can('company-list')

                           <li><a><i class="fa fa-edit"></i> {{trans('backend.companies')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('companies.index')}}">{{trans('backend.companies')}} </a></li>
                                            @can('company-create')

                                            <li><a href="{{route('companies.create')}}">{{trans('backend.create')}} </a></li>
                                            @endcan

                                        </ul>
                                    </li>
                           @endcan
                           @can('country-list')

                           <li><a><i class="fa fa-edit"></i> {{trans('backend.nationalityl')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('nationality.index')}}">{{trans('backend.nationality')}} </a></li>
                                            @can('country-create')

                                            <li><a href="{{route('nationality.create')}}">{{trans('backend.create')}} </a></li>
                                            @endcan

                                        </ul>
                                    </li>
                           @endcan

                           @can('city-list')


                            <li><a><i class="fa fa-edit"></i> {{trans('backend.cities')}} <span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                            <li><a href="{{route('cities.index')}}">{{trans('backend.cities')}} </a></li>
                            @can('city-create')

                            <li><a href="{{route('cities.create')}}">{{trans('backend.create')}} </a></li>

                          </ul>
                               @endcan

                           </li>
                           @endcan

                       @can('role-list')

                               <li><a><i class="fa fa-edit"></i> {{trans('backend.roles')}} <span class="fa fa-chevron-down"></span></a>
                                   <ul class="nav child_menu">
                                       <li><a href="{{route('roles.index')}}">{{trans('backend.roles')}} </a></li>


                                   </ul>
                               </li>
                           @endcan
                           @can('send-message')

                           <li><a><i class="fa fa-edit"></i> {{trans('backend.send_message')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('send_message_view')}}">{{trans('backend.send_message')}} </a></li>


                        </ul>
                    </li>
                           @endcan
                           @can('admin-message')

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.contact_admin')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('contact_admin.index')}}">{{trans('backend.contact_admin')}} </a></li>


                        </ul>
                    </li>
                           @endcan
                           @can('holiday-list')

                    <li><a href="{{route('holidays.index')}}"><i class="fa fa-edit"></i> {{trans('backend.day')}} <span class="fa fa-chevron-down"></span></a>

                    </li>
                           @endcan
                           @can('setting')


                           <li><a><i class="fa fa-edit"></i> {{trans('backend.get_settings')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('get_settings')}}">{{trans('backend.get_settingsr_controller')}} </a></li>


                                            </ul>
                                        </li>
                           @endcan



                                        {{---
                                        <li><a><i class="fa fa-edit"></i> {{trans('backend.coupons')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('coupons.index')}}">{{trans('backend.coupons')}} </a></li>

                                                <li><a href="{{route('coupons.create')}}">{{trans('backend.create')}} </a></li>

                                            </ul>
                                        </li>
                    --}}
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">

            <a data-toggle="tooltip" data-placement="top" title="{{trans('backend.full')}}" onclick="toggleFullScreen();">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="{{trans('backend.close')}}" class="lock_btn">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="{{trans('backend.logout')}}" href="{{ route('logout') }}"     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
