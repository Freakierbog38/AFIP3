<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultadosHistoricoController extends Controller
{
    // Muestra la vista principal de módulo
    public function show(){
        return view('modulos/ResultadosHistorico', ['title' => 'Sección 5: Estado de Resultados Histórico']);
    }

    // Función que agrega la fecha al Estado de Resultados Históricos
    public function addFecha(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'fecha_est' => 'required',
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

        $anio = explode("-", $request->fecha_est)[0];

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VI_pro_insert_fecha_estado(?,?,?,?)', array(
            $anio,
            $request->fecha_est,
            $request->numero_mes,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con la fecha de Estado de Resultado Historico
    public function getFecha(){
        // Hace la consulta y lo guarda en una variable
        $fecha = \DB::select('CALL VI_pro_select_fecha_estado_id(?)', array(\Auth::user()->id_usuario));

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        
        // Revisa si la variable tiene contenido
        if($fecha){
            $tabla .= $fecha[0]->fecha_fecha_estado_resultados_historico.' ('.$fecha[0]->numero_meses_fecha_estado_resultados_historico.' meses)';
        }
        else{
            $tabla .= 'No hay fecha asignada';
        }
        
        // Retorna la tabla
        return $tabla;
        
    }

    // Función que agrega Cifras Nominales
    public function addCifrasNomina(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'porcentaje_inver' => 'required',
            'depre_amort' => 'required',
            'gastos_prod' => 'required',
            'porcentaje_imp' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $porcentajeCostoVentas=filter_var($request->porcentaje_inver,FILTER_SANITIZE_NUMBER_INT);
        $porcentajeImpuestos=filter_var($request->porcentaje_imp,FILTER_SANITIZE_NUMBER_INT);

        $porcentajeCostoVentas = $porcentajeCostoVentas/100.0;
        $porcentajeImpuestos = $porcentajeImpuestos/100.0;

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL VI_pro_insert_cifras(?,?,?,?,?)', array(
            $porcentajeCostoVentas,
            $request->depre_amort,
            $request->gastos_prod,
            $porcentajeImpuestos,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con Cifras en Pesos Nominales
    public function getCifrasNomina(){
        // Hace la consulta y lo guarda en una variable
        $nomina = \DB::select('CALL VI_pro_select_cifras_id(?)', array(\Auth::user()->id_usuario));

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        $boton = '<a href="#modalAddNomina" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';
        
        // Revisa si la variable tiene contenido
        if($nomina){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Ventas Netas</span>
                    <span class="currency">$ '.$nomina[0]->ventas_netas_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Costo de Ventas</span>
                    <span class="currency">$ '.$nomina[0]->costo_ventas_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidad Bruta</span>
                    <span class="currency">$ '.$nomina[0]->utilidad_bruta_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Gastos de Operación</span>
                    <span class="currency">$ '.$nomina[0]->gastos_operacion_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAFIRDA</span>
                    <span class="currency">$ '.$nomina[0]->uafirda_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Depreciación y Amortización</span>
                    <span class="currency">$ '.$nomina[0]->depreciacion_amortizacion_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAFIR</span>
                    <span class="currency">$ '.$nomina[0]->uafir_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Gastos y Productos Financieros</span>
                    <span class="currency">$ '.$nomina[0]->gastos_prod_financieros_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAIR</span>
                    <span class="currency">$ '.$nomina[0]->uair_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Impuestos</span>
                    <span class="currency">$ '.$nomina[0]->impuestos_cifras_pesos_nominales.'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidad Neta</span>
                    <span class="currency">$ '.$nomina[0]->utilidad_neta_cifras_pesos_nominales.'</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddNomina" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        else{
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Ventas Netas</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Costo de Ventas</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidad Bruta</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Gastos de Operación</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAFIRDA</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Depreciación y Amortización</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAFIR</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Gastos y Productos Financieros</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAIR</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Impuestos</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidad Neta</span>
                    <span>N/A</span>
                </p>
            </div>';
        }
        
        // Retorna la tabla
        return response()->json(['tabla' => $tabla, 'boton' => $boton]);
        
    }

}
