@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <label class="section-title mg-b-35 tx-15 tx-center">Sección 7: Financiamiento Solicitado</label>
    <div class="card-header">
        
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#Pasivos" data-toggle="tab">Pasivos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Capital" data-toggle="tab">Capital</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Financiamiento" data-toggle="tab">Apoyos Directos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Inversiones" data-toggle="tab">Inversiones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Capacidad" data-toggle="tab">Capacidad de Activos y Capacidad Utilizada</a>
            </li>
        </ul>
    </div><!-- card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="Pasivos">

                <div class="col mg-b-20">
                    <h2>Pasivos Actuales</h2>
                    <a href="#modalAddPasivosAct" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="col mg-b-20 tx-center" id="PasivosAct-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

                <div class="col mg-b-20">
                    <h2>Pasivos adicionales en caso de desarrollarse el proyecto</h2>
                    <a href="#modalAddPasivosDes" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="col mg-b-20 tx-center" id="PasivosDes-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
            <div class="tab-pane" id="Capital">

                <div class="col mg-b-20">
                    <h2>Capital Contable Actual</h2>
                    <a href="#modalAddCapitalAct" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="col mg-b-20 tx-center" id="CapitalAct-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

                <div class="col mg-b-20">
                    <h2>Capital Adicional en Caso de Desarrollarse el Proyecto</h2>
                    <a href="#modalAddCapitalDes" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="col mg-b-20 tx-center" id="CapitalDes-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
            <div class="tab-pane" id="Financiamiento">

                <div class="col mg-b-20">
                    <a href="#modalAddFinanciamiento" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="col mg-b-20 tx-center" id="Financiamiento-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
            <div class="tab-pane" id="Inversiones">

                <div class="col mg-b-20">
                    <h2>Destino de las Inversiones</h2>
                    <a href="#modalAddInversiones" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="col mg-b-20 tx-center" id="Inversiones-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

                <div class="col mg-b-20">
                    <h2>Desgloce de las Inversiones en Activos Fijos</h2>
                    <a href="#modalAddInversionesDesglose" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>
                </div>
                <div class="col mg-b-20 tx-center" id="InversionesDesglose-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
            <div class="tab-pane" id="Capacidad">

                <div class="col mg-b-20">
                    <span id="botonCapacidad"></span>
                </div>
                <div class="col mg-b-20 tx-center" id="Capacidad-Contenido">
                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                    <p>
                        Cargando contenido
                    </p>
                </div>

            </div><!-- tab-pane -->
        </div><!-- tab-content -->
    </div><!-- card-body -->
</div><!-- card -->

<!-- FORMULARIO PARA AGREGAR PASIVO ACTUAL -->
<div id="modalAddPasivosAct" class="modal fade">
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
                                <span id="form-result-addPasivosAct"></span>
                                <form id="form-add-PasivosAct">
                                    @csrf
                            
                                    <div class="form-group">
                                        <label class="tx-bold">Clave:</label>
                                        <input type="text" id="clave" name="clave" class="form-control pd-y-12"  placeholder="Ingrese una clave aquí" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Tipo de Financiamiento:</label>
                                        <input type="text" id="tipo_fin" name="tipo_fin" class="form-control pd-y-12" placeholder="Ejemplo: Crédito refaccionario, Avio, etc" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Monto:</label>
                                        <input type="number" id="monto" name="monto" class="form-control pd-y-12" step="0.01" placeholder="Ingrese el monto aquí" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Tipo de Tasa:</label>
                                        <select class="form-control pd-y-12" name="tipo_tas" id="tipo_tas">
                                            <option value="A">Seleccione...</option>
                                            <option value="Fijo">Activo Fijo</option>
                                            <option value="Variable">Activo Variable</option>
                                        </select>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Interes (%):</label>
                                        <input type="number" id="interes" name="interes" class="form-control pd-y-12" step="0.01" placeholder="Escriba el porcentaje de interés anual" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Plazo en No. de Meses:</label>
                                        <input type="number" id="plazo" name="plazo" class="form-control pd-y-12" step="0.01" placeholder="Ingrese aqui el plazo en meses" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Gracia en Numero de Meses:</label>
                                        <input type="number" id="gracia" name="gracia" class="form-control pd-y-12" step="1" placeholder="Ingrese aqui el plazo en meses" required>
                                    </div><!-- form-group -->

                                    <!-- <div class="form-group">
                                        <label class="tx-bold">Pagos en Numero de Meses:</label>
                                        <input type="number" id="pagos" name="pagos" class="form-control pd-y-12" max="36" step="1" placeholder="Ingrese aqui el plazo en meses" required>
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

<!-- FORMULARIO PARA AGREGAR PASIVOS ADICIONALES EN EL DESARROLLO -->
<div id="modalAddPasivosDes" class="modal fade">
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
                                <i class="fa fa-info-circle" aria-hidden="true"> Ingrese los datos del pasivo correspondiente.</i>
                                <span id="form-result-addPasivosDes"></span>
                                <form id="form-add-PasivosDes">
                                    @csrf

                                    <div class="form-group">
                                        <label class="tx-bold">Clave:</label>
                                        <input type="text" id="clave" name="clave" class="form-control pd-y-12"  placeholder="Ingrese una clave aquí" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Tipo de Financiamiento:</label>
                                        <input type="text" id="tipo_fin" name="tipo_fin" class="form-control pd-y-12" placeholder="Ingrese aqui el Tipo de Financiamiento" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Monto:</label>
                                        <input type="number" id="monto" name="monto" class="form-control pd-y-12" step="0.01" placeholder="Ingrese el monto aquí" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Tipo de Tasa:</label>
                                        <input type="text" id="tipo_tas" name="tipo_tas" class="form-control pd-y-12" placeholder="Ingrese aqui el tipo de tasa" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Interes (%):</label>
                                        <input type="number" id="interes" name="interes" class="form-control pd-y-12" step="0.01" placeholder="Ingrese aqui el incremento" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Plazo en No. de Meses:</label>
                                        <input type="number" id="plazo" name="plazo" class="form-control pd-y-12" step="0.01" placeholder="Ingrese aqui el plazo en meses" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Gracia en Numero de Meses:</label>
                                        <input type="number" id="gracia" name="gracia" class="form-control pd-y-12" step="1" placeholder="Ingrese aqui el plazo en meses" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Pagos en Numero de Meses:</label>
                                        <input type="number" id="pagos" name="pagos" class="form-control pd-y-12" max="36" step="1" placeholder="Ingrese aqui el plazo en meses" required>
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

<!-- FORMULARIO PARA AGREGAR CAPITAL CONTABLE ACTUAL -->
<div id="modalAddCapitalAct" class="modal fade">
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
                                <i class="fa fa-info-circle" aria-hidden="true"> Ingrese los datos del capital correspondiente.</i>
                                <span id="form-result-addCapitalAct"></span>
                                <form id="form-add-CapitalAct">
                                    @csrf

                                    <div class="form-group">
                                        <label class="tx-bold">Descripción del Capital:</label>
                                        <input type="text" id="descripcion_cap" name="descripcion_cap" class="form-control pd-y-12"  placeholder="Ingrese la descripción del capital aquí" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Monto:</label>
                                        <input type="number" id="monto" name="monto" class="form-control pd-y-12" step="0.01" placeholder="Ingrese aqui el Monto aquí" required>
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

<!-- FORMULARIO PARA AGREGAR CAPITAL ADICIONAL EN CASO DE DESARROLLARSE EL PROYECTO -->
<div id="modalAddCapitalDes" class="modal fade">
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
                                <i class="fa fa-info-circle" aria-hidden="true"> Ingrese los datos del capital correspondiente.</i>
                                <span id="form-result-addCapitalDes"></span>
                                <form id="form-add-CapitalDes">
                                    @csrf

                                    <div class="form-group">
                                        <label class="tx-bold">Descripción del Capital:</label>
                                        <input type="text" id="descripcion_cap" name="descripcion_cap" class="form-control pd-y-12"  placeholder="Ingrese la descripción del capital aquí" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Monto:</label>
                                        <input type="number" id="monto" name="monto" class="form-control pd-y-12" step="0.01" placeholder="Ingrese aqui el Monto aquí" required>
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

<!-- FORMULARIO PARA AGREGAR FINANCIAMIENTO -->
<div id="modalAddFinanciamiento" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Agregar Fuente de Financiamiento</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <i class="fa fa-info-circle" aria-hidden="true"> Ingrese los datos de la fuente correspondiente.</i>
                                <span id="form-result-addFinanciamiento"></span>
                                <form id="form-add-Financiamiento">
                                    @csrf

                                    <div class="form-group">
                                        <label class="tx-bold">Fuente de Financiamiento:</label>
                                        <input type="text" id="fuente_fin" name="fuente_fin" class="form-control pd-y-12"  placeholder="Ingrese la fuente de financiamiento aquí" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Monto:</label>
                                        <input type="number" id="monto" name="monto" class="form-control pd-y-12" step="0.01" placeholder="Ingrese aqui el Monto aquí" required>
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

<!-- FORMULARIO PARA AGREGAR INVERSIONES -->
<div id="modalAddInversiones" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5"> Agregar Destino de Inversión</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <i class="fa fa-info-circle" aria-hidden="true"> Ingrese los datos de la inversión correspondiente.</i>
                                <span id="form-result-addInversiones"></span>
                                <form id="form-add-Inversiones">
                                    @csrf

                                    <div class="form-group">
                                        <label class="tx-bold">Destino de Inversión:</label>
                                        <input type="text" id="fuente_fin" name="fuente_fin" class="form-control pd-y-12"  placeholder="Ingrese la fuente de financiamiento aquí" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Tipo:</label>
                                        <select class="form-control pd-y-12" name="tipo_activo" id="tipo_activo">
                                            <option value="A">Seleccione...</option>
                                            <option value="Fijo">Activo Fijo</option>
                                            <option value="Diferido">Activo Diferido</option>
                                            <option value="Circulante">Activo Circulante</option>
                                        </select>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Monto:</label>
                                        <input type="number" id="monto" name="monto" class="form-control pd-y-12" step="0.01" placeholder="Ingrese aqui el Monto aquí" required>
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

<!-- FORMULARIO PARA AGREGAR DESGLOSE INVERSIONES EN ACTIVOS FIJOS -->
<div id="modalAddInversionesDesglose" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5"> Agregar Desgloce de Inversiones</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <i class="fa fa-info-circle" aria-hidden="true"> Ingrese los datos del desglose correspondiente.</i>
                                <span id="form-result-addInversionesDesglose"></span>
                                <form id="form-add-InversionesDesglose">
                                    @csrf

                                    <div class="form-group">
                                        <label class="tx-bold">Concepto de la inversión:</label>
                                        <input type="text" id="desgloce_inv" name="desgloce_inv" class="form-control pd-y-12"  placeholder="Ejemplo: Maquinaria, equipo de computo, etc" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Inversión:</label>
                                        <input type="number" id="inversion" name="inversion" class="form-control pd-y-12" step="0.01" placeholder="Ejemplo: 100000" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Vida Útil en Años:</label>
                                        <input type="number" id="vida_util" name="vida_util" class="form-control pd-y-12" step="1" placeholder="Ejemplo: 20" required>
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

<!-- FORMULARIO PARA AGREGAR DESGLOSE INVERSIONES -->
<div id="modalAddCapacidad" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="modal-header">
                    <h3 class="tx-gray-800 tx-normal mg-b-5"> Agregar Capacidad de Activos</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-12 bg-white">
                        <div class="pd-xl-x-30">
                            <div class="pd-x-30 pd-y-10">
                                <i class="fa fa-info-circle" aria-hidden="true"> Ingrese los datos correspondientes.</i>
                                <span id="form-result-addCapacidad"></span>
                                <form id="form-add-Capacidad">
                                    @csrf

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el número de porcentaje de incremento de capacidad :</label>
                                        <input type="number" id="incremento_cap" name="incremento_cap" class="form-control pd-y-12" step="1" min="0" placeholder="Ejemplo: 10" required>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="tx-bold">Ingrese el valor residual de los activos:</label>
                                        <input type="number" id="valor_residual" name="valor_residual" class="form-control pd-y-12" step="0.01" min="" placeholder="Ejemplo: 0" required>
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

<!-- FORM para eliminar un registro, se usa esta estructura para eliminar cualquier registro -->
<form id="form-delete" method="post">
    @csrf
    @method('delete')
</form>

@endsection

@section('scripts')
<script>

    /////////////////////////////////////////////////////////////////////////
    /////////////////////////// PASIVOS ACTUALES ////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Pasivos Actuales
    function llenarPasivosActuales(){

        // Petición GET a la url
        $.get("{{url('financiamientoSolicitado/getPasivosActuales')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#PasivosAct-Contenido").html(response.tabla);

            $('#TablaPasivosActuales').DataTable({
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

    // Función que borrará registros de Pasivos Actuales
    function borrarPasivoActual(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('financiamientoSolicitado/deletePasivosActuales/:ID') }}";
        
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
                            llenarPasivosActuales();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    ///////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////// PASIVOS ADICIONALES DESARROLLO ////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Pasivos en el Desarrollo
    function llenarPasivosDesarrollo(){

        // Petición GET a la url
        $.get("{{url('financiamientoSolicitado/getPasivosDesarollo')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#PasivosDes-Contenido").html(response.tabla);

            $('#TablaPasivosDes').DataTable({
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

    // Función que borrará un registro de Pasivo en el Desarrollo
    function borrarPasivoDesarrollo(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('financiamientoSolicitado/deletePasivosDesarollo/:ID') }}";

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
                            llenarPasivosDesarrollo();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    ////////////////////////////////////////////////////////////////////////////////
    /////////////////////////// CAPITAL CONTABLE ACTUAL ////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Capital Contable Actual
    function llenarCapitalActual(){

        // Petición GET a la url
        $.get("{{url('financiamientoSolicitado/getCapitalActual')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#CapitalAct-Contenido").html(response.tabla);

            $('#TablaCapitalAct').DataTable({
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

    // Función que borrará un registro de Capital Contable Actual
    function borrarCapitalActual(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('financiamientoSolicitado/deleteCapitalActual/:ID') }}";

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
                            llenarCapitalActual();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    //////////////////// CAPITAL ADICIONAL EN CASO DE DESARROLLARSE EL PROYECTO ///////////////
    ///////////////////////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Capital Adicional de Desarrollo
    function llenarCapitalDesarrollo(){

        // Petición GET a la url
        $.get("{{url('financiamientoSolicitado/getCapitalDesarrollo')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#CapitalDes-Contenido").html(response.tabla);

            $('#TablaCapitalDes').DataTable({
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

    // Función que borrará un registro de Capital Adicional de Desarrollo
    function borrarCapitalDesarrollo(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('financiamientoSolicitado/deleteCapitalDesarrollo/:ID') }}";

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
                            llenarCapitalDesarrollo();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////// FINANCIAMIENTO DEL PROYECTO //////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Financiamiento
    function llenarFinanciamiento(){

        // Petición GET a la url
        $.get("{{url('financiamientoSolicitado/getFinanciamiento')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#Financiamiento-Contenido").html(response.tabla);

            $('#TablaFinanciamiento').DataTable({
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

    // Función que borrará un registro de Financiamiento
    function borrarFinanciamiento(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('financiamientoSolicitado/deleteFinanciamiento/:ID') }}";

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
                            llenarFinanciamiento();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////// DESTINO DE LAS INVERSIONES ///////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Destino de las inversiones
    function llenarInversiones(){

        // Petición GET a la url
        $.get("{{url('financiamientoSolicitado/getInversiones')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#Inversiones-Contenido").html(response.tabla);

            $('#TablaInversiones').DataTable({
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

    // Función que borrará un registro de Destino de las inversiones
    function borrarInversiones(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('financiamientoSolicitado/deleteInversion/:ID') }}";

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
                            llenarInversiones();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////// DESGLOSE DE LAS INVERSIONES ///////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Desglose de las inversiones
    function llenarInversionesDesglose(){

        // Petición GET a la url
        $.get("{{url('financiamientoSolicitado/getDesgloseInversiones')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#InversionesDesglose-Contenido").html(response.tabla);

            $('#TablaInversionesDesglose').DataTable({
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

    // Función que borrará un registro de Desglose de las inversiones
    function borrarInversionesDesglose(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('financiamientoSolicitado/deleteDesgloseInversion/:ID') }}";

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
                            llenarInversionesDesglose();
                        }).fail(function (){
                            // En caso contrario muestra este mensaje
                            bootbox.alert('El registro no fue eliminado');
                        });
                        
                    }
                }
            }
        });

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////// CAPACIDAD DE ACTIVOS Y UTILIZADA /////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////

    // Trae en inserta la tabla de Desglose de las inversiones
    function llenarCapacidadAU(){

        // Petición GET a la url
        $.get("{{url('financiamientoSolicitado/getCapacidadAU')}}", {}, function(response){
            
            // Recibe la tabla formada en PHP y la integra en un div
            $("#Capacidad-Contenido").html(response.tabla);
            $("#botonCapacidad").html(response.boton);

        });
    }

    // Función que borrará un registro de Desglose de las inversiones
    function borrarCapacidadAU(id) {

        // Se accede al form que enviará la peteción para eliminar
        var form = $('#form-delete');
        var enlace = "{{ url('financiamientoSolicitado/deleteCapacidadAU/:ID') }}";

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
                            llenarCapacidadAU();
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

        // Función que agrega Pasivo Actual
        $('#form-add-PasivosAct').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('financiamientoSolicitado/addPasivosActuales')}}",
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
                        $('#form-result-addPasivosAct').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarPasivosActuales();
                        // Esconde el modal
                        $('#modalAddPasivosAct').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-PasivosAct')[0].reset();

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

        // Función que agrega Pasivo Actual
        $('#form-add-PasivosDes').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('financiamientoSolicitado/addPasivosDesarollo')}}",
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
                        $('#form-result-addPasivosDes').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarPasivosDesarrollo();
                        // Esconde el modal
                        $('#modalAddPasivosDes').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-PasivosDes')[0].reset();

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

        // Función que agrega Capital Contable Actual
        $('#form-add-CapitalAct').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('financiamientoSolicitado/addCapitalActual')}}",
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
                        $('#form-result-addCapitalAct').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarCapitalActual();
                        // Esconde el modal
                        $('#modalAddCapitalAct').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-CapitalAct')[0].reset();

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

        // Función que agrega Capital Adicional de Desarrollo
        $('#form-add-CapitalDes').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('financiamientoSolicitado/addCapitalDesarrollo')}}",
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
                        $('#form-result-addCapitalDes').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarCapitalDesarrollo();
                        // Esconde el modal
                        $('#modalAddCapitalDes').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-CapitalDes')[0].reset();

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

        // Función que agrega Financiamiento
        $('#form-add-Financiamiento').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('financiamientoSolicitado/addFinanciamiento')}}",
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
                        $('#form-result-addFinanciamiento').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarFinanciamiento();
                        // Esconde el modal
                        $('#modalAddFinanciamiento').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Financiamiento')[0].reset();

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

        // Función que agrega Destino de las Inversiones
        $('#form-add-Inversiones').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('financiamientoSolicitado/addInversion')}}",
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
                        $('#form-result-addInversiones').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarInversiones();
                        // Esconde el modal
                        $('#modalAddInversiones').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Inversiones')[0].reset();

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

        // Función que agrega Desglose de las inversiones
        $('#form-add-InversionesDesglose').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('financiamientoSolicitado/addDesgloseInversion')}}",
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
                        $('#form-result-addInversionesDesglose').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarInversionesDesglose();
                        // Esconde el modal
                        $('#modalAddInversionesDesglose').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-InversionesDesglose')[0].reset();

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

        // Función que agrega Capacidada de activos y utilizada
        $('#form-add-Capacidad').submit(function(e) {
            // Previene el recargo de página
            e.preventDefault();

            // Petición POST mediante Ajax
            $.ajax({
                url: "{{url('financiamientoSolicitado/addCapacidadAU')}}",
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
                        $('#form-result-addCapacidad').html(html);
                    }

                    if(data.success){
                        // Recarga las tablas
                        llenarCapacidadAU();
                        // Esconde el modal
                        $('#modalAddCapacidad').modal('hide');
                        // Y vacia el formulario
                        $('#form-add-Capacidad')[0].reset();

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

        llenarPasivosActuales();
        llenarPasivosDesarrollo();
        llenarCapitalActual();
        llenarCapitalDesarrollo();
        llenarFinanciamiento();
        llenarInversiones();
        llenarInversionesDesglose();
        llenarCapacidadAU();
    });
</script>
@endsection