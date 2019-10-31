@extends('plantilla')

@section('contenido')
<div class="row row-sm mg-t-20">
    <div class="col-lg-4">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="icon ion-help-circled tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">¿Qué es AFIP?</h5>
                <p>Una explicación breve de AFIP</p>
                <a href="{{ url('/info') }}" class="btn btn-primary btn-block">Consultar</a>
            </div><!-- card -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="icon ion-clipboard tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">Formularios para la entrada de datos</h5>
                <p>Completa los siguientes formularios para la realizacion del reporte AFIP.</p>
                <a href="{{ url('/formularios') }}" class="btn btn-primary btn-block">Llenar Formularios</a>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
        <div class="card card-info">
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="icon ion-stats-bars tx-100 tx-info"></i>
                </div>
                <h5 class="tx-inverse mg-b-20">Reporte AFIP</h5>
                <p>En esta seccion se realizara su reporte AFIP.</p>
                <a href="{{ url('/reporte') }}" class="btn btn-primary btn-block">Generar Reporte</a>
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- col-4 -->
</div><!-- row -->
@endsection