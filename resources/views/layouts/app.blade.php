<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/assets/img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('public/assets/img/es.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Protesta</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <!--  Social tags      -->

    <!-- Schema.org markup for Google+ -->

    <!-- Twitter Card data -->

    <!-- Open Graph data -->
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('public/assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('public/assets/css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="{{asset('public/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{asset('public/assets/css/google-roboto-300-700.css') }}" rel="stylesheet" />
</head>
<body>









                  @guest
                  <nav class="navbar navbar-primary navbar-transparent navbar-absolute">



                      <div class="container">
                          <div class="navbar-header">

                              <a class="navbar-brand" href="login" >
                                <h3 class="col-xs-6 col-sm-6 col-md-9 col-lg-10 ">
                                   Comisión Estatal De Mejora Regulatoria</h3>
                                  <h5 class="col-xs-12 col-sm-12 col-md-9 col-lg-6 ">Protesta Ciudadana</h5>
                                   </a>
                          </div>



                  <div class="collapse navbar-collapse">
                      <ul class="nav navbar-nav navbar-right">

                          <li class="">
                              <a href="{{ route('register') }}">
                                  <i class="material-icons">person_add</i> Registro
                              </a>
                          </li>
                          <li class=" active ">
                              <a href="{{ route('login') }}">
                                  <i class="material-icons">fingerprint</i> Inicio
                              </a>
                          </li>

                      </ul>
                  </div>
                  </div>
                  </nav>







                   </div>





                  </div>
                  @yield('content')

                  @else


        @include('submenus')
        @endguest








    <!-- Scripts -->

</body>



<!--   Core JS Files   -->
<script src="{{asset('public/assets/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/material.min.js') }}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('public/assets/js/jquery.validate.min.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('public/assets/js/moment.min.js') }}"></script>
<!--  Charts Plugin -->
<script src="{{asset('public/assets/js/chartist.min.js') }}"></script>
<!--  Plugin for the Wizard -->
<script src="{{asset('public/assets/js/jquery.bootstrap-wizard.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('public/assets/js/bootstrap-notify.js') }}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('public/assets/js/jquery.sharrre.js') }}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{asset('public/assets/js/bootstrap-datetimepicker.js') }}"></script>
<!-- Vector Map plugin -->
<script src="{{asset('public/assets/js/jquery-jvectormap.js') }}"></script>
<!-- Sliders Plugin -->
<script src="{{asset('public/assets/js/nouislider.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="{{asset('public/assets/js/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{asset('public/assets/js/jquery.datatables.js') }}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{asset('public/assets/js/sweetalert2.js') }}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('public/assets/js/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{asset('public/assets/js/fullcalendar.min.js') }}"></script>
<!-- TagsInput Plugin -->
<script src="{{asset('public/assets/js/jquery.tagsinput.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('public/assets/js/material-dashboard.js') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('public/assets/js/demo.js') }}"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

<script type="text/javascript">
    $().ready(function() {
        demo.initMaterialWizard();
    });
</script>
@yield('js')
</html>
