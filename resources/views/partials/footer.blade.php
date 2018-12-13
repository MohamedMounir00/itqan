<!-- footer content -->
<footer class="hidden-print">
    <div class="pull-left">
        Gentelella - قالب پنل مدیریت بوت استرپ <a href="https://colorlib.com">Colorlib</a> | پارسی شده توسط <a
                href="https://morteza-karimi.ir">مرتضی کریمی</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
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
<script src="{{asset('vendors')}}/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{asset('vendors')}}/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('vendors')}}/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="{{asset('vendors')}}/iCheck/icheck.min.js"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{asset('vendors')}}/moment/min/moment.min.js"></script>

<script src="{{asset('vendors')}}/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{asset('vendors')}}/select2/dist/js/select2.full.min.js"></script>
<script src="{{asset('vendors')}}/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<script src="{{asset('vendors')}}/validator/validator.js"></script>

<!-- Custom Theme Scripts -->
</script><script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>

<!-- Include this after the sweet alert js file -->

<!-- Chart.js -->
<script src="{{asset('vendors')}}/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="{{asset('vendors')}}/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
@if($lang == "ar")

<script src="{{asset('build')}}/js/custom.js"></script>
@else
    <script src="{{asset('build2')}}/js/custom.min.js"></script>
    @endif

   <script src="{{asset('js')}}/swetalert.js"></script>
<script></script>

@include('sweet::alert')

@yield('scripts')

