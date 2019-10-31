<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupuestosProyeccionesController extends Controller
{
    // Muestra la vista principal de módulo
    public function show()
    {
        return view('modulos/SupuestosProyecciones', ['title' => 'Sección 6: Supuestos Proyecciones']);
    }

    // Agrega los registros de Ingresos y Costos con Apoyo
    public function addIngresosCostosCA(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'Incremento_Pre' => 'required',
            'Incremento_Uni' => 'required',
            'Incremento_Cos_Fij' => 'required',
            'Incremento_Cos_Var' => 'required',

            'Incremento_Pre2' => 'required',
            'Incremento_Uni2' => 'required',
            'Incremento_Cos_Fij2' => 'required',
            'Incremento_Cos_Var2' => 'required',
            
            'Incremento_Pre3' => 'required',
            'Incremento_Uni3' => 'required',
            'Incremento_Cos_Fij3' => 'required',
            'Incremento_Cos_Var3' => 'required'
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
        \DB::select('CALL VII_pro_insert_ingresos_costos_c_apoyo(?,?,?,?, ?,?,?,?, ?,?,?,?, ?)', array(
            $request->Incremento_Pre,
            $request->Incremento_Uni,
            $request->Incremento_Cos_Fij,
            $request->Incremento_Cos_Var,

            $request->Incremento_Pre2,
            $request->Incremento_Uni2,
            $request->Incremento_Cos_Fij2,
            $request->Incremento_Cos_Var2,

            $request->Incremento_Pre3,
            $request->Incremento_Uni3,
            $request->Incremento_Cos_Fij3,
            $request->Incremento_Cos_Var3,

            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Regresa una tabla creada con HTML de Ingresos y Costos Con Apoyo
    public function getIngresosCostosCA(){
        // Hace la consulta y lo guarda en una variable
        $costosCA = \DB::select('CALL VII_pro_select_ingresos_costos_c_apoyo_id(?)', array(\Auth::user()->id_usuario));
        
        // Variable que tendrá un botón html para agregar o borrar el contenido de la tabla
        // Por defecto tendrá el de agregar
        $boton = '<a href="#modalAddIngresosCostosCA" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaIngresosCostosCA" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Incremento de<br> Precios (%)</th>
                        <th>Incremento en<br> Unidades Vendidas (%)</th>
                        <th>Incremento en<br> Ventas (%)</th>
                        <th>Incremento Acumulado<br> en Ventas</th>
                        <th>Incremento de<br> Costos Fijos (%)</th>
                        <th>Incremento de<br> Costos Variables (%)</th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($costosCA as $row){
            $tabla .= '
                <tr>
                    <td>'.$row->anio_ingresos_costos_con_apoyo.'</td>
                    <td>'.$row->incremento_precios_ingresos_costos_con_apoyo.' %</td>
                    <td>'.$row->inc_unidades_vendidas_ingresos_costos_con_apoyo.' %</td>
                    <td>'.$row->incremento_ventas_ingresos_costos_con_apoyo.' %</td>
                    <td>'.$row->inc_acumulado_ingresos_costos_con_apoyo.'</td>
                    <td>'.$row->inc_cortes_fijos_ingresos_costos_con_apoyo.' %</td>
                    <td>'.$row->inc_cortes_variables_ingresos_costos_con_apoyo.' %</td>
                </tr>
            ';
            // Cuando se encuentre al menos un registro se cambiará al botón de borrar
            $boton = '<button onclick="borrarIngresosCostosCA('.\Auth::user()->id_usuario.')" class="btn btn-oblong btn-danger mg-l-10">Eliminar todos los registros</button>';
        }
        
        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla,
            'boton' => $boton
        ]);
        
    }

    // Función que elimina los registros de Ingresos y Costos con Apoyo
    public function deleteIngresosCostosCA($id, Request $request)
    {
        $delete = \DB::select('CALL VII_pro_delete_ingresos_costos_c_apoyo(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    // Agrega los registros de Ingresos y Costos sin Apoyo
    public function addIngresosCostosSA(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'Incremento_Pre' => 'required',
            'Incremento_Uni' => 'required',
            'Incremento_Cos_Fij' => 'required',
            'Incremento_Cos_Var' => 'required',

            'Incremento_Pre2' => 'required',
            'Incremento_Uni2' => 'required',
            'Incremento_Cos_Fij2' => 'required',
            'Incremento_Cos_Var2' => 'required',
            
            'Incremento_Pre3' => 'required',
            'Incremento_Uni3' => 'required',
            'Incremento_Cos_Fij3' => 'required',
            'Incremento_Cos_Var3' => 'required'
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
        \DB::select('CALL VII_pro_insert_ingresos_costos_s_apoyo(?,?,?,?, ?,?,?,?, ?,?,?,?, ?)', array(
            $request->Incremento_Pre,
            $request->Incremento_Uni,
            $request->Incremento_Cos_Fij,
            $request->Incremento_Cos_Var,

            $request->Incremento_Pre2,
            $request->Incremento_Uni2,
            $request->Incremento_Cos_Fij2,
            $request->Incremento_Cos_Var2,

            $request->Incremento_Pre3,
            $request->Incremento_Uni3,
            $request->Incremento_Cos_Fij3,
            $request->Incremento_Cos_Var3,

            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Regresa una tabla creada con HTML de Ingresos y Costos sin Apoyo
    public function getIngresosCostosSA(){
        // Hace la consulta y lo guarda en una variable
        $costosSA = \DB::select('CALL VII_pro_select_ingresos_costos_s_apoyo_id(?)', array(\Auth::user()->id_usuario));
        
        // Variable que tendrá un botón html para agregar o borrar el contenido de la tabla
        // Por defecto tendrá el de agregar
        $boton = '<a href="#modalAddIngresosCostosSA" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';

        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaIngresosCostosSA" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Incremento de<br> Precios (%)</th>
                        <th>Incremento en<br> Unidades Vendidas (%)</th>
                        <th>Incremento en<br> Ventas (%)</th>
                        <th>Incremento Acumulado<br> en Ventas</th>
                        <th>Incremento de<br> Costos Fijos (%)</th>
                        <th>Incremento de<br> Costos Variables (%)</th>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($costosSA as $row){
            $tabla .= '
                <tr>
                    <td>'.$row->anio_ingresos_costos_sin_apoyo.'</td>
                    <td>'.$row->incremento_precios_ingresos_costos_sin_apoyo.' %</td>
                    <td>'.$row->inc_unidades_vendidas_ingresos_costos_sin_apoyo.' %</td>
                    <td>'.$row->incremento_ventas_ingresos_costos_sin_apoyo.' %</td>
                    <td>'.$row->inc_acumulado_ingresos_costos_sin_apoyo.'</td>
                    <td>'.$row->inc_cortes_fijos_ingresos_costos_sin_apoyo.' %</td>
                    <td>'.$row->inc_cortes_variables_ingresos_costos_sin_apoyo.' %</td>
                </tr>
            ';
            // Cuando se encuentre al menos un registro se cambiará al botón de borrar
            $boton = '<button onclick="borrarIngresosCostosSA('.\Auth::user()->id_usuario.')" class="btn btn-oblong btn-danger mg-l-10">Eliminar todos los registros</button>';
        }
        
        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna la tabla
        // return $tabla;

        return response()->json([
            'tabla' => $tabla,
            'boton' => $boton
        ]);
        
    }

    // Función que elimina los registros de Ingresos y Costos sin Apoyo
    public function deleteIngresosCostosSA($id, Request $request)
    {
        $delete = \DB::select('CALL VII_pro_delete_ingresos_costos_s_apoyo(?)', array($id));

        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }

    // Regresa una variable con la tabla de Políticas
    public function getPoliticas(){
        // Hace la consulta y lo guarda en una variable
        $politicas = \DB::select('CALL VII_pro_select_politicas_id(?)', array(\Auth::user()->id_usuario));

        $tabla = '';
        $boton = '<a href="#modalAddPoliticas" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($politicas){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Días Clientes</span>
                    <span>'.$politicas[0]->dias_clientes_politicas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Inventarios</span>
                    <span>'.$politicas[0]->dias_inventarios_politicas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Proveedores</span>
                    <span>'.$politicas[0]->dias_proveedores_politicas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Dividendos</span>
                    <span>'.$politicas[0]->dividendos_politicas.' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidades Retenidas</span>
                    <span>'.$politicas[0]->utilidades_retenidas_politicas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Efectivo</span>
                    <span>'.$politicas[0]->dias_efectivo_politicas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Ciclo Financiero</span>
                    <span>'.$politicas[0]->ciclo_financiero.' %</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddPoliticas" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        else{
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Días Clientes</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Inventarios</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Proveedores</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Dividendos</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidades Retenidas</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Efectivo</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Ciclo Financiero</span>
                    <span>N/A</span>
                </p>
            </div>';
        }
        
        // Retorna en formato json
        return response()->json(['tabla' => $tabla, 'boton' => $boton]);
        
    }

    // Agrega los registros de Políticas
    public function addPoliticas(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'dias_cli' => 'required',
            'dias_inv' => 'required',
            'dias_pro' => 'required',
            'dividendos' => 'required',
            'dias_efe' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $utilidadesRetenidas = 100 - $request->dividendos;
        $cicloFinanciero = $request->dias_cli + $request->dias_inv - $request->dias_pro;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VII_pro_insert_politicas(?,?,?,?,?,?,?,?)', array(
            $request->dias_cli,
            $request->dias_inv,
            $request->dias_pro,
            $request->dividendos,
            $utilidadesRetenidas,
            $request->dias_efe,
            $cicloFinanciero,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Regresa una variable con la tabla de Macroeconómicos y Financieros
    public function getMacroFina(){
        // Hace la consulta y lo guarda en una variable
        $MaFi = \DB::select('CALL VII_pro_select_macroeconomicos_id(?)', array(\Auth::user()->id_usuario));

        $tabla = '';
        $boton = '<a href="#modalAddMacroFina" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($MaFi){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Inflación</span>
                    <span>'.$MaFi[0]->inflacion.' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>Tipo de Cambio (Pesos/Dollar)</span>
                    <span>$ '.$MaFi[0]->tipo_cambio.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>TIIE</span>
                    <span>'.$MaFi[0]->tiie.' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>CETES</span>
                    <span>'.$MaFi[0]->cetes.' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>ISR + PTU</span>
                    <span>'.$MaFi[0]->isr_ptu.' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>TREMA</span>
                    <span>'.$MaFi[0]->trema.' %</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddMacroFina" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        else{
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Inflación</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Tipo de Cambio (Pesos/Dollar)</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>TIIE</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>CETES</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>ISR + PTU</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>TREMA</span>
                    <span>N/A</span>
                </p>
            </div>';
        }
        
        // Retorna en formato json
        return response()->json(['tabla' => $tabla, 'boton' => $boton]);
        
    }

    // Agrega los registros de Macroeconómicos y Financieros
    public function addMacroFina(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'inflacion' => 'required',
            'tipo_cam' => 'required',
            'tiie' => 'required',
            'cetes' => 'required',
            'isr_ptu' => 'required',
            'trema' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $utilidadesRetenidas = 100 - $request->dividendos;
        $cicloFinanciero = $request->dias_cli + $request->dias_inv - $request->dias_pro;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VII_pro_insert_macroeconomicos(?,?,?,?,?,?,?)', array(
            $request->inflacion,
            $request->tipo_cam,
            $request->tiie,
            $request->cetes,
            $request->isr_ptu,
            $request->trema,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

}
