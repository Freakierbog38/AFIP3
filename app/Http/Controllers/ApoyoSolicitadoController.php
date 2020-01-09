<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasivos_actuales;
use App\Capital_contable_actual;
use App\Financiamiento_proyecto;
use App\Destino_apoyo;
use App\Desglose_apoyo_destino;
use App\Capacidad_nueva;
use App\Mezcla_productos_servicio;
use App\Capacidad_instalada;


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
        // $pasAct = \DB::select('CALL VIII_pro_select_pasivos_actuales_id(?)', array(\Auth::user()->id_usuario));
        $pasAct = Pasivos_actuales::where([
            ['id_empresa', \Auth::user()->id_empresa],
            ['adicionales_proyecto', 0]
        ])->get();

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaPasivosActuales" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
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
                    <td>'.$row->clave.'</td>
                    <td>'.$row->tipo.'</td>
                    <td>$ '.number_format($row->monto,2).'</td>
                    <td>'.$row->tipo_tasa.'</td>
                    <td>'.number_format($row->interes,2).' %</td>
                    <td>'.number_format($row->plazo).' '.($row->plazo > 1 ? 'meses' : 'mes').'</td>
                    <td>'.number_format($row->gracia).' '.($row->gracia > 1 ? 'meses' : 'mes').'</td>
                    <td>'.number_format($row->pagos).' '.($row->pagos > 1 ? 'meses' : 'mes').'</td>
                    <td><button onclick="borrarPasivoActual('.$row->id.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
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
            'tabla' => $tabla,
            'respuesta' => $pasAct
        ]);
    }

    // Agrega los registros de Pasivos Actuales
    public function addPasivosActuales(Request $request)
    {

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
        $datos = new Pasivos_actuales;
        $datos->clave = $request->clave;
        $datos->tipo = $request->tipo_fin;
        $datos->monto = $request->monto;
        $datos->tipo_tasa = $request->tipo_tas;
        $datos->interes = $request->interes;
        $datos->plazo = $request->plazo;
        $datos->gracia = $request->gracia;
        $datos->pagos = $pagos;
        $datos->adicionales_proyecto = 0;
        $datos->id_empresa = \Auth::user()->id_empresa;
        $datos->save();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Pasivos Actuales
    public function deletePasivosActuales($id, Request $request)
    {
        // $delete = \DB::select('CALL VIII_pro_delete_pasivo_actual(?)', array($id));
        $delete = Pasivos_actuales::find($id);
        $delete->delete();

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
        // $pasDes = \DB::select('CALL VIII_pro_select_pasivos_adicionales_id(?)', array(\Auth::user()->id_usuario));
        $pasDes = Pasivos_actuales::where([
            ['id_empresa', \Auth::user()->id_empresa],
            ['adicionales_proyecto', 1]
        ])->get();

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaPasivosDes" class="table display responsive nowrap">
                <thead>
                    <tr class="tx-center">
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
                    <td>'.$row->clave.'</td>
                    <td>'.$row->tipo.'</td>
                    <td>$ '.number_format($row->monto,2).'</td>
                    <td>'.$row->tipo_tasa.'</td>
                    <td>'.number_format($row->interes,2).' %</td>
                    <td>'.number_format($row->plazo).' '.($row->plazo > 1 ? 'meses' : 'mes').'</td>
                    <td>'.number_format($row->gracia).' '.($row->gracia > 1 ? 'meses' : 'mes').'</td>
                    <td>'.number_format($row->pagos).' '.($row->pagos > 1 ? 'meses' : 'mes').'</td>
                    <td><button onclick="borrarPasivoDesarrollo('.$row->id.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
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

        $pagos = $request->plazo - $request->gracia;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = new Pasivos_actuales;
        $datos->clave = $request->clave;
        $datos->tipo = $request->tipo_fin;
        $datos->monto = $request->monto;
        $datos->tipo_tasa = $request->tipo_tas;
        $datos->interes = $request->interes;
        $datos->plazo = $request->plazo;
        $datos->gracia = $request->gracia;
        $datos->pagos = $pagos;
        $datos->adicionales_proyecto = 1;
        $datos->id_empresa = \Auth::user()->id_empresa;
        $datos->save();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Pasivos Adicionales en el Desarrollo
    public function deletePasivosDesarollo($id, Request $request)
    {
        // $delete = \DB::select('CALL VIII_pro_delete_pasivo_adicional(?)', array($id));
        $delete = Pasivos_actuales::find($id);
        $delete->delete();

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
        // $capAct = \DB::select('CALL VIII_pro_select_capital_contable_actual_id(?)', array(\Auth::user()->id_usuario));
        $capAct = Capital_contable_actual::where([
            ['id_empresa', \Auth::user()->id_empresa],
            ['adiciona_proyecto', 0]
        ])->get();

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
                    <td>'.$row->descripcion.'</td>
                    <td>$ '.number_format($row->monto,2).'</td>
                    <td><button onclick="borrarCapitalActual('.$row->id.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
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
        $datos = new Capital_contable_actual;
        $datos->descripcion = $request->descripcion_cap;
        $datos->monto = $request->monto;
        $datos->adiciona_proyecto = 0;
        $datos->id_empresa = \Auth::user()->id_empresa;
        $datos->save();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Capital Contable Actual
    public function deleteCapitalActual($id, Request $request)
    {
        // $delete = \DB::select('CALL VIII_pro_delete_capital_contable_actual(?)', array($id));
        $delete = Capital_contable_actual::find($id);
        $delete->delete();

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
        // $capDes = \DB::select('CALL VIII_pro_select_capital_contable_adicional_id(?)', array(\Auth::user()->id_usuario));
        $capDes = Capital_contable_actual::where([
            ['id_empresa', \Auth::user()->id_empresa],
            ['adiciona_proyecto', 1]
        ])->get();

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
                    <td>'.$row->descripcion.'</td>
                    <td>$ '.number_format($row->monto,2).'</td>
                    <td><button onclick="borrarCapitalDesarrollo('.$row->id.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
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
        $datos = new Capital_contable_actual;
        $datos->descripcion = $request->descripcion_cap;
        $datos->monto = $request->monto;
        $datos->adiciona_proyecto = 1;
        $datos->id_empresa = \Auth::user()->id_empresa;
        $datos->save();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Capital Adicional de Desarrollo
    public function deleteCapitalDesarrollo($id, Request $request)
    {
        // $delete = \DB::select('CALL VIII_pro_delete_capital_contable_adicional(?)', array($id));
        $delete = Capital_contable_actual::find($id);
        $delete->delete();

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
        // $fuentes_fin = \DB::select('CALL VIII_pro_select_fuente_financiamiento_id(?)', array(\Auth::user()->id_usuario));
        $fuentes_fin = Financiamiento_proyecto::where('id_empresa', \Auth::user()->id_empresa)->get();

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
                    <td>'.$row->fuente.'</td>
                    <td>$ '.number_format($row->monto,2).'</td>
                    <td><button onclick="borrarFinanciamiento('.$row->id.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
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
        $datos = new Financiamiento_proyecto;
        $datos->fuente = $request->fuente_fin;
        $datos->monto = $request->monto;
        $datos->id_empresa = \Auth::user()->id_empresa;
        $datos->save();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Financiamiento
    public function deleteFinanciamiento($id, Request $request)
    {
        // $delete = \DB::select('CALL VIII_pro_delete_fuente_financiamiento(?)', array($id));
        $delete = Financiamiento_proyecto::find($id);
        $delete->delete();

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
        // $inversiones = \DB::select('CALL VIII_pro_select_destino_inversiones_id(?)', array(\Auth::user()->id_usuario));
        $inversiones = Destino_apoyo::where('id_empresa', \Auth::user()->id_empresa)->get();

        $tabla = '';
        $boton = '<a href="#modalAddCapitalAct" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';
        $total=0;
        $n=0;
        $datosReturn=array('total_activos'=>0);
        // Revisa si la variable tiene contenido
        foreach($inversiones as $inversion){
            $total = $inversion->circulante + $inversion->fijo + $inversion->diferido;
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Circulante</span>
                    <span>$ '.number_format($inversion->circulante,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Fijo</span>
                    <span>$ '.number_format($inversion->fijo,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Diferido</span>
                    <span>$ '.number_format($inversion->diferido,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">$ '.number_format($total,2).'</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddCapitalAct" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
            $n++;
            $datosReturn['total_activos']=$total;
        }
        
        if($n==0){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Circulante</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Fijo</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Diferido</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">N/A</span>
                </p>
            </div>';
        }
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla
        ]);
    }

    // Agrega los registros de Destino de las inversiones
    public function addInversion(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'diferido' => 'required',
            'circulante' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $id_empresa = \Auth::user()->id_empresa;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = Destino_apoyo::updateOrInsert(
            ['id_empresa' => $id_empresa],
            [
                'diferido' => $request->diferido,
                'circulante' => $request->circulante
            ]
        );

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Destino de las inversiones
    public function deleteInversion($id, Request $request)
    {
        // $delete = \DB::select('CALL VIII_pro_delete_destino_inversion(?)', array($id));
        $delete = Destino_apoyo::find($id);
        $delete->delete();

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
        // $inversionesDes = \DB::select('CALL VIII_pro_select_desgloces_inversiones_id(?)', array(\Auth::user()->id_usuario));
        $inversionesDes = Desglose_apoyo_destino::where('id_empresa', \Auth::user()->id_empresa)->get();

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
                    <td>'.$row->concepto.'</td>
                    <td>$ '.number_format($row->inversion,2).'</td>
                    <td>'.number_format($row->vida_util).' '.($row->vida_util > 1 ? 'años' : 'año').'</td>
                    <td>'.number_format((1 / $row->vida_util),2).' %</td>
                    <td>$ '.number_format($row->depreciacion,2).'</td>
                    <td><button onclick="borrarInversionesDesglose('.$row->id.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
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

        $depreciacion = (1 / $request->vida_util);
        $depreciacion = $depreciacion * $request->inversion;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = new Desglose_apoyo_destino;
        $datos->concepto = $request->desgloce_inv;
        $datos->inversion = $request->inversion;
        $datos->vida_util = $request->vida_util;
        $datos->depreciacion = $depreciacion;
        $datos->id_empresa = \Auth::user()->id_empresa;
        $datos->save();

        $this->actualizarInversionFija();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Destino de las inversiones
    public function deleteDesgloseInversion($id, Request $request)
    {
        // $delete = \DB::select('CALL VIII_pro_delete_desgloce_inversiones(?)', array($id));
        $delete = Desglose_apoyo_destino::find($id);
        $delete->delete();
        $this->actualizarInversionFija();

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    private function actualizarInversionFija(){
        $id_empresa = \Auth::user()->id_empresa;
        $fijos = Desglose_apoyo_destino::where('id_empresa',$id_empresa)->sum('inversion');
        $datos = Destino_apoyo::updateOrInsert(
            ['id_empresa' => $id_empresa],
            [
                'fijo' => $fijos
            ]
        );
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////// CAPACIDAD DE ACTIVOS Y UTILIZADA /////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////

    // Regresa una variable con la tabla de Capacidada de activos y utilizada
    public function getCapacidadAU(){
        // Hace la consulta y lo guarda en una variable
        // $capacidada = \DB::select('CALL VIII_pro_select_capacidad_activos_id(?)', array(\Auth::user()->id_usuario));
        $capacidad = Capacidad_nueva::where('id_empresa', \Auth::user()->id_empresa)->first();

        $tabla = '';
        $boton = '<a href="#modalAddCapacidad" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($capacidad){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Incremento de capacidad de activos</span>
                    <span>'.number_format(($capacidad->porc_incremento_cap_nueva_activos*100),2).' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>Capacidad máxima de unidades</span>
                    <span>'.number_format($capacidad->capacidad_maxima,2).'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Capacidad utilizada nueva</span>
                    <span>'.number_format(($capacidad->porc_capacidad_utilizada_nueva*100),2).' %</span>
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
            'incremento_cap' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $capacidad = Capacidad_instalada::where('id_empresa', \Auth::user()->id_empresa)->first();
        $proSer = Mezcla_productos_servicio::where('id_empresa', \Auth::user()->id_empresa)->sum('unidades_mes');
        
        $incremento = $request->incremento_cap / 100;
        $proSer = $proSer * 12;
        $capMax = $capacidad->maximo_unidades_anio * (1+$incremento);
        $id_empresa = \Auth::user()->id_empresa;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = Capacidad_nueva::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            ['capacidad_maxima'=>$capMax,
            'porc_incremento_cap_nueva_activos'=>$incremento,
            'porc_capacidad_utilizada_nueva'=>($proSer / $capMax),
            'id_empresa'=>$id_empresa]
        
        );

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Función que elimina un registro de Capacidada de activos y utilizada
    public function deleteCapacidadAU($id, Request $request)
    {
        // $delete = \DB::select('CALL VIII_pro_delete_capacidad_activos(?)', array($id));
        $delete = Capacidad_nueva::find($id);
        $delete->delete();

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
