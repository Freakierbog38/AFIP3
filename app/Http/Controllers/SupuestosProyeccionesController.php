<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingresos_costos;
use App\Politicas;
use App\macroeconomicos_financieros;

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
            'Incremento_Cos_Var3' => 'required',

        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Coonvertir a porcentaje los valores

        $Incremento_Pre = $request->Incremento_Pre / 100;
        $Incremento_Uni = $request->Incremento_Uni / 100;
        $Incremento_Cos_Fij = $request->Incremento_Cos_Fij / 100;
        $Incremento_Cos_Var = $request->Incremento_Cos_Var / 100;

        $Incremento_Pre2 = $request->Incremento_Pre2 / 100;
        $Incremento_Uni2 = $request->Incremento_Uni2 / 100;
        $Incremento_Cos_Fij2 = $request->Incremento_Cos_Fij2 / 100;
        $Incremento_Cos_Var2 = $request->Incremento_Cos_Var2 / 100;

        $Incremento_Pre3 = $request->Incremento_Pre3 / 100;
        $Incremento_Uni3 = $request->Incremento_Uni3 / 100;
        $Incremento_Cos_Fij3 = $request->Incremento_Cos_Fij3 / 100;
        $Incremento_Cos_Var3 = $request->Incremento_Cos_Var3 / 100;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = new Ingresos_costos;
        $datos->anio = 1;
        $datos->incremento_precios = $Incremento_Pre;
        $datos->incremento_unidades_vendidas = $Incremento_Uni;
            $incVentas = (1+$Incremento_Pre) * (1+$Incremento_Uni)-1;
        $datos->incremento_ventas = $incVentas;
            $acumulado = (1+$incVentas);
        $datos->inc_ventas_acumuladas = $acumulado;
        $datos->inc_costos_fijos = $Incremento_Cos_Fij;
        $datos->inc_costos_variables = $Incremento_Cos_Var;
        $datos->apoyo = 1;
        $datos->id_empresa =\Auth::user()->id_empresa;
        $datos->save();

        $datos2 = new Ingresos_costos;
        $datos2->anio = 2;
        $datos2->incremento_precios = $Incremento_Pre2;
        $datos2->incremento_unidades_vendidas = $Incremento_Uni2;
            $incVentas2 = (1+$Incremento_Pre2) * (1+$Incremento_Uni2)-1;
        $datos2->incremento_ventas = $incVentas2;
            $acumulado2 = $acumulado * (1+$incVentas2);
        $datos2->inc_ventas_acumuladas = $acumulado2;
        $datos2->inc_costos_fijos = $Incremento_Cos_Fij2;
        $datos2->inc_costos_variables = $Incremento_Cos_Var2;
        $datos2->apoyo = 1;
        $datos2->id_empresa =\Auth::user()->id_empresa;
        $datos2->save();

        $datos3 = new Ingresos_costos;
        $datos3->anio = 3;
        $datos3->incremento_precios = $Incremento_Pre3;
        $datos3->incremento_unidades_vendidas = $Incremento_Uni3;
            $incVentas3 = (1+$Incremento_Pre3) * (1+$Incremento_Uni3)-1;
        $datos3->incremento_ventas = $incVentas3;
            $acumulado3 = $acumulado2 * (1+$incVentas3);
        $datos3->inc_ventas_acumuladas = $acumulado3;
        $datos3->inc_costos_fijos = $Incremento_Cos_Fij3;
        $datos3->inc_costos_variables = $Incremento_Cos_Var3;
        $datos3->apoyo = 1;
        $datos3->id_empresa =\Auth::user()->id_empresa;
        $datos3->save();
        

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Agrega los registros de Ingresos y Costos con Apoyo
    public function addIngresosCostosCAUno(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'Incremento_Pre' => 'required',
            'Incremento_Uni' => 'required',
            'Incremento_Cos_Fij' => 'required',
            'Incremento_Cos_Var' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Coonvertir a porcentaje los valores

        $id_empresa = \Auth::user()->id_empresa;

        $registros_num = Ingresos_costos::where('id_empresa', $id_empresa)->count();
        $acumulado = Ingresos_costos::where('id_empresa', $id_empresa)->max('inc_ventas_acumuladas');

        $Incremento_Pre = $request->Incremento_Pre / 100;
        $Incremento_Uni = $request->Incremento_Uni / 100;
        $Incremento_Cos_Fij = $request->Incremento_Cos_Fij / 100;
        $Incremento_Cos_Var = $request->Incremento_Cos_Var / 100;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = new Ingresos_costos;
        $datos->anio = $registros_num + 1;
        $datos->incremento_precios = $Incremento_Pre;
        $datos->incremento_unidades_vendidas = $Incremento_Uni;
            $incVentas = (1+$Incremento_Pre) * (1+$Incremento_Uni)-1;
        $datos->incremento_ventas = $incVentas;
            $acumulado = $acumulado * (1+$incVentas);
        $datos->inc_ventas_acumuladas = $acumulado;
        $datos->inc_costos_fijos = $Incremento_Cos_Fij;
        $datos->inc_costos_variables = $Incremento_Cos_Var;
        $datos->apoyo = 1;
        $datos->id_empresa = $id_empresa;
        $datos->save();
        

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Regresa una tabla creada con HTML de Ingresos y Costos Con Apoyo
    public function getIngresosCostosCA(){
        // Hace la consulta y lo guarda en una variable
        $costosCA = Ingresos_costos::where('id_empresa', '=', \Auth::user()->id_empresa)->get();
        // Variable que tendrá un botón html para agregar o borrar el contenido de la tabla
        // Por defecto tendrá el de agregar
        $n=0;
       
        // La estructura del datatable se guarda en una variable
        // Primero las cabeceras
        $tabla = '
            <table id="TablaIngresosCostosCA" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Ingresos costos incremento de<br> Precios (%)</th>
                        <th>Incremento en<br> Unidades Vendidas (%)</th>
                        <th>Incremento en<br> Ventas (%)</th>
                        <th>Incremento Acumulado<br> en Ventas</th>
                        <th>Incremento de<br> Costos Fijos (%)</th>
                        <th>Incremento de<br> Costos Variables (%)</th>
                        <th>Apoyo</>
                    </tr>
                </thead>
            <tbody>';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        foreach($costosCA as $row){
            $tabla .= '
                <tr>
                    <td>'.$row->anio.'</td>
                    <td>'.$row->incremento_precios.' %</td>
                    <td>'.$row->incremento_unidades_vendidas.' %</td>
                    <td>'.$row->incremento_ventas.' %</td>
                    <td>'.$row->inc_ventas_acumuladas.'</td>
                    <td>'.$row->inc_costos_fijos.' %</td>
                    <td>'.$row->inc_costos_variables.' %</td>
                    <td>'.$row->apoyo.'</td>
                </tr>
            ';
            // Cuando se encuentre al menos un registro se cambiará al botón de borrar
            //$boton = '<button onclick="borrarIngresosCostosCA('.\Auth::user()->id_usuario.')" class="btn btn-oblong btn-danger mg-l-10">Eliminar todos los registros</button>';
            $n++;
        }
        
        // Finalmente las etiquetas de cierre
        $tabla .='
            </tbody>
        </table>';
        if($n==0){
            $boton = '<a href="#modalAddIngresosCostosCA" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';

        }else{
            $boton = '<a href="#modalAddIngresosCostosCA1" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        }
        
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
        // $politicas = \DB::select('CALL VII_pro_select_politicas_id(?)', array(\Auth::user()->id_usuario));
        $politicas = Politicas::where('id_empresa', \Auth::user()->id_empresa)->first();

        $tabla = '';
        $boton = '<a href="#modalAddPoliticas" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($politicas){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Días Clientes</span>
                    <span>'.$politicas->dias_clientes.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Inventarios</span>
                    <span>'.$politicas->dias_inventarios.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Proveedores</span>
                    <span>'.$politicas->dias_proveedores.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Dividendos</span>
                    <span>'.($politicas->dividendos*100).'%</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidades Retenidas</span>
                    <span>'.($politicas->utilidades_retenidas*100).'%</span>
                </p>
                <p class="invoice-info-row">
                    <span>Días Efectivo</span>
                    <span>'.$politicas->dias_efectivo.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Ciclo Financiero</span>
                    <span>'.$politicas->ciclo_financieros.'</span>
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

        $dividendos = $request->dividendos / 100;
        $utilidadesRetenidas = 1 - $dividendos;
        $cicloFinanciero = $request->dias_cli + $request->dias_inv - $request->dias_pro;
        $id_empresa = \Auth::user()->id_empresa;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = Politicas::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            ['dias_clientes'=>$request->dias_cli,
            'dias_inventarios'=>$request->dias_inv,
            'dias_proveedores'=>$request->dias_pro,
            'ciclo_financieros'=>$cicloFinanciero,
            'dividendos'=>$dividendos,
            'utilidades_retenidas'=>$utilidadesRetenidas,
            'dias_efectivo'=>$request->dias_efe,
            'id_empresa'=>$id_empresa]
        );

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

    // Regresa una variable con la tabla de Macroeconómicos y Financieros
    public function getMacroFina(){
        // Hace la consulta y lo guarda en una variable
        // $MaFi = \DB::select('CALL VII_pro_select_macroeconomicos_id(?)', array(\Auth::user()->id_usuario));
        $MaFi = macroeconomicos_financieros::where('id_empresa', \Auth::user()->id_empresa)->first();

        $tabla = '';
        $boton = '<a href="#modalAddMacroFina" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($MaFi){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Inflación</span>
                    <span>'.($MaFi->inflacion*100).' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>Tipo de Cambio (Pesos/Dollar)</span>
                    <span>$ '.($MaFi->tipo_cambio).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>TIIE</span>
                    <span>'.($MaFi->TIEE*100).' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>CETES</span>
                    <span>'.($MaFi->CETES*100).' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>ISR + PTU</span>
                    <span>'.($MaFi->ISR*100).' %</span>
                </p>
                <p class="invoice-info-row">
                    <span>TREMA</span>
                    <span>'.($MaFi->TREMA*100).' %</span>
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

        $inflacion = $request->inflacion / 100;
        $tiie = $request->tiie / 100;
        $cetes = $request->cetes / 100;
        $isr_ptu = $request->isr_ptu / 100;
        $trema = $request->trema / 100;
        $id_empresa = \Auth::user()->id_empresa;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = macroeconomicos_financieros::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            ['inflacion'=>$inflacion,
            'tipo_cambio'=>$request->tipo_cam,
            'TIEE'=>$tiie,
            'CETES'=>$cetes,
            'ISR'=>$isr_ptu,
            'TREMA'=>$trema,
            'id_empresa'=>$id_empresa]
        );

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

}
