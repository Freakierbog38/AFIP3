<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceGralHistoricoController extends Controller
{
    // Muestra la vista principal de módulo
    public function show(){
        return view('modulos/BalanceGeneralHistorico', ['title' => 'Sección 4: Balance General Histórico']);
    }

    // Función que agrega la fecha a un Balance General Historico
    public function addFechaBalanceGral(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'fecha_bal' => 'required',
            'numero_mes' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $anio = explode("-", $request->fecha_bal)[0];

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL V_pro_insert_fecha_balance(?,?,?,?)', array(
            $anio,
            $request->fecha_bal,
            $request->numero_mes,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con la fecha de Balance General
    public function getFechaBalanceGral(){
        // Hace la consulta y lo guarda en una variable
        $fecha = \DB::select('CALL V_pro_select_fecha_balance_id(?)', array(\Auth::user()->id_usuario));

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        
        // Revisa si la variable tiene contenido
        if($fecha){
            $tabla .= $fecha[0]->fecha_fecha_balance_general_historico.' ('.$fecha[0]->numero_meses_fecha_balance_general_historico.' meses)';
        }
        else{
            $tabla .= 'No hay fecha asignada';
        }
        
        // Retorna la tabla
        return $tabla;
        
    }

    // Función que agrega un Activo 
    public function addActivo(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'activo_cir' => 'required',
            'activo_dif' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL V_pro_insert_activos(?,?,?)', array(
            $request->activo_cir,
            $request->activo_dif,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con la tabla de Activos
    public function getActivos(){
        // Hace la consulta y lo guarda en una variable
        $activos = \DB::select('CALL V_pro_select_activos_id(?)', array(\Auth::user()->id_usuario));

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        $boton = '<a href="#modalAddActivo" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';
        
        // Revisa si la variable tiene contenido
        if($activos){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Activo Circulante</span>
                    <span>$ '.$activos[0]->activo_circulante_desgloce_activos.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Activo Fijo</span>
                    <span>$ '.$activos[0]->activo_fijo_desgloce_activos.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Activo Diferido</span>
                    <span>$ '.$activos[0]->activo_diferido_desgloce_activos.'</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">$ '.$activos[0]->total_desgloce_activos_1_desgloce_activos.'</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddActivo" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        else{
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Activo Circulante</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Activo Fijo</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Activo Diferido</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">N/A</span>
                </p>
            </div>';
        }
        
        // Retorna la tabla
        return response()->json(['tabla' => $tabla, 'boton' => $boton]);
        
    }

    // Función que agrega un Desglose de Activo
    public function addDesgloseActivo(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'activo_fijo' => 'required',
            'monto_activo' => 'required',
            'valor_un' => 'required',
            'depreciacion' => 'required',
            'anios_restantes' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL V_pro_insert_activos_fijos(?,?,?,?,?,?)', array(
            $request->activo_fijo,
            $request->monto_activo,
            $request->valor_un,
            $request->depreciacion,
            $request->anios_restantes,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Función que devuelve el contenido de un Desglose Activo
    public function getUnDesgloseActivo($id)
    {
        // Se realiza la solicitud
        $activoD = \DB::select('CALL V_pro_select_activo_fijo(?)', array($id));
        
        // Y regresa el registro
        return \Response::json( array(
            'AD' => $activoD,
            'id' => $id
        ));

    }

    // Función que edita un Desglose de Activo
    public function editarDesgloseActivo(Request $request)
    {
        $rules = array(
            'activo_fijo' => 'required',
            'monto_activo' => 'required',
            'valor_un' => 'required',
            'depreciacion' => 'required',
            'anios_restantes' => 'required'
        );

        $error = \Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        \DB::select('CALL V_pro_edit_activo_fijo(?,?,?,?,?,?,?)', array(
            $request->id,
            $request->activo_fijo,
            $request->monto_activo,
            $request->valor_un,
            $request->depreciacion,
            $request->anios_restantes,
            \Auth::user()->id_usuario
        ));

        return response()->json(['success' => '¡El registro ha sido modificado con éxito!']);

    }

    // Regresa una variable con la tabla de Desglose de Activos
    public function getDesgloseActivos(){
        // Hace la consulta y lo guarda en una variable
        $activoD = \DB::select('CALL V_pro_select_activos_fijos_id(?)', array(\Auth::user()->id_usuario));

        $total = array(
            'cantidad' => 0,
            'totalMes' => 0
        );

        // Variable que guarda la tabla a mostrar
        $tabla = '
        <table id="TablaDesgloseActivos" class="table display responsive nowrap">
            <thead>
                <tr>
                    <th>Activo Fijo Aportado</th>
                    <th>Monto</th>
                    <th>No. de unidades</th>
                    <th>Total</th>
                    <th>Depreciación</th>
                    <th>Años Restantes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';
        // Recorre los registros traidos de la base de datos
        foreach($activoD as $row){
            // Y se agregan a la tabla
            $tabla .= '
                <tr>
                    <td>'.$row->activos_fijos_aportados_desgloce_activos_fijos_aportados.'</td>
                    <td>$ '.$row->cantidad_desgloce_activos_fijos_aportados.'</td>
                    <td>'.$row->valor_unidades_desgloce_activos_fijos_aportados.'</td>
                    <td>$ '.$row->total_desgloce_activos_fijos_aportados.'</td>
                    <td>$ '.$row->depreciacion_desgloce_activos_fijos_aportados.'</td>
                    <td>'.$row->anios_restantes_desgloce_activos_fijos_aportados.'</td>
                    <td><button onclick="borrarDesgloseActivo('.$row->id_desgloce_activos_fijos_aportados.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>';
            $total['cantidad'] += $row->valor_unidades_desgloce_activos_fijos_aportados;
            $total['totalMes'] += $row->total_desgloce_activos_fijos_aportados;
        }

        $tabla .= '
                <tr class="tx-bold">
                    <td>Total</td>
                    <td>$ '.($total['totalMes'] / $total['cantidad']).'</td>
                    <td>'.$total['cantidad'].'</td>
                    <td>$ '.$total['totalMes'].'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            ';
        
        // Etiquetas de cierre de la tabla   
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna en formato json
        return $tabla;
        
    }

    // Función que elimina un desglose de activo
    public function deleteDesgloseActivo($id, Request $request)
    {
        $delete = \DB::select('CALL V_pro_delete_activo_fijo(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }


    // Regresa una variable con la tabla de Pasivos
    public function getPasivos(){
        // Hace la consulta y lo guarda en una variable
        $pasivos = \DB::select('CALL V_pro_select_pasivos_id(?)', array(\Auth::user()->id_usuario));

        $tabla = '';
        $boton = '<a href="#modalAddPasivo" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($pasivos){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Pasivo Corto Plazo</span>
                    <span>$ '.$pasivos[0]->corto_plazo_desgloce_pasivo.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Pasivo Largo Plazo</span>
                    <span>$ '.$pasivos[0]->largo_plazo_desgloce_pasivo.'</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">$ '.$pasivos[0]->total_desgloce_pasivo.'</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddPasivo" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        else{
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Pasivo Corto Plazo</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Pasivo Largo Plazo</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">N/A</span>
                </p>
            </div>';
        }
        
        // Retorna en formato json
        return response()->json(['tabla' => $tabla, 'boton' => $boton]);
        
    }

    // Función que agrega un Pasivo
    public function addPasivo(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'pasivo_cor' => 'required',
            'pasivo_lar' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL V_pro_insert_pasivos(?,?,?)', array(
            $request->pasivo_cor,
            $request->pasivo_lar,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con la tabla de Capital Contable
    public function getCapitalContable(){
        // Hace la consulta y lo guarda en una variable
        $capcon = \DB::select('CALL V_pro_select_capital_contable_id(?)', array(\Auth::user()->id_usuario));

        $tabla = '';
        $boton = '<a href="#modalAddCapCon" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($capcon){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Capital Aportado</span>
                    <span>$ '.$capcon[0]->capital_aportado_capital_contable.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Capital Ganado</span>
                    <span>$ '.$capcon[0]->capital_ganado_capital_contable.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Exceso/Insufuciencia</span>
                    <span '.($capcon[0]->exceso_insuficiencia_capital_contable < 0 ? 'class="tx-danger"' : '').'>$ '.$capcon[0]->exceso_insuficiencia_capital_contable.'</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold '.($capcon[0]->total_capital_contable < 0 ? 'tx-danger' : '').'">$ '.$capcon[0]->total_capital_contable.'</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddCapCon" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        else{
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Capital Aportado</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Capital Ganado</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Exceso/Insufuciencia</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">N/A</span>
                </p>
            </div>';
        }
        
        // Retorna en formato json
        return response()->json(['tabla' => $tabla, 'boton' => $boton]);
        
    }

    // Función que agrega un Capital Contable
    public function addCapitalContable(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'capital_apor' => 'required',
            'capital_gan' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL V_pro_insert_capital_contable(?,?,?)', array(
            $request->capital_apor,
            $request->capital_gan,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

}
