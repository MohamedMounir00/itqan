<div class="row">
        <div class="col-sm-12 col-lg-12">

                {{-- <div class="row">
                    <div class="col-md-6">
                            <div class="mySection">
                                    <h2 style="font-size: 25px;">الطلب</h2>
                                    <p style="font-size: 16px;">محمد وجدي </p>
                                    <a  href=""><span  class="btn btn-brand btn-success btn-pill"></span></a>
                                    <a href=""><span  class="btn btn-brand btn-danger btn-pill"></span></a>           
                                     </div>
                    </div>
                    <div class="col-md-6">
                            <div class="mySection">
                                    <h2 style="font-size: 25px;">الطلب</h2>
                                    <p style="font-size: 16px;">محمد وجدي </p>
                                    <a  href=""><span  class="btn btn-brand btn-success btn-pill"></span></a>
                                    <a href=""><span  class="btn btn-brand btn-danger btn-pill"></span></a>           
                                     </div>
                    </div>
                </div>
    
                <div class="col-sm-12">
                        <h3 class="prod_title"> {{trans('backend.category')}}  {{trans('api.repairing').unserialize($order->category->main->name) [$lang]}}</h3>
                </div> --}}
                <div class="kt-widget17">
                        <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #5d78ff">
                            <div class="kt-widget17__chart" style="height:0px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            </div>
                        </div>
                        <div class="kt-widget17__stats">
    
    
    
    
    
                            <div class="kt-widget17__items">
    
                                <div class="kt-widget17__item">
                                    <span class="kt-widget17__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000"></path>
                    <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                </g>
            </svg>						</span> 
                                    <span class="kt-widget17__subtitle">
                                            {{trans('backend.category')}}
                                    </span> 
                                    <span class="kt-widget17__desc">
                                            {{trans('api.repairing').unserialize($order->category->main->name) [$lang]}}
                                    </span>  
                                </div>
            
    
    
    
    
    
    
    
    
                                <div class="kt-widget17__item">
                                    <span class="kt-widget17__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                </g>
            </svg>						</span>  
                                    <span class="kt-widget17__subtitle">
                                       {{trans('backend.desc')}}
                                    </span> 
                                    <span class="kt-widget17__desc">
                                            {{$order->desc}}
                                    </span>  
                                </div>
                                
                                

                                <div class="kt-widget17__item">
                                        <span class="kt-widget17__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000"></path>
                        <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                    </g>
                </svg>						</span> 
                                        <span class="kt-widget17__subtitle">
                                                {{trans('backend.type_order')}}
                                        </span> 
                                        <span class="kt-widget17__desc">
                                                @if($order->type=='fixing')
                                                    {{trans('backend.fixing')}}
                                                @else
                                                    {{trans('backend.project')}}
                                                @endif
                                        </span>  
                                    </div>






                                    
                                    <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg>						</span>  
                                            <span class="kt-widget17__subtitle">
                                                    {{trans('backend.status')}}
                                            </span> 
                                            <span class="kt-widget17__desc">
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
                                            </span>  
                                        </div>
                            </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                                
                            <div class="kt-widget17__items">
    
    
                                    <div class="kt-widget17__item">
                                        <span class="kt-widget17__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000"></path>
                        <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                    </g>
                </svg>						</span> 
                                        <span class="kt-widget17__subtitle">
                                                {{trans('backend.date')}}
                                        </span> 
                                        <span class="kt-widget17__desc">
                                                {{$order->created_at}}
                                        </span>  
                                    </div>
                
        
        
        
        
        
        
        
        
                                    <div class="kt-widget17__item">
                                        <span class="kt-widget17__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                    </g>
                </svg>						</span>  
                                        <span class="kt-widget17__subtitle">
                                                {{trans('backend.date_work')}}
                                        </span> 
                                        <span class="kt-widget17__desc">
                                                {{$order->date}}
                                        </span>  
                                    </div>
                                    
                                    







                                    <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000"></path>
                                                        <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                                    </g>
                                                </svg>					
                                            	</span> 
                                            <span class="kt-widget17__subtitle">
                                                    {{trans('backend.time_work')}}
                                            </span> 
                                            <span class="kt-widget17__desc">
                                                    @if($order->time_id!=10)
                                        
                                                        @if ($order->timing =='am')
                                                            <span> {{trans('api.from',[],$lang).$order->time->from .trans('api.to',[],$lang).$order->time->to .'-'.trans('api.am',[],$lang)}}</span>
                                        
                                                        @else
                                                            <span> {{trans('api.from',[],$lang).$order->time->from .trans('api.to',[],$lang).$order->time->to .'-'.trans('api.pm',[],$lang)}}</span>
                                                        @endif
                                                        @else
                                                            <span>لم يتم تحديد وقت بعد</span>
                                                    @endif
                                            </span>  
                                        </div>




            
                                        @if($coupon)
            
                                        <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg>						</span>  
                                            <span class="kt-widget17__subtitle">
                                                    تاريخ انتهاء الضمان
                                            </span> 
                                            <span class="kt-widget17__desc">
                                                    {{$coupon->expires_at}}
                                            </span>  
                                        </div>	
                                        @endif
                                </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                                    
    
                                <div class="kt-widget17__items">
    
    
                                        <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg>						</span> 
                                            <span class="kt-widget17__subtitle">
                                                    {{trans('backend.client')}}
                                            </span> 
                                            <span class="kt-widget17__desc">
    
                                                         <a href="{{ route('clients.show', $order->user_id)}}"> <span>{{$order->user->name}}</span></a>
                                                         <br>
                                                                    
                                                        <span>{{$order->user->email}}</span>
                                                        <br>
                                                                   
                                                        <span>{{$order->user->phone}}</span>
                                            </span>  
                                        </div>
                    
            
            
            
            
            
            
            
                                        <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect id="bound" x="0" y="0" width="24" height="24"/>
                                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3"/>
                                                        <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3"/>
                                                        <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg>					</span>  
                                            <span class="kt-widget17__subtitle">
                                                    {{trans('backend.technical_order')}}
                                            </span> 
                                            <span class="kt-widget17__desc">
                                                    @if($order->technical_id==null)
                                    
                                                        <span>{{trans('backend.technical_no')}}</span>
                                                    @else
                                    
                                                  <a href="{{route('technical.show', $order->technical_id)}}"> <span>{{$order->technical->name}}</span></a>
                                                
                                                    <span>{{$order->technical->email}}</span>
                                               
                                                    <span>{{$order->technical->phone}}</span>
                                    
                                              @endif
                                            </span>  
                                        </div>
                                        
                                        





                                        <div class="kt-widget17__item">
                                                <span class="kt-widget17__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                                            <rect id="Rectangle" fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
                                                            <rect id="Rectangle-Copy-3" fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
                                                            <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" id="Combined-Shape" fill="#000000"/>
                                                        </g>
                                                    </svg>						</span> 
                                                <span class="kt-widget17__subtitle">
                                                        {{$total_price}}
                                                </span> 
                                                <span class="kt-widget17__desc">
        
                                                        {{unserialize($order->category->currency->name)[$lang]}}
                                                </span>  
                                            </div>



                                            <div class="kt-widget17__item">
                                                    <span class="kt-widget17__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect id="bound" x="0" y="0" width="24" height="24"/>
                                                                <path d="M17,2 L19,2 C20.6568542,2 22,3.34314575 22,5 L22,19 C22,20.6568542 20.6568542,22 19,22 L17,22 L17,2 Z" id="Rectangle-161-Copy" fill="#000000" opacity="0.3"/>
                                                                <path d="M4,2 L16,2 C17.6568542,2 19,3.34314575 19,5 L19,19 C19,20.6568542 17.6568542,22 16,22 L4,22 C3.44771525,22 3,21.5522847 3,21 L3,3 C3,2.44771525 3.44771525,2 4,2 Z M11.1176481,13.709585 C10.6725287,14.1547043 9.99251947,14.2650547 9.42948307,13.9835365 C8.86644666,13.7020183 8.18643739,13.8123686 7.74131803,14.2574879 L6.2303083,15.7684977 C6.17542087,15.8233851 6.13406645,15.8902979 6.10952004,15.9639372 C6.02219616,16.2259088 6.16377615,16.5090688 6.42574781,16.5963927 L7.77956724,17.0476658 C9.07965249,17.4810276 10.5130001,17.1426601 11.4820264,16.1736338 L15.4812434,12.1744168 C16.3714821,11.2841781 16.5921828,9.92415954 16.0291464,8.79808673 L15.3965752,7.53294436 C15.3725414,7.48487691 15.3409156,7.44099843 15.302915,7.40299777 C15.1076528,7.20773562 14.7910703,7.20773562 14.5958082,7.40299777 L13.0032662,8.99553978 C12.5581468,9.44065914 12.4477965,10.1206684 12.7293147,10.6837048 C13.0108329,11.2467412 12.9004826,11.9267505 12.4553632,12.3718698 L11.1176481,13.709585 Z" id="Combined-Shape" fill="#000000"/>
                                                            </g>
                                                        </svg>						</span>  
                                                    <span class="kt-widget17__subtitle">
                                                            {{trans('backend.address')}}
                                                    </span> 
                                                    <span class="kt-widget17__desc">
                                                            {{$order->address->address}}
                                                    </span>  
                                                </div>

                                    </div>
                                    <br>
                                    <br>
    
    
                                    <div id="map" style="width: 100%; height: 300px;"></div>
    
                                    <br>
                                    <br>
    
    
                                     
    
    
    
                        </div>
                    </div>
        </div>
    <div class="col-sm-12 ">
        
        <h3 class="order-title"> {{trans('backend.photo_order')}}</h3>

        <div class="product_gallery">
            <div class="row">
            @foreach($order->storge as $item)
            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-2">
                    <div class="itemm text-center">
                            <a data-lightbox="roadtrip" href="{{url($item->path.'/'.'thumbnail'.'-'.$item->name.'.'.$item->extention)}}">
                                    <img style="
                                    width: 100%;
                                    height: 145px;
                                    border: 1px solid #DDD;
                                    " src="{{url($item->path.'/'.'thumbnail'.'-'.$item->name.'.'.$item->extention)}}"
                                         alt="..."/>
                                </a>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
        <h3 class="order-title">{{trans('backend.product')}}</h3>
        <div class="product_gallery">

            <div class="row">
                    @foreach($order->proudect as $item)
                <div class="col-sm-6 col-md-4 col-lg-6 col-xl-2">
                        <div class="itemm text-center">
                            <a href="{{url($item->image)}}" data-lightbox="roadtrip"  style="width: 100%;display: inline-flex;" class="">
                                <img src="{{url($item->image)}}" alt="..." style="
                                width: 100%;
                                height: 140px;
                                border: 1px solid #DDD;
                                "/>
                            </a>

                            <span class="btn btn-bold btn-sm" style="background-color: #212529;color:#FFF;width: 100%;
                                display: inline-block;margin:5px 0 5px 0;">{{unserialize($item->name)[$lang]}}
                            </span>


                            
                            <span class="btn btn-bold btn-sm text-center" style="background-color: #078b64;color:#FFF;width: 50%; display: inline;">
                                
                                {{'   '.trans('backend.amount')}} ( {{$item->pivot->amount}} )
                                
                            </span>

                         
                            <a href="{{route('product.show', $item->id)}}" class="btn btn-bold btn-sm text-center" style="background-color: #5d78ff;color:#FFF;width:65px;
                                   margin:5px 2px 5px 2px;font-size: 11px;"> عـرض</a>
                        </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>


    

</div>



{{-- 

<div class="row">
    
        <div class="col-sm-12">
                <h3 class="prod_title"> {{trans('backend.category')}}  {{trans('api.repairing').unserialize($order->category->main->name) [$lang]}}</h3>
        </div>
</div> --}}































{{-- 






<div class="col-md-4 col-sm-4 col-xs-12">
    <h3> {{trans('backend.product')}}</h3>
    <div class="product_gallery">
        @foreach($order->proudect as $item)


            <a href="{{route('product.show', $item->id)}}">
                {{unserialize($item->name)[$lang]}}
                {{'   '.trans('backend.amount')}}
                {{$item->pivot->amount}}

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

    <h3 class="prod_title"> {{trans('backend.category')}}  {{trans('api.repairing').unserialize($order->category->main->name) [$lang]}}</h3>

    <p>
        {{$order->desc}}
    </p>









    <br/>
<br>













    <h3>        {{trans('backend.type_order')}}
    </h3>
    @if($order->type=='fixing')
        {{trans('backend.fixing')}}
    @else
        {{trans('backend.project')}}
    @endif




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
                <span> {{$order->created_at}}</span>
            </li>

        </ul>
    </div>
    <br/>

    <div class="">
        <h2>
            {{trans('backend.date_work')}}
        </h2>
        <ul class="list-inline prod_size">
            <li>
                <span> {{$order->date}}</span>
            </li>

        </ul>
    </div>
    <br/>










    <div class="">
        <h2>
            {{trans('backend.time_work')}}
        </h2>
        <ul class="list-inline prod_size">
            @if($order->time_id!=10)
            <li>

                @if ($order->timing =='am')
                    <span> {{trans('api.from',[],$lang).$order->time->from .trans('api.to',[],$lang).$order->time->to .'-'.trans('api.am',[],$lang)}}</span>

                @else
                    <span> {{trans('api.from',[],$lang).$order->time->from .trans('api.to',[],$lang).$order->time->to .'-'.trans('api.pm',[],$lang)}}</span>
                @endif
            </li>
                @else
                <li>
                    <span>لم يتم تحديد وقت بعد</span>
                </li>
            @endif

        </ul>

    </div>
    <br/>



    @if($coupon)
        <div class="">


            <h2>
                تاريخ انتهاء الضمان
            </h2>
            <ul class="list-inline prod_size">
                <li>
                    <span> {{$coupon->expires_at}}</span>
                </li>

            </ul>
        </div>
        <br/>
    @endif










<br>
    <div class="row">

        <ul class="list-inline prod_size pull-right">

            <h2>
                {{trans('backend.client')}}
            </h2>
            <li>

    <a href="{{ route('clients.show', $order->user_id)}}"> <span>{{$order->user->name}}</span></a>
            </li>
            <br>
            <li>
<span>{{$order->user->email}}</span>
            </li>
            <br>
            <li>
<span>{{$order->user->phone}}</span>
            </li>

        </ul>






































        <ul class="list-inline prod_size pull-left">

            <h2>
                {{trans('backend.technical_order')}}
            </h2>
            @if($order->technical_id==null)
                <li>

                    <span>{{trans('backend.technical_no')}}</span>
                </li>
                @else
            <li>

              <a href="{{route('technical.show', $order->technical_id)}}"> <span>{{$order->technical->name}}</span></a>
            </li>
            <br>
            <li>
                <span>{{$order->technical->email}}</span>
            </li>
            <br>
            <li>
                <span>{{$order->technical->phone}}</span>

            </li>
          @endif
        </ul>
    </div>























    <div class="">
        <div class="product_price">
            <h1 class="price">{{$total_price}} {{unserialize($order->category->currency->name)[$lang]}}</h1>
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
 --}}
