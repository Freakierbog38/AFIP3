<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AFIP - Inicia Sesión</title>

    <!-- Vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{ asset('css/slim.css') }}">

  </head>
  <body>

    <div class="signin-wrapper">

      <div class="signin-box signup">
        <h2 class="slim-logo"><img src="{{ asset('img/RED3.png') }}" class="img-fluid"></h2>
        <h3 class="signin-title-primary tx-bold"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Autenticación de Beneficiarios</h3>
        <br>
        <h5 class="signin-title-secondary lh-4"><span class="tx-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> NOTA IMPORTANTE:</span> Para el buen desempeño del sistema utilize navegadores actualizados y asegurarse de tener javascript permitido.</h5>
        
        <form action="{{route('login')}}" method="post">
          @csrf
          <div class="form-group {{ $errors->has('correo') ? 'has-danger' : '' }}">
            <label class="tx-bold">Correo Electrónico:</label>
            <input type="email" name="correo" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }} mg-b-10" placeholder="Ingrese su Email">
            {!! $errors->first('correo', '<div class="alert alert-danger">:message</div>') !!}
          </div>

          <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
            <label class="tx-bold">Contraseña:</label>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} mg-b-10" placeholder="Ingrese su contraseña">
            {!! $errors->first('contrasena', '<div class="alert alert-danger">:message</div>') !!}
          </div>

          <button type="submit" class="btn btn-primary btn-block btn-signin">Ingresar</button>
        </form>
        <p class="mg-t-40 mg-b-0">¿No tienes una cuenta?</p>
        <a href="{{ url('registro') }}">Crear una cuenta en CEDEC</a>
      </div><!-- signin-box -->

    </div><!-- signin-wrapper -->

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
    <script src="{{ asset('lib/popper.js/js/popper.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>

    <script src="{{ asset('js/slim.js') }}"></script>

  </body>
</html>
