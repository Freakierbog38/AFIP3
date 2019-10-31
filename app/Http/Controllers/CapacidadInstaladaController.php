<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapacidadInstaladaController extends Controller
{
    // Muestra la vista principal del módulo
    public function show(){
        return view('modulos/AnalisisCapacidadInstalada', ['title' => 'Sección 3: Análisis de Capacidad Instalada']);
    }

    // Regresa un array con los registros de Capacidad Instalada
    public function getCapacidadInstalada(){
        // Hace la consulta a la base de datos para operaciones almacenadas distintas
        $CapInstalada = \DB::select('CALL IV_pro_select_capacidad_instalada_id(?)', array(\Auth::user()->id_usuario));
        $NivProduccion = \DB::select('CALL IV_pro_get_produccion_actual(?)', array(\Auth::user()->id_usuario));

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';

        // Se revisa que haya obtenido algún dato, si lo hace pone los valores correspondientes en el html
        if($CapInstalada){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Máximo Unidades al Mes</span>
                    <span>'.$CapInstalada[0]->maximo_unidades_mes_capacidad_instalada.' unidades</span>
                </p>
                <p class="invoice-info-row">
                    <span>Máximo Unidades al Año</span>
                    <span>'.$CapInstalada[0]->maximo_unidades_anio_capacidad_instalada.' unidades</span>
                </p>
                <p class="invoice-info-row">
                    <span>Capcidad Actual Utilizada</span>
                    <span>'.$CapInstalada[0]->capacidad_utilizada_actual_capacidad_instalada.' %</span>
                </p>';
        } else{
            // En caso contrario los rellena con N/A
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Máximo Unidades al Mes</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Máximo Unidades al Año</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Capcidad Actual Utilizada</span>
                    <span>N/A</span>
                </p>';
        }

        // Para la otra consulta hace lo mismo
        if($NivProduccion){
            $tabla .= '
                <p class="invoice-info-row">
                    <span>Unidades Producidas al Mes</span>
                    <span>'.$NivProduccion[0]->unidades_producidas_mes.' unidades</span>
                </p>
                <p class="invoice-info-row">
                    <span>Unidades Estimadas al Año</span>
                    <span>'.$NivProduccion[0]->unidades_estimadas_anio.' unidades</span>
                </p>
            </div>';
        } else{
            $tabla .= '
                <p class="invoice-info-row">
                    <span>Unidades Producidas al Mes</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Unidades Estimadas al Año</span>
                    <span>N/A</span>
                </p>
            </div>';
        }
        
        // Retorna la tabla
        return $tabla;
        
    }

    // Función que agrega el registro de Capacidad Instalada
    public function addCapacidadInstalada(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'MaxUsMes' => 'required'
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
        \DB::select('CALL IV_pro_insert_capacidad_instalada(?,?)', array(
            $request->MaxUsMes,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Se han agregado los datos!']);
    }
}
