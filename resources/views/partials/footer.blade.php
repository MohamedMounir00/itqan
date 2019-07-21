

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin:: Global Mandatory Vendors -->
<script src="{{asset('assets/vendors/general/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('assets/vendors/general/popper.js/dist/umd/popper.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/js-cookie/src/js.cookie.js')}}"></script>
<script src="{{asset('assets/vendors/general/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/vendors/general/sticky-js/dist/sticky.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/wnumb/wNumb.js')}}"></script>
<script src="{{asset('assets/lightbox.js')}}"></script>
<script>
        lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true
        })
    </script>



<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
{{-- <script src="{{asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-switch/init.js')}}"></script>
<script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}"></script>
<script src="{{asset('assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}"></script>
<script src="{{asset('assets/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/vendors/general/handlebars/dist/handlebars.js')}}"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}"></script>
<script src="{{asset('assets/vendors/general/nouislider/distribute/nouislider.js')}}"></script>
<script src="{{asset('assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}"></script>
<script src="{{asset('assets/vendors/general/autosize/dist/autosize.js')}}"></script>
<script src="{{asset('assets/vendors/general/clipboard/dist/clipboard.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/dropzone/dist/dropzone.js')}}"></script>
<script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/vendors/general/markdown/lib/markdown.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-markdown/init.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-notify/init.js')}}"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/additional-methods.js')}}"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/jquery-validation/init.js')}}"></script>
<script src="{{asset('assets/vendors/general/toastr/build/toastr.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/raphael/raphael.js')}}"></script>
<script src="{{asset('assets/vendors/general/morris.js/morris.js')}}"></script>
<script src="{{asset('assets/vendors/general/chart.js/dist/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}"></script>
<script src="{{asset('assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/waypoints/lib/jquery.waypoints.js')}}"></script>
<script src="{{asset('assets/vendors/general/counterup/jquery.counterup.js')}}"></script>
<script src="{{asset('assets/vendors/general/es6-promise-polyfill/promise.min.js')}}"></script>
<script src="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/sweetalert2/init.js')}}"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/lib.js')}}"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/jquery.input.js')}}"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/repeater.js')}}"></script>
<script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}"></script> --}}
<script src="{{asset('assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}"></script>
<script src="{{asset('vendors')}}/moment/min/moment.min.js"></script>
<script src="{{asset('vendors')}}/select2/dist/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/app/custom/general/crud/datatables/advanced/column-rendering.js')}}"></script>
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    
    <script>
    
            $(document).on('click','#notify',function(e){
            var notify_id = $(this).attr("num");
            $.post("{{route('seen')}}",{id:notify_id},function(data){
    
            });
        });
    </script>


<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('assets/vendors/custom/gmaps/gmaps.js')}}"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>


<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('assets/app/custom/general/dashboard.js')}}"></script>

<!--end::Page Scripts -->

<!--begin::Global App Bundle(used by all pages) -->
<script src="{{asset('assets/app/bundle/app.bundle.js')}}"></script>


<script src="{{asset('js')}}/swetalert.js"></script>
<script></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>

    $(document).on('click','#notify',function(e){
        var notify_id = $(this).attr("num");
        $.post("{{route('seen')}}",{id:notify_id},function(data){

        });
    });
</script>



@include('sweet::alert')



























{{-- <!-- footer content -->
<footer class="hidden-print">
    <div class="pull-left">
      {{trans('backend.footer')}}
    </div>
    <div class="clearfix"></div>
</footer> --}}






{{-- <!-- /footer content -->
</div>
</div>
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div>

<!-- jQuery -->
<script src="{{asset('vendors')}}/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('vendors')}}/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<!-- NProgress -->
<!-- bootstrap-progressbar -->
<!-- iCheck -->

<!-- bootstrap-daterangepicker -->
<script src="{{asset('vendors')}}/moment/min/moment.min.js"></script>

<script src="{{asset('vendors')}}/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{asset('vendors')}}/select2/dist/js/select2.full.min.js"></script>
<script src="{{asset('vendors')}}/validator/validator.js"></script>

<!-- Custom Theme Scripts -->
</script><script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>

<!-- Include this after the sweet alert js file -->

<!-- Chart.js -->
<!-- jQuery Sparklines -->
@if($lang == "ar")

<script src="{{asset('build')}}/js/custom.js"></script>
@else
    <script src="{{asset('build2')}}/js/custom.min.js"></script>
    @endif

   <script src="{{asset('js')}}/swetalert.js"></script>
<script></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>

        $(document).on('click','#notify',function(e){
        var notify_id = $(this).attr("num");
        $.post("{{route('seen')}}",{id:notify_id},function(data){

        });
    });
</script> --}}

@yield('scripts')

