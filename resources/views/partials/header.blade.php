



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{trans('backend.title')}}</title>

  <!-- Font Awesome -->
  <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">





    <!-- Bootstrap -->

    @if($lang == "ar")
    <link rel="stylesheet" href="{{asset('assets/demo/default/base/style.bundle.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/custome-rtl.css')}}">

    @else
    
    <link rel="stylesheet" href="{{asset('assets/demo/default/base/style.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/custome.css')}}">

    @endif












<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->

		<!--begin:: Global Mandatory Vendors -->
    <link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
        {{-- <link rel="stylesheet" href="{{asset('assets/vendors/general/tether/dist/css/tether.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/nouislider/distribute/nouislider.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/dropzone/dist/dropzone.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/summernote/dist/summernote.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/animate.css/animate.css')}}"> --}}

        <link rel="stylesheet" href="{{asset('assets/vendors/general/toastr/build/toastr.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/morris.js/morris.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/general/socicon/css/socicon.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('assets/lightbox.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendors/custom/vendors/fontawesome5/css/all.min.css')}}">
        <link href="{{asset('vendors')}}/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="{{asset('vendors')}}/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link href="{{asset('vendors')}}/select2/dist/css/select2.min.css" rel="stylesheet">


		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
       

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
        <link rel="stylesheet" href="{{asset('assets/demo/default/skins/header/base/light.css')}}">
        <link rel="stylesheet" href="{{asset('assets/demo/default/skins/header/menu/light.css')}}">
        <link rel="stylesheet" href="{{asset('assets/demo/default/skins/brand/dark.css')}}">
        <link rel="stylesheet" href="{{asset('assets/demo/default/skins/aside/dark.css')}}">

		<!--end::Layout Skins -->
        <link rel="stylesheet" href="{{asset('assets/media/logos/favicon.ico')}}">
        

































{{--   



    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('vendors')}}/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="{{asset('vendors')}}/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- starrr -->

    <!-- Custom Theme Style -->
    @if($lang == "ar")
        <style>
            .product_gallery {
                float: right;
            }
        </style>
    <link href="{{asset('build')}}/css/custom1.css" rel="stylesheet">
    @else
        <link href="{{asset('build2')}}/css/custom.min.css" rel="stylesheet">
    @endif

    @yield('styles')
    <link href="{{asset('vendors')}}/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"> --}}
</head>
