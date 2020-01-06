@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <label class="section-title mg-b-35 tx-15 tx-center">Sección 5: Estado de Resultados Histórico</label>
    <div class="col-md mg-b-25 tx-right">
        <span class="tx-bold">Fecha: </span>
        <span id="FechaResHist-contenido"></span>
        -
        <a href="#modalFechaResHist" class="modal-effect" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>
    </div>
    <div class="card-header">
        
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#Nominas" data-toggle="tab">Cifras Nominales</a>
            </li>
        </ul> 
    </div><!-- card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="Nominas">
                <div class="col mg-b-20">
                    <span id="botonResHist"></span>
                </div>
                <div class="col mg-b-20 tx-center" id="ResultadosHist-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
        </div><!-- tab-content -->
    </div><!-- card-body -->
</div><!-- card -->

<!-- FORMULARIO PARA AGREGAR FECHA AL ESTADO DE RESULTADOS -->
<div id="modalFechaResHist" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Fecha</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addFechaResHist"></span>
                                <p><i class="fa fa-info-circle" aria-hidden="true"> Seleccione la fecha del balance general y el número de meses que abarca.</i></p>
                                <form id="form-add-FechaResHist">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Fecha del Balance:</label>
                                        <input type="date" id="fecha_est" name="fecha_est" class="form-control pd-y-12" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Número de Meses:</label>
                                        <input type="number" id="numero_mes" name="numero_mes" class="form-control pd-y-12" min="0" step="1" required>
                                    </div><!-- form-group -->

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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

<!-- FORMULARIO PARA AGREGAR CIFRAS EN PESOS NOMINALES -->
<div id="modalAddNomina" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Cifras En Pesos Nominales</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addNomina"></span>
                                <p><i class="fa fa-info-circle" aria-hidden="true"> Ingrese las cifras para cada campo.</i></p>
                                <form id="form-add-Nomina">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el porcentaje del costo de venta:</label>
                                        <input type="number" id="porcentaje_inver" name="porcentaje_inver" class="form-control pd-y-12" min="0" max="100" step="1" placeholder="Ingrese aquí el porcentaje del costo de venta del 0 al 100" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese la cantidad de depreciación y amortización:</label>
                                        <input type="number" id="depre_amort" name="depre_amort" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ingrese aquí la cantidad" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese los gastos y productos financieros:</label>
                                        <input type="number" id="gastos_prod" name="gastos_prod" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ingrese aquí la cantidad de gastos y producción" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese porcentaje de impuestos:</label>
                                        <input type="number" id="porcentaje_imp" name="porcentaje_imp" class="form-control pd-y-12" min="0" max="100" step="1" placeholder="Ingrese aquí el porcentaje de impuestos de 1 al 100" required>
                                    </div><!-- form-group -->

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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

    // Trae en inserta en una etiqueta html la fecha del Balance General Historico
    function llenarFechaResHist(){

        // Petición GET a la url
        $.get("{{url('resultadosHistorico/getFecha')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#FechaResHist-contenido").html(response);

        });
    }

    // Trae en inserta en una etiqueta html la tabla de Activos
    function llenarTablaNominas(){

        // Petición GET a la url
        $.get("{{url('resultadosHistorico/getCifrasNomina')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#ResultadosHist-Contenido").html(response.tabla);
            $("#botonResHist").html(response.boton);

        });
    }

    
    $(document).ready( function() {

        // Función que agrega fecha al Balance General Histórico
        $('#form-add-FechaResHist').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('resultadosHistorico/addFecha')}}",
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
                        $('#form-result-addFechaResHist').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarFechaResHist();
                        llenarTablaNominas();
                        // Esconde el modal
                        $('#modalFechaResHist').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-FechaResHist')[0].reset();

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

        // Función que agrega valores en Nomina
        $('#form-add-Nomina').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('resultadosHistorico/addCifrasNomina')}}",
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
                        $('#form-result-addNomina').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarTablaNominas();
                        // Esconde el modal
                        $('#modalAddNomina').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Nomina')[0].reset();

                        console.log(data.success)

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

                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                    bootbox.dialog({
                        title: '¡Error!',
                        message: '<p> Ocurrió un error :( </p>',
                        size: 'small',
                        backdrop: false,
                        buttons: {
                            weno: {
                                className: 'btn btn-danger'
                            }
                        },
                    });
                }
            });

        });

        llenarFechaResHist();
        llenarTablaNominas();

    });
</script>
@endsection