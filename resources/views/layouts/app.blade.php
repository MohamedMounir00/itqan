
<!DOCTYPE html>
@php  $lang = LaravelLocalization::getCurrentLocale();  @endphp



<html lang="{{ $lang }}" dir="{{ $lang == 'ar' ? 'rtl':'ltr' }}">





@include('partials.header')

<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
    @include('partials.sidbar')

    <!-- top navigation -->
        <!-- /top navigation -->
        <!-- /header content -->
    @include('partials.nav')

    <!-- page content -->
        <div class="right_col" role="main">
            <div class="col-md-12 col-sm-12 col-xs-12">

            @include('partials.messages')


                <!-- Yielding main content -->
                @yield('content')
            </div>
        </div>
        <!-- /page content -->

@include('partials.footer')

    </div>
</div>
</body>
</html>
