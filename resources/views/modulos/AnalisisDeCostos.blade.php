@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <label class="section-title mg-b-35 tx-15 tx-center">Sección 2: Análisis de Costos</label>
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#CostosFijosMes" data-toggle="tab">Costos Fijos Mensuales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#CostosVariablesUnit" data-toggle="tab">Costos Variables Unitarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#CVUTotal" data-toggle="tab">Costos Variable Unitario Total</a>
            </li>
        </ul>
    </div><!-- card-header -->
    <div class="card-body">
        <div class="tab-content">

            <div class="tab-pane active" id="CostosFijosMes">
                <div class="col mg-b-20">
                    <a href="#FormCostoFijoMes"  class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="table-wrapper">
                    <!-- DIV que almacenará la tabla -->
                    <div id="CostosFijosMes-Tabla" class="tx-center">
                        <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                        <p>
                            Cargando contenido
                        </p>
                    </div>
                </div><!-- table-wrapper -->
            </div><!-- tab-pane -->

            <div class="tab-pane" id="CostosVariablesUnit">
                <div class="col mg-b-20">
                    <a href="#FormCostosVariablesUnit" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="table-wrapper">

                    <!-- DIV que almacenará la tabla -->
                    <div id="CostosVariablesUnit-Tabla" class="tx-center">
                        <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                        <p>
                            Cargando contenido
                        </p>
                    </div>
                
                </div>

            </div><!-- tab-pane -->
            <div class="tab-pane" id="CVUTotal">
                <div class="table-wrapper">

                    <!-- DIV que almacenará la tabla -->
                    <div id="CVUTotal-Tabla" class="tx-center">
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

<!-- SECCION DE LOS MODALES -->

<!-- FORMULARIO PARA AGREGAR UN COSTO FIJO MENSUAL -->
<div id="FormCostoFijoMes" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Costo Fijo Mensual</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addCFM"></span>
                                <form id="form-add-CFM">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el concepto del costo fijo:</label>
                                        <input type="text" id="cfmName" name="cfmName" class="form-control pd-y-12" placeholder="Ejemplo: Sueldos y Salarios" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el monto mensual en pesos mexicanos:</label>
                                        <input type="number" id="monto_mensual" name="monto_mensual" class="form-control pd-y-12" placeholder="Ejemplo: $ 20000.00" min="0" step="0.1" required>
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

<!-- FORMULARIO PARA EDITAR UN COSTO FIJO MENSUAL -->
<div id="FormCostoFijoMes-Edit" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Editar Costo Fijo Mensual</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-editCFM"></span>
                                <form id="form-edit-CFM">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el concepto del costo fijo:</label>
                                        <input type="text" id="editcfmName" name="cfmName" class="form-control pd-y-12" placeholder="Ejemplo: Sueldos y Salarios" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el monto mensual en pesos mexicanos:</label>
                                        <input type="number" id="editmonto_mensual" name="monto_mensual" class="form-control pd-y-12" placeholder="Ejemplo: $ 20000.00" min="0" step="0.1" required>
                                    </div><!-- form-group -->

                                    <input type="hidden" id="idCostoFijoMes" name="idCostoFijoMes" value="">

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- modal -->

<!-- FORM para eliminar un registro de Costo Fijo Mensual -->
<form action="{{ url('analisisCostos/deleteCostoFijoMes/:ID') }}" id="form-delete-CFM" method="post">
    @csrf
    @method('delete')
</form>

<!-- FORMULARIO PARA AGREGAR UN COSTO VARIABLE UNITARIO -->
<div id="FormCostosVariablesUnit" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Costo Varibale Unitario</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addCVU"></span>
                                <p>Usted puede registrar maximo 10 registros, ingresando uno a la vez.</p>
                                <form id="form-add-CVU">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el concepto del costo variable:</label>
                                        <input type="text" id="cvuName" name="cvuName" class="form-control pd-y-12" placeholder="Ejemplo: Materia Prima" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Costo Unitario en pesos mexicanos:</label>
                                        <input type="number" id="costoU" name="costoU" class="form-control pd-y-12" placeholder="Ejemplo: $ 20000.00" min="0" step="0.1" required>
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

<!-- FORMULARIO PARA EDITAR UN COSTO VARIABLE UNITARIO -->
<div id="FormCostosVariablesUnit-Edit" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Editar Costo Varibale Unitario</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-editCVU"></span>
                                <form id="form-edit-CVU">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el concepto del costo variable:</label>
                                        <input type="text" id="editcvuName" name="cvuName" class="form-control pd-y-12" placeholder="Ejemplo: Materia Prima" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Costo Unitario en pesos mexicanos:</label>
                                        <input type="number" id="editcostoU" name="costoU" class="form-control pd-y-12" placeholder="Ejemplo: $ 20000.00" min="0" step="0.1" required>
                                    </div><!-- form-group -->

                                    <input type="hidden" id="idCVU" name="idCVU" value="">

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

<!-- FORM para eliminar un registro de Costo Variable Unitario -->
<form action="{{ url('analisisCostos/deleteCostoVariableUnit/:ID') }}" id="form-delete-CVU" method="post">
    @csrf
    @method('delete')
</form>

@endsection

@section('scripts')
<script>

    // Llena los registros de Costos Fijos Mensuales
    function llenarTablaCostosFijosMensuales(){

        // Petición GET a la url
        $.get("{{url('analisisCostos/getCostosFijosMes')}}", {}, function(response){
            // Recibe la tabla formada en PHP y la integra en un div
            $("#CostosFijosMes-Tabla").html(response);

            $('#TablaCostosFijosMes').DataTable({
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

    // Llena los registros de Costos Fijos Mensuales
    function llenarTablaCostosVariablesUnitarios(){

        // Petición GET a la url
        $.get("{{url('analisisCostos/getCostosVariablesUnit')}}", {}, function(response){
            // Recibe la tabla formada en PHP y la integra en un div
            $("#CostosVariablesUnit-Tabla").html(response);

            $('#TablaCostosVariablesUnit').DataTable({
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

    // Llena los registros de Costos Fijos Mensuales
    function llenarTablaCVUTotal(){

        // Petición GET a la url
        $.get("{{url('analisisCostos/getCVUTotal')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#CVUTotal-Tabla").html(response);

        });
    }

    // Función que rellena los datos del form de edición de Costos Fijos Mensuales
    function llenarFormCostosFijoMesEdit(id){

        // Obtener la url para traer un registro
        var enlace = "{{url('analisisCostos/getUnCostoFijoMes/:ID')}}";
        enlace = enlace.replace(':ID', id);

        // Petición GET a la url
        $.get(enlace, {}, function(response){
            // Se rellenan los input con los valores traidos de la bd
            $('#editcfmName').val(response.CFM[0].concepto_CFM);
            $('#editmonto_mensual').val(response.CFM[0].CFM);
            $('#idCostoFijoMes').val(response.CFM[0].id_CFM);
        });

        $('#FormCostoFijoMes-Edit').modal("show");
    }

    // Función que rellena los datos del form de edición de Costos Variables Unitarios
    function llenarFormCostosVariablesUnitEdit(id){

        // Obtener la url para traer un registro
        var enlace = "{{url('analisisCostos/getUnCostoVariableUnit/:ID')}}";
        enlace = enlace.replace(':ID', id);

        // Petición POST a la url
        $.get(enlace, {}, function(response){
            // Se rellenan los input con los valores traidos de la bd
            $('#editcvuName').val(response.CVU[0].concepto_costos_variables_unitarios);
            $('#editcostoU').val(response.CVU[0].costoU_costos_variables_unitarios);
            $('#idCVU').val(response.CVU[0].id_costos_variables_unitarios);
        });

        $('#FormCostosVariablesUnit-Edit').modal("show");
    }

    // Función que borrará un registro de Costos Fijos Mensuales
    function deleteCostoFijoMes(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete-CFM');
        // Se reemplaza en la ruta :ID por el id real extraido anteriormente
        var url = form.attr('action').replace(':ID', id);
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
                            llenarTablaCostosFijosMensuales();
                            llenarTablaCVUTotal();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });
    }

    // Función que borrará un registro de Costos Fijos Mensuales
    function deleteCostoVaraibleUnitario(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete-CVU');
        // Se reemplaza en la ruta :ID por el id real extraido anteriormente
        var url = form.attr('action').replace(':ID', id);
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
                            llenarTablaCostosVariablesUnitarios();
                            llenarTablaCVUTotal();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });
    }

    $(document).ready( function() {
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        // Cuando se presiona el botón de guardar en el form de Costos Fijos Mensuales
        $('#form-add-CFM').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{ url('analisisCostos/addCostoFijosMes') }}",
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
                        $('#form-result-addCFM').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas para mostrar datos nuevos
                        llenarTablaCostosFijosMensuales();
                        llenarTablaCVUTotal();

                        // Oculta el modal
                        $('#FormCostoFijoMes').modal('hide');
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

        // Cuando se presiona el botón de guardar en el form de Costos Fijos Mensuales
        $('#form-add-CVU').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{ url('analisisCostos/addCostoVariableUnit') }}",
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
                        $('#form-result-addCVU').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas para mostrar datos nuevos
                        llenarTablaCostosVariablesUnitarios();
                        llenarTablaCVUTotal();

                        // Oculta el modal
                        $('#FormCostosVariablesUnit').modal('hide');
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

        // Función que edita un registro de Costos Fijos Variables
        $('#form-edit-CFM').submit(function(e) {
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
                url: "{{url('analisisCostos/editCostoFijoMes')}}",
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

                        $('#form-result-editCFM').html(html);
                    }

                    if(data.success){
                        // Se recarga la tabla
                        llenarTablaCostosFijosMensuales();
                        llenarTablaCVUTotal();

                        // Y se cierra el modal
                        $('#FormCostoFijoMes-Edit').modal('hide');
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

        // Función que edita un registro de Costo Variable Unitario
        $('#form-edit-CVU').submit(function(e) {
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
                url: "{{url('analisisCostos/editCostoVariableUnit')}}",
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

                        $('#form-result-editCVU').html(html);
                    }

                    if(data.success){
                        // Se recarga la tabla
                        llenarTablaCostosVariablesUnitarios();
                        llenarTablaCVUTotal();

                        // Y se cierra el modal
                        $('#FormCostosVariablesUnit-Edit').modal('hide');
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

        // Función para borrar los datos de un modal cuando se cierre
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
            
        });

        // Se llaman a las funciones que llenan las tablas
        llenarTablaCostosFijosMensuales();
        llenarTablaCostosVariablesUnitarios();
        llenarTablaCVUTotal();
    });
</script>
@endsection