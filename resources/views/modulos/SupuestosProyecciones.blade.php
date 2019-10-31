@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <label class="section-title mg-b-35 tx-15 tx-center">Sección 6: Supuestos Proyecciones</label>
    <div class="card-header">
        
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#IngresosCostos" data-toggle="tab">Ingresos y Costos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Politicas" data-toggle="tab">Políticas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#MacroFina" data-toggle="tab">Macroeconómicos y Financieros</a>
            </li>
        </ul>
    </div><!-- card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="IngresosCostos">

                <div class="col mg-b-20">
                    <h2>Con Apoyo</h2>
                    <span id="botonIngresosCostosCA"></span>
                </div>
                <div class="col mg-b-20 tx-center" id="IngresosCostosCA-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

                <div class="col mg-b-20">
                    <h2>Sin Apoyo</h2>
                    <span id="botonIngresosCostosSA"></span>
                </div>
                <div class="col mg-b-20 tx-center" id="IngresosCostosSA-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
            <div class="tab-pane" id="Politicas">

                <div class="col mg-b-20">
                    <span id="botonPoliticas"></span>
                </div>
                <div class="col mg-b-20 tx-center" id="Politicas-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
            <div class="tab-pane" id="MacroFina">

                <div class="col mg-b-20">
                    <span id="botonMacroFina"></span>
                </div>
                <div class="col mg-b-20 tx-center" id="MacroFina-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
        </div><!-- tab-content -->
    </div><!-- card-body -->
</div><!-- card -->

<!-- FORMULARIO PARA AGREGAR Agregar Ingresos y Costos con Apoyo -->
<div id="modalAddIngresosCostosCA" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Ingresos y Costos con Apoyo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addIngresosCostosCA"></span>
                                <form id="form-add-IngresosCostosCA">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4 border-right">
                                            <h3 class="tx-bold tx-center">Año 1</h3>
                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de precios:</label>
                                                <input type="number" id="Incremento_Pre" name="Incremento_Pre" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de unidades de ventas:</label>
                                                <input type="number" id="Incremento_Uni" name="Incremento_Uni" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos fijos:</label>
                                                <input type="number" id="Incremento_Cos_Fij" name="Incremento_Cos_Fij" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos variables:</label>
                                                <input type="number" id="Incremento_Cos_Var" name="Incremento_Cos_Var" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->
                                        </div>
                                        <div class="col-md-4 border-right">
                                            <h3 class="tx-bold tx-center">Año 2</h3>
                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de precios:</label>
                                                <input type="number" id="Incremento_Pre2" name="Incremento_Pre2" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de unidades de ventas:</label>
                                                <input type="number" id="Incremento_Uni2" name="Incremento_Uni2" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos fijos:</label>
                                                <input type="number" id="Incremento_Cos_Fij2" name="Incremento_Cos_Fij2" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos variables:</label>
                                                <input type="number" id="Incremento_Cos_Var2" name="Incremento_Cos_Var2" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->
                                        </div>
                                        <div class="col-md-4">
                                            <h3 class="tx-bold tx-center">Año 3</h3>
                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de precios:</label>
                                                <input type="number" id="Incremento_Pre3" name="Incremento_Pre3" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de unidades de ventas:</label>
                                                <input type="number" id="Incremento_Uni3" name="Incremento_Uni3" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos fijos:</label>
                                                <input type="number" id="Incremento_Cos_Fij3" name="Incremento_Cos_Fij3" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos variables:</label>
                                                <input type="number" id="Incremento_Cos_Var3" name="Incremento_Cos_Var3" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
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

<!-- FORMULARIO PARA AGREGAR Agregar Ingresos y Costos sin Apoyo -->
<div id="modalAddIngresosCostosSA" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Ingresos y Costos con Apoyo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addIngresosCostosSA"></span>
                                <form id="form-add-IngresosCostosSA">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4 border-right">
                                            <h3 class="tx-bold tx-center">Año 1</h3>
                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de precios:</label>
                                                <input type="number" id="Incremento_Pre" name="Incremento_Pre" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de unidades de ventas:</label>
                                                <input type="number" id="Incremento_Uni" name="Incremento_Uni" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos fijos:</label>
                                                <input type="number" id="Incremento_Cos_Fij" name="Incremento_Cos_Fij" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos variables:</label>
                                                <input type="number" id="Incremento_Cos_Var" name="Incremento_Cos_Var" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->
                                        </div>
                                        <div class="col-md-4 border-right">
                                            <h3 class="tx-bold tx-center">Año 2</h3>
                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de precios:</label>
                                                <input type="number" id="Incremento_Pre2" name="Incremento_Pre2" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de unidades de ventas:</label>
                                                <input type="number" id="Incremento_Uni2" name="Incremento_Uni2" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos fijos:</label>
                                                <input type="number" id="Incremento_Cos_Fij2" name="Incremento_Cos_Fij2" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos variables:</label>
                                                <input type="number" id="Incremento_Cos_Var2" name="Incremento_Cos_Var2" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->
                                        </div>
                                        <div class="col-md-4">
                                            <h3 class="tx-bold tx-center">Año 3</h3>
                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de precios:</label>
                                                <input type="number" id="Incremento_Pre3" name="Incremento_Pre3" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de unidades de ventas:</label>
                                                <input type="number" id="Incremento_Uni3" name="Incremento_Uni3" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos fijos:</label>
                                                <input type="number" id="Incremento_Cos_Fij3" name="Incremento_Cos_Fij3" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="tx-bold">Incremento en porciento de costos variables:</label>
                                                <input type="number" id="Incremento_Cos_Var3" name="Incremento_Cos_Var3" class="form-control pd-y-12" min="0" max="1000" step="1" placeholder="Ingrese aqui el incremento" required>
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

<!-- FORM para eliminar un registro, se usa esta estructura para eliminar cualquier registro -->
<form id="form-delete" method="post">
    @csrf
    @method('delete')
</form>

<!-- FORMULARIO PARA AGREGAR POLÍTICAS -->
<div id="modalAddPoliticas" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Políticas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addPoliticas"></span>
                                <i class="fa fa-info-circle" aria-hidden="true"> Usted puede ingresar maximo 1 valor para cada política.</i>
                                <form id="form-add-Politicas">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Días Clientes:</label>
                                        <input type="number" id="dias_cli" name="dias_cli" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 10" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Días Inventarios:</label>
                                        <input type="number" id="dias_inv" name="dias_inv" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 10" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Días Proveedores:</label>
                                        <input type="number" id="dias_pro" name="dias_pro" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 10" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Dividendos (%):</label>
                                        <input type="number" id="dividendos" name="dividendos" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 5" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Dias de Efectivo:</label>
                                        <input type="number" id="dias_efe" name="dias_efe" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 10" required>
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

<!-- FORMULARIO PARA AGREGAR MACROECONÓMICOS Y FINANCIAMIENTOS -->
<div id="modalAddMacroFina" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Políticas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addMacroFina"></span>
                                <i class="fa fa-info-circle" aria-hidden="true"> Usted puede ingresar maximo 1 valor para cada macroeconomico o Financiero.</i>
                                <form id="form-add-MacroFina">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Inflación (%):</label>
                                        <input type="number" id="inflacion" name="inflacion" class="form-control pd-y-12" step="0.1" placeholder="Ejemplo: 6" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Tipo de Cambio:</label>
                                        <input type="number" id="tipo_cam" name="tipo_cam" class="form-control pd-y-12" step="0.01" value=17.85 required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">TIIE (%):</label>
                                        <input type="number" id="tiie" name="tiie" class="form-control pd-y-12" step="0.1" placeholder="Ejemplo: 7" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">CETES (%):</label>
                                        <input type="number" id="cetes" name="cetes" class="form-control pd-y-12" step="0.1" placeholder="Ejemplo: 6" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">ISR + PTU (%):</label>
                                        <input type="number" id="isr_ptu" name="isr_ptu" class="form-control pd-y-12" step="0.1" value=30 required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">TREMA (%):</label>
                                        <input type="number" id="trema" name="trema" class="form-control pd-y-12" step="0.1" value=10 required>
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

    // Trae en inserta la tabla de Ingresos y Costos con Apoyo
    function llenarIngresosCostosCA(){

        // Petición GET a la url
        $.get("{{url('supuestosProyecciones/getIngresosCostosCA')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#IngresosCostosCA-Contenido").html(response.tabla);
            $("#botonIngresosCostosCA").html(response.boton);

            $('#TablaIngresosCostosCA').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: false,
                language: {
                    paginate : {
                        next: "Siguiente",
                        previous: "Anterior"
                    },
                    emptyTable: "No hay datos en esta tabla.",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    infoEmpty: "Mostrando 0 de 0 entradas",
                }
            });

        });
    }

    // Función que borrará registros de Ingresos y Costos con Apoyo
    function borrarIngresosCostosCA(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('supuestosProyecciones/deleteIngresosCostosCA/:ID') }}";
        
        // Se reemplaza en la ruta :ID por el id real extraido anteriormente
        var url = enlace.replace(':ID', id);
        // Se preparan los datos
        var data = form.serialize();

        bootbox.dialog({
            message: "¿Estás seguro de eliminar el registro?",
            title: "<i class='fa fa-trash-o'></i> ¡Atención!",
            buttons: {
                cancel: {
                    label: "No",
                    className: "btn-success",
                    callback: function() {
                        $('.bootbox').modal('hide');
                    }
                },
                confirm: {
                    label: "Eliminar",
                    className: "btn-danger",
                    callback: function() {
                        // Se Envia la petición
                        $.post(url, data, function(result){
                            // Si es exitosa muestra un resultado
                            bootbox.alert(result.mensaje);
                            llenarIngresosCostosCA();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    // Trae en inserta la tabla de Ingresos y Costos sin Apoyo
    function llenarIngresosCostosSA(){

        // Petición GET a la url
        $.get("{{url('supuestosProyecciones/getIngresosCostosSA')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#IngresosCostosSA-Contenido").html(response.tabla);
            $("#botonIngresosCostosSA").html(response.boton);

            $('#TablaIngresosCostosSA').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: false,
                language: {
                    paginate : {
                        next: "Siguiente",
                        previous: "Anterior"
                    },
                    emptyTable: "No hay datos en esta tabla.",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    infoEmpty: "Mostrando 0 de 0 entradas",
                }
            });

        });
    }

    // Función que borrará registros de Ingresos y Costos sin Apoyo
    function borrarIngresosCostosSA(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('supuestosProyecciones/deleteIngresosCostosSA/:ID') }}";

        // Se reemplaza en la ruta :ID por el id real extraido anteriormente
        var url = enlace.replace(':ID', id);
        // Se preparan los datos
        var data = form.serialize();

        bootbox.dialog({
            message: "¿Estás seguro de eliminar el registro?",
            title: "<i class='fa fa-trash-o'></i> ¡Atención!",
            buttons: {
                cancel: {
                    label: "No",
                    className: "btn-success",
                    callback: function() {
                        $('.bootbox').modal('hide');
                    }
                },
                confirm: {
                    label: "Eliminar",
                    className: "btn-danger",
                    callback: function() {
                        // Se Envia la petición
                        $.post(url, data, function(result){
                            // Si es exitosa muestra un resultado
                            bootbox.alert(result.mensaje);
                            llenarIngresosCostosSA();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    // Trae en inserta la tabla de Politicas
    function llenarPoliticas(){

        // Petición GET a la url
        $.get("{{url('supuestosProyecciones/getPoliticas')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#Politicas-Contenido").html(response.tabla);
            $("#botonPoliticas").html(response.boton);

        });
    }

    // Trae en inserta la tabla de Macroeconómicos y Financieros
    function llenarMacroFina(){

        // Petición GET a la url
        $.get("{{url('supuestosProyecciones/getMacroFina')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#MacroFina-Contenido").html(response.tabla);
            $("#botonMacroFina").html(response.boton);

        });
    }

    
    $(document).ready( function() {

        // Función que agrega Ingresos y Costos con Apoyo
        $('#form-add-IngresosCostosCA').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('supuestosProyecciones/addIngresosCostosCA')}}",
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
                        $('#form-result-addIngresosCostosCA').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarIngresosCostosCA();
                        // Esconde el modal
                        $('#modalAddIngresosCostosCA').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-IngresosCostosCA')[0].reset();

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

        // Función que agrega Ingresos y Costos sin Apoyo
        $('#form-add-IngresosCostosSA').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('supuestosProyecciones/addIngresosCostosSA')}}",
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
                        $('#form-result-addIngresosCostosSA').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarIngresosCostosSA();
                        // Esconde el modal
                        $('#modalAddIngresosCostosSA').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-IngresosCostosSA')[0].reset();

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

        // Función que agrega Políticas
        $('#form-add-Politicas').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('supuestosProyecciones/addPoliticas')}}",
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
                        $('#form-result-addPoliticas').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarPoliticas();
                        // Esconde el modal
                        $('#modalAddPoliticas').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Politicas')[0].reset();

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

        // Función que agrega Políticas
        $('#form-add-MacroFina').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('supuestosProyecciones/addMacroFina')}}",
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
                        $('#form-result-addMacroFina').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarMacroFina();
                        // Esconde el modal
                        $('#modalAddMacroFina').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-MacroFina')[0].reset();

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

        llenarIngresosCostosCA();
        llenarIngresosCostosSA();
        llenarPoliticas();
        llenarMacroFina();

    });
</script>
@endsection