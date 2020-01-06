<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capacidad_instalada;
use App\Niveles_actuales_produccion;
use App\Mezcla_productos_servicio;

class CapacidadInstaladaController extends Controller
{
    // Muestra la vista principal del módulo
    public function show(){
        return view('modulos/AnalisisCapacidadInstalada', ['title' => 'Sección 3: Análisis de Capacidad Instalada']);
    }

    // Regresa un array con los registros de Capacidad Instalada
    public function getCapacidadInstalada(){
        // Hace la consulta a la base de datos para operaciones almacenadas distintas
        $CapInstalada = Capacidad_instalada::where('id_empresa', '=', \Auth::user()->id_empresa)->get();
        //\DB::select('CALL IV_pro_select_capacidad_instalada_id(?)', array(\Auth::user()->id_usuario));
        $NivProduccion = Niveles_actuales_produccion::where('id_empresa', '=',\Auth::user()->id_empresa)->get();
        //\DB::select('CALL IV_pro_get_produccion_actual(?)', array(\Auth::user()->id_usuario));

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        $n=0;
        $maximo_unidades_mes=0;
        // Se revisa que haya obtenido algún dato, si lo hace pone los valores correspondientes en el html
        foreach($CapInstalada as $row){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Máximo Unidades al Mes</span>
                    <span>'.number_format($row->maximo_unidades_mes,2).' unidades</span>
                </p>
                <p class="invoice-info-row">
                    <span>Máximo Unidades al Año</span>
                    <span>'.number_format($row->maximo_unidades_anio,2).' unidades</span>
                </p>
                <p class="invoice-info-row">
                    <span>Capcidad Actual Utilizada</span>
                    <span>'.number_format($row->porc_capacidad_utilizada_actual,2).' %</span>
                </p>';
                $n++;
                $maximo_unidades_mes=$row->maximo_unidades_mes;
            

        } 
        
        if ($n==0){
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
        $n=0;

        // Para la otra consulta hace lo mismo
        foreach($NivProduccion as $row){
            $tabla .= '
                <p class="invoice-info-row">
                    <span>Unidades Producidas al Mes</span>
                    <span>'.number_format($row->unidades_mes,2).' unidades</span>
                </p>
                <p class="invoice-info-row">
                    <span>Unidades Estimadas al Año</span>
                    <span>'.number_format($row->unidades_anio,2).' unidades</span>
                </p>
            </div>';
            $n++;
        }

        if($n==0){
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
        /*if ($n==1){
            echo '
            <script>
                $("btn").removeAttr("disabled");
            </script>
            ' ;
        }*/
        // Retorna la tabla
        $respuesta = array("tabla"=>$tabla,"resultado"=>$n, "maximo_unidades_mes"=>$maximo_unidades_mes);
        return $respuesta;
        
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
        $maximo_unidades_mes = $request->MaxUsMes;

        $unidades_mes = Mezcla_productos_servicio::where('id_empresa','=',\Auth::user()->id_empresa)->sum('unidades_mes');
        $unidades_anio =$unidades_mes*12;
        $maximo_unidades_anio = $maximo_unidades_mes*12;
        $porc_capacidad_utilizada_actual = $unidades_anio/$maximo_unidades_anio*100;
        
        /*echo 
        '<script>
            console.log(maximo_unidades_mes: '.$maximo_unidades_mes.'\nunidades_anio: '.$unidades_anio.'\nunidades_anio: '.$unidades_anio.'\nmaximo_unidades_anio: '.$maximo_unidades_anio.'\nporc_capacidad_utilizada_actual: '.$porc_capacidad_utilizada_actual.');         
        </script>';*/

       $id_empresa=\Auth::user()->id_empresa;
        

        $datos_CI = new Capacidad_instalada;
        $datos_CI->maximo_unidades_mes=$maximo_unidades_mes;
        $datos_CI->maximo_unidades_anio=$maximo_unidades_anio;
        $datos_CI->porc_capacidad_utilizada_actual=$porc_capacidad_utilizada_actual;
        $datos_CI->id_empresa=$id_empresa;
        $datos_CI->save();

        $datos_NAP = new Niveles_actuales_produccion;
        $datos_NAP->unidades_mes = $unidades_mes;
        $datos_NAP->unidades_anio = $unidades_anio;
        $datos_NAP->id_empresa=$id_empresa;
        $datos_NAP->save();


        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Se han agregado los datos!']);
    }


    // Función que edita un registro de Capacidad instalada
    public function editCapacidadInstalada(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'MaxUsMesEdit' => 'required',
            
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
        $maximo_unidades_mes = $request->MaxUsMesEdit;

        $unidades_mes = Mezcla_productos_servicio::where('id_empresa','=',\Auth::user()->id_empresa)->sum('unidades_mes');
        $unidades_anio =$unidades_mes*12;
        $maximo_unidades_anio = $maximo_unidades_mes*12;
        $porc_capacidad_utilizada_actual = $unidades_anio/$maximo_unidades_anio*100;
        
        

        $id_empresa=\Auth::user()->id_empresa;
        

        $datos_CI =  Capacidad_instalada::where('id_empresa',$id_empresa)->first();
        $datos_CI->maximo_unidades_mes=$maximo_unidades_mes;
        $datos_CI->maximo_unidades_anio=$maximo_unidades_anio;
        $datos_CI->porc_capacidad_utilizada_actual=$porc_capacidad_utilizada_actual;
        $datos_CI->save();

        $datos_NAP = Niveles_actuales_produccion::where('id_empresa', $id_empresa)->first();
        $datos_NAP->unidades_mes = $unidades_mes;
        $datos_NAP->unidades_anio = $unidades_anio;
        $datos_NAP->save();


        
        /*
        
        $datos = Costos_fijos_mensuale::find($request->idCostoFijoMes);
        $datos->concepto=$request->MaxUsMesEdit;
        $datos->monto_mensual=$request->monto_mensual;
       
        $datos->save();*/

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Modificación exitosa!']);
    }
}
