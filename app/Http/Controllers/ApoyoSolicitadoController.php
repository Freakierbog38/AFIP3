<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApoyoSolicitadoController extends Controller
{
    // Muestra la vista principal de módulo
    public function show()
    {
        return view('modulos/FinanciamientoSolicitado', ['title' => 'Sección 7: Financiamiento Solicitado']);
    }

    /////////////////////////////////////////////////////////////////////////
    /////////////////////////// PASIVOS ACTUALES ////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    // Regresa una tabla creada con HTML de Pasivos Actuales
    public function getPasivosActuales(){
        // Hace la consulta y lo guarda en una variable
        $pasAct = \DB::select('CALL VIII_pro_select_pasivos_actuales_id(?)', array(\Auth::user()->id_usuario));

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaPasivosActuales" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
                        <th>No.</th>
                        <th>Clave</th>
                        <th>Tipo de<br> Financiamiento</th>
                        <th>Monto de<br> Financiamiento</th>
                        <th>Tipo de Tasa</th>
                        <th>Interés<br>(%)</th>
                        <th>Plazo</th>
                        <th>Gracia</th>
                        <th>Pagos</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($pasAct as $row){
            $tabla .= '
                <tr class="tx-center">
                    <td>'.$row->num_pasivo_actual.'</td>
                    <td>'.$row->clave_pasivos_actuales.'</td>
                    <td>'.$row->tipo_financiamiento_pasivos_actuales.'</td>
                    <td>$ '.$row->monto_pasivos_actuales.'</td>
                    <td>'.$row->tipo_tasa_pasivos_actuales.'</td>
                    <td>'.$row->interes_pasivos_actuales.' %</td>
                    <td>'.$row->plazo_pasivos_actuales.' '.($row->plazo_pasivos_actuales > 1 ? 'meses' : 'mes').'</td>
                    <td>'.$row->gracia_pasivos_actuales.' '.($row->gracia_pasivos_actuales > 1 ? 'meses' : 'mes').'</td>
                    <td>'.$row->pagos_pasivos_actuales.' '.($row->pagos_pasivos_actuales > 1 ? 'meses' : 'mes').'</td>
                    <td><button onclick="borrarPasivoActual('.$row->id_pasivos_actuales.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
        }

        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla
        ]);
    }

    // Agrega los registros de Pasivos Actuales
    public function addPasivosActuales(Request $request)
    {
        if($request->tipo_tas != "Fijo" && $request->tipo_tas != "Variable")
            $request->tipo_tas = NULL;

        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'clave' => 'required',
            'tipo_fin' => 'required',
            'monto' => 'required',
            'tipo_tas' => 'required',
            'interes' => 'required',
            'plazo' => 'required',
            'gracia' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // calculo de pagos en meses
        $pagos = $request->plazo - $request->gracia;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VIII_pro_insert_pasivos_actuales(?,?,?,?,?,?,?,?,?)', array(
            $request->clave,
            $request->tipo_fin,
            $request->monto,
            $request->tipo_tas,
            $request->interes,
            $request->plazo,
            $request->gracia,
            $pagos,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Pasivos Actuales
    public function deletePasivosActuales($id, Request $request)
    {
        $delete = \DB::select('CALL VIII_pro_delete_pasivo_actual(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    ///////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////// PASIVOS ADICIONALES DESARROLLO ////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////

    // Regresa una tabla creada con HTML de Pasivos Adicionales en el Desarrollo
    public function getPasivosDesarollo(){
        // Hace la consulta y lo guarda en una variable
        $pasDes = \DB::select('CALL VIII_pro_select_pasivos_adicionales_id(?)', array(\Auth::user()->id_usuario));

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaPasivosDes" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
                        <th>No.</th>
                        <th>Clave</th>
                        <th>Tipo de<br> Financiamiento</th>
                        <th>Monto de<br> Financiamiento</th>
                        <th>Tipo de Tasa</th>
                        <th>Interés<br>(%)</th>
                        <th>Plazo</th>
                        <th>Gracia</th>
                        <th>Pagos</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($pasDes as $row){
            $tabla .= '
                <tr class="tx-center">
                    <td>'.$row->num_pasivo_adicional.'</td>
                    <td>'.$row->clave_pasivos_adicionales.'</td>
                    <td>'.$row->tipo_financiamiento_pasivos_adicionales.'</td>
                    <td>$ '.$row->monto_pasivos_adicionales.'</td>
                    <td>'.$row->tipo_tasa_pasivos_adicionales.'</td>
                    <td>'.$row->interes_pasivos_adicionales.' %</td>
                    <td>'.$row->plazo_pasivos_adicionales.' '.($row->plazo_pasivos_adicionales > 1 ? 'meses' : 'mes').'</td>
                    <td>'.$row->gracia_pasivos_adicionales.' '.($row->gracia_pasivos_adicionales > 1 ? 'meses' : 'mes').'</td>
                    <td>'.$row->pagos_pasivos_adicionales.' '.($row->pagos_pasivos_adicionales > 1 ? 'meses' : 'mes').'</td>
                    <td><button onclick="borrarPasivoDesarrollo('.$row->id_pasivos_adicionales.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
        }

        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla
        ]);
    }

    // Agrega los registros de Pasivos Adicionales en el Desarrollo
    public function addPasivosDesarollo(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'clave' => 'required',
            'tipo_fin' => 'required',
            'monto' => 'required',
            'tipo_tas' => 'required',
            'interes' => 'required',
            'plazo' => 'required',
            'gracia' => 'required',
            'pagos' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VIII_pro_insert_pasivos_adicionales(?,?,?,?,?,?,?,?,?)', array(
            $request->clave,
            $request->tipo_fin,
            $request->monto,
            $request->tipo_tas,
            $request->interes,
            $request->plazo,
            $request->gracia,
            $request->pagos,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Pasivos Adicionales en el Desarrollo
    public function deletePasivosDesarollo($id, Request $request)
    {
        $delete = \DB::select('CALL VIII_pro_delete_pasivo_adicional(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    ////////////////////////////////////////////////////////////////////////////////
    /////////////////////////// CAPITAL CONTABLE ACTUAL ////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////

    // Regresa una tabla creada con HTML de Capital Contable Actual
    public function getCapitalActual(){
        // Hace la consulta y lo guarda en una variable
        $capAct = \DB::select('CALL VIII_pro_select_capital_contable_actual_id(?)', array(\Auth::user()->id_usuario));

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaCapitalAct" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
                        <th>Descripción del Capital Contable Adicional</th>
                        <th>Monto</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($capAct as $row){
            $tabla .= '
                <tr class="tx-center">
                    <td>'.$row->descripcion_capital_contable_actual.'</td>
                    <td>$ '.$row->monto_capital_contable_actual.'</td>
                    <td><button onclick="borrarCapitalActual('.$row->id_capital_contable_actual.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
        }

        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla
        ]);
    }

    // Agrega los registros de Capital Contable Actual
    public function addCapitalActual(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'descripcion_cap' => 'required',
            'monto' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VIII_pro_insert_capital_contable_actual(?,?,?)', array(
            $request->descripcion_cap,
            $request->monto,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Capital Contable Actual
    public function deleteCapitalActual($id, Request $request)
    {
        $delete = \DB::select('CALL VIII_pro_delete_capital_contable_actual(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    //////////////////// CAPITAL ADICIONAL EN CASO DE DESARROLLARSE EL PROYECTO ///////////////
    ///////////////////////////////////////////////////////////////////////////////////////////

    // Regresa una tabla creada con HTML de Capital Adicional de Desarrollo
    public function getCapitalDesarrollo(){
        // Hace la consulta y lo guarda en una variable
        $capDes = \DB::select('CALL VIII_pro_select_capital_contable_adicional_id(?)', array(\Auth::user()->id_usuario));

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaCapitalDes" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
                        <th>Descripción del Capital Contable Adicional</th>
                        <th>Monto</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($capDes as $row){
            $tabla .= '
                <tr class="tx-center">
                    <td>'.$row->descripcion_capital_contable_adicional.'</td>
                    <td>$ '.$row->monto_capital_contable_adicional.'</td>
                    <td><button onclick="borrarCapitalDesarrollo('.$row->id_capital_contable_adicional.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
        }

        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla
        ]);
    }

    // Agrega los registros de Capital Adicional de Desarrollo
    public function addCapitalDesarrollo(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'descripcion_cap' => 'required',
            'monto' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VIII_pro_insert_capital_contable_adicional(?,?,?)', array(
            $request->descripcion_cap,
            $request->monto,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Capital Adicional de Desarrollo
    public function deleteCapitalDesarrollo($id, Request $request)
    {
        $delete = \DB::select('CALL VIII_pro_delete_capital_contable_adicional(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////// APOYOS DIRECTOS DEL PROYECTO //////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////

    // Regresa una tabla creada con HTML de Financiamiento
    public function getFinanciamiento(){
        // Hace la consulta y lo guarda en una variable
        $fuentes_fin = \DB::select('CALL VIII_pro_select_fuente_financiamiento_id(?)', array(\Auth::user()->id_usuario));

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaFinanciamiento" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
                        <th>Fuente de Apoyo Directo</th>
                        <th>Monto</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($fuentes_fin as $row){
            $tabla .= '
                <tr class="tx-center">
                    <td>'.$row->fuente_financiamiento_proyecto.'</td>
                    <td>$ '.$row->monto_financiamiento_proyecto.'</td>
                    <td><button onclick="borrarFinanciamiento('.$row->id_financiamiento_proyecto.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
        }

        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla
        ]);
    }

    // Agrega los registros de Financiamiento
    public function addFinanciamiento(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'fuente_fin' => 'required',
            'monto' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VIII_pro_insert_fuente_financiamiento(?,?,?)', array(
            $request->fuente_fin,
            $request->monto,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Financiamiento
    public function deleteFinanciamiento($id, Request $request)
    {
        $delete = \DB::select('CALL VIII_pro_delete_fuente_financiamiento(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////// DESTINO DE LAS INVERSIONES //////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////

    // Regresa una tabla creada con HTML de Destino de las inversiones
    public function getInversiones(){
        // Hace la consulta y lo guarda en una variable
        $inversiones = \DB::select('CALL VIII_pro_select_destino_inversiones_id(?)', array(\Auth::user()->id_usuario));

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaInversiones" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Tipo de Activo</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($inversiones as $row){
            $tabla .= '
                <tr class="tx-center">
                    <td>'.$row->destinos_inversiones_destino_recursos.'</td>
                    <td>$ '.$row->monto_destino_recursos.'</td>
                    <td>'.$row->tipo_activo_destino_recursos.'</td>
                    <td><button onclick="borrarInversiones('.$row->id_destino_recursos.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
        }

        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla
        ]);
    }

    // Agrega los registros de Destino de las inversiones
    public function addInversion(Request $request)
    {
        if($request->tipo_activo == 'A')
            $request->tipo_activo = NULL;

        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'fuente_fin' => 'required',
            'monto' => 'required',
            'tipo_activo' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VIII_pro_insert_destino_inversion(?,?,?,?)', array(
            $request->fuente_fin,
            $request->monto,
            $request->tipo_activo,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Destino de las inversiones
    public function deleteInversion($id, Request $request)
    {
        $delete = \DB::select('CALL VIII_pro_delete_destino_inversion(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    //////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////// DESGLOSE DE LAS INVERSIONES EN ACTIVOS FIJOS ///////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////

    // Regresa una tabla creada con HTML de Destino de las inversiones
    public function getDesgloseInversiones(){
        // Hace la consulta y lo guarda en una variable
        $inversionesDes = \DB::select('CALL VIII_pro_select_desgloces_inversiones_id(?)', array(\Auth::user()->id_usuario));

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaInversionesDesglose" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Depreciación en Años</th>
                        <th>Depreciación en Porcentaje</th>
                        <th>Depreciación en Moneda</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($inversionesDes as $row){
            $tabla .= '
                <tr class="tx-center">
                    <td>'.$row->concepto_desgloce_inversiones.'</td>
                    <td>$ '.$row->inversion_desgloce_inversiones.'</td>
                    <td>'.$row->vida_util_desgloce_inversiones.' '.($row->vida_util_desgloce_inversiones > 1 ? 'años' : 'año').'</td>
                    <td>'.$row->depreciacion_porcentaje_desgloce_inversiones.' %</td>
                    <td>$ '.$row->depreciacion_moneda_desgloce_inversiones.'</td>
                    <td><button onclick="borrarInversionesDesglose('.$row->id_desgloce_inversiones.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
        }

        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla
        ]);
    }

    // Agrega los registros de Destino de las inversiones
    public function addDesgloseInversion(Request $request)
    {
        if($request->tipo_activo == 'A')
            $request->tipo_activo = NULL;

        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'desgloce_inv' => 'required',
            'inversion' => 'required',
            'vida_util' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VIII_pro_insert_desgloce_inversiones(?,?,?,?)', array(
            $request->desgloce_inv,
            $request->inversion,
            $request->vida_util,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Destino de las inversiones
    public function deleteDesgloseInversion($id, Request $request)
    {
        $delete = \DB::select('CALL VIII_pro_delete_desgloce_inversiones(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////// CAPACIDAD DE ACTIVOS Y UTILIZADA /////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////

    // Regresa una variable con la tabla de Capacidada de activos y utilizada
    public function getCapacidadAU(){
        // Hace la consulta y lo guarda en una variable
        $capacidada = \DB::select('CALL VIII_pro_select_capacidad_activos_id(?)', array(\Auth::user()->id_usuario));

        $tabla = '';
        $boton = '<a href="#modalAddCapacidad" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($capacidada){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Incremento de capacidad de activos</span>
                    <span>'.$capacidada[0]->increment_cap_capacidad_activos.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Capacidad máxima de unidades</span>
                    <span>'.$capacidada[0]->capacidad_max_unidades_capacidad_activos.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Capacidad utilizada nueva</span>
                    <span>'.$capacidada[0]->capacidad_utilizada_capacidad_activos.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Valor residual</span>
                    <span>'.$capacidada[0]->valor_residual_capacidad_activos.' %</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddCapacidad" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        else{
            $tabla .= '
            <div class="col-md">
            <p class="invoice-info-row">
                <span>Incremento de capacidad de activos</span>
                <span>N/A</span>
            </p>
            <p class="invoice-info-row">
                <span>Capacidad máxima de unidades</span>
                <span>N/A</span>
            </p>
            <p class="invoice-info-row">
                <span>Capacidad utilizada nueva</span>
                <span>N/A</span>
            </p>
            <p class="invoice-info-row">
                <span>Valor residual</span>
                <span>N/A</span>
            </p>
            </div>';
        }
        
        // Retorna en formato json
        return response()->json(['tabla' => $tabla, 'boton' => $boton]);
        
    }

    // Agrega los registros de Capacidada de activos y utilizada
    public function addCapacidadAU(Request $request)
    {

        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'incremento_cap' => 'required',
            'valor_residual' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VIII_pro_insert_capacidad_activos(?,?,?)', array(
            $request->incremento_cap,
            $request->valor_residual,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Capacidada de activos y utilizada
    public function deleteCapacidadAU($id, Request $request)
    {
        $delete = \DB::select('CALL VIII_pro_delete_capacidad_activos(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

}
