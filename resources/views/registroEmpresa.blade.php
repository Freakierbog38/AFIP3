<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AFIP - Registro Empresa</title>

    <!-- Vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{ asset('css/slim.css') }}">

  </head>
  <body>

    <div class="signin-wrapper">

      <div class="signin-box signup">
        <h3 class="signin-title-primary tx-bold"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Registro Empresa</h3>
        <br>
        <h5 class="signin-title-secondary">Proporcione la información que se le solicita para terminar su registro.</h5>
        
        <form action="{{url('registro')}}" method="post">
          @csrf
          <div class="form-group">
            <label class="tx-bold">Nombre de la empresa:</label>
            <input type="text" name="nombreEmpresa" class="form-control" placeholder="Proporcione el nombre de su empresa" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">RFC:</label>
            <input type="text" name="rfc" class="form-control mg-b-10" placeholder="Ingrese el RFC de la empresa" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Cámara empresarial a la que pertenece:</label>
            <input type="text" name="camaraEmpresarial" class="form-control mg-b-10" placeholder="Si pertenece a una ingrese, en caso contrario ponga Ningúna">
          </div>

          <div class="form-group">
            <label class="tx-bold">Número telefónico:</label>
            <input type="text" name="telefono" class="form-control mg-b-10" placeholder="Proporcione el número telefónico de la empresa" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Fax:</label>
            <input type="text" name="fax" class="form-control mg-b-10" placeholder="Proporcione el fax de la empresa">
          </div>

          <div class="form-group">
            <label class="tx-bold">Correo:</label>
            <input type="text" name="correoEmpresa" class="form-control mg-b-10" placeholder="Proporcione el correo de la empresa">
          </div>

          <div class="form-group">
            <label class="tx-bold">No. de Empleados:</label>
            <input type="number" name="NumEmpleados" class="form-control mg-b-10" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Sector:</label>
            <input type="number" name="sector" class="form-control mg-b-10" placeholder="Ingrese el sector" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Giro de la empresa:</label>
            <input type="text" name="giro" class="form-control mg-b-10" placeholder="Ingrese el giro de la empresa" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Años de exportación:</label>
            <input type="number" name="aniosExportacion" class="form-control mg-b-10" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Certificación de Calidad:</label>
            <input type="text" name="aniosExportacion" class="form-control mg-b-10" placeholder="Ingrese certificación de calidad (5 caracteres)" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Actividad que realiza:</label>
            <input type="text" name="actividad" class="form-control mg-b-10" placeholder="Ingrese la actividad realizada por al empresa" required>
          </div>
          
          <div class="form-group">
            <label class="tx-bold">Actividad que realiza:</label>
            <input type="text" name="actividad" class="form-control mg-b-10" placeholder="Ingrese la actividad realizada por al empresa" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">Empresa en operación:</label>
            <input type="text" name="EmpresaOperacion" class="form-control mg-b-10" required>
          </div>

          <div class="form-group">
            <label class="tx-bold">SCIAN:</label>
            <input type="text" name="scian" class="form-control mg-b-10" placeholder="Sistema de Calsificación Industria de America del Norte">
          </div>

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
