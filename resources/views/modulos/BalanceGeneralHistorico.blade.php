@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <label class="section-title mg-b-35 tx-15 tx-center">Sección 4: Balance General Histórico</label>
    <div class="col-md mg-b-25 tx-right">
        <span class="tx-bold">Fecha: </span>
        <span id="FechaBalanceGral-contenido"></span>
        -
        <a href="#modalFechaBalance" class="modal-effect" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>
    </div>
    <div class="card-header">
        
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#Activos" data-toggle="tab">Activos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Pasivos" data-toggle="tab">Pasivos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#CapitalContable" data-toggle="tab">Capital Contable</a>
            </li>
        </ul>
    </div><!-- card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="Activos">
                <div class="col-md">
                    <h2>Activos</h2>
                    <span id="botonActivos"></span>
                    
                    <div id="Activos-Contenido" class="tx-center">
                        <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                        <p>
                            Cargando contenido
                        </p>
                    </div>

                </div>
                <br>
                
                <div class="col mg-b-20">
                    <h2>Desglose de Activos Fijos</h2>
                    <a href="#modalAddDesgloseActivo" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="table-wrapper tx-center" id="DesgloseActivos-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                    
                </div><!-- table-wrapper -->

            </div><!-- tab-pane -->
            <div class="tab-pane" id="Pasivos">
                <div class="col mg-b-20">
                    <span id="botonPasivos"></span>
                </div>
                <div class="table-wrapper" id="Pasivos-Contenido" class="tx-center">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                    
                </div>

            </div><!-- tab-pane -->
            <div class="tab-pane" id="CapitalContable">
                <div class="col mg-b-20">
                    <span id="botonCapCon"></span>
                </div>
               

                <div class="table-wrapper" id="CapitalContable-Contenido" class="tx-center">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                    
                </div>

            </div><!-- tab-pane -->
        </div><!-- tab-content -->
    </div><!-- card-body -->
</div><!-- card -->

<!-- FORMULARIO PARA AGREGAR FECHA AL BALANCE GENERAL -->
<div id="modalFechaBalance" class="modal fade">
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
                                <span id="form-result-addFechaBalance"></span>
                                <p><i class="fa fa-info-circle" aria-hidden="true"> Seleccione la fecha del balance general y el número de meses que abarca.</i></p>
                                <form id="form-add-FechaBalance">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Fecha del Balance:</label>
                                        <input type="date" id="fecha_bal" name="fecha_bal" class="form-control pd-y-12" required>
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

<!-- FORMULARIO PARA AGREGAR UN ACTIVO -->
<div id="modalAddActivo" class="modal fade">
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
                                <span id="form-result-addActivo"></span>
                                <p><i class="fa fa-info-circle" aria-hidden="true"> Usted puede ingresar maximo 1 valor para cada activo. Si no tiene un activo coloque 0 donde corresponda.</i></p>
                                <form id="form-add-Activo">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Activo Circulante:</label>
                                        <input type="number" id="activo_cir" name="activo_cir" class="form-control pd-y-12" min="0" step="0.01" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Activo Diferido:</label>
                                        <input type="number" id="activo_dif" name="activo_dif" class="form-control pd-y-12" min="0" step="0.01" required>
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

<!-- FORMULARIO PARA AGREGAR UN DESGLOSE DE ACTIVO -->
<div id="modalAddDesgloseActivo" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Activo Fijo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addDesgloseActivo"></span>
                                <form id="form-add-DesgloseActivo">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el nombre del activo fijo aportado:</label>
                                        <input type="text" id="activo_fijo" name="activo_fijo" class="form-control pd-y-12" placeholder="Nombre del activo" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el valor histórico del activo fijo:</label>
                                        <input type="number" id="monto_activo" name="monto_activo" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese la cantidad de unidades:</label>
                                        <input type="number" id="valor_un" name="valor_un" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 10" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese la depreciación:</label>
                                        <input type="number" id="depreciacion" name="depreciacion" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Años restantes:</label>
                                        <input type="number" id="anios_restantes" name="anios_restantes" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 5" required>
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

<!-- FORMULARIO PARA EDITAR UN DESGLOSE DE ACTIVO -->
<div id="modalEditDesgloseActivo" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Activo Fijo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-editDesgloseActivo"></span>
                                <form id="form-edit-DesgloseActivo">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el nombre del activo fijo aportado:</label>
                                        <input type="text" id="editactivo_fijo" name="editactivo_fijo" class="form-control pd-y-12" placeholder="Nombre del activo" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese la monto del activo fijo:</label>
                                        <input type="number" id="editmonto_activo" name="monto_activo" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el valor en unidades:</label>
                                        <input type="number" id="editvalor_un" name="valor_un" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 10" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese la depreciación:</label>
                                        <input type="number" id="editdepreciacion" name="depreciacion" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Años restantes:</label>
                                        <input type="number" id="editanios_restantes" name="anios_restantes" class="form-control pd-y-12" min="0" step="1" placeholder="Ejemplo: 5" required>
                                    </div><!-- form-group -->

                                    <input type="hidden" name="id" id="id" value="">

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

<!-- FORM para eliminar un registro de la tabla Ventas de Productos o Servicios -->
<form action="{{ url('balanceGeneralHistorico/deleteDesgloseActivo/:ID') }}" id="form-delete-DesgloseActivo" method="post">
    @csrf
    @method('delete')
</form>

<!-- FORMULARIO PARA AGREGAR UN PASIVO -->
<div id="modalAddPasivo" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Pasivo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addPasivo"></span>
                                <form id="form-add-Pasivo">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Pasivo Corto Plazo:</label>
                                        <input type="number" id="pasivo_cor" name="pasivo_cor" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Pasivo Largo Plazo:</label>
                                        <input type="number" id="pasivo_lar" name="pasivo_lar" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
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

<!-- FORMULARIO PARA AGREGAR CAPITAL CONTABLE -->
<div id="modalAddCapCon" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Capital Contable</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-addCapCon"></span>
                                <form id="form-add-CapitalContable">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Capital Aporte:</label>
                                        <input type="number" id="capital_apor" name="capital_apor" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Capital Ganado:</label>
                                        <input type="number" id="capital_gan" name="capital_gan" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
                                    </div><!-- form-group -->
                                    <input type="hidden" id="total_activo" name="total_activo">
                                    <input type="hidden" id="total_pasivo" name="total_pasivo">
                                    <!-- <div class="form-group">
                                        <label class="tx-bold">Exceso/Insufuciencia:</label>
                                        <input type="number" id="exceso_ins" name="exceso_ins" class="form-control pd-y-12" min="0" step="0.01" placeholder="Ejemplo: 500.00" required>
                                    </div> -->

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
    function llenarFechaBalanace(){

        // Petición GET a la url
        $.get("{{url('balanceGeneralHistorico/getFechaBalanceGral')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#FechaBalanceGral-contenido").html(response);
            
        });
    }

    // Trae en inserta en una etiqueta html la tabla de Activos
    function llenarTablaActivos(){

        // Petición GET a la url
        $.get("{{url('balanceGeneralHistorico/getActivos')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#Activos-Contenido").html(response.tabla);
            $("#botonActivos").html(response.boton);
            document.getElementById('total_activo').value=response.datos['total_activos'];

        });
    }

    // Trae en inserta en una etiqueta html la tabla de Activos
    function llenarTablaDesgloseActivos(){

        // Petición GET a la url
        $.get("{{url('balanceGeneralHistorico/getDesgloseActivos')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#DesgloseActivos-Contenido").html(response.tabla);
            llenarTablaActivos();
            console.log('suma: '+response.total);

            $('#TablaDesgloseActivos').DataTable({
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

    // Trae en inserta en una etiqueta html la tabla de Activos
    function llenarTablaPasivos(){

        // Petición GET a la url
        $.get("{{url('balanceGeneralHistorico/getPasivos')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#Pasivos-Contenido").html(response.tabla);
            $("#botonPasivos").html(response.boton);
            document.getElementById('pasivo_cor').value=response.datos['corto'];
            document.getElementById('pasivo_lar').value=response.datos['largo'];
            document.getElementById('total_pasivo').value=response.datos['total_pasivos'];

            $('#TablaPasivos').DataTable({
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

    // Trae en inserta en una etiqueta html la tabla de Activos
    function llenarTablaCapitalContable(){

        // Petición GET a la url
        $.get("{{url('balanceGeneralHistorico/getCapitalContable')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#CapitalContable-Contenido").html(response.tabla);
            $("#botonCapCon").html(response.boton);
            document.getElementById('capital_apor').value=response.datos['capital_aportado'];
            document.getElementById('capital_gan').value=response.datos['capital_ganado'];

            $('#TablaCapitalContable').DataTable({
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

    // Función que rellena los datos del form de edición de Desglose de Activos
    function llenarFormularioEditDesgloseActivo(id){
        // Obtener la url para traer un registro
        var enlace = "{{url('balanceGeneralHistorico/getUnDesgloseActivo/:ID')}}";
        enlace = enlace.replace(':ID', id);

        // Petición GET a la url
        $.get(enlace, {}, function(response){
            // Se rellenan los input con los valores traidos de la bd
            $('#editactivo_fijo').val(response.AD[0].activos_fijos_aportados_desgloce_activos_fijos_aportados);
            $('#editmonto_activo').val(response.AD[0].cantidad_desgloce_activos_fijos_aportados);
            $('#editvalor_un').val(response.AD[0].valor_unidades_desgloce_activos_fijos_aportados);
            $('#editdepreciacion').val(response.AD[0].depreciacion_desgloce_activos_fijos_aportados);
            $('#editanios_restantes').val(response.AD[0].anios_restantes_desgloce_activos_fijos_aportados);
            $('#id').val(response.AD[0].id_desgloce_activos);
        });

        $('#modalEditDesgloseActivo').modal("show");
    }

    // Función que borrará un desglose de activo
    function borrarDesgloseActivo(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete-DesgloseActivo');
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
                            llenarTablaDesgloseActivos();
                            llenarTablaActivos();
                            llenarTablaCapitalContable();
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

        // Función que agrega fecha al Balance General Histórico
        $('#form-add-FechaBalance').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('balanceGeneralHistorico/addFechaBalanceGral')}}",
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
                        $('#form-result-addFechaBalance').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarFechaBalanace();
                        // Esconde el modal
                        $('#modalFechaBalance').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-FechaBalance')[0].reset();

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

        // Función que agrega un Activo
        $('#form-add-Activo').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('balanceGeneralHistorico/addActivo')}}",
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
                        $('#form-result-addActivo').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarTablaActivos();
                        llenarTablaCapitalContable();
                        // Esconde el modal
                        $('#modalAddActivo').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Activo')[0].reset();

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

        // Función que agrega un Desglose de Activo
        $('#form-add-DesgloseActivo').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('balanceGeneralHistorico/addDesgloseActivo')}}",
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
                        $('#form-result-addDesgloseActivo').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarTablaDesgloseActivos();
                        llenarTablaActivos();
                        llenarTablaCapitalContable();
                        // Esconde el modal
                        $('#modalAddDesgloseActivo').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-DesgloseActivo')[0].reset();
                        console.log(data.valor);
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

        // Función que edita un registro de Costo Variable Unitario
        $('#form-edit-DesgloseActivo').submit(function(e) {
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
                url: "{{url('balanceGeneralHistorico/editDesgloseActivo')}}",
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

                        $('#form-result-editDesgloseActivo').html(html);
                    }

                    if(data.success){
                        // Se recarga la tabla
                        llenarTablaDesgloseActivos();
                        llenarTablaActivos();
                        llenarTablaCapitalContable();

                        // Y se cierra el modal
                        $('#modalAddPasivo').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Pasivo')[0].reset();
                        // Muestra un modal de que la operación ha sido exitosa
                        bootbox.alert({
                            message: data.success,
                            buttons: {
                                ok: {
                                    className: 'btn btn-success'
                                }
                            }
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

        // Función que agrega un Desglose de Activo
        $('#form-add-Pasivo').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('balanceGeneralHistorico/addPasivo')}}",
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
                        $('#form-result-addPasivo').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarTablaPasivos();
                        llenarTablaCapitalContable();
                        llenarTablaActivos();
                        llenarTablaPasivos();
                        
                        // Esconde el modal
                        $('#modalAddPasivo').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Pasivo')[0].reset();

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

        // Función que agrega Capital Contable
        $('#form-add-CapitalContable').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('balanceGeneralHistorico/addCapitalContable')}}",
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
                        $('#form-result-addCapCon').html(html);
                        //console.log(data.datos);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarTablaCapitalContable();
                        //console.log(data.datos);
                        
                        // Esconde el modal
                        $('#modalAddCapCon').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-CapitalContable')[0].reset();

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

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        

        llenarFechaBalanace();
        llenarTablaActivos();
        llenarTablaDesgloseActivos();
        llenarTablaPasivos();
        llenarTablaCapitalContable();

    });
</script>
@endsection