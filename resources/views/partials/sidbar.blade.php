<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>
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

            <div class="profile_info">
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">

                    <li><a><i class="fa fa-edit"></i> الطلبات <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{route('project.index')}}"> الطلبات</a></li>

                        </ul>
                    </li>


                    <li><a><i class="fa fa-edit"></i> {{trans('backend.categories')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('category.index')}}">{{trans('backend.all_categories')}} </a></li>

                                <li><a href="{{route('category.create')}}">{{trans('backend.create')}} </a></li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.categoriesOfProduct')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('category_product.index')}}">{{trans('backend.all_categories')}} </a></li>

                            <li><a href="{{route('category_product.create')}}">{{trans('backend.create')}} </a></li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.product')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('product.index')}}">{{trans('backend.product_all')}} </a></li>

                            <li><a href="{{route('product.create')}}">{{trans('backend.create')}} </a></li>

                        </ul>
                    </li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="خروج" href="{{ route('logout') }}"     onclick="event.preventDefault();
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
