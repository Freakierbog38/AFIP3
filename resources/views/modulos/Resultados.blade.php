@extends('plantilla')

@section('contenido')
<div class="slim-pageheader">
    <ol class="breadcrumb slim-breadcrumb">
        
    </ol>
    <h6 class="slim-pagetitle">REPORTE</h6>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////// DATOS DE LA EMPRESA //////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Datos de la empresa</label>
    
    <p> <span class="tx-bold">Nombre de la empresa:</span> <span class="tx-right">Empresa</span> </p>
    <p> <span class="tx-bold">Representante legal:</span> <span class="tx-right">Representante</span> </p>
    <p> <span class="tx-bold">Giro de la empresa:</span> <span class="tx-right">Giro</span> </p>
    
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////// ANTECEDENTES DE LA EMPRESA /////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Antecedentes de la empresa</label>
    
    <h4>Mezcla de productos y servicios</h4>
    <table class="table table-hover tx-center">
        <thead>
            <tr>
                <th>Producto/Servicio</th>
                <th>Unidades al mes</th>
                <th>Precio unitario</th>
                <th>Ventas al mes</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($tablaMezclaProSer as $dato)
                <tr>
                    <th scope="row">{{$dato->nombre_producto_servicio_mezcla_productos_servicios_1_anio}}</th>
                    <td>{{$dato->us_producto_servicio_mezcla_productos_servicios_1_anio}}</td>
                    <td>$ {{$dato->precio_u_producto_servicio_mezcla_productos_servicios_1_anio}}</td>
                    <td>$ {{$dato->ventas_producto_servicio_mezcla_productos_servicios_1_anio}}</td>
                </tr>
            @endforeach
            @foreach($tablaTotalMezclaProSer as $dato)
                <tr class="tx-bold bg-gray-100">
                    <th scope="row">Total</th>
                    <td>{{$dato->us}}</td>
                    <td>$ {{$dato->ven}}</td>
                    <td>$ {{$dato->precio_promedio}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div id="ProductoServicios" class="ht-200 ht-sm-300"></div>
    
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////// CAPACIDAD INSTALADA DE LA EMPRESA //////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Capacidad instalada de la empresa</label>
    
    <div class="row">
        <div class="col-md-6">
            <h4>Niveles actuales de producción</h4>
            <p class="invoice-info-row">
                <span>Unidades Producidas al Mes</span>
                <span>{{ $tablaCapInstalada[0]->unidades_producidas_mes }} unidades</span>
            </p>
            <p class="invoice-info-row">
                <span>Unidades Estimadas al Año</span>
                <span>{{ $tablaCapInstalada[0]->unidades_estimadas_anio }} unidades</span>
            </p>
        </div>
        <div class="col-md-6">
            <h4>Capacidad instalada</h4>
            <p class="invoice-info-row">
                <span>Maximo Unidades al Mes</span>
                <span>{{ $tablaCapInstalada2[0]->maximo_unidades_mes_capacidad_instalada }} unidades</span>
            </p>
            <p class="invoice-info-row">
                <span>Maximo Unidades al Año</span>
                <span>{{ $tablaCapInstalada2[0]->maximo_unidades_anio_capacidad_instalada }} unidades</span>
            </p>
            <p class="invoice-info-row tx-bold">
                <span>Capacidad Utilizada Actual</span>
                <span>{{ $tablaCapInstalada2[0]->capacidad_utilizada_actual_capacidad_instalada }} %</span>
            </p>
            <p>En la tabla anterior se muestra en negritas el porcentaje de la capacidad utilizada actual según los niveles de producción anual.</p>
        </div>
    </div>
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////// ESTACIONALIDAD DE VENTAS ///////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Estacionalidad de Ventas</label>
    <p>En esta gráfica se puede apreciar el incremento y decremento en ventas que ha tenido el negocio en un período de operaciones de 1 año.</p>

    <div id="GraficaEstacionVentas" class="ht-200 ht-sm-300"></div>

</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////// BALANCE GENERAL HISTÓRICO //////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Balance General Histórico</label>
    
    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th colspan=2 class="bd-r bd-b">Activo</th>
                <th colspan=2 class="bd-l bd-b">Pasivo y Capital</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Concepto</th>
                <th class="bd-r">Monto</th>
                <th class="bd-l">Concepto</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody> 
            @if( isset($tablaBalanceGral) )
                <tr>
                    <td>Activo Circulante</td>
                    <td class="bd-r">$ {{ $tablaBalanceGral[0]->activo_circulante }}</td>
                    <td class="bd-l">Pasivo a Corto Plazo</td>
                    <td>$ {{ $tablaBalanceGral[0]->pasivo_corto }}</td>
                </tr>

                <tr>
                    <td>Activo Fijo</td>
                    <td class="bd-r">$ {{ $tablaBalanceGral[0]->activo_fijo }}</td>
                    <td class="bd-l">Pasivo a Largo Plazo</td>
                    <td>$ {{ $tablaBalanceGral[0]->pasivo_largo }}</td>
                </tr>

                <tr>
                    <td>Activo Diferido</td>
                    <td class="bd-r">$ {{ $tablaBalanceGral[0]->activo_diferido }}</td>
                    <td class="bd-l">Total Pasivo</td>
                    <td>$ {{ $tablaBalanceGral[0]->total_pasivo }}</td>
                </tr>

                <tr>
                    <td></td>
                    <td class="bd-r"></td>
                    <td class="bd-l">Capital Aportado</td>
                    <td>$ {{ $tablaBalanceGral[0]->capital_aportado }}</td>
                </tr>

                <tr>
                    <td></td>
                    <td class="bd-r"></td>
                    <td class="bd-l">Capital Ganado</td>
                    <td>$ {{ $tablaBalanceGral[0]->capital_ganado }}</td>
                </tr>

                <tr>
                    <td></td>
                    <td class="bd-r"></td>
                    <td class="bd-l">Exceso/Insuficiencia</td>
                    <td>$ {{ $tablaBalanceGral[0]->exceso }}</td>
                </tr>

                <tr>
                    <td></td>
                    <td class="bd-r"></td>
                    <td class="bd-l">Total Capital</td>
                    <td>$ {{ $tablaBalanceGral[0]->total_capital }}</td>
                </tr>

                <tr>
                    <td></td>
                    <td class="bd-r"></td>
                    <td class="bd-l"></td>
                    <td></td>
                </tr>

                <tr class="tx-bold">
                    <td>Total Activo</td>
                    <td class="bd-r">$ {{ $tablaBalanceGral[0]->total_activo }}</td>
                    <td class="bd-l">Total Pasivo + Capital</td>
                    <td>$ {{ $tablaBalanceGral[0]->total_pasivo_capital }}</td>
                </tr>
            @endif
        </tbody>
    </table>

</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////// RESULTADOS HISTORICO //////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Estado de Resultados Histórico</label>
    
    <p class="invoice-info-row tx-bold">
        <span>Concepto</span>
        <span>Monto</span>
    </p>
    <p class="invoice-info-row">
        <span>Ventas Netas</span>
        <span>$ {{ $tablaResultHist[0]->ventas_netas_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>Costo de Ventas</span>
        <span>$ {{ $tablaResultHist[0]->costo_ventas_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>Utilidad Bruta</span>
        <span>$ {{ $tablaResultHist[0]->utilidad_bruta_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>Gastos de Operación</span>
        <span>$ {{ $tablaResultHist[0]->gastos_operacion_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>UAFIRDA</span>
        <span>$ {{ $tablaResultHist[0]->uafirda_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>Depreciación y Amortización</span>
        <span>$ {{ $tablaResultHist[0]->depreciacion_amortizacion_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>UAFIR</span>
        <span>$ {{ $tablaResultHist[0]->uafir_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>Gastor y Productos Financieros</span>
        <span>$ {{ $tablaResultHist[0]->gastos_prod_financieros_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>UAIR</span>
        <span>$ {{ $tablaResultHist[0]->uair_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>Impuestos</span>
        <span>$ {{ $tablaResultHist[0]->impuestos_cifras_pesos_nominales }}</span>
    </p>
    <p class="invoice-info-row">
        <span>Utilidad Neta</span>
        <span>$ {{ $tablaResultHist[0]->utilidad_neta_cifras_pesos_nominales }}</span>
    </p>

</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////// ANÁLISIS DE USO DE DINERO //////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Análisis de uso de dinero</label>
    <br>

    <h6>Fuentes de financiamiento para el desarrollo del proyecto</h6>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Fuente de financiamiento</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaFinanProject as $dato)
            <tr>
                <td>{{ $dato->fuente_financiamiento_proyecto }}</td>
                <td>$ {{ $dato->monto_financiamiento_proyecto }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <br>
    
    <div id="GraficaFinanciamientoProyecto" class="ht-200 ht-sm-300"></div>

    <br>

    <h6>Destino de Recursos</h6>
    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Destino de las Inversiones</th>
                <th>Monto</th>
                <th>Tipo de Activo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaDestInver as $dato)
            <tr>
                <td>{{ $dato->destinos_inversiones_destino_recursos }}</td>
                <td>$ {{ $dato->monto_destino_recursos }}</td>
                <td>{{ $dato->tipo_activo_destino_recursos }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <div id="GraficaDestinoInversiones" class="ht-200 ht-sm-300"></div>

</div><!-- wrapper -->

<div class="section-wrapper mg-t-20">
    <label class="section-title">Estado de Origen y Aplicación</label>
    <br>

    <p>Con la finalidad de evaluar los flujos de efectivo que el proyecto generaría en los primeros doce meses de operación, se elaboró un estado de origen y aplicación de efectivo de los 12 primeros meses. Para el análisis de las cifras de los años subsecuentes se tiene el cálculo del flujo de efectivo neto actual.</p>

    <h6>Entradas de Efectivo</h6>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Mes</th>
                <th>Operación</th>
                <th>Financiamiento</th>
                <th>Otras</th>
                <th>Total de Fuentes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaEntradasEfectivo as $dato)
                <tr>
                    <td>{{ $dato->mes_entradas_efectivo }}</td>
                    <td>{{ $dato->ventas_cobranza_entradas_efectivo }}</td>
                    <td>{{ $dato->acreedores_diversos_entradas_efectivo }}</td>
                    <td>{{ $dato->otros_entradas_efectivo }}</td>
                    <td>{{ $dato->total_entradas_efectivo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <h6>Salidas de Efectivo</h6>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Mes</th>
                <th>Inversión en Activos Fijos</th>
                <th>Inversión en Activos Diferidos</th>
                <th>Inversión en Capital de Trabajo</th>
                <th>Costos Variables de Operación</th>
                <th>Costos Fijos de Operación</th>
                <th>Gastos Financieros</th>
                <th>ISR + PTU</th>
                <th>Pagos de Capital por Financiamiento</th>
                <th>Total Salidas</th>
                <th>Flujo Neto de Efectivo</th>
                <th>Flujo de Efectivo Acumulado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaSalidasEfectivo as $dato)
                <tr>
                    <td>{{ $dato->mes_salidas_efectivo }}</td>
                    <td>{{ $dato->inversion_fijos }}</td>
                    <td>{{ $dato->inversion_diferidos }}</td>
                    <td>{{ $dato->inversion_capital }}</td>
                    <td>{{ $dato->costos_variables_salidas_efectivo }}</td>
                    <td>{{ $dato->costos_fijos_salidas_efectivo }}</td>
                    <td>{{ $dato->gastos_financieros_salidas_efectivo }}</td>
                    <td>{{ $dato->isr_ptu_salidas_efectivo }}</td>
                    <td>{{ $dato->pagos_capital_salidas_efectivo }}</td>
                    <td>{{ $dato->total_salidas_efectivo }}</td>
                    <td>{{ $dato->flujo_neto_salidas_efectivo }}</td>
                    <td>{{ $dato->flujo_efectivo_salidas_efectivo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div><!-- wrapper -->

<div class="section-wrapper mg-t-20">
    <label class="section-title">Programa de Inversiones</label>
    <p>El presente proyecto se ha analizado a un horizonte de 3 años en el que se considera que no habrán de llevarse a cabo más inversiones adicionales.</p>

    <h3>Pronósticos de Gastos y Costos</h3>
    <h6>Composición de Costo Fijo</h6>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Costo Mensual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaCompCostoFijo as $dato)
                <tr>
                    <td>{{ $dato->concepto_CFM }}</td>
                    <td>{{ $dato->CFM }}</td>
                </tr>
            @endforeach
            @if( isset($tablaCompCostoFijoTotal[0]) )
                <tr class="tx-bold bg-gray-100">
                    <td>Total</td>
                    <td>{{ $tablaCompCostoFijoTotal[0]->costo_fijo }}</td>
                </tr>
            @endif
        </tbody>
    </table>

    <p>En esta gráfica se puede contemplar el desglose de los costos fijos en los que incurre la empresa mensualmente.</p>

    <div id="GraficaCompCostoFijo" class="ht-200 ht-sm-300"></div>

    <br>

    <h6>Composición Costo Variable</h6>
    <p>En esta gráfica se puede contemplar el desglose de los costos variables en los que incurre la empresa mensualmente.</p>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Costo Unitario</th>
                <th>Porcentaje Precio Unitario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaCompCostoVariable as $dato)
                <tr>
                    <td>{{ $dato->concepto_costos_variables_unitarios }}</td>
                    <td>$ {{ $dato->costoU_costos_variables_unitarios }}</td>
                    <td>{{ $dato->porcPrecioU_costos_variables_unitarios }} %</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="GraficaCompCostoVariable" class="ht-200 ht-sm-300"></div>

    <br>

    <p>En la siguiente tabla puede contemplarse el porcentaje de incremento en variables de crecimiento del negocio proyectadas a 3 años.</p>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Incremento de Precios (%)</th>
                <th>Incremento en Unidades Vendidas (%)</th>
                <th>Incremento en Ventas (%)</th>
                <th>Incremento en Acumulado en Ventas</th>
                <th>Incremento en Costos Fijos (%)</th>
                <th>Incremento en Costos Variables (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaIngresosConApoyo as $dato)
                <tr>
                    <td>{{ $dato->anio_ingresos_costos_con_apoyo }}</td>
                    <td>{{ $dato->incremento_precios_ingresos_costos_con_apoyo }} %</td>
                    <td>{{ $dato->inc_unidades_vendidas_ingresos_costos_con_apoyo }} %</td>
                    <td>{{ $dato->incremento_ventas_ingresos_costos_con_apoyo }} %</td>
                    <td>{{ $dato->inc_acumulado_ingresos_costos_con_apoyo }} %</td>
                    <td>{{ $dato->inc_cortes_fijos_ingresos_costos_con_apoyo }}</td>
                    <td>{{ $dato->inc_cortes_variables_ingresos_costos_con_apoyo }} %</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>A continuación, se presenta el análisis de margen de contribución presentando las tendencias de los costos variables y fijos.</p>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Ingresos Totales</th>
                <th>Costos Variable</th>
                <th>Margen de Contribución</th>
                <th>Costos Fijo</th>
                <th>Utilidad de Operación</th>
                <th>Porcentaje de Utilidad de Operación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaUtilidadConProyecto as $dato)
                <tr>
                    <td>{{ $dato->anio_analisis_utilidad_operacion_con_proyecto }}</td>
                    <td>$ {{ $dato->ingresos_totales_analisis_utilidad_operacion_con_proyecto }}</td>
                    <td>$ {{ $dato->cv_analisis_utilidad_operacion_con_proyecto }}</td>
                    <td>{{ $dato->margen_contribucion_analisis_utilidad_operacion_con_proyecto }}</td>
                    <td>$ {{ $dato->cf_analisis_utilidad_operacion_con_proyecto }}</td>
                    <td>{{ $dato->utilidad_operacion_analisis_utilidad_operacion_con_proyecto }}</td>
                    <td>{{ $dato->porcentaje_utilidad_analisis_utilidad_operacion_con_proyecto }} %</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div><!-- wrapper -->

<div class="section-wrapper mg-t-20">
    <label class="section-title">Balance General</label>
    <p>Con la finalidad de evaluar los incrementos o decrementos de los activos del negocio se construyó el siguiente balance general proyectado.</p>

    <div id="GraficaActivosTotales" class="ht-200 ht-sm-300"></div>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Efectivo</th>
                <th>Cuentas por Cobrar</th>
                <th>Inventarios</th>
                <th>Otros Activos Circulantes</th>
                <th>Total Activo Circulante</th>
                <th>Activo Fijo Neto</th>
                <th>Activo Diferido</th>
                <th>Total Activo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaTotalActivos as $dato)
                <tr>
                    <td>{{ $dato->anio_total_activo }}</td>
                    <td>{{ $dato->efectivo_total_activo }}</td>
                    <td>{{ $dato->cuentas_cobrar_total_activo }}</td>
                    <td>{{ $dato->inventarios_total_activo }}</td>
                    <td>{{ $dato->otros_circulantes_total_activo }}</td>
                    <td>{{ $dato->total_circulante_total_activo }}</td>
                    <td>{{ $dato->fijo_neto_total_activo }}</td>
                    <td>{{ $dato->total_diferido_total_activo }}</td>
                    <td>{{ $dato->total_activos_total_activo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Proveedores</th>
                <th>Otros Pasivos Circulantes</th>
                <th>Bancos Corto Plazo</th>
                <th>Total Pasivo Circulante</th>
                <th>Total Pasivo Largo Plazo</th>
                <th>Total Pasivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaTotalPasivos as $dato)
                <tr>
                    <td>{{ $dato->anio_total_pasivo }}</td>
                    <td>{{ $dato->proveedores_total_pasivo }}</td>
                    <td>{{ $dato->otros_circulantes_total_pasivo }}</td>
                    <td>{{ $dato->bancos_corto_plazo_total_pasivo }}</td>
                    <td>{{ $dato->total_circulante_total_pasivo }}</td>
                    <td>{{ $dato->total_largo_plazo_total_pasivo }}</td>
                    <td>{{ $dato->total_pasivos_total_pasivo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Total Pasivo</th>
                <th>Total Capital</th>
                <th>Pasivo + Capital</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaTotalPasivosCapital as $dato)
                <tr>
                    <td>{{ $dato->anio_totales_pasivo_capital }}</td>
                    <td>{{ $dato->total_pasivo_totales_pasivo_capital }}</td>
                    <td>{{ $dato->total_capital_totales_pasivo_capital }}</td>
                    <td>{{ $dato->capital_pasivo_totales_pasivo_capital }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="section-wrapper mg-t-20">
    <label class="section-title">Estado de Resultados</label>
    <p>Con la finalidad de evaluar la capacidad de generar utilidades del proyecto de inversión, se elaboró el Estado de Resultados proyectado para los próximos 3 ejercicios de operación de la vida del negocio.</p>

    <div id="GraficaEstadoResultados" class="ht-200 ht-sm-300"></div>
    
</div>

<div class="section-wrapper mg-t-20">
    <label class="section-title">Flujo Neto de Efectivo Anual</label>
    <p>Como pilar fundamental para la determinación del valor presente del proyecto se construyeron los flujos de efectivo de los años 1 al 3. En la tabla de abajo se especifíca la tasa de descuento (Tasa de Rendimiento Esperado Mínimo Aceptable), que equivale a la inflación anual esperada para el periodo de análisis.</p>
    <p>El flujo neto de efectivo se encuentra calculado mediante un análisis de flujos incrementales, es decir utilizando el escenario bajo flujos netos de efectivo con apoyo y flujos neto sde efectivo sin apoyi de la operación normal del negocio.</p>
    <p>Dicho estado financiero se presenta a continuación:</p>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Créditos Bancarios</th>
                <th>Ventas y Cobranza</th>
                <th>Acreedores Diversos</th>
                <th>Total Fuentes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaEntredasEfectivo as $dato)
                <tr>
                    <td>{{ $dato->anio_entradas_efectivo2 }}</td>
                    <td>{{ $dato->creditos_bancarios }}</td>
                    <td>{{ $dato->ventas_cobranza_entradas_efectivo2 }}</td>
                    <td>{{ $dato->acreedores_diversos_entradas_efectivo2 }}</td>
                    <td>{{ $dato->total_entradas_efectivo2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="GraficaFlujoEfectivoAnual" class="ht-200 ht-sm-300"></div>

</div>

<div class="section-wrapper mg-t-20">
    <label class="section-title">Calendario de Reintegros de Intereses, Utilidades y Capital</label>
    <p>Apegándose a las reglas de operación del PPP PyME; la retribución de los recursos se realizaría bajo pagos fijos mensuales. El cálculo de los recursos restituidos del PPP PyME es el siguiente:</p>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Mes</th>
                <th>Saldo</th>
                <th>Pago Capital</th>
                <th>Pago Int</th>
                <th>Pago Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaPasivo1 as $dato)
                <tr>
                    <td>{{ $dato->anio_composicion_pasivo1_con_apoyo }}</td>
                    <td>{{ $dato->num_mes_composicion_pasivo1_con_apoyo }}</td>
                    <td>{{ $dato->saldo_composicion_pasivo1_con_apoyo }}</td>
                    <td>{{ $dato->pago_capital_composicion_pasivo1_con_apoyo }}</td>
                    <td>{{ $dato->pago_interes_composicion_pasivo1_con_apoyo }}</td>
                    <td>{{ $dato->pago_total_composicion_pasivo1_con_apoyo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Mes</th>
                <th>Saldo</th>
                <th>Pago Capital</th>
                <th>Pago Int</th>
                <th>Pago Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaPasivo2 as $dato)
                <tr>
                    <td>{{ $dato->anio_composicion_pasivo2_con_apoyo }}</td>
                    <td>{{ $dato->num_mes_composicion_pasivo2_con_apoyo }}</td>
                    <td>{{ $dato->saldo_composicion_pasivo2_con_apoyo }}</td>
                    <td>{{ $dato->pago_capital_composicion_pasivo2_con_apoyo }}</td>
                    <td>{{ $dato->pago_interes_composicion_pasivo2_con_apoyo }}</td>
                    <td>{{ $dato->pago_total_composicion_pasivo2_con_apoyo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="section-wrapper mg-t-20">
    <label class="section-title">Rentabilidad y Beneficio del Proyecto</label>
    <h6>Valor Presente Neto</h6>
    <p>Después de evaluar el proyecto por indicadores que consideran el valor del dinero en el tiempo se obtuvieron los siguientes resultados.</p>

    <p class="invoice-info-row">
        <span>{{ $tablaValorPresenteNeto[0]->nombre_empresa }}</span>
        <span>$ {{ $tablaValorPresenteNeto[0]->vpn }}</span>
    </p>

</div>

<div class="section-wrapper mg-t-20">
    <label class="section-title">Relación Beneficio Costo</label>
    <p>La relación costo-beneficio establece las veces que las entradas de efectivo (flujos positivos) son superiores a las salidas de efectivo (flujos negativos), incluyendo la inversión inicial traídos a valor presente. Toda vez que la relación costo beneficio es superior a la unidad, el proyecto es viable desde este criterio. A continuación, se presenta el cálculo de la relación beneficio-costo.</p>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Año</th>
                <th>Ingresos Totales</th>
                <th>TD o FA</th>
                <th>Ingresos Actualizados</th>
                <th>Costos y Gastos Totales</th>
                <th>Costos y Gastos Actualizados</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaCostoBeneficio as $dato)
                <tr>
                    <td>{{ $dato->anio_evaluacion_proyecto2 }}</td>
                    <td>{{ $dato->ingresos_totales_evaluacion_proyecto2 }}</td>
                    <td>{{ $dato->td_fa_evaluacion_proyecto2 }}</td>
                    <td>{{ $dato->ingresos_actualizados_evaluacion_proyecto2 }}</td>
                    <td>{{ $dato->costos_gtos_totales_evaluacion_proyecto2 }}</td>
                    <td>{{ $dato->costos_gtos_actualizados_evaluacion_proyecto2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <table class="table table-bordered tx-center">
        <thead>
            <tr>
                <th>Beneficio Actualizado</th>
                <th>Costo Actualizado</th>
                <th>Relación Beneficio/Costo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaCostoBeneficioTotal as $dato)
                <tr>
                    <td>{{ $dato->beneficio_actualizado }}</td>
                    <td>{{ $dato->costo_actualizado }}</td>
                    <td>{{ $dato->beneficio_costo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@section('scripts')
<script>

$(function(){

    /**************** PRODUCTOS O SERVICIOS - GRÁFICA PASTEL ************/

    var ProdSerOption = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)',
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            }
        },
        legend: {
            orient: 'vertical',
            x: 'right',
            data: [
                @foreach($tablaMezclaProSer as $dato)
                    '{{$dato->nombre_producto_servicio_mezcla_productos_servicios_1_anio}}',
                @endforeach
            ]
        },
        series: [{
            name: 'Productos o Servicios',
            type: 'pie',
            radius: '75%',
            center: ['50%', '50%'],
            data: [
                @foreach($tablaMezclaProSer as $dato)
                    {
                        value: {{$dato->us_producto_servicio_mezcla_productos_servicios_1_anio}}, 
                        name: '{{$dato->nombre_producto_servicio_mezcla_productos_servicios_1_anio}}'
                    },
                @endforeach
            ]
        }]
    };

    var ProductosServicios = document.getElementById('ProductoServicios');
    var ProductosServiciosChart = echarts.init(ProductosServicios);
    ProductosServiciosChart.setOption(ProdSerOption);

    /********************** ESTACIONALIDAD DE VENTAS - GRÁFICA LINEAL ***********************/
    var EstVentasData = [
        {
        name: 'Variación',
        type: 'line',
        data: [
            @foreach($tablaEstacionVentas as $dato)
                {{ $dato->variacion_ventas_estacionalidad_ventas }},
            @endforeach
            ]
        }
    ];

    var EstVentasOption = {
        grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
        },
        tooltip:{
            trigger: 'axis'
        },
        xAxis: {
            data: [ 
                @foreach($tablaEstacionVentas as $dato)
                    '{{ $dato->mes_estacionalidad_ventas }}',
                @endforeach
            ],
            axisLine: {
                lineStyle: {
                    color: '#ccc'
                }
            },
            label: {
                normal: {
                    fontFamily: 'Roboto, sans-serif',
                    fontSize: 11
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#666'
            }
        },
        yAxis: {
            splitLine: {
                lineStyle: {
                color: '#ddd'
                }
            },
            axisLine: {
                lineStyle: {
                color: '#ccc'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#666'
            }
        },
        series: EstVentasData
    };

    var EstacionVentas = document.getElementById('GraficaEstacionVentas');
    var EstacionVentasChart = echarts.init(EstacionVentas);
    EstacionVentasChart.setOption(EstVentasOption);

    /**************** FINANCIAMIENTO DEL PROYECTO - GRÁFICA PASTEL ************/
    var FinanProjectData = [{
        name: 'Fuente de Financiamiento',
        type: 'pie',
        radius: '75%',
        center: ['50%', '57.5%'],
        data: [
            @foreach($tablaFinanProject as $dato)
                {
                    value: {{$dato->monto_financiamiento_proyecto}}, 
                    name: '{{$dato->fuente_financiamiento_proyecto}}'
                },
            @endforeach
        ],
        label: {
            normal: {
                fontFamily: 'Roboto, sans-serif',
                fontSize: 11
            }
        },
        labelLine: {
            normal: {
                show: true
            }
        },
        markLine: {
            lineStyle: {
                normal: {
                    width: 1
                }
            }
        }
    }];

    var FinanProjectOption = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)',
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            }
        },
        legend: {
            orient: 'vertical',
            x: 'right',
            data: [
                @foreach($tablaFinanProject as $dato)
                    '{{$dato->fuente_financiamiento_proyecto}}',
                @endforeach
            ]
        },
        series: FinanProjectData
    };

    var FinanProject = document.getElementById('GraficaFinanciamientoProyecto');
    var FinanProjectChart = echarts.init(FinanProject);
    FinanProjectChart.setOption(FinanProjectOption);
    
    /**************** DESTINO DE LAS RECURSOS - GRÁFICA PASTEL ************/
    var DestinoRecursosData = [{
        name: 'Monto',
        type: 'pie',
        radius: '75%',
        center: ['50%', '57.5%'],
        data: [
            @foreach($tablaDestInver as $dato)
                {
                    value: {{$dato->monto_destino_recursos}}, 
                    name: '{{$dato->destinos_inversiones_destino_recursos}}'
                },
            @endforeach
        ],
        label: {
            normal: {
                fontFamily: 'Roboto, sans-serif',
                fontSize: 11
            }
        },
        labelLine: {
            normal: {
                show: true
            }
        },
        markLine: {
            lineStyle: {
                normal: {
                    width: 1
                }
            }
        }
    }];

    var DestinoRecursosOption = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)',
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            }
        },
        legend: {
            orient: 'vertical',
            x: 'right',
            data: [
                @foreach($tablaDestInver as $dato)
                    '{{$dato->destinos_inversiones_destino_recursos}}',
                @endforeach
            ]
        },
        series: DestinoRecursosData
    };

    var DestinoRecursos = document.getElementById('GraficaDestinoInversiones');
    var DestinoRecursosChart = echarts.init(DestinoRecursos);
    DestinoRecursosChart.setOption(DestinoRecursosOption);

    /**************** COMPOSICIÓN DE COSTOS FIJOS - GRÁFICA PASTEL ************/
    var CompCostoFijoData = [{
        name: 'Monto',
        type: 'pie',
        radius: '75%',
        center: ['50%', '57.5%'],
        data: [
            @foreach($tablaCompCostoFijo as $dato)
                {
                    value: {{$dato->CFM}}, 
                    name: '{{$dato->concepto_CFM}}'
                },
            @endforeach
        ],
        label: {
            normal: {
                fontFamily: 'Roboto, sans-serif',
                fontSize: 11
            }
        },
        labelLine: {
            normal: {
                show: true
            }
        },
        markLine: {
            lineStyle: {
                normal: {
                    width: 1
                }
            }
        }
    }];

    var CompCostoFijoOption = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)',
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            }
        },
        legend: {
            orient: 'vertical',
            x: 'right',
            data: [
                @foreach($tablaCompCostoFijo as $dato)
                    '{{$dato->concepto_CFM}}',
                @endforeach
            ]
        },
        series: CompCostoFijoData
    };

    var CompCostoFijo = document.getElementById('GraficaCompCostoFijo');
    var CompCostoFijoChart = echarts.init(CompCostoFijo);
    CompCostoFijoChart.setOption(CompCostoFijoOption);

    /**************** COMPOSICIÓN DE COSTOS VARIABLES - GRÁFICA PASTEL ************/
    var CompCostoVariableData = [{
        name: 'Monto',
        type: 'pie',
        radius: '75%',
        center: ['50%', '57.5%'],
        data: [
            @foreach($tablaCompCostoVariable as $dato)
                {
                    value: {{$dato->costoU_costos_variables_unitarios}}, 
                    name: '{{$dato->concepto_costos_variables_unitarios}}'
                },
            @endforeach
        ],
        label: {
            normal: {
                fontFamily: 'Roboto, sans-serif',
                fontSize: 11
            }
        },
        labelLine: {
            normal: {
                show: true
            }
        },
        markLine: {
            lineStyle: {
                normal: {
                    width: 1
                }
            }
        }
    }];

    var CompCostoVariableOption = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)',
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            }
        },
        legend: {
            orient: 'vertical',
            x: 'right',
            data: [
                @foreach($tablaCompCostoVariable as $dato)
                    '{{$dato->concepto_costos_variables_unitarios}}',
                @endforeach
            ]
        },
        series: CompCostoVariableData
    };

    var CompCostoVariable = document.getElementById('GraficaCompCostoVariable');
    var CompCostoVariableChart = echarts.init(CompCostoVariable);
    CompCostoVariableChart.setOption(CompCostoVariableOption);


    /********************** ACTIVOS TOTALES PROYECTADOS - GRÁFICA LINEAL ***********************/
    var ActivosTotalesData = [
        {
        name: 'Total',
        type: 'line',
        data: [
            @foreach($tablaTotalActivos as $dato)
                {{ $dato->total_activos_total_activo }},
            @endforeach
            ]
        }
    ];

    var ActivosTotalesOption = {
        grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
        },
        tooltip:{
            trigger: 'axis'
        },
        xAxis: {
            data: [ 
                @foreach($tablaTotalActivos as $dato)
                    'Año {{ $dato->anio_total_activo }}',
                @endforeach
            ],
            axisLine: {
                lineStyle: {
                    color: '#ccc'
                }
            },
            label: {
                normal: {
                    fontFamily: 'Roboto, sans-serif',
                    fontSize: 11
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#666'
            }
        },
        yAxis: {
            splitLine: {
                lineStyle: {
                color: '#ddd'
                }
            },
            axisLine: {
                lineStyle: {
                color: '#ccc'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#666'
            }
        },
        series: ActivosTotalesData
    };

    var ActivosTotales = document.getElementById('GraficaActivosTotales');
    var ActivosTotalesChart = echarts.init(ActivosTotales);
    ActivosTotalesChart.setOption(ActivosTotalesOption);

    /********************** ESTADO DE RESULTADOS - GRÁFICA LINEAL ***********************/
    var EstadoResultadoData = [
        {
            name: 'Utilidad Neta',
            type: 'line',
            data: [
                @foreach($graficaEstadoResultados as $dato)
                    {{ $dato->utilidad_neta_estado_resultados_1 }},
                @endforeach
                ]
        }
    ];

    var EstadoResultadoOption = {
        grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
        },
        tooltip:{
            trigger: 'axis'
        },
        xAxis: {
            data: [ 
                @foreach($graficaEstadoResultados as $dato)
                    'Año {{ $dato->anio_estado_resultados_1 }}',
                @endforeach
            ],
            axisLine: {
                lineStyle: {
                    color: '#ccc'
                }
            },
            label: {
                normal: {
                    fontFamily: 'Roboto, sans-serif',
                    fontSize: 11
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#666'
            }
        },
        yAxis: {
            splitLine: {
                lineStyle: {
                color: '#ddd'
                }
            },
            axisLine: {
                lineStyle: {
                color: '#ccc'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#666'
            }
        },
        series: EstadoResultadoData
    };

    var EstadoResultado = document.getElementById('GraficaEstadoResultados');
    var EstadoResultadoChart = echarts.init(EstadoResultado);
    EstadoResultadoChart.setOption(EstadoResultadoOption);

    /********************** FLUJO EFECTIVO NETO ANUAL - GRÁFICA LINEAL ***********************/
    var FlujoEfectivoAnualData = [
        {
            name: 'Flujo Positivo',
            type: 'line',
            data: [
                @foreach($graficaFlujoEfectivoAnual as $dato)
                    {{ $dato->flujos_positivos_evaluacion_proyecto1 }},
                @endforeach
                ]
        },
        {
            name: 'Flujo Negativo',
            type: 'line',
            data: [
                @foreach($graficaFlujoEfectivoAnual as $dato)
                    {{ $dato->flujos_negativos_evaluacion_proyecto1 }},
                @endforeach
                ]
        }
    ];

    var FlujoEfectivoAnualOption = {
        grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
        },
        tooltip:{
            trigger: 'axis'
        },
        xAxis: {
            data: [ 
                @foreach($graficaFlujoEfectivoAnual as $dato)
                    'Año {{ $dato->anio_evaluacion_proyecto1 }}',
                @endforeach
            ],
            axisLine: {
                lineStyle: {
                    color: '#ccc'
                }
            },
            label: {
                normal: {
                    fontFamily: 'Roboto, sans-serif',
                    fontSize: 11
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#666'
            }
        },
        yAxis: {
            splitLine: {
                lineStyle: {
                color: '#ddd'
                }
            },
            axisLine: {
                lineStyle: {
                color: '#ccc'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#666'
            }
        },
        series: FlujoEfectivoAnualData
    };

    var FlujoEfectivoAnual = document.getElementById('GraficaFlujoEfectivoAnual');
    var FlujoEfectivoAnualChart = echarts.init(FlujoEfectivoAnual);
    FlujoEfectivoAnualChart.setOption(FlujoEfectivoAnualOption);

});
</script>
@endsection