
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="index.html">
                <img alt="Logo" src="../assets/media/logos/logo-light.png" />
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                        </g>
                    </svg></span>
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                        </g>
                    </svg></span>
            </button>

            <!--
<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
-->
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">

        <div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">

            <ul class="kt-menu__nav " >
                <!-- Dashboard -->
                <li class="kt-menu__item " aria-haspopup="true">
                <a href="{{route('home')}}" class="kt-menu__link ">
                        <i class="kt-menu__link-icon flaticon-home"></i>
                        <span class="kt-menu__link-text">{{trans('backend.home')}}</span>
                    </a>
                </li>
               


                <!-- Admins -->
                @can('admin-list')
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-layers"></i>
                        <span class="kt-menu__link-text">{{trans('backend.admins_controller')}}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                               
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{route('admins.index')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">{{trans('backend.admins')}}</span>
                                </a>
                            </li>
                            @can('admin-create')
                            <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('admins.create')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                    </a>
                                </li>
                                @endcan

                        </ul>
                    </div>
                </li>
                @endcan











                <!-- Technicals -->
                @can('technical-list')
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-layers"></i>
                        <span class="kt-menu__link-text">{{trans('backend.technical_controller')}}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{route('technical.index')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">{{trans('backend.technical')}}</span>
                                </a>
                            </li>
                            @can('technical-create')
                            <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('technical.create')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                    </a>
                                </li>
                                @endcan

                        </ul>
                    </div>
                </li>
                @endcan










                <!-- order -->
                @can('order-list')


                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <i class="kt-menu__link-icon flaticon-layers"></i>
                            <span class="kt-menu__link-text">{{trans('backend.clients_controller')}}</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                               
                                <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('clients.index')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">{{trans('backend.clients')}}</span>
                                    </a>
                                </li>
                               
    
                            </ul>
                        </div>
                    </li>








                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-layers"></i>
                        <span class="kt-menu__link-text">{{trans('backend.orders')}}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                           
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{route('reschedules.index')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">{{trans('backend.reschedules_order')}}</span>
                                </a>
                            </li>



                            <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('order.index')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">{{trans('backend.all_order')}}</span>
                                    </a>
                                </li>









                                <li class="kt-menu__item " aria-haspopup="true">
                                        <a href="{{route('order.get_order_view')}}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text">{{trans('backend.order_view')}}</span>
                                        </a>
                                    </li>










                                    <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{route('order.get_finish_view')}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="kt-menu__link-text">{{trans('backend.finish_order')}}</span>
                                            </a>
                                        </li>







                                        <li class="kt-menu__item " aria-haspopup="true">
                                                <a href="{{route('order.get_warranty_view')}}" class="kt-menu__link ">
                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="kt-menu__link-text">{{trans('backend.warranty')}}</span>
                                                </a>
                                            </li>







                                            <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="{{route('order.get_consultation_view')}}" class="kt-menu__link ">
                                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="kt-menu__link-text">{{trans('backend.consultation_view')}}</span>
                                                    </a>
                                                </li>





                                                <li class="kt-menu__item " aria-haspopup="true">
                                                        <a href="{{route('order.get_delay_view')}}" class="kt-menu__link ">
                                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="kt-menu__link-text">{{trans('backend.delay_view')}}</span>
                                                        </a>
                                                    </li>




                                                    

                                                    <li class="kt-menu__item " aria-haspopup="true">
                                                            <a href="{{route('order.get_need_parts_view')}}" class="kt-menu__link ">
                                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="kt-menu__link-text">{{trans('backend.need_parts')}}</span>
                                                            </a>
                                                        </li>





                                                        <li class="kt-menu__item " aria-haspopup="true">
                                                                <a href="{{route('order.get_another_visit_works_view')}}" class="kt-menu__link ">
                                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="kt-menu__link-text">{{trans('backend.another_visit')}}</span>
                                                                </a>
                                                            </li>






                                                            <li class="kt-menu__item " aria-haspopup="true">
                                                                    <a href="{{route('order.get_view_project')}}" class="kt-menu__link ">
                                                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                                            <span></span>
                                                                        </i>
                                                                        <span class="kt-menu__link-text">{{trans('backend.get_order_project')}}</span>
                                                                    </a>
                                                                </li>

                      

                        </ul>
                    </div>
                </li>
                @endcan

















                <!-- category_order-list -->
                @can('category_order-list')
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-layers"></i>
                        <span class="kt-menu__link-text">{{trans('backend.categories')}}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{route('category.index')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">{{trans('backend.all_categories')}}</span>
                                </a>
                            </li>

                            @can('category_order-create')
                            <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('category.create')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                    </a>
                                </li>
                                @endcan

                        </ul>
                    </div>
                </li>
                @endcan




















                <!-- category_product-list -->
                @can('category_product-list')
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-layers"></i>
                        <span class="kt-menu__link-text">{{trans('backend.categoriesOfProduct')}}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{route('category_product.index')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">{{trans('backend.all_categories')}}</span>
                                </a>
                            </li>

                            @can('category_product-create')
                            <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('category_product.create')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                    </a>
                                </li>
                                @endcan

                        </ul>
                    </div>
                </li>
                @endcan














                <!-- product -->
                @can('product-list')
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-layers"></i>
                        <span class="kt-menu__link-text">{{trans('backend.product')}}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{route('product.index')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">{{trans('backend.product_all')}}</span>
                                </a>
                            </li>

                            @can('product-create')
                            <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('product.create')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                    </a>
                                </li>
                                @endcan

                        </ul>
                    </div>
                </li>
                @endcan















                <!-- currency -->
                @can('currency-list')
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-layers"></i>
                        <span class="kt-menu__link-text">{{trans('backend.currency')}}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{route('currency.index')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">{{trans('backend.currency_controller')}}</span>
                                </a>
                            </li>

                            @can('currency-create')
                            <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="{{route('currency.create')}}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                    </a>
                                </li>
                                @endcan

                        </ul>
                    </div>
                </li>
                @endcan















                 <!-- time -->
                 @can('time-list')
                 <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                     <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                         <i class="kt-menu__link-icon flaticon-layers"></i>
                         <span class="kt-menu__link-text">{{trans('backend.time_work')}}</span>
                         <i class="kt-menu__ver-arrow la la-angle-right"></i>
                     </a>
                     <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                         <ul class="kt-menu__subnav">
                             
                             <li class="kt-menu__item " aria-haspopup="true">
                                 <a href="{{route('time_work.index')}}" class="kt-menu__link ">
                                     <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                         <span></span>
                                     </i>
                                     <span class="kt-menu__link-text">{{trans('backend.time_controller')}}</span>
                                 </a>
                             </li>
 
                             @can('time-create')
                             <li class="kt-menu__item " aria-haspopup="true">
                                     <a href="{{route('time_work.create')}}" class="kt-menu__link ">
                                         <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                             <span></span>
                                         </i>
                                         <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                     </a>
                                 </li>
                                 @endcan
 
                         </ul>
                     </div>
                 </li>
                 @endcan




















                 <!-- ministry-list -->
                 @can('ministry-list')
                 <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                     <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                         <i class="kt-menu__link-icon flaticon-layers"></i>
                         <span class="kt-menu__link-text">{{trans('backend.ministries')}}</span>
                         <i class="kt-menu__ver-arrow la la-angle-right"></i>
                     </a>
                     <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                         <ul class="kt-menu__subnav">
                             
                             <li class="kt-menu__item " aria-haspopup="true">
                                 <a href="{{route('ministries.index')}}" class="kt-menu__link ">
                                     <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                         <span></span>
                                     </i>
                                     <span class="kt-menu__link-text">{{trans('backend.ministries')}}</span>
                                 </a>
                             </li>
 
                             @can('ministry-create')
                             <li class="kt-menu__item " aria-haspopup="true">
                                     <a href="{{route('ministries.create')}}" class="kt-menu__link ">
                                         <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                             <span></span>
                                         </i>
                                         <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                     </a>
                                 </li>
                                 @endcan
 
                         </ul>
                     </div>
                 </li>
                 @endcan




















                  <!-- company-list -->
                  @can('company-list')
                  <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                      <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                          <i class="kt-menu__link-icon flaticon-layers"></i>
                          <span class="kt-menu__link-text">{{trans('backend.companies')}}</span>
                          <i class="kt-menu__ver-arrow la la-angle-right"></i>
                      </a>
                      <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                          <ul class="kt-menu__subnav">
                              
                              <li class="kt-menu__item " aria-haspopup="true">
                                  <a href="{{route('companies.index')}}" class="kt-menu__link ">
                                      <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                          <span></span>
                                      </i>
                                      <span class="kt-menu__link-text">{{trans('backend.companies')}}</span>
                                  </a>
                              </li>
  
                              @can('company-create')
                              <li class="kt-menu__item " aria-haspopup="true">
                                      <a href="{{route('companies.create')}}" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                              <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                      </a>
                                  </li>
                                  @endcan
  
                          </ul>
                      </div>
                  </li>
                  @endcan


















                  <!-- country-list -->
                  @can('country-list')
                  <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                      <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                          <i class="kt-menu__link-icon flaticon-layers"></i>
                          <span class="kt-menu__link-text">{{trans('backend.nationalityl')}}</span>
                          <i class="kt-menu__ver-arrow la la-angle-right"></i>
                      </a>
                      <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                          <ul class="kt-menu__subnav">
                              
                              <li class="kt-menu__item " aria-haspopup="true">
                                  <a href="{{route('nationality.index')}}" class="kt-menu__link ">
                                      <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                          <span></span>
                                      </i>
                                      <span class="kt-menu__link-text">{{trans('backend.nationality')}}</span>
                                  </a>
                              </li>
  
                              @can('country-create')
                              <li class="kt-menu__item " aria-haspopup="true">
                                      <a href="{{route('nationality.create')}}" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                              <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                      </a>
                                  </li>
                                  @endcan
  
                          </ul>
                      </div>
                  </li>
                  @endcan















                  <!-- city-list -->
                  @can('city-list')
                  <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                      <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                          <i class="kt-menu__link-icon flaticon-layers"></i>
                          <span class="kt-menu__link-text">{{trans('backend.cities')}}</span>
                          <i class="kt-menu__ver-arrow la la-angle-right"></i>
                      </a>
                      <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                          <ul class="kt-menu__subnav">
                              
                              <li class="kt-menu__item " aria-haspopup="true">
                                  <a href="{{route('cities.index')}}" class="kt-menu__link ">
                                      <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                          <span></span>
                                      </i>
                                      <span class="kt-menu__link-text">{{trans('backend.cities')}}</span>
                                  </a>
                              </li>
  
                              @can('city-create')
                              <li class="kt-menu__item " aria-haspopup="true">
                                      <a href="{{route('cities.create')}}" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                              <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">{{trans('backend.create')}}</span>
                                      </a>
                                  </li>
                                  @endcan
  
                          </ul>
                      </div>
                  </li>
                  @endcan





















                  <!-- role-list -->
                  @can('role-list')
                  <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                      <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                          <i class="kt-menu__link-icon flaticon-layers"></i>
                          <span class="kt-menu__link-text">{{trans('backend.roles')}}</span>
                          <i class="kt-menu__ver-arrow la la-angle-right"></i>
                      </a>
                      <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                          <ul class="kt-menu__subnav">
                              
                              <li class="kt-menu__item " aria-haspopup="true">
                                  <a href="{{route('roles.index')}}" class="kt-menu__link ">
                                      <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                          <span></span>
                                      </i>
                                      <span class="kt-menu__link-text">{{trans('backend.roles')}}</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  @endcan














                  
                  <!-- send-message -->
                  @can('send-message')
                  <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                      <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                          <i class="kt-menu__link-icon flaticon-layers"></i>
                          <span class="kt-menu__link-text">{{trans('backend.send_message')}}</span>
                          <i class="kt-menu__ver-arrow la la-angle-right"></i>
                      </a>
                      <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                          <ul class="kt-menu__subnav">
                              
                              <li class="kt-menu__item " aria-haspopup="true">
                                  <a href="{{route('send_message_view')}}" class="kt-menu__link ">
                                      <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                          <span></span>
                                      </i>
                                      <span class="kt-menu__link-text">{{trans('backend.send_message')}}</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  @endcan















                  <!-- admin-message -->
                  @can('admin-message')
                  <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                      <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                          <i class="kt-menu__link-icon flaticon-layers"></i>
                          <span class="kt-menu__link-text">{{trans('backend.contact_admin')}}</span>
                          <i class="kt-menu__ver-arrow la la-angle-right"></i>
                      </a>
                      <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                          <ul class="kt-menu__subnav">
                              
                              <li class="kt-menu__item " aria-haspopup="true">
                                  <a href="{{route('contact_admin.index')}}" class="kt-menu__link ">
                                      <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                          <span></span>
                                      </i>
                                      <span class="kt-menu__link-text">{{trans('backend.contact_admin')}}</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  @endcan














                      <!-- holiday-list -->
                      @can('holiday-list')
                      <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                              <i class="kt-menu__link-icon flaticon-layers"></i>
                              <span class="kt-menu__link-text">{{trans('backend.day')}}</span>
                              <i class="kt-menu__ver-arrow la la-angle-right"></i>
                          </a>
                          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                              <ul class="kt-menu__subnav">
                                  
                                  <li class="kt-menu__item " aria-haspopup="true">
                                      <a href="{{route('holidays.index')}}" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                              <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">{{trans('backend.day')}}</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      @endcan













                      <!-- setting -->
                      @can('setting')
                      <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                          <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                              <i class="kt-menu__link-icon flaticon-layers"></i>
                              <span class="kt-menu__link-text">{{trans('backend.get_settings')}}</span>
                              <i class="kt-menu__ver-arrow la la-angle-right"></i>
                          </a>
                          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                              <ul class="kt-menu__subnav">
                                  
                                  <li class="kt-menu__item " aria-haspopup="true">
                                      <a href="{{route('get_settings')}}" class="kt-menu__link ">
                                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                              <span></span>
                                          </i>
                                          <span class="kt-menu__link-text">{{trans('backend.get_settingsr_controller')}}</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      @endcan     
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>















































{{-- 

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


                           <li>
                               <a>
                                   <i class="fa fa-edit"></i> 
                                   {{trans('backend.clients_controller')}}
                                    <span class="fa fa-chevron-down"></span>
                                </a>

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

                    <li>
                        <a href="{{route('holidays.index')}}">
                            <i class="fa fa-edit"></i> {{trans('backend.day')}} <span class="fa fa-chevron-down"></span></a>

                    </li>
                           @endcan















                           @can('setting')


                           <li><a><i class="fa fa-edit"></i> {{trans('backend.get_settings')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('get_settings')}}">{{trans('backend.get_settingsr_controller')}} </a></li>


                                            </ul>
                                        </li>
                           @endcan



                                        <li><a><i class="fa fa-edit"></i> {{trans('backend.coupons')}} <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('coupons.index')}}">{{trans('backend.coupons')}} </a></li>

                                                <li><a href="{{route('coupons.create')}}">{{trans('backend.create')}} </a></li>

                                            </ul>
                                        </li>
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
 --}}
