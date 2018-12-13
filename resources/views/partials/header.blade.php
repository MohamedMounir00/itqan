



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="../build/images/favicon.ico" type="image/ico"/>
    <title>Gentelella Alela! | قالب مدیریت رایگان </title>

    <!-- Bootstrap -->

    @if($lang == "ar")
        <link href="{{asset('vendors')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{asset('vendors')}}/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
@else
        <link href="{{asset('vendors')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    @endif

        <!-- Font Awesome -->
    <link href="{{asset('vendors')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors')}}/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('vendors')}}/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vendors')}}/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('vendors')}}/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="{{asset('vendors')}}/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="{{asset('vendors')}}/starrr/dist/starrr.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    @if($lang == "ar")

    <link href="{{asset('build')}}/css/custom.min.css" rel="stylesheet">
    @else
        <link href="{{asset('build2')}}/css/custom.min.css" rel="stylesheet">
    @endif

    @yield('styles')
    <link href="{{asset('vendors')}}/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>
