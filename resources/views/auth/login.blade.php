<!DOCTYPE html>
@php  $lang = LaravelLocalization::getCurrentLocale();  @endphp



<html lang="{{ $lang }}" dir="{{ $lang == 'ar' ? 'rtl':'ltr' }}"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

    <title>اتقان </title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->

<link href="{{asset('assets/app/custom/login/login-v4.default.css')}}" rel="stylesheet" type="text/css" />


    <!-- Custom Theme Style -->
    {{-- <link href="{{asset('build')}}/css/custom1.css" rel="stylesheet"> --}}
</head>
{{-- @include('partials.messages') --}}
@include('partials.header')
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(../assets/media/bg/bg-2.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="#">
									<img src="../assets/media/logos/logo-5.png">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 style="    font-weight: 700;
                                    font-size: 25px;
                                    color: #FFF;" class="kt-login__title">   لوحة تحكم إتقان</h3>
								</div>
                                <form class="kt-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                        @csrf  
                                    <!-- Email -->
									<div class="input-group">
										<input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email"  autocomplete="off">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                    

                                    <!-- Password -->
									<div class="input-group">
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
                                    </div>
                                    

                                    <div class="col kt-align-right">


                                            <a style="color:#a7abc3" class="btn btn-link" href="{{ route('password.request') }}">
                                              استرجاع كلمه المرور ؟
                                            </a>
                                        </div>
                                
                                    

									<div class="kt-login__actions">
										<button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign In</button>
									</div>
								</form>
							</div>
						
					
						</div>
					</div>
				</div>
			</div>
        </div>
        

    <script src="{{asset('assets/app/custom/login/login-general.js')}}" type="text/javascript"></script>
    @include('partials.footer')
	</body>

	<!-- end::Body -->

</html>
    {{-- <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf                    <h1>تسجيل دخول</h1>
                    <div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>



                    <div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                         تسجيل دخول
                        </button>


                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">


                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <p>جميع الحقوق محفوظه 2018</p>
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">


                            <a class="btn btn-link" href="{{ route('password.request') }}">
                              استرجاع كلمه المرور ؟
                            </a>
                        </div>
                </form>
            </section>
        </div>


    </div> --}}