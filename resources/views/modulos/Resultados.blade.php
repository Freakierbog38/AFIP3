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
                <th>Depreciación en porcentaje</th>
                <th>Tipo de Activo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tablaDestInver as $dato)
            <tr>
                <td>{{ $dato->destinos_inversiones_destino_recursos }}</td>
                <td>$ {{ $dato->monto_destino_recursos }}</td>
                <td>{{ $dato->porcentaje_destino_recursos }} %</td>
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
    <label class="section-title">Pronósticos de Gastos y Costos</label>

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

    <div id="GraficaCompCostoFijo" class="ht-200 ht-sm-300"></div>

</div><!-- wrapper -->

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

});

</script>
@endsection