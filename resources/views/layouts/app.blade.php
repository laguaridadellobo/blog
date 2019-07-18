<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" />
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
    <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="{{asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/css/google-roboto-300-700.css') }}" rel="stylesheet" />
</head>
<body>


        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">




                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/login') }}">
                        <img src="{{asset('assets/img/escudo.png')}}" alt="">
                    </a>
                </div>
                  @guest







                  <div class="row">
                     <div class="collapse navbar-collapse">
                       <ul class="nav navbar-nav navbar-right">

                           <div class="dropdown">
                               <button href="#pablo" class="dropdown-toggle btn btn-default  btn-round btn-block " data-toggle="dropdown">Inicio
                                   <b class="caret"></b>
                               </button>
                               <ul class="dropdown-menu dropdown-menu-left">
                                   <li>
                                       <a href="{{ route('login') }}">Iniciar Sesión</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('register') }}">Registro</a>
                                   </li>

                               </ul>
                           </div>
                             </div>
                               </ul>
                       </div>


                   </div>





                  </div>
                  @yield('content')

                  @else


                  <div class="row">
                    <div class="collapse navbar-collapse">
                      <ul class="nav navbar-nav navbar-right">

                          <div class="dropdown">
                              <button href="#pablo" class="dropdown-toggle btn btn-default btn-round btn-block " data-toggle="dropdown">  {{ Auth::user()->name }}
                                  <b class="caret"></b>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-left">
                                  <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                                   Salir
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>


                              </ul>
                          </div>
                            </div>
                              </ul>
                      </div>


                    </ul>
                </div>

            </div>

        </nav>


        @include('submenus')
        @endguest






    <!-- Scripts -->

</body>

<!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('assets/js/jquery.validate.min.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('assets/js/moment.min.js') }}"></script>
<!--  Charts Plugin -->
<script src="{{asset('assets/js/chartist.min.js') }}"></script>
<!--  Plugin for the Wizard -->
<script src="{{asset('assets/js/jquery.bootstrap-wizard.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/bootstrap-notify.js') }}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('assets/js/jquery.sharrre.js') }}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
<!-- Vector Map plugin -->
<script src="{{asset('assets/js/jquery-jvectormap.js') }}"></script>
<!-- Sliders Plugin -->
<script src="{{asset('assets/js/nouislider.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="{{asset('assets/js/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{asset('assets/js/jquery.datatables.js') }}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{asset('assets/js/sweetalert2.js') }}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/js/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{asset('assets/js/fullcalendar.min.js') }}"></script>
<!-- TagsInput Plugin -->
<script src="{{asset('assets/js/jquery.tagsinput.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('assets/js/material-dashboard.js') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/js/demo.js') }}"></script>
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
