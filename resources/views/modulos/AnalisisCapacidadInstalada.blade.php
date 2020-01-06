@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <label class="section-title mg-b-35 tx-15 tx-center">Sección 3: Análisis de Capacidad Instalada</label>
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#CapInst" data-toggle="tab">Capacidad Instalada</a>
            </li>
        </ul>
    </div><!-- card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="CapInst">
                <div class="col mg-b-20">
                    <p>En el caso de que usted agregue nuevos datos y en la tablas hay datos existentes, los nuevos reemplazaráan a los antiguos.</p>
                    <a href="#formCapInst" id="btnAgregar" class="agregar modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                    <a href="#formCapInstEdit" id="btnAgregar" class="editar modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>
                    
                </div>
                <div class="col-md">
                    <!-- DIV donde se ensertará la información -->
                    <div id="CapacidadInstalda-Contenido" class="tx-center">
                        <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                        <p>
                            Cargando contenido
                        </p>
                    </div>
                </div>

            </div><!-- tab-pane -->
        </div><!-- tab-content -->
    </div><!-- card-body -->
</div><!-- card -->

<!-- FORMULARIO PARA AGREGAR REGISTRO DE CAPACIDAD INSTALADA -->
<div id="formCapInst" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Capacidad Instalada</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                            <span id="form-result-addCapInst"></span>
                            <form id="form-add-capInst">
                                @csrf
                                <div class="form-group">
                                    <label class="tx-bold">Ingrese el número máximo de unidades al mes:</label>
                                    <input type="number" id="MaxUsMes" name="MaxUsMes" class="form-control pd-y-12" placeholder="Ejemplo: 500">
                                </div><!-- form-group -->

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                            </div>
                        </div><!-- pd-20 -->
                    </div><!-- col-12 -->
                </div><!-- row -->
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- FORMULARIO PARA EDITR REGISTRO DE CAPACIDAD INSTALADA -->
<div id="formCapInstEdit" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Editar Capacidad Instalada</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                            <span id="form-result-editCapInst"></span>
                            <form id="form-edit-capInst">
                                @csrf
                                <div class="form-group">
                                    <label class="tx-bold">Ingrese el número máximo de unidades al mes:</label>
                                    <input type="number" id="MaxUsMesEdit" name="MaxUsMesEdit" class="form-control pd-y-12" placeholder="Ejemplo: 500">
                                    
                                </div><!-- form-group -->

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                            </div>
                        </div><!-- pd-20 -->
                    </div><!-- col-12 -->
                </div><!-- row -->
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


@endsection

@section('scripts')
<script>

    // Llena los registros de Costos Fijos Mensuales
    function llenarTablaCapacidadInstalada(){

        // Petición GET a la url
        $.get("{{url('analisisCapacidadInstalada/getCapacidadInstalada')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            if(response.resultado==1){
                console.log("resultado: "+response.resultado);
                $(".agregar").hide();
                document.getElementById("MaxUsMesEdit").value=response.maximo_unidades_mes;

            }else{
                $(".editar").hide();
               
            }
            $("#CapacidadInstalda-Contenido").html(response.tabla);

        });
    }

    $(document).ready( function() {
        // Cuando se presiona el botón de guardar en el form de Capacidad Instalada
        $('#form-add-capInst').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{ url('analisisCapacidadInstalada/addCapacidadInstalada') }}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data){
                    var html = '';
                    if(data.errors){
                        // Si devuelve errores los muestra en el div previamente creado con un margen rojo
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.lenght; count++){
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#form-result-addCapInst').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas para mostrar datos nuevos
                        llenarTablaCapacidadInstalada();

                        // Oculta el modal
                        $('#formCapInst').modal('hide');
                        // Muestra un modal de que la operación ha sido exitosa
                        bootbox.alert({
                            message: data.success,
                            buttons: {
                                ok: {
                                    className: 'btn btn-success'
                                }
                            },
                        });
                    }
                }
            });

        });

        llenarTablaCapacidadInstalada();
    });



    // Función que edita un registro de Costo Variable Unitario
    $('#form-edit-capInst').submit(function(e) {
            // Prevee que se recargue la página
            e.preventDefault();
            // Se agrega a la configuración de ajax para que mande el token y las funciones post se puedan usar sin problema
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Función AJAX que hace la petición POST para la edición
            $.ajax({
                url: "{{url('analisisCapacidadInstalada/editCapacidadInstalada')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data){
                    // Entra si la petición se lleva a cabo
                    var html = '';
                    if(data.errors){
                        // Si hay errores se muestran
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.lenght; count++){
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';

                        $('#form-result-editCapInst').html(html);
                    }

                    if(data.success){
                        // Se recarga la tabla
                        llenarTablaCapacidadInstalada();

                        // Y se cierra el modal
                        $('#formCapInstEdit').modal('hide');
                        // Muestra un modal de que la operación ha sido exitosa
                        bootbox.alert({
                            message: data.success,
                            buttons: {
                                ok: {
                                    className: 'btn btn-success'
                                }
                            },
                        });
                    }
                }
            });
        });
    
</script>
@endsection