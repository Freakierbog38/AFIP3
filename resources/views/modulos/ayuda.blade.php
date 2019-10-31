@extends('plantilla')

@section('contenido')
<div class="card mg-t-20">
    <div class="card-header">
      <div class="slim-card-title">
          <h2 class="tx-center"><i class="icon ion-help-circled"></i> Módulo de Ayuda</h2>
      </div>
    </div>
    <div class="card-body pd-25">
        <p class="tx-15">Para poder acceder a la ayuda, presione cualquiera de los botones de abajo que indican las instrucciones de ayuda para la sección indicada.</p>
        <br>
        
        <div id="ayuda" class="accordion-one accordion-one-primary" role="tablist" aria-multiselectable="true">
          <!-- Sección 1: Análisis de ventas -->
          <div class="card">
            <!-- Cabecera -->
            <div class="card-header" role="tab" id="cabecera1">
              <a data-toggle="collapse" data-parent="#ayuda" href="#contenido1" aria-expanded="false" aria-controls="contenido1" class="collapsed tx-gray-800 transition">
                Sección 1: Análisis de Ventas
              </a>
            </div><!-- card-header -->

            <!-- Contenido de la tarjeta -->
            <div id="contenido1" class="collapse" role="tabpanel" aria-labelledby="cabecera1">
              <div class="card-body">
                <p>En esta sección el usuario deberá brindar información histórica al sistema con la cuál este último podrá analizar y mostrar gráficamente las ventas efectuadas en el negocio en un horizonte de tiempo determinado.</p>
                <ul>
                  <li>Ingrese el año inmediato anterior.</li>
                  <li>
                    Ingrese la variación de ventas que ha tenido su negocio durante el año inmediato anterior. En este apartado el usuario puede modificar el índice base “1” a fin de indicar el incremento o decremento de las ventas realizadas donde:
                    <ul>
                      <li>1 = Ventas normales</li>
                      <li>> 1 = Mes con ventas altas</li>
                      <li>< 1 = Mes con ventas bajas</li>
                    </ul>
                    Por ejemplo:
                    <ul>
                      <li>Enero 1.5 (Mes con ventas altas)</li>
                      <li>Febrero 1 (Mes con ventas normales)</li>
                      <li>Marzo 0.7 (Mes con ventas bajas)</li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Sección 2: Análisis de costos -->
          <div class="card">
            <!-- Cabecera -->
            <div class="card-header" role="tab" id="cabecera2">
              <a data-toggle="collapse" data-parent="#ayuda" href="#contenido2" aria-expanded="false" aria-controls="contenido2" class="collapsed tx-gray-800 transition">
                Sección 2: Análisis de Costos
              </a>
            </div><!-- card-header -->

            <!-- Contenido de la tarjeta -->
            <div id="contenido2" class="collapse" role="tabpanel" aria-labelledby="cabecera2">
              <div class="card-body">
                <p class="tx-bold">En esta sección el usuario deberá brindar información histórica al sistema con la cuál este último podrá analizar y mostrar gráficamente el porcentaje de costos tanto fijos como variables del negocio, dicho análisis no sólo ayuda a determinar el costo de un proyecto, sino que también sirve para determinar si vale la pena llevarlo a cabo o no.</p>
                
                <p>Los <strong>costos fijos</strong> son aquellos costes que permanecen invariables, aunque los niveles de actividad y de producción de una empresa cambien, son constantes y no dependen directamente del nivel de producción de bienes y servicios. Un ejemplo de costos fijos es; el pago de servicios (luz, agua, teléfono, etc.), el pago del alquiler de un local u oficina, nómina, etc.</p>

                <li>Ingrese los costos fijos mensuales con los que cuenta su negocio.</li> <br>

                <p>Los <strong>costos variables</strong> son los gastos que cambian en función del nivel de actividad y de producción de bienes y servicios de una empresa en concreto, también se les conoce como nivel de unidad producida, precisamente porque son costos que irán cambiando al alza o a la baja en función del número de unidades que se produzcan. Un ejemplo de costos variables es; la materia prima, mano de obra, embalaje y empaquetado, etc.</p>

                <li>Ingrese los costos variables mensuales con los que cuenta su negocio.</li>
                
              </div>
            </div>
          </div>

          <!-- Sección 3: Análisis de capacidad instalada -->
          <div class="card">
            <!-- Cabecera -->
            <div class="card-header" role="tab" id="cabecera3">
              <a data-toggle="collapse" data-parent="#ayuda" href="#contenido3" aria-expanded="false" aria-controls="contenido3" class="collapsed tx-gray-800 transition">
                Sección 3: Análisis de Capacidad Instalada
              </a>
            </div><!-- card-header -->

            <!-- Contenido de la tarjeta -->
            <div id="contenido3" class="collapse" role="tabpanel" aria-labelledby="cabecera3">
              <div class="card-body">

                <p class="tx-bold">En esta sección el usuario deberá ingresar el número de unidades producidas en su negocio mensualmente, así como el máximo de unidades que es capaz de producir.</p>
                
                <p>La <strong>capacidad instalada</strong> es el potencial de producción o volumen máximo de producción que una empresa en particular, unidad, departamento o sección; puede lograr durante un período de tiempo determinado, teniendo en cuenta todos los recursos que tienen disponibles, sea los equipos de producción, instalaciones, recursos humanos, tecnología, experiencia/conocimientos, etc.</p>
                
              </div>
            </div>
          </div>

          <!-- Sección 4: Balance General Histórico -->
          <div class="card">
            <!-- Cabecera -->
            <div class="card-header" role="tab" id="cabecera4">
              <a data-toggle="collapse" data-parent="#ayuda" href="#contenido4" aria-expanded="false" aria-controls="contenido4" class="collapsed tx-gray-800 transition">
                Sección 4: Balance General Histórico
              </a>
            </div><!-- card-header -->

            <!-- Contenido de la tarjeta -->
            <div id="contenido4" class="collapse" role="tabpanel" aria-labelledby="cabecera4">
              <div class="card-body">
              
                <p class="tx-bold">En esta sección el usuario deberá brindar información histórica al sistema con la cuál este último podrá analizar y mostrar el balance general de la empresa a un período de tiempo determinado.</p>
                
                <p>Según lo establecido en la NIC 1: “Estados Financieros”, los componentes del Balance General son en primer lugar el encabezado, en segundo lugar, está el cuerpo del Balance conformado por el Activo, el Pasivo y Patrimonio y finalmente las firmas autorizadas.</p>
                
              </div>
            </div>
          </div>

          <!-- Sección 5: Estado de Resultados Históricos -->
          <div class="card">
            <!-- Cabecera -->
            <div class="card-header" role="tab" id="cabecera5">
              <a data-toggle="collapse" data-parent="#ayuda" href="#contenido5" aria-expanded="false" aria-controls="contenido5" class="collapsed tx-gray-800 transition">
                Sección 5: Estado de Resultados Históricos
              </a>
            </div><!-- card-header -->

            <!-- Contenido de la tarjeta -->
            <div id="contenido5" class="collapse" role="tabpanel" aria-labelledby="cabecera5">
              <div class="card-body">
              
                <p class="tx-bold">Para poder obtener los datos actuales del estado de pérdidas y ganancias del negocio el usuario deberá ingresar datos como el porcentaje de costo de ventas, es decir, el margen de contribución del producto, así como el porcentaje de impuestos y el monto de depreciación y amortización total.</p>
                
                <p>El margen de contribución es referido frecuentemente como margen bruto o margen de utilidad bruta. Es la diferencia entre las ventas de la empresa o ingresos y sus costos variables. Los costos variables son costos, como materiales y mano de obra directa, que están directamente unidos a la manufactura o adquisición de producto. Para calcular el ingreso neto, resta los costos fijos de tu empresa de su margen de contribución. Los costos fijos son costos por conceptos como edificios, equipo o suministros que no están ligados al volumen de ventas.</p>
                
              </div>
            </div>
          </div>

          <!-- Sección 6: Supuestos Proyecciones -->
          <div class="card">
            <!-- Cabecera -->
            <div class="card-header" role="tab" id="cabecera6">
              <a data-toggle="collapse" data-parent="#ayuda" href="#contenido6" aria-expanded="false" aria-controls="contenido6" class="collapsed tx-gray-800 transition">
                Sección 6: Supuestos Proyecciones
              </a>
            </div><!-- card-header -->

            <!-- Contenido de la tarjeta -->
            <div id="contenido6" class="collapse" role="tabpanel" aria-labelledby="cabecera6">
              <div class="card-body">
              
                <p class="tx-bold">Esta sección corresponde al incremento en variables de crecimiento consideradas en el proyecto tomando en cuenta el incremento en precios, incremento en unidades vendidas e incremento en costos fijos y variables. El objetivo de esta sección es analizar el estatus real de la empresa con el estatus esperado en caso de recibir algún tipo de financiamiento.</p>

                <p class="tx-bold">Alguna información relevante en esta sección aparece a continuación.</p>
                
                <p>El <strong>ciclo financiero</strong> es el constante movimiento de bienes o servicios para convertirlos en efectivo u otro tipo de recursos con los cuales la empresa puede continuar operando, y una vez que se cumple vuelve a empezar. Este aspecto considera los días clientes, días inventarios, y días proveedores.</p>

                <p>La <strong>inflación</strong> es el aumento sostenido y generalizado de los precios de los bienes y servicios de una economía a lo largo del tiempo.</p>

                <p>El <strong>tipo de cambio</strong> o tasa de cambio es la relación entre el valor de una divisa y otra, es decir, nos indica cuantas monedas de una divisa se necesitan para obtener una unidad de otra. En cada momento existe un tipo de cambio que se determina por la oferta y demanda de cada divisa, es decir, por medio del mercado de divisas.</p>

                <p>La sigla <strong>TIIE</strong> hace referencia a la <strong>Tasa de Interés Interbancaria de Equilibrio</strong>, y se trata de una tasa que el <strong>Banco de México</strong> creó en el año 1996 con la finalidad de establecer una tasa de interés interbancaria que logre representar de manera más fiel las condiciones del mercado. Se utiliza para variabilizar montos de dinero a lo largo del tiempo. Es decir, por ejemplo, pedimos un <strong>crédito a tasa variable</strong> y la misma se ata a la evolución de la <strong>Tasa TIIE</strong> a un lapso. Entonces, si la <strong>Tasa TIIE</strong> sube, nuestro interés a pagar será mayor, y viceversa.</p>

                <p>Los Certificados de la Tesorería de la Federación <strong>(Cetes)</strong> son títulos de crédito al portador denominados en moneda nacional pertenecientes o que se encuentran bajo responsabilidad del Gobierno Federal. Estos instrumentos sirven para que el gobierno se haga de recursos (dinero) y pueda pagar sus compromisos; quiere decir que son un pasivo o crédito para el gobierno.</p>

                <p>De manera semestral la Secretaria de Hacienda elabora un calendario en el que menciona el monto y plazo de CETES a subastar basados en el presupuesto de ingresos y egresos de la Federación.</p>

                <p>Debido a su alta liquidez los <strong>CETES</strong> son muy solicitados. Los CETES son papel en dinero que se pueden convertir rápidamente sin perder mucho de su valor. Por otro lado, son considerados como tasa de referencia en el mercado ya que muchos de los préstamos están basados en la <strong>tasa de CETES</strong>.</p>

                <p>La tasa mínima de retorno esperado aceptable <strong>(TREMA)</strong> y representa el porcentaje mínimo de retorno que la organización desea obtener sobre la inversión inicial en el proyecto.</p>
                
              </div>
            </div>
          </div>

          <!-- Sección 7: Apoyo Solicitado -->
          <div class="card">
            <!-- Cabecera -->
            <div class="card-header" role="tab" id="cabecera7">
              <a data-toggle="collapse" data-parent="#ayuda" href="#contenido7" aria-expanded="false" aria-controls="contenido7" class="collapsed tx-gray-800 transition">
                Sección 7: Apoyo Solicitado
              </a>
            </div><!-- card-header -->

            <!-- Contenido de la tarjeta -->
            <div id="contenido7" class="collapse" role="tabpanel" aria-labelledby="cabecera7">
              <div class="card-body">
              
                <p class="tx-bold">En esta sección el usuario deberá ingresar la información pertinente a aquellos créditos o préstamos con los que cuenta actualmente su negocio y los posibles a adquirir mediante un financiamiento adicional. Asimismo, para conocer las posibles proyecciones a 3 años el usuario deberá señalar el destino de los recursos a fin de dar a conocer al sistema si éstos últimos se clasifican como activos fijos o diferidos. Por último, pero menos importante el usuario deberá brindar al sistema el porcentaje de incremento en la capacidad instalada del negocio.</p>
                
              </div>
            </div>
          </div>

          <!-- Sección 8: Índice de Producción -->
          <div class="card">
            <!-- Cabecera -->
            <div class="card-header" role="tab" id="cabecera8">
              <a data-toggle="collapse" data-parent="#ayuda" href="#contenido8" aria-expanded="false" aria-controls="contenido8" class="collapsed tx-gray-800 transition">
                Sección 8: Índice de Producción
              </a>
            </div><!-- card-header -->

            <!-- Contenido de la tarjeta -->
            <div id="contenido8" class="collapse" role="tabpanel" aria-labelledby="cabecera8">
              <div class="card-body">
              
                <p class="tx-bold">Esta sección se refiere al incremento en el índice de producción que el negocio habrá de tener con el apoyo de un nuevo financiamiento, para esto, el usuario deberá seleccionar en la sección correspondiente el incremento o el decremento mensual de producción.</p>
                
              </div>
            </div>
          </div>
          
        </div><!-- accordion -->

    </div><!-- card-body -->
</div>
@endsection