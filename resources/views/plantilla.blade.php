<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('favicon2.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{ asset('css/slim.css') }}">

  </head>
  <body>
    <div class="loader"></div>
    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="{{ url('/principal') }}"><img src="{{ asset('img/RED3.png') }}" class="img-fluid"></a></h2>
        </div><!-- slim-header-left -->
        <div class="slim-header-right">
          <div class="dropdown dropdown-c">
            <a href="#" class="logged-user" data-toggle="dropdown">
              <img src="http://via.placeholder.com/500x500" alt="">
              <span>{{ Auth::user()->correo }}</span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class="nav">
                <a href="{{ url('/ayuda') }}" class="nav-link"><i class="icon ion-help-circled"></i> Ayuda</a>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i class="icon ion-forward"></i> Cerrar Sesión</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </nav>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </div><!-- header-right -->
      </div><!-- container -->
    </div><!-- slim-header -->

    <!-- La condición es para que no se mueste la barra de navegación en la página principal -->
    @if(!isset($prince))
      @include('navbar')
    @endif

    <div class="slim-mainpanel">
      <div class="container">
        
        @yield('contenido')

      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <div class="slim-footer bg-black-1">
      <div class="container">
          <div class="col-7">
            <p>Red de competitividad</p>
            <p>Consejo Estatal Para el Desarrollo Económico y la Competitividad del Estado de Tamaulipas.</p>
            <p>Parque Científico y Tecnológico TECNOTAM</p>
          </div>
          <div class="col-5 tx-right">
            <p>Edificio Empresarial Planta Baja Carretera Victoria-Soto la Marina km 5.5</p>
            <p>Cd. Victoria Tamaulipas C.P. 87130</p>
            <p>(834) 318 30 02 y 318 30 03 Ext. 1108</p>
          </div>
      </div><!-- container -->
    </div><!-- slim-footer -->

    <script src="{{ asset('lib/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('lib/jquery.cookie/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('lib/popper.js/js/popper.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ asset('lib/bootbox/bootbox.locales.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('lib/datatables-responsive/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('lib/echarts/js/echarts.min.js') }}"></script>
    <script src="{{ asset('lib/raphael/js/raphael.min.js') }}"></script>
    <script src="{{ asset('lib/morris.js/js/morris.js') }}"></script>

    <script src="{{ asset('js/slim.js') }}"></script>

    @yield('scripts')

  </body>
</html>
