@extends('plantilla')

@section('contenido')
<div class="row row-sm mg-t-20">
    <div class="col-lg-12">
        <div class="card card-info">
            <div class="card-body pd-40">
                <h5 class="tx-inverse tx-30"><i class="fa fa-edit"></i> Formularios para Entrada de Datos</h5>
                <p class="tx-20">En esta parte se encuentran los formularios para el ingreso de premisas financieras de su empresa.</p>
            </div><!-- card -->
        </div><!-- card -->
    </div><!-- col-12 -->
</div>
<div class="row row-sm mg-t-20">
    <div class="col-lg-4">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="fa fa-money tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">1. Análisis de Ventas</h5>
                <p>Ingrese los datos de entrada de la sección de Analisis de ventas.</p>
                <a href="{{ url('/analisisVentas/main') }}" class="btn btn-outline-primary">Ir a Sección 1 »</a>
            </div><!-- card -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="fa fa-calculator tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">2. Análisis de Costos</h5>
                <p>Ingrese los datos de entrada de la sección de Análisis de Costos.</p>
                <a href="{{ url('/analisisCostos/main') }}" class="btn btn-outline-primary">Ir a Sección 2 »</a>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="fa fa-industry tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">3. Análisis de Capacidad Instalada</h5>
                <p>Ingrese los datos de entrada de la sección de Análisis de Capacidad Instalada.</p>
                <a href="{{ url('/analisisCapacidadInstalada/main') }}" class="btn btn-outline-primary">Ir a Sección 3 »</a>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
</div>
<div class="row row-sm mg-t-20">
    <div class="col-lg-4">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="fa fa-history tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">4. Balance General Histórico</h5>
                <p>Ingrese los datos de entrada de la sección de Balance General Histórico.</p>
                <a href="{{ url('/balanceGeneralHistorico/main') }}" class="btn btn-outline-primary">Ir a Sección 4 »</a>
            </div><!-- card -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="fa fa-file-text-o tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">5. Estado de Resultados Histórico</h5>
                <p>Ingrese los datos de entrada de la sección de Balance General Histórico.</p>
                <a href="{{ url('/resultadosHistorico/main') }}" class="btn btn-outline-primary">Ir a Sección 5 »</a>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="fa fa-line-chart tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">6. Supuestos Proyecciones</h5>
                <p>Ingrese los datos de entrada de la sección de Supuestos Proyecciones.</p>
                <a href="{{ url('/supuestosProyecciones/main') }}" class="btn btn-outline-primary">Ir a Sección 6 »</a>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
</div>
<div class="row row-sm mg-t-20">
    <div class="col-lg-4">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="fa fa-usd tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">7. Financiamiento Solicitado</h5>
                <p>Ingrese los datos de entrada de la sección de financiamiento solicitado.</p>
                <a href="{{ url('/financiamientoSolicitado/main') }}" class="btn btn-outline-primary">Ir a Sección 7 »</a>
            </div><!-- card -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="fa fa-check-circle-o tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">8. Índice de Producción</h5>
                <p>Ingrese los datos de entrada de la sección de Indice de Producción.</p>
                <a href="{{ url('/indiceProduccion/main') }}" class="btn btn-outline-primary">Ir a Sección 8 »</a>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
</div><!-- row -->
@endsection