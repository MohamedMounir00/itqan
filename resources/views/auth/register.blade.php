


<!DOCTYPE html>
@php  $lang = LaravelLocalization::getCurrentLocale();  @endphp



<html lang="{{ $lang }}" dir="{{ $lang == 'ar' ? 'rtl':'ltr' }}"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors')}}/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('vendors')}}/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build')}}/css/custom.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <a class="hiddenanchor" id="reset"></a>
    @include('partials.messages')

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <div id="rest_pass" class="animate form rest_pass_form">
            <section class="login_content">
                <!-- /password recovery -->
                <form action="index.html">
                    <h1>بازیابی رمز عبور</h1>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" placeholder="ایمیل" />
                        <div class="form-control-feedback">
                            <i class="fa fa-envelope-o text-muted"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default btn-block">بازیابی رمز عبور </button>
                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">جدید در سایت؟
                            <a href="#signup" class="to_register"> ایجاد حساب </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©1397 تمامی حقوق محفوظ. Gentelella Alela! یک قالب بوت استرپ 3. حریم خصوصی و شرایط</p>
                        </div>
                    </div>
                </form>
                <!-- Password recovery -->
            </section>
        </div>
    </div>
</div>
</body>
</html>
