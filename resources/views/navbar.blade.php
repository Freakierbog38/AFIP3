<div class="slim-navbar">
    <div class="container">
        <ul class="nav">
            <li class="nav-item with-sub mega-dropdown">
                <a class="nav-link" href="{{ url('/formularios') }}">
                    <i class="icon ion-clipboard"></i>
                    <span>Formularios</span>
                </a>
                <div class="sub-item wd-35p-force">
                    <ul>
                    <li><a href="{{ url('/analisisVentas/main') }}">1. Análisis de Ventas</a></li>
                    <li><a href="{{ url('/analisisCostos/main') }}">2. Análisis de Costos</a></li>
                    <li><a href="{{ url('/analisisCapacidadInstalada/main') }}">3. Análisis de Capacidad Instalada</a></li>
                    <li><a href="{{ url('/balanceGeneralHistorico/main') }}">4. Balance General Histórico</a></li>
                    <li><a href="{{ url('/resultadosHistorico/main') }}">5. Estado de Resultados Histórico</a></li>
                    <li><a href="{{ url('/supuestosProyecciones/main') }}">6. Supuestos Proyecciones</a></li>
                    <li><a href="{{ url('/financiamientoSolicitado/main') }}">7. Financiamiento Solicitado</a></li>
                    <li><a href="{{ url('/indiceProduccion/main') }}">8. Índice de Producción</a></li>
                    </ul>
                </div><!-- sub-item -->
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/reporte') }}">
                    <i class="icon ion-stats-bars"></i>
                    <span>Generar Reporte</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/info') }}">
                    <i class="icon ion-help-circled"></i>
                    <span>¿Qué es AFIP?</span>
                </a>
            </li>
        </ul>
    </div><!-- container -->
</div><!-- slim-navbar -->