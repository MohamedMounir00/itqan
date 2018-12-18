@extends('layouts.app')

@section('content')




            <div class="clearfix"></div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-bars"></i> تب‌های عمودی
                                <small>شناور به چپ</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">تنظیمات 1</a>
                                        </li>
                                        <li><a href="#">تنظیمات 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-xs-3">
                                <!-- required for floating -->
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-right">

                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)


                                        <li><a href="#{{ $properties['native'] }}" data-toggle="tab">تنظیمات</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-xs-9">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <div class="tab-pane" id="{{ $properties['native'] }}">
                                            <p >{{ $properties['native'] }}</p>


                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



@endsection

@section('scripts')



    <script>

        $('.dropify').dropify({
            tpl: {
                wrap:            '<div class="dropify-wrapper"></div>',
                loader:          '<div class="dropify-loader"></div>',
                message:         '<div class="dropify-message"><span class="file-icon" /> <p>  {{trans("backend.upload_image")}}  </p></div>',
                preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">delete</p></div></div></div>',
                filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton:     '<button type="button" class="dropify-clear">delete</button>',
                errorLine:       '<p class="dropify-error"> error</p>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });
    </script>


@endsection
