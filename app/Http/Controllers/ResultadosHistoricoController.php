<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fecha_resultado_historico;
use App\Estado_resultados_historico;
use App\Mezcla_productos_servicio;
use App\Costos_fijos_mensuale;
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
        $id_empresa=\Auth::user()->id_empresa;
        // // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = Fecha_resultado_historico::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            ['anio'=>$anio,
            'fecha'=>$request->fecha_est,
            'numero_meses'=>$request->numero_mes,
            'id_empresa'=>$id_empresa]
            
        );

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con la fecha de Estado de Resultado Historico
    public function getFecha(){
        // Hace la consulta y lo guarda en una variable
        $fecha = Fecha_resultado_historico::where('id_empresa','=',\Auth::user()->id_empresa)->get();

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        
        // Revisa si la variable tiene contenido
        if($fecha){
            $tabla .= $fecha[0]->fecha.' ('.$fecha[0]->numero_meses.' meses)';
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

        $id_empresa = \Auth::user()->id_empresa;
        // se optiene los datos de la fecha 
        $fecha = Fecha_resultado_historico::where('id_empresa','=',\Auth::user()->id_empresa)->get();
        // se separa el dato de numero de meses para poder motiplicarlo por la suma total de ventas mensuales
        $num_meses = $fecha[0]->numero_meses;
        //se suma los costos fijos mensuales
        $sum_costos_fijos= Costos_fijos_mensuale::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('monto_mensual');
    
        //se obtiene la suma de las ventas mensuales
        $ventas_netas = Mezcla_productos_servicio::where('id_empresa','=',\Auth::user()->id_empresa)->sum('ventas_mes')*$num_meses;

        $costo_ventas = $ventas_netas*($request->porcentaje_inver/100);
        $utilidad_bruta = $ventas_netas-$costo_ventas;
        $gastos_operacion = $sum_costos_fijos*$num_meses;
        $UAFIRDA = $utilidad_bruta-$gastos_operacion;
        $UAFIR = $UAFIRDA-$request->depre_amort;
        $uair = $UAFIR-$request->gastos_prod;
        $impuestos = $uair*($request->porcentaje_imp/100);

        $utilidad_neta = $uair-$impuestos;



        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = Estado_resultados_historico::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            [
                'ventas_netas' => $ventas_netas,
                'costo_ventas' => $costo_ventas,
                'utilidad_bruta' => $utilidad_bruta,
                'gastos_operacion' => $gastos_operacion,
                'UAFIRDA' => $UAFIRDA,
                'deprecia_amortiza' => $request->depre_amort,
                'gtos_prod_financieros' => $request->gastos_prod,
                'UAFIR' => $UAFIR,
                'impuestos' =>$request->porcentaje_imp ,
                'uair' => $uair,
                'utilidad_neta' => $utilidad_neta,
                'id_empresa' => $id_empresa
            ]
        );
        

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con Cifras en Pesos Nominales
    public function getCifrasNomina(){
        // Hace la consulta y lo guarda en una variable
        $nom = Estado_resultados_historico::where('id_empresa','=',\Auth::user()->id_empresa)->get();
        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        $boton = '<a href="#modalAddNomina" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';
        $n=0;
        // Revisa si la variable tiene contenido
        foreach($nom as $nomina){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Ventas Netas</span>
                    <span class="currency">$ '.number_format($nomina->ventas_netas, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Costo de Ventas</span>
                    <span class="currency">$ '.number_format($nomina->costo_ventas, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidad Bruta</span>
                    <span class="currency">$ '.number_format($nomina->utilidad_bruta, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Gastos de Operación</span>
                    <span class="currency">$ '.number_format($nomina->gastos_operacion, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAFIRDA</span>
                    <span class="currency">$ '.number_format($nomina->UAFIRDA, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Depreciación y Amortización</span>
                    <span class="currency">$ '.number_format($nomina->deprecia_amortiza, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAFIR</span>
                    <span class="currency">$ '.number_format($nomina->UAFIR, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Gastos y Productos Financieros</span>
                    <span class="currency">$ '.number_format($nomina->gtos_prod_financieros, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>UAIR</span>
                    <span class="currency">$ '.number_format($nomina->uair, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Impuestos</span>
                    <span class="currency">$ '.number_format($nomina->impuestos, 2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Utilidad Neta</span>
                    <span class="currency">$ '.number_format($nomina->utilidad_neta, 2).'</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddNomina" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
            $n++;
        }

        if($n==0){
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
