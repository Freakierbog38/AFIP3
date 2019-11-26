<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadosController extends Controller
{

    public function index(){

        ///////// Genera los calculos para la evaluación
        // $calculos = DB::select('CALL calculo_afip(?)', array( \Auth::user()->id_usuario ) );

        $calculos = DB::select('CALL AFIP_I_analisis_de_financiamiento(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_I_analisis_de_financiamiento2(?)', array( \Auth::user()->id_usuario ) );
        
        $calculos = DB::select('CALL AFIP_II_programa_produccion(?)', array( \Auth::user()->id_usuario ) );
        
        $calculos = DB::select('CALL AFIP_III_analisis_del_proyecto(?)', array( \Auth::user()->id_usuario ) );
        
        $calculos = DB::select('CALL AFIP_V_flujo_de_efectivo_I(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_V_flujo_de_efectivo_II(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_V_flujo_de_efectivo_III(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_V_flujo_de_efectivo_IV(?)', array( \Auth::user()->id_usuario ) );
        
        $calculos = DB::select('CALL AFIP_IV_estado_de_resultados_I(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_IV_estado_de_resultados_II(?)', array( \Auth::user()->id_usuario ) );
        
        $calculos = DB::select('CALL AFIP_V_flujo_de_efectivo_V(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_V_flujo_de_efectivo_VI(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_V_flujo_de_efectivo_VII(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_V_flujo_de_efectivo_VIII(?)', array( \Auth::user()->id_usuario ) );
        
        $calculos = DB::select('CALL AFIP_VI_BALANCE_GENERAL_I(?)', array( \Auth::user()->id_usuario ) );
        //$calculos = DB::select('CALL AFIP_VI_BALANCE_GENERAL_II(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_VI_BALANCE_GENERAL_III(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_VI_BALANCE_GENERAL_IV(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_VI_BALANCE_GENERAL_V(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_VI_BALANCE_GENERAL_VI(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_VI_BALANCE_GENERAL_VII(?)', array( \Auth::user()->id_usuario ) );
        $calculos = DB::select('CALL AFIP_VI_BALANCE_GENERAL_VIII(?)', array( \Auth::user()->id_usuario ) );
        
        $calculos = DB::select('CALL AFIP_VIII_evaluacion_de_proyecto(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////// Datos de la empresa ////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $datosEmpresa = DB::select('CALL get_perfil(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////// Datos de Mezcla de Productos y Servicios //////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaMezclaProSer = DB::select('CALL II_pro_select_productos_servicios_id(?)', array( \Auth::user()->id_usuario ) );

        $tablaTotalMezclaProSer = DB::select('CALL II_pro_get_suma_valores_mezcla_productos_servicios_1_anio(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////// Capacidad Instalada de la Empresa ///////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaCapInstalada2 = DB::select('CALL IV_pro_select_capacidad_instalada_id(?)', array( \Auth::user()->id_usuario ) );

        $tablaCapInstalada = DB::select('CALL IV_pro_get_produccion_actual(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////// Estacionalidad de Ventas ////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaEstacionVentas = DB::select('CALL II_pro_select_estacionalidad_ventas_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////// Balance General /////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaBalanceGral = DB::select('CALL get_balance_reporte(?)', array( \Auth::user()->id_usuario ) );
        
        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////// Resultado Histórico /////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaResultHist = DB::select('CALL VI_pro_select_cifras_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////// Fuentes Financiamiento del Proyecto ////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaFinanProject = DB::select('CALL VIII_pro_select_fuente_financiamiento_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////// Destino Inversiones ///////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaDestInver = DB::select('CALL VIII_pro_select_destino_inversiones_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////// Entradas de Efectivo ///////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaEntradasEfectivo = DB::select('CALL AFIP_pro_select_entradas_efectivo_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////// Salidas de Efectivo ///////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaSalidasEfectivo = DB::select('CALL AFIP_pro_select_salidas_efectivo_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////// Composición Costo Fijo ///////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaCompCostoFijo = DB::select('CALL III_pro_select_cfms_id(?)', array( \Auth::user()->id_usuario ) );
        $tablaCompCostoFijoTotal = DB::select('CALL III_pro_CFM(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////// Composición Costo Variable ///////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaCompCostoVariable = DB::select('CALL III_pro_select_cvus_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////// Ingresos Costos con apoyo ////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaIngresosConApoyo = DB::select('CALL VII_pro_select_ingresos_costos_c_apoyo_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////// Utilidad de Operación con Proyecto //////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaUtilidadConProyecto = DB::select('CALL AFIP_pro_utilidad_operacion_con_proyecto_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////// Total Activos Proyectados ///////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaTotalActivos = DB::select('CALL AFIP_pro_select_total_activos_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////// Total Pasivos Proyectados ///////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaTotalPasivos = DB::select('CALL AFIP_pro_select_total_pasivos_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////// Total Pasivos + Capital /////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaTotalPasivosCapital = DB::select('CALL AFIP_pro_select_total_pasivos_capital_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////// Estado Resultados //////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $graficaEstadoResultados = DB::select('SELECT anio_estado_resultados_1,utilidad_neta_estado_resultados_1 FROM estado_resultados_1 WHERE id_usuario = ?', array( \Auth::user()->id_usuario ) );
        
        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////// Entradas Efectivo ///////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaEntredasEfectivo = DB::select('CALL AFIP_pro_select_entradas_efectivo2_id(?)', array( \Auth::user()->id_usuario ) );
        
        ////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////// Flujo Efectivo Neto Anual Grafica ///////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $graficaFlujoEfectivoAnual = DB::select('SELECT anio_evaluacion_proyecto1,flujos_positivos_evaluacion_proyecto1, flujos_negativos_evaluacion_proyecto1 FROM evaluacion_proyecto1 WHERE id_usuario = ? && (anio_evaluacion_proyecto1 = 1 || anio_evaluacion_proyecto1 = 2 || anio_evaluacion_proyecto1 = 3) LIMIT 3', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////// Calendario de Reintegros de Intereses, Utilidades y Capital ///////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaPasivo1 = DB::select('CALL AFIP_pro_select_pasivo1_con_apoyo_id(?)', array( \Auth::user()->id_usuario ) );
        $tablaPasivo2 = DB::select('CALL AFIP_pro_select_pasivo2_con_apoyo_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////// Valor Presente Neto //////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaValorPresenteNeto = DB::select('CALL AFIP_VPN(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////// Datos Costo/Beneficio ////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaCostoBeneficio = DB::select('CALL AFIP_pro_select_datos_costo_beneficio_id(?)', array( \Auth::user()->id_usuario ) );

        ////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////// Datos Costo/Beneficio Total ////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $tablaCostoBeneficioTotal = DB::select('CALL AFIP_beneficio_costo_total(?)', array( \Auth::user()->id_usuario ) );

        return view('modulos.Resultados', 
            [
                'title'                     => 'Reporte AFIP',
                'datosEmpresa'              => $datosEmpresa,
                'tablaMezclaProSer'         => $tablaMezclaProSer,
                'tablaTotalMezclaProSer'    => $tablaTotalMezclaProSer,
                'tablaCapInstalada'         => $tablaCapInstalada,
                'tablaCapInstalada2'        => $tablaCapInstalada2,
                'tablaEstacionVentas'       => $tablaEstacionVentas,
                'tablaBalanceGral'          => $tablaBalanceGral,
                'tablaResultHist'           => $tablaResultHist,
                'tablaFinanProject'         => $tablaFinanProject,
                'tablaDestInver'            => $tablaDestInver,
                'tablaEntradasEfectivo'     => $tablaEntradasEfectivo,
                'tablaSalidasEfectivo'      => $tablaSalidasEfectivo,
                'tablaCompCostoFijo'        => $tablaCompCostoFijo,
                'tablaCompCostoFijoTotal'   => $tablaCompCostoFijoTotal,
                'tablaCompCostoVariable'    => $tablaCompCostoVariable,
                'tablaIngresosConApoyo'     => $tablaIngresosConApoyo,
                'tablaUtilidadConProyecto'  => $tablaUtilidadConProyecto,
                'tablaTotalActivos'         => $tablaTotalActivos,
                'tablaTotalPasivos'         => $tablaTotalPasivos,
                'tablaTotalPasivosCapital'  => $tablaTotalPasivosCapital,
                'graficaEstadoResultados'   => $graficaEstadoResultados,
                'tablaEntredasEfectivo'     => $tablaEntredasEfectivo,
                'graficaFlujoEfectivoAnual' => $graficaFlujoEfectivoAnual,
                'tablaPasivo1'              => $tablaPasivo1,
                'tablaPasivo2'              => $tablaPasivo2,
                'tablaValorPresenteNeto'    => $tablaValorPresenteNeto,
                'tablaCostoBeneficio'       => $tablaCostoBeneficio,
                'tablaCostoBeneficioTotal'  => $tablaCostoBeneficioTotal,
            ]
        );
    }

}
