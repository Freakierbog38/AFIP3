@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <label class="section-title mg-b-35 tx-15 tx-center">Sección 8: Índice de Producción</label>
    <div class="card-header">
        
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#Produccion" data-toggle="tab">Índice de Producción</a>
            </li>
        </ul>
    </div><!-- card-header -->
    <div class="card-body">
        <div class="tab-content">
            
            <div class="tab-pane active" id="Produccion">

                <div class="col mg-b-20">
                    <span id="botonProduccion"></span>
                </div>
                <div class="col mg-b-20 tx-center" id="Produccion-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
        </div><!-- tab-content -->
    </div><!-- card-body -->
</div><!-- card -->

<!-- FORMULARIO PARA AGREGAR ÍDICE DE PRODUCCIÓN -->
<div id="modalAddProduccion" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Pasivo Actual</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <i class="fa fa-info-circle" aria-hidden="true"> Ingrese los datos del pasivo correspondiente.</i>
                                <br><br>
                                <span id="form-result-addProduccion"></span>
                                <form id="form-add-Produccion">
                                    @csrf
                                    <label class="tx-bold">Ingrese el indice de produción:</label>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Mes 1:</label>
                                                <input type="number" id="ventas1" name="ventas1" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 2:</label>
                                                <input type="number" id="ventas2" name="ventas2" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 3:</label>
                                                <input type="number" id="ventas3" name="ventas3" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 4:</label>
                                                <input type="number" id="ventas4" name="ventas4" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 5:</label>
                                                <input type="number" id="ventas5" name="ventas5" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 6:</label>
                                                <input type="number" id="ventas6" name="ventas6" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Mes 7:</label>
                                                <input type="number" id="ventas7" name="ventas7" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 8:</label>
                                                <input type="number" id="ventas8" name="ventas8" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 9:</label>
                                                <input type="number" id="ventas9" name="ventas9" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 10:</label>
                                                <input type="number" id="ventas10" name="ventas10" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 11:</label>
                                                <input type="number" id="ventas11" name="ventas11" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mes 12:</label>
                                                <input type="number" id="ventas12" name="ventas12" class="form-control pd-y-12" step="0.001" required>
                                            </div><!-- form-group -->
                                        </div>
                                    </div>

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

    //////////////////////////////////////////////////////////////////////////////
    /////////////////////////// íNDICES DE PRODUCCIÓN ////////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Índices de Producción
    function llenarIndicesProduccion(){

        // Petición GET a la url
        $.get("{{url('indiceProduccion/getIndicesProduccion')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#Produccion-Contenido").html(response.tabla);
            $("#botonProduccion").html(response.boton);

        });
    }
    
    $(document).ready( function() {

        // Función que agrega Índices de Producción
        $('#form-add-Produccion').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('indiceProduccion/addIndicesProduccion')}}",
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
                        $('#form-result-addProduccion').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarIndicesProduccion();
                        // Esconde el modal
                        $('#modalAddProduccion').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Produccion')[0].reset();

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

        llenarIndicesProduccion();
    });
</script>
@endsection