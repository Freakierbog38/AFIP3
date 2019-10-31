@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <label class="section-title mg-b-35 tx-15 tx-center">Sección 1: Análisis de Ventas</label>
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#VentasProdSer" data-toggle="tab">Ventas de Productos o Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#EstacionVentas" data-toggle="tab">Estacionalidad de las Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Resultados" data-toggle="tab">Resultados de Tabla en Pesos Mexicanos</a>
            </li>
        </ul>
    </div><!-- card-header -->

    
    <div class="card-body">
        <div class="tab-content">

            <!-- PESTAÑA DE VENTAS DE SERVICIO O PRODUCTO -->
            <div class="tab-pane active" id="VentasProdSer">
                <div class="col mg-b-20">
                    <a href="#FormVentasProdSer" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="table-wrapper">
                    
                    <!-- En este DIV se genera la tabla de VENTAS DE PRODUCTOS O SERVICIOS -->
                    <div id="VentasPS-Tabla" class="tx-center">
                        <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                        <p>
                            Cargando contenido
                        </p>
                    </div>
                
                </div><!-- table-wrapper -->

            </div><!-- tab-pane -->

            <!-- PESTAÑA DE ESTACIONALIDAD DE VENTAS -->
            <div class="tab-pane" id="EstacionVentas">
                <div class="col mg-b-20">
                    <span id="boton-EV"></span>
                </div>
                <div class="table-wrapper">

                    <!-- En este DIV se genera la tabla de ESTACIONALIDAD DE VENTAS  -->
                    <div id="EstacionalidadVentas-Tabla" class="tx-center">
                        <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                        <p>
                            Cargando contenido
                        </p>
                    </div>

                </div>

            </div><!-- tab-pane -->

            <!-- PESTAÑA DE RESULTADOS -->
            <div class="tab-pane" id="Resultados">
                <div class="table-wrapper">

                    <!-- En este DIV se genera la tabla de RESULTADOS -->
                    <div id="Resultados-Tabla" class="tx-center">
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

<!-- FORMULARIO PARA AGREGAR UN PRODUCTO O SERVICIO -->
<div id="FormVentasProdSer" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Producto o Servicio</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                            <span id="form-result"></span>
                            <form url="{{ url('analisisVentas/agregarVentasProSer') }}" id="form-add-VPS">
                                @csrf
                                <div class="form-group">
                                    <label class="tx-bold">Ingrese el nombre del producto o servicio que ofrece:</label>
                                    <input type="text" id="ProductoServicio" name="ProductoServicio" class="form-control pd-y-12" placeholder="Ejemplo: Cargador inalámbrico / Mantenimiento de eq. de computo" required>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="tx-bold">Ingrese el numero de productos o servicios que vende al mes:</label>
                                    <input type="number" id="UnidadesMes" name="UnidadesMes" class="form-control pd-y-12" placeholder="Ejemplo: 500" onchange="cal()" onkeyup="cal()" required>
                                </div><!-- form-group -->
                                
                                <div class="form-group">
                                    <label class="tx-bold">Ingrese el precio unitario en pesos mexicanos del producto o servicio que ofrece:</label>
                                    <input type="number" id="PrecioUnitario" name="PrecioUnitario" class="form-control pd-y-12" placeholder="Ejemplo: 500.00" onchange="cal()" onkeyup="cal()" required>
                                </div><!-- form-group -->
                                
                                <div class="form-group">
                                    <label class="tx-bold">Ventas en pesos mexicanos:</label>
                                    <input type="number" id="mult" name="mult" class="form-control pd-y-12" placeholder="Resultado" readonly>
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

<!-- FORMULARIO PARA EDITAR UN PRODUCTO O SERVICIO -->
<div id="FormVentasProdSer-Edit" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Editar Producto o Servicio</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-edit"></span>
                                <form id="formUno"> @csrf </form>
                                <form id="form-edit-VPS">
                                    @csrf
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el nombre del producto o servicio que ofrece:</label>
                                        <input type="text" id="editProductoServicio" name="ProductoServicio" class="form-control pd-y-12" placeholder="Ejemplo: Cargador inalámbrico / Mantenimiento de eq. de computo" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el numero de productos o servicios que vende al mes:</label>
                                        <input type="number" id="editUnidadesMes" name="UnidadesMes" class="form-control pd-y-12" placeholder="Ejemplo: 500" onchange="cal2()" onkeyup="cal2()" required>
                                    </div><!-- form-group -->
                                    
                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el precio unitario en pesos mexicanos del producto o servicio que ofrece:</label>
                                        <input type="number" id="editPrecioUnitario" name="PrecioUnitario" class="form-control pd-y-12" placeholder="Ejemplo: 500.00" onchange="cal2()" onkeyup="cal2()" required>
                                    </div><!-- form-group -->
                                    
                                    <div class="form-group">
                                        <label class="tx-bold">Ventas en pesos mexicanos:</label>
                                        <input type="number" id="editmult" name="mult" class="form-control pd-y-12" placeholder="Resultado" readonly>
                                    </div><!-- form-group -->

                                    <input type="hidden" name="editID" id="editID" value="">

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

<!-- FORMULARIO PARA AGREGAR ESTACIONALIDAD DE VENTAS -->
<div id="FormEstacionVentas" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Estacionalidad de Ventas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-y-30 pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <span id="form-result-EV"></span>
                                <p>Ingrese el indice de ventas de las últimos 12 meses donde 1 representa un indice de ventas estacional; mayor a 1 representa un índice de ventas alto y menor a 1 representa un índice de ventas bajo.</p>
                                <form id="form-add-EV">
                                @csrf
                                <div class="form-group">
                                    <label class="tx-bold">Ingrese el año:</label>
                                    <input type="number" name="anio" class="form-control pd-y-12" placeholder="Ingrese aquí el año. Ejemplo: 2018">
                                </div><!-- form-group -->
                                
                                    <div class="row">
                                        <div class="col-6">

                                            <div class="form-group">
                                                <label>Enero:</label>
                                                <input type="number" name="Ventas1" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->
                                    
                                            <div class="form-group">
                                                <label>Febrero:</label>
                                                <input type="number" name="Ventas2" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->
                                    
                                            <div class="form-group">
                                                <label>Marzo:</label>
                                                <input type="number" name="Ventas3" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Abril:</label>
                                                <input type="number" name="Ventas4" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Mayo:</label>
                                                <input type="number" name="Ventas5" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Junio:</label>
                                                <input type="number" name="Ventas6" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">
                                                <label>Julio:</label>
                                                <input type="number" name="Ventas7" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Agosto:</label>
                                                <input type="number" name="Ventas8" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Septiembre:</label>
                                                <input type="number" name="Ventas9" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Octubre:</label>
                                                <input type="number" name="Ventas10" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Noviembre:</label>
                                                <input type="number" name="Ventas11" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label>Diciembre:</label>
                                                <input type="number" name="Ventas12" class="form-control pd-y-12" step="0.01" value="1">
                                            </div><!-- form-group -->

                                        </div><!-- col-6 -->
                                    </div><!-- row -->

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

<!-- MODAL PARA CONFIRMACIÓN DE ELIMINACIÓN -->
<div id="modalEliminar" class="modal fade">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">¡Aviso!</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <p class="mg-b-5">¿Está seguro de que quiere eliminar los registros?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger">Sí</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- FORM para eliminar un registro de la tabla Ventas de Productos o Servicios -->
<form action="{{ url('analisisVentas/eliminarVentasProSer/:ID') }}" id="form-delete-VPS" method="post">
    @csrf
    @method('delete')
</form>

@endsection

@section('scripts')
<script>

    // FUNCION PARA CALCULAR LAS VENTAS MEDIANTE MULTIPLICACION DE VALORES
    function cal() {
        //CREACION DE VARIABLES PARA LA MULTIPLICACION Y ASIGNACION DE VALORES CONVERTIDOS EXTRAIDOS DE LOS CAMPOS DE ENTRADA
        var a = parseInt($('#UnidadesMes').val());
        var b = parseFloat($('#PrecioUnitario').val());
        //MULTIPLICACION DE VARIABLES Y ASIGNACION AL CAMPO DE VENTAS
        var resmult = a.toFixed(2) * b;

        $('#mult').val(resmult.toFixed(2));
    }

    // FUNCION PARA CALCULAR LAS VENTAS MEDIANTE MULTIPLICACION DE VALORES - DEL MODAL DE EDICION
    function cal2() {
        //CREACION DE VARIABLES PARA LA MULTIPLICACION Y ASIGNACION DE VALORES CONVERTIDOS EXTRAIDOS DE LOS CAMPOS DE ENTRADA
        var a = parseInt($('#editUnidadesMes').val());
        var b = parseFloat($('#editPrecioUnitario').val());
        //MULTIPLICACION DE VARIABLES Y ASIGNACION AL CAMPO DE VENTAS
        var resmult = a.toFixed(2) * b;

        $('#editmult').val(resmult.toFixed(2));
    }

    // Llena los registros de Ventas de Productos o Servicios
    function llenarTablaVentasProductoServicio(){

        // Petición GET a la url
        $.get("{{url('analisisVentas/getVentasProdSer')}}", {}, function(response){
            // Recibe la tabla formada en PHP y la integra en un div
            $("#VentasPS-Tabla").html(response);

            $('#TablaAnalisisVentas').DataTable({
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

    // Llena los registros de Estacionalidad de Ventas
    function llenarTablaEstacionalidadVentas(){

        // Petición GET a la url
        $.get("{{url('analisisVentas/getEstacionalidadVentas')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#EstacionalidadVentas-Tabla").html(response.tabla);

            // Recibe el botón a integrar, dependiendo si hay o no registros
            $("#boton-EV").html(response.boton);

            $('#TablaEstacionVentas').DataTable({
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

    // Llena los registros de Estacionalidad de Ventas
    function llenarTablaResultados(){

        // Petición GET a la url
        $.get("{{url('analisisVentas/getResultados')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#Resultados-Tabla").html(response);

        });
    }

    // Función que rellena los datos del form de edición de Ventas de Productos o Servicios
    function llenarFormularioEdit(id){
        // Obtener la url para traer un registro
        var enlace = "{{url('analisisVentas/selectUnProSer/:ID')}}";
        enlace = enlace.replace(':ID', id);
        //Variable que guarda el objeto del registro
        var resp = enlace;
        var data = $('#formUno').serialize();

        // Petición POST a la url
        $.post(enlace, data, function(response){
            // Se rellenan los input con los valores traidos de la bd
            $('#editProductoServicio').val(response.PD[0].nombre_producto_servicio_mezcla_productos_servicios_1_anio);
            $('#editUnidadesMes').val(response.PD[0].precio_u_producto_servicio_mezcla_productos_servicios_1_anio);
            $('#editPrecioUnitario').val(response.PD[0].us_producto_servicio_mezcla_productos_servicios_1_anio);
            $('#editmult').val(response.PD[0].ventas_producto_servicio_mezcla_productos_servicios_1_anio);
            $('#editID').val(response.PD[0].id_producto_servicio_mezcla_productos_servicios_1_anio);
        });

        $('#FormVentasProdSer-Edit').modal("show");
    }

    // Función que borrará un registro de Productos o Servicios
    function borrarProSer(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete-VPS');
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
                            llenarTablaVentasProductoServicio();
                            llenarTablaResultados();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    // Función que borrará un registro de Estacionalidad de Ventas
    function borrarEstacionVentas(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete-VPS');
        // Se reemplaza en la ruta :ID por el id real extraido anteriormente
        var ruta = '{{ url("/analisisVentas/eliminarEstacionalidadVentas/:ID") }}';
        var url = ruta.replace(':ID', id);
        // Se preparan los datos
        var data = form.serialize();

        bootbox.dialog({
            message: "¿Estás seguro de eliminar los registros?",
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
                            llenarTablaEstacionalidadVentas();
                            llenarTablaResultados();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('Los registros no fueron eliminados');
                        });
                        
                    }
                }
            }
        });

    }

    $(function() {

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        // Función que edita un registro de Ventas de Productos o Servicios
        $('#form-edit-VPS').submit(function(e) {
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
                url: "{{url('analisisVentas/editarVentasProSer')}}",
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

                        $('#form-result-edit').html(html);
                    }

                    if(data.success){
                        // Se recarga la tabla
                        llenarTablaVentasProductoServicio();
                        llenarTablaResultados();
                        // Y se cierra el modal
                        $('#FormVentasProdSer-Edit').modal('hide');
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

        // Cuando se presiona el botón de guardar en el form de Ventas de Productos o Servicios
        $('#form-add-VPS').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('analisisVentas/agregarVentasProSer')}}",
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
                        $('#form-result').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas para mostrar datos nuevos
                        llenarTablaVentasProductoServicio();
                        llenarTablaResultados();
                        // Oculta el modal
                        $('#FormVentasProdSer').modal('hide');
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

        // Función que agrega registros de Estacionalidad de Ventas
        $('#form-add-EV').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('analisisVentas/agregarEstacionalidadVentas')}}",
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
                        $('#form-result-EV').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarTablaEstacionalidadVentas();
                        llenarTablaResultados();
                        // Esconde el modal
                        $('#FormEstacionVentas').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-EV')[0].reset();
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
        
        // Se cargan las tablas
        llenarTablaVentasProductoServicio();
        llenarTablaEstacionalidadVentas();
        llenarTablaResultados();
        $(".loader").fadeOut("slow");
    });

</script>
@endsection