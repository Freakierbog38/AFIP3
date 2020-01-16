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
    @if(isset($empresa))
    <p> <span class="tx-bold">Nombre de la empresa:</span> <span class="tx-right">{{ $empresa->nombre }}</span> </p>
    <p> <span class="tx-bold">Representante legal:</span> <span class="tx-right">{{ \Auth::user()->nombre . " " . \Auth::user()->apellido_paterno . " " . \Auth::user()->apellido_materno }}</span> </p>
    <p> <span class="tx-bold">Giro de la empresa:</span> <span class="tx-right">{{ $empresa->giro }}</span> </p>
    @endif
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////// ANTECEDENTES DE LA EMPRESA /////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Antecedentes de la empresa</label>
    
    <h4>Mezcla de productos y servicios</h4>
    <table class="table table-hover tx-center">
        <thead>
            <tr class="tx-center">
                <th>Producto/Servicio</th>
                <th>Unidades al mes</th>
                <th>Precio unitario</th>
                <th>Ventas al mes</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($prodSer as $dato)
                <tr class="tx-center">
                    <th scope="row">{{$dato->nombre}}</th>
                    <td>{{number_format($dato->unidades_mes)}}</td>
                    <td>$ {{number_format($dato->precio,2)}}</td>
                    <td>$ {{number_format($dato->ventas_mes,2)}}</td>
                </tr>
            @endforeach
            
            <tr class="tx-bold bg-gray-100 tx-center">
                <th scope="row">Total</th>
                <td>{{number_format($prodSerTotal['unidades'])}}</td>
                <td>$ {{number_format(($prodSerTotal['ventas']/$prodSerTotal['unidades']),2)}}</td>
                <td>$ {{number_format($prodSerTotal['ventas'],2)}}</td>
            </tr>
            
        </tbody>
    </table>
    
    <div id="ProductoServicios" class="ht-200 ht-sm-300"></div>
    
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////// ESTADO DE RESULTADOS ///////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Estado de Resultados</label>
    
    <table class="table table-hover">
        <thead>
            <tr class="tx-center">
                <th width="218">Concepto</th>
                @foreach($estadoResultados as $dato)
                    <td>{{ $dato->anio }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ventas Brutas</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->ventas_brutas,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(-)Costo de Ventas</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->costo_ventas,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(=)Utilidad Bruta</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->ut_bruta,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(-)Gastos de Admon y Ventas</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->gastos_admon_ventas,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(=)UAFIRDA</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->UAFIRDA,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(-)Depreciación y Amortización</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->depre_amort,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(=)Utilidad de Operación</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->ut_operacion,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(-)Gastos Financieros</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->gastos_finan,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(=)Utilidad Antes de impuestos</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->ut_antes_impuestos,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>(-)ISR + PTU</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->ISRPTU,2)}}</td>
                @endfor
            </tr>
            <tr class="tx-bold">
                <td>(=)Utilidad Neta</td>
                @for($i=0;$i<$estadoResultados->count();$i++)
                    <td class="tx-center">$ {{number_format($estadoResultados[$i]->ut_neta,2)}}</td>
                @endfor
            </tr>
        </tbody>
    </table>
    
    <div id="EstadoResultados" class="ht-200 ht-sm-300"></div>
    
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////// BALANCE GENERAL /////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Balance General</label>
    
    <h4>ACTIVO</h4>
    <table class="table table-hover">
        <thead>
            <tr class="tx-center">
                <th width="218">Concepto</th>
                @foreach($balanceGral as $dato)
                    <td>{{ $dato->anio }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Efectivo</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->activo_efectivo,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Cuentas por Cobrar</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->cuentas_cobrar,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Inventario</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->inventario,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Otros Activos</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->otros_activos,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Total Activo Circulante</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->total_activo_circulante,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Activo Fijo Neto</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->activo_fijo_neto,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Total Activo Diferido</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->total_activo_diferido,2)}}</td>
                @endfor
            </tr>
            <tr class="tx-bold">
                <td>Total Activo</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->total_activo,2)}}</td>
                @endfor
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <h4>PASIVO</h4>
    <table class="table table-hover">
        <thead>
            <tr class="tx-center">
                <th width="218">Concepto</th>
                @foreach($balanceGral as $dato)
                    <td>{{ $dato->anio }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Proveedores</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->proveedores,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Otros Pasivos Circulantes</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->otros_pasivos_circulantes,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Documentos por Pagar</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->documentos_pagar,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Total Pasivo Circulante</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->total_pasivo_circulante,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Bancos Largo Plazo</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->bancos_largo_plazo,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Total Pasivo Largo Plazo</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->total_pasivo_largo_plazo,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Total Pasivo</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->total_pasivo,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Total Capital</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->total_capital,2)}}</td>
                @endfor
            </tr>
            <tr class="tx-bold">
                <td>Pasivo + Capital</td>
                @for($i=0;$i<$balanceGral->count();$i++)
                    <td class="tx-center">$ {{number_format($balanceGral[$i]->pasivo_capital,2)}}</td>
                @endfor
            </tr>
        </tbody>
    </table>
    
    <div id="BalanceGeneral" class="ht-200 ht-sm-300"></div>
    
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////// TABLAS DE AMORTIZACION /////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Tablas de Amortización</label>
    @foreach($tablasAmortizacion as $tabla)
    <h6>Clave: {{ $tabla->clave }}</h6>
    <h6>Destino: {{ $tabla->destino }}</h6>
    <table class="table table-hover">
        <thead>
        <tr class="tx-center">
                <th>Año</th>
                <th>Mes</th>
                <th>Saldo</th>
                <th>Pago Capital</th>
                <th>Pago Intereses</th>
                <th>Pago Total</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($amortizacion->where('clave', $tabla->clave) as $dato)
                <tr class="tx-center">
                    <td>{{$dato->anio}}</td>
                    <td>{{$dato->mes}}</td>
                    <td>$ {{number_format($dato->saldo,2)}}</td>
                    <td>$ {{number_format($dato->pago_capital,2)}}</td>
                    <td>$ {{number_format($dato->pago_intereses,2)}}</td>
                    <td>$ {{number_format($dato->pago_total,2)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
    
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////// FLUJO DE EFECTIVO //////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Flujo de Efectivo</label>

    <table class="table table-hover">
        <thead>
            <tr class="tx-center">
                <th width="218">Fuentes de Efectivo</th>
                @foreach($flujoEfectivo as $dato)
                    <td>{{ $dato->anio }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ingresos por ventas</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->ingresos_ventas,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Apoyos</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->apoyo,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Acreedores</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->aportaciones,2)}}</td>
                @endfor
            </tr>
            <tr class="tx-bold">
                <td>Total Fuentes</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->total_fuentes,2)}}</td>
                @endfor
            </tr>
        </tbody>
    </table>

    <br>
    <br>

    <table class="table table-hover">
        <thead>
            <tr class="tx-center">
                <th width="218">Aplicaciones Efectivo</th>
                @foreach($flujoEfectivo as $dato)
                    <td>{{ $dato->anio }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Costo de ventas</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->costo_ventas,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Gastos de operación</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->gastos_operacion,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Capital de Trabajo</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->inc_capital_trabajo,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Pagos de Capital</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->pagos_capital,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Pagos de Intereses</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->pagos_interes,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Activos Fijos</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->inversion,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Impuestos</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->impuestos,2)}}</td>
                @endfor
            </tr>
            <tr class="tx-bold">
                <td>Total Aplicaciones</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->total_aplicaciones,2)}}</td>
                @endfor
            </tr>
            <tr class="tx-bold">
                <td>Flujo de Efectivo Neto</td>
                @for($i=0;$i<$flujoEfectivo->count();$i++)
                    <td class="tx-center">$ {{number_format($flujoEfectivo[$i]->flujo_efectivo_neto,2)}}</td>
                @endfor
            </tr>
        </tbody>
    </table>
    
</div><!-- wrapper -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////// EVALUACIÓN DE PROYECTOS //////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="section-wrapper mg-t-20">
    <label class="section-title">Evaluación de Proyectos</label>
    
    <table class="table table-hover">
        <thead>
            <tr class="tx-center">
                <th width="218">Concepto</th>
                @foreach($evaluacionProyecto as $dato)
                    <td>{{ $dato->anio }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Flujo Positivo</td>
                @for($i=0;$i<$evaluacionProyecto->count();$i++)
                    <td class="tx-center">$ {{number_format($evaluacionProyecto[$i]->flujo_positivo,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Flujo Negativo</td>
                @for($i=0;$i<$evaluacionProyecto->count();$i++)
                    <td class="tx-center">$ {{number_format($evaluacionProyecto[$i]->flujo_negativo,2)}}</td>
                @endfor
            </tr>
            <tr class="tx-bold bg-black-1">
                <td>Flujos Incrementales</td>
                @for($i=0;$i<$evaluacionProyecto->count();$i++)
                    <td class="tx-center"><span class="{{$evaluacionProyecto[$i]->flujos_incrementales < 0 ? 'tx-danger' : ' '}}">$ {{number_format($evaluacionProyecto[$i]->flujos_incrementales,2)}}</span></td>
                @endfor
            </tr>
            <tr>
                <td>Mercancias Comercializadas</td>
                @for($i=0;$i<$evaluacionProyecto->count();$i++)
                    <td class="tx-center">$ {{number_format($evaluacionProyecto[$i]->mercancia_comercializadas,2)}}</td>
                @endfor
            </tr>
            <tr>
                <td>Capacidad Utilizada con Apoyo</td>
                @for($i=0;$i<$evaluacionProyecto->count();$i++)
                    <td class="tx-center">{{number_format(($evaluacionProyecto[$i]->capacidad_utilizada*100),2)}} %</td>
                @endfor
            </tr>
        </tbody>
    </table>
    
    <div id="EvaluacionProyecto" class="ht-200 ht-sm-300"></div>

    <div class="tx-center">
        @if(isset($empresa))
        <label class="section-title">Evaluación: {{$empresa->nombre}}</label>
        @endif

        @if(isset($evaluacion))
        <p> 
            <span class="tx-bold">Valor Presente Neto:</span> 
            <span class="tx-right">$ {{ number_format($evaluacion->valor_presente_neto,2) }}</span> 
        </p>
        <p> 
            <span class="tx-bold">Relación Beneficio-Costo:</span> 
            <span class="tx-right">{{ number_format($evaluacion->relacion_beneficio_costo,2) }}</span> 
        </p>
        <p> 
            <span class="tx-bold">Tasa Interna de Retorno:</span> 
            <span class="tx-right">{{ number_format($evaluacion->tasa_interna_retorno,2) }} %</span> 
        </p>
        <p> 
            <span class="tx-bold">Payback(años):</span> 
            <span class="tx-right">{{ number_format($evaluacion->payback,2) }}</span> 
        </p>
        @endif
    </div>
    
</div><!-- wrapper -->

@endsection

@section('scripts')
<script charset="utf-8">

$(function(){

    /**************** PRODUCTOS O SERVICIOS - GRÁFICA PASTEL ************/

    

    var ProdSerOption = {
        title: {
            text: 'Productos Principales',
            left: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} unidades ({d}%)',
            textStyle: {
                fontSize: 11,
                fontFamily: 'Roboto, sans-serif'
            }
        },
        legend: {
            orient: 'vertical',
            x: 'right',
            data: [
                @foreach($prodSer as $dato)
                    '{{$dato->nombre}}',
                @endforeach
            ]
        },
        series: [{
            name: 'Productos o Servicios',
            type: 'pie',
            radius: '75%',
            center: ['50%', '50%'],
            data: [
                @foreach($prodSer as $dato)
                    {
                        value: {{$dato->unidades_mes}}, 
                        name: '{{$dato->nombre}}'
                    },
                @endforeach
            ]
        }]
    };

    var ProductosServicios = document.getElementById('ProductoServicios');
    var ProductosServiciosChart = echarts.init(ProductosServicios);
    ProductosServiciosChart.setOption(ProdSerOption);

    /**************** ESTADO DE RESULTADOS - GRÁFICA DE BARRAS ************/

    var EstadoResultadosOption = {
        title: {
            text: 'Utilidad Neta Proyectada'
        },
        color: ['#00FF00'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'category',
            data: [
                @foreach($estadoResultados as $dato)
                    'Año {{$dato->anio}}',
                @endforeach
            ],
            axisTick: {
                alignWithLabel: true
            }
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            name: 'Utilidad Neta Proyectada',
            type: 'bar',
            barWidth: '60%',
            data: [
                @foreach($estadoResultados as $dato)
                    {{$dato->ut_neta}},
                @endforeach
            ],
        }]
    };

    var EstadoResultados = document.getElementById('EstadoResultados');
    var EstadoResultadosChart = echarts.init(EstadoResultados);
    EstadoResultadosChart.setOption(EstadoResultadosOption);

    /**************** BALANCE GENERAL - GRÁFICA DE BARRAS ************/

    var BalanceGeneralOption = {
        title: {
            text: 'Activos Proyectados'
        },
        color: ['#3398DB'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'category',
            data: [
                @foreach($balanceGral as $dato)
                    'Año {{$dato->anio}}',
                @endforeach
            ],
            axisTick: {
                alignWithLabel: true
            }
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            name: 'Activos Totales Proyectados',
            type: 'bar',
            barWidth: '60%',
            data: [
                @foreach($balanceGral as $dato)
                    {{$dato->total_activo}},
                @endforeach
            ],
        }]
    };

    var BalanceGeneral = document.getElementById('BalanceGeneral');
    var BalanceGeneralChart = echarts.init(BalanceGeneral);
    BalanceGeneralChart.setOption(BalanceGeneralOption);

    /**************** FLUJO DE EFECTIVO - GRÁFICA LINEAL ************/

    var EvaluacionProyectoOption = {
        title: {
            text: 'Comparativa Flujo de EFectivo',
            left: 'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            left: 'left',
            data: ['Flujo Positivo', 'Flujo Negativo']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'category',
            name: 'Años',
            splitLine: {show: false},
            data: [
                @for($i=1; $i<$evaluacionProyecto->count(); $i++)
                    'Año {{$evaluacionProyecto[$i]->anio}}',
                @endfor
            ]
        },
        yAxis: {
            type: 'log',
            name: 'Monto',
            minorTick: {
                show: true
            },
            minorSplitLine: {
                show: true
            }
        },
        series: [
            {
                name: 'Flujo Positivo',
                type: 'line',
                color: ['#00FF00'],
                data: [
                    @for($i=1; $i<$evaluacionProyecto->count(); $i++)
                        {{$evaluacionProyecto[$i]->flujo_positivo}},
                    @endfor
                ],
            },
            {
                name: 'Flujo Negativo',
                type: 'line',
                color: ['#FF0000'],
                data: [
                    @for($i=1; $i<$evaluacionProyecto->count(); $i++)
                        {{$evaluacionProyecto[$i]->flujo_negativo}},
                    @endfor
                ],
            },
        ]
    };

    var EvaluacionProyecto = document.getElementById('EvaluacionProyecto');
    var EvaluacionProyectoChart = echarts.init(EvaluacionProyecto);
    EvaluacionProyectoChart.setOption(EvaluacionProyectoOption);

});
</script>
@endsection