@extends('plantilla')

@section('contenido')
<div class="row row-sm mg-t-20">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card card-info">
            <div class="card-header">
                <h5 class="tx-inverse tx-30">Reporte AFIP</h5>
                <p class="tx-15">En esta parte se encuentra la opción para generar el reporte de AFIP.</p>
            </div>
            <div class="card-body pd-40">
                <div class="d-flex justify-content-center mg-b-30">
                    <i class="icon ion-stats-bars tx-100"></i>
                </div>
                <h5 class="tx-inverse tx-25">Resultados Finales AFIP</h5>
                <p class="tx-bold">IMPORTANTE: Para una mejor y correcta consulta del resultado del reporte es necesario que haya llenado todas las 8 secciones de formularios.</p>
                <p>Al oprimir el botón es posible que tarde un poco en mostrar el reporte. Por favor tenga paciencia, los cálculos se estarán realizando.</p>
                <a href="{{ url('/resultados') }}" class="btn btn-primary">Consultar Reporte »</a>
            </div><!-- card -->
        </div><!-- card -->
    </div><!-- col-4 -->
    <div class="col-lg-3"></div>
</div><!-- row -->
@endsection