@extends('plantilla')

@section('contenido')
  <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
          
      </ol>
      <h6 class="slim-pagetitle">Registro Empresa</h6>
  </div>

  <div class="section-wrapper mg-t-20">
    <h4 class="tx-bold">Datos de la empresa</h4>
    <br>
    <h5>Proporcione la información que se le solicita acerca de la empresa.</h5>
    <br>
    <form action="{{url('registroEmpresa')}}" method="post">
      @csrf
      <div class="row">
        <div class="form-group col-md-6">
          <label class="tx-bold">Nombre de la empresa:</label>
          <input type="text" name="nombreEmpresa" class="form-control" placeholder="Proporcione el nombre de su empresa" required>
        </div>

        <div class="form-group col-md-4">
          <label class="tx-bold">RFC:</label>
          <input type="text" name="rfc" class="form-control mg-b-10" placeholder="Ingrese el RFC de la empresa" required>
        </div>
      </div>

      <label class="tx-bold">Representante Legal:</label>
      <div class="row">
        <div class="form-group col-md-4">
          <input type="text" name="repLegalNombre" class="form-control mg-b-10" placeholder="Nombre(s)" required>
        </div>
        <div class="form-group col-md-4">
          <input type="text" name="repLegalAPaterno" class="form-control mg-b-10" placeholder="Apellido Paterno" required>
        </div>
        <div class="form-group col-md-4">
          <input type="text" name="repLegalAMaterno" class="form-control mg-b-10" placeholder="Apellido Materno" required>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-9">
          <label class="tx-bold">Nivel de estudio:</label>
          <input type="text" name="nivelEstudio" class="form-control mg-b-10" required>
        </div>

        <div class="form-group col-md-3">
          <label class="tx-bold">Sexo:</label>
          <select name="sexo" class="form-control mg-b-10">
            <option value=" ">Seleccione...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="tx-bold">Cámara a la que pertenece:</label>
        <input type="text" name="camaraEmpresarial" class="form-control mg-b-10" placeholder="Si pertenece a una ingrese, en caso contrario ponga Ningúna">
      </div>

      <div class="form-group">
        <label class="tx-bold">Giro de la empresa:</label>
        <input type="text" name="giro" class="form-control mg-b-10" placeholder="Ingrese el giro de la empresa" required>
      </div>

      <label class="tx-bold">Dirección:</label>
      <div class="row">
        <div class="form-group col-md-7">
          <input type="text" name="calleNumero" class="form-control mg-b-10" placeholder="Calle y número">
        </div>
        <div class="form-group col-md-5">
          <input type="text" name="colonia" class="form-control mg-b-10" placeholder="Colonia">
        </div>
        <div class="form-group col-md-6">
          <input type="text" name="cp" class="form-control mg-b-10" placeholder="Código Postal">
        </div>
        <div class="form-group col-md-6">
        <input type="text" name="municipio" class="form-control mg-b-10" placeholder="Municipio">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label class="tx-bold">Número telefónico:</label>
          <input type="text" name="telefono" class="form-control mg-b-10" placeholder="Proporcione el número telefónico de la empresa">
        </div>

        <div class="form-group col-md-4">
          <label class="tx-bold">Fax:</label>
          <input type="text" name="fax" class="form-control mg-b-10" placeholder="Proporcione el fax de la empresa">
        </div>

        <div class="form-group col-md-4">
          <label class="tx-bold">Correo:</label>
          <input type="email" name="correoEmpresa" class="form-control mg-b-10" placeholder="Proporcione el correo de la empresa" required>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-2">
          <label class="tx-bold">Sector:</label>
          <input type="number" name="sector" class="form-control mg-b-10" placeholder="Ingrese el sector" required>
        </div>

        <div class="form-group col-md-2">
          <label class="tx-bold">No. de Empleados:</label>
          <input type="number" name="NumEmpleados" class="form-control mg-b-10" required>
        </div>

        <div class="form-group col-md-2">
          <label class="tx-bold">Años exportación:</label>
          <input type="number" name="aniosExportacion" class="form-control mg-b-10" required>
        </div>

        <div class="form-group col-md-3">
          <label class="tx-bold">Certificación de Calidad:</label>
          <select name="certificacionCalidad" class="form-control mg-b-10">
            <option value="No">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <label class="tx-bold">Empresa en operación:</label>
          <select name="EmpresaOperacion" class="form-control mg-b-10">
            <option value=" ">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="tx-bold">Actividad que realiza:</label>
        <input type="text" name="actividad" class="form-control mg-b-10" placeholder="Ingrese la actividad realizada por al empresa" required>
      </div>

      <div class="form-group">
        <label class="tx-bold">SCIAN:</label>
        <input type="text" name="scian" class="form-control mg-b-10" placeholder="Sistema de Clasificación Industria de America del Norte">
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label class="tx-bold">Inicio de operación:</label>
          <input type="date" name="operacionInicio" class="form-control mg-b-10" required>
        </div>

        <div class="form-group col-md-4">
          <label class="tx-bold">Número de sucursales:</label>
          <input type="number" name="numSucursales" class="form-control mg-b-10" required>
        </div>

        <div class="form-group col-md-4">
          <label class="tx-bold">Cuenta con estados financieros:</label>
          <select name="estadosFinan" class="form-control mg-b-10">
            <option value="No">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Registrar</button>
    </form>
  </div>
@endsection