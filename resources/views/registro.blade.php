<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AFIP - Registro</title>

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
        <h3 class="signin-title-primary tx-bold"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Registro</h3>
        <br>
        <h5 class="signin-title-secondary">Proporcione la información que se le solicita.</h5>
        
        <form action="{{url('registro')}}" method="post">
          @csrf
          <div class="form-group">
            <label class="tx-bold">Correo Electrónico:</label>
            <input type="email" name="correo" class="form-control" placeholder="Ingrese un Email" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Contraseña:</label>
            <input type="password" name="password" class="form-control mg-b-10" placeholder="Cree su contraseña" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Confirmar contraseña:</label>
            <input type="password" name="confirma" class="form-control mg-b-10" placeholder="Confirme la contraseña" required>
          </div>

          <input type="hidden" name="id_rol" value="2">

          <input type="hidden" name="estado" value="Activo">

          <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </form>
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
