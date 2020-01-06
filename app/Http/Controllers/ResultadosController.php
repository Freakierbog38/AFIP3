<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reporte_estado_resultados;
use App\Mezcla_productos_servicio;
use App\Ingresos_costos;
use App\Costos_fijos_mensuale;
use App\Desglose_activo;
use App\Desglose_apoyo_destino;
use App\Capacidad_nueva;
use App\macroeconomicos_financieros;
use App\Politicas;
use App\Pasivos_actuales;
use App\Activos;
use App\Reporte_amortizacion;
use App\Capital_contable;
use App\Capital_contable_actual;
use App\Reporte_flujo_efectivo;

class ResultadosController extends Controller
{
    // Funcion que devuelve el valor de comercializacion de unidades
    private function comercializacionUnidades($anio){
        // Variable que guardara el valor resultante por año
        $resultado=0;
        //Este for servirá para recorrer los registros por año, y guardando el resultado de un año concreto para ser usado posteriormente
        for($i=1;$i<=$anio;$i++){
            // Si el año es el primero
            if($i==1){
                // Se consulta la suma de las unidades por mes donde dicho dato se encuentra en la tabla Mezcla_productos_servicio
                $unidadesMes = Mezcla_productos_servicio::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('unidades_mes');
                // Se requieres las unidades producidas al año, por lo tanto se multiplica el total de unidades mensuales por doce
                $unidadesAnio = $prodSer*12;

                // Ahora se consulta en Ingresos_costos el incremento en unidades, pero se requiere la del año en curso, en este caso el primero, por lo que se agrega otra consulta al where incluyendo el año
                $incUnidades = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incUnidades = $incUnidades->incremento_unidades_vendidas;

                // El resultado se guarda para enviarse, o usarse en la siguiente iteracion
                $resultado = $unidadesAnio * (1+$incUnidades);
            }

            // Si el año a calcular es posterior al primero
            if($i > 1){
                // Se realiza lo mismo que en el año uno, se realiza la consulta teniendo en cuenta el id de la empres y el año
                $incUnidades = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incUnidades = $incUnidades->incremento_unidades_vendidas;

                // se multiplica el resultado anterior, por la suma de la unidad con el incremento de unidades
                // Esto es porque esta cantidad se debe encontrar en decimales, y dado que se requiere tener el resultado aplicado como porcentaje de incremento se le suma 1 para que de un resultado mayor, en caso de que sea positivo
                $resultado = $resultado * (1+$incUnidades);

            }
        }

        // El resultado final es tomado como retorno
        return $resultado;
    }

    // Regresa el precio unitario de cada año
    private function precioUnitario($anio){
        // Guarda el resultado de cada año
        $resultado = 0;
        // Itera entre los años recibidos
        for($i=1;$i<=$anio;$i++){
            // Si el año a calcular es el primero
            if($i==1){
                // Se consulta la suma de las uunidades y el total de las ventas por mes donde dicho dato se encuentra en la tabla Mezcla_productos_servicio
                $unidadesMes = Mezcla_productos_servicio::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('unidades_mes');
                $totalVentas = Mezcla_productos_servicio::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('ventas_mes');
                //Para producir el total del precio unitario total al mes es necesario dividir estos dato recolectados anteriormente de la siguiente manera
                $precioUnitarioMes = $totalVentas/$unidadesMes;

                // Ahora se consulta en Ingresos_costos el incremento en precios, pero se requiere la del año en curso, en este caso el primero, por lo que se agrega otra consulta al where incluyendo el año
                $incPrecios = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incPrecios = $incUnidades->incremento_precios;
                
                // Se realiza la operación de suma de porcentaje, pero el precio por mes no se multiplica por 12 ya que los precios unitarios anuales se mantinen intactos con respecto a los del mes
                $resultado = $precioUnitarioMes * (1+$incPrecios);
            }

            // Si el año a calcular es posterior al primero
            if($i>1){
                // Se realiza lo mismo que en el año uno, se realiza la consulta teniendo en cuenta el id de la empres y el año
                $incPrecios = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incPrecios = $incUnidades->incremento_precios;
                
                $resultado = $resultado * (1+$incPrecios);
            }
        }

        return $resultado;
    }
    
    private function costoVentasVariableU($anio){
        // Guarda el resultado de cada año
        $resultado = 0;
        // Itera entre los años recibidos
        for($i=1;$i<=$anio;$i++){
            if($i==1){
                // Se consulta la suma de costo unitario por mes donde dicho dato se encuentra en la tabla Costos_variables_unitario
                $costoUnitarioTotal = Costos_variables_unitario::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('costo_unitario');
                // Ahora se consulta en Ingresos_costos el incremento en costos variables, pero se requiere la del año en curso, en este caso el primero, por lo que se agrega otra consulta al where incluyendo el año
                $incCostosVariables = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incCostosVariables = $incUnidades->inc_costos_variables;

                $resultado = $costoUnitarioTotal * (1+$incCostosVariables);
            }
            elseif($i<1){
                // Se realiza lo mismo que en el año uno, se realiza la consulta teniendo en cuenta el id de la empresa y el año
                $incCostosVariables = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incCostosVariables = $incUnidades->inc_costos_variables;

                $resultado = $resultado * (1+$incCostosVariables);
            }
        }

        return $resultado;
    }

    private function gastoOperacionFijoTotal($anio){
        // Guarda el resultado de cada año
        $resultado = 0;
        // Itera entre los años recibidos
        for($i=1;$i<=$anio;$i++){
            if($i==1){
                // Se consulta la suma de costo unitario por mes donde dicho dato se encuentra en la tabla Costos_variables_unitario
                $costoUnitarioTotal = Costos_fijos_mensuale::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('monto_mensual');
                // Ahora se consulta en Ingresos_costos el incremento en costos fijos, pero se requiere la del año en curso, en este caso el primero, por lo que se agrega otra consulta al where incluyendo el año
                $incCostosFijos = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incCostosFijos = $incUnidades->inc_costos_fijos;

                $resultado = $costoUnitarioTotal * (1+$incCostosFijos);
            }
            elseif($i<1){
                // Se realiza lo mismo que en el año uno, se realiza la consulta teniendo en cuenta el id de la empresa y el año
                $incCostosFijos = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incCostosFijos = $incUnidades->inc_costos_fijos;

                $resultado = $resultado * (1+$incCostosFijos);
            }
        }

        return $resultado;
    }

    private function depreciacion($anio){
        // Guarda el resultado de cada año
        $resultado = 0;
        // Itera entre los años recibidos
        for($i=1;$i<=$anio;$i++){
            if($i==1){
                // Se consulta la suma en depreciacion donde dicho dato se encuentra en la tabla Costos_variables_unitario
                $depreciacionActivos = Desglose_activo::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('depreciacion');
                // Ahora se consulta en Desglose_apoyo_destino la suma de depreciacion para ser utilizada a continuacón con la consulta anterior
                $depreciacionInversiones = Desglose_apoyo_destino::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('depreciacion');

                $resultado = $depreciacionActivos + $depreciacionInversiones;
            }
            elseif($i<1){
                $incAFN = $this->incrementoAFN($i);
                $activoFijoNeto = $this->activoFijoNeto($i);

                $resultado = $resultado * (1+($incAFN / $activoFijoNeto));
            }
        }

        return $resultado;
    }

    private function activoFijoNeto($anio){
        // Guarda el resultado de cada año
        $resultado = 0;
        // Itera entre los años recibidos
        for($i=1;$i<=$anio;$i++){
            if($i==1){
                // Se consulta al registro de activos de la empresa
                $activos = Costos_fijos_mensuale::where('id_empresa', '=', \Auth::user()->id_empresa)->first();
                // Ahora se consulta en Desglose_apoyo_destino la suma de depreciacion para ser utilizada a continuacón con la consulta anterior
                $activoFijoNeto = Desglose_apoyo_destino::where('id_empresa', '=', \Auth::user()->id_empresa)->sum('inversion');

                $resultado = $activos->activo_fijo + $activoFijoNeto;
            }
            elseif($i<1){
                $incAFN = 0;

                $resultado = $resultado * (1+$incAFN);
            }
        }

        return $resultado;
    }
    
    private function incrementoAFN($anio){
        // Guarda el resultado de cada año
        $resultado = 0;
        // Itera entre los años recibidos
        for($i=1;$i<=$anio;$i++){
            if($i==1){
                $resultado = 0;
            }
            elseif($i<1){
                $capacidadUt = $this->capacidadUtilizada($i);
                if($capacidadUt > 0.80){
                    $resultado = (($capacidadUt - 0.80) / 0.80) * $this->activoFijoNeto($i-1);
                }
                else{
                    $resultado = 0;
                }
            }
        }

        return $resultado;
    }

    private function capacidadUtilizada($anio){
        // Guarda el resultado de cada año
        $resultado = 0;
        // Itera entre los años recibidos
        for($i=1;$i<=$anio;$i++){
            if($i==1){
                $capNueva = Capacidad_nueva::where('id_empresa', \Auth::user()->id_empresa)->get();
                $incUnidadesVendidas = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incUnidadesVendidas = $incUnidadesVendidas->incremento_unidades_vendidas;

                $resultado = $capNueva * (1+$incUnidadesVendidas);
            }
            elseif($i<1){
                $incUnidadesVendidas = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i],
                    ['apoyo', 1]
                )->first();
                $incUnidadesVendidas = $incUnidadesVendidas->incremento_unidades_vendidas;
                $resultado = $resultado * (1+$incUnidadesVendidas)
            }
        }

        return $resultado;
    }

    private function isrptu($uai){
        $isr = macroeconomicos_financieros::where('id_empresa', \Auth::user()->id_empresa)->first();
        $isr = $isr->ISR;
        return ($uai * $isr);
    }

    private function dividendos($un){
        $div = Politicas::where('id_empresa', \Auth::user()->id_empresa)->first();
        $div = $div->dividendos;
        return ($un * $div);
    }

    private function utilidadesRetenidas($un){
        $ur = Politicas::where('id_empresa', \Auth::user()->id_empresa)->first();
        $ur = $ur->utilidades_retenidas;
        return ($un * $ur);
    }

    // Función que se encargará de realizar las tablas de amortización basados en los pasivos actuale
    private function tablasAmortizacion(){
        // Se extraen los pasivos actuales de la base de datos
        $pasivosActuales = Pasivos_actuales::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['adicionales_proyecto', 1]
        )->get();

        // Variables a guardarse
        $anio = 1;
        $saldo = 0;
        $pagoCapital = 0;
        $pagoInt = 0;
        $pagoTotal = 0;

        // Se llenará una tabla por cada pasivo, varios registros uno por mes
        foreach($pasivosActuales as $pasivo){
            // Se realizarán las iteraciones para cada mes
            for($mes=1;$mes=<$pasivo->plazo;$mes++){

                // El saldo inicial será  el monto del primer registro
                if($mes==1){
                    $saldo = $pasivo->monto;
                }
                // Posteriormente será el saldo guardado restando el pago a capital
                else{
                    $saldo = $saldo - $pagoCapital;
                }

                // Si los mese en curso es superior a los meses de gracia y además el saldo es mayor a 1
                if($mes > $pasivo->gracia && $saldo > 1){
                    // Se divide el saldo entre el número de meses de pago
                    $pagoCapital = $saldo / $pasivo->pagos;
                }

                // El pago a intereses es el saldo multiplicado por el porcentaje de interes anuales puestos a meses
                $pagoInt = $saldo * ($pasivo->interes / 12);

                // Al final el total de lo pagado es la suma entre el pago a capital con el pago a intereses
                $pagoTotal = $pagoCapital + $pagoInt;

                // Si el mes en curso es un multiplo de 12 se pasa al siguiente año
                if($mes%12 == 0){
                    $anio++;
                }

            }
        }
    }

    private function pago_intereses($anio){
        $resultado = 0;
        $amort = Reporte_amortizacion::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->sum('pago_intereses');
        
        $resultado = $amort;

        return $resultado;
    }

    // Función encargada de llenar la tabla de estado de resultados orientada al reporte
    public function EstadoResultados(){
        // El estado de resultados se calcula por año, por lo tanto se realizaran calculos para cada uno de estos por eso es el ciclo for
        // NOTA: EL 3 ES PROVICIONAL, DEBE CAMBIARSE POR EL NUMERO DE AÑOS INGRESADOS EN SUPUESTOS PROYECCIONES YA QUE AHI SE DELIMITA EL MAXIMO QUE SE PUEDEN CALCULAR
        for($anio=1;$anio<=3;$anio++){
            $ventasBrutas = $this->comercializacionUnidades($anio) * $this->precioUnitario($anio);
            $costoVentas = $this->comercializacionUnidades($anio) * $this->costoVentasVariableU($anio);
            $utilidadBruta = $ventasBrutas - $costoVentas;
            $gastosAdmonVentas = $this->gastoOperacionTotal($anio);
            $uafirda = $utilidadBruta - $gastosAdmonVentas;
            $depreciacionAmortizacion = $this->depreciacion($anio);
            $utilidadOperacion = $uafirda - $depreciacionAmortizacion;
            $gastosFinancieros = $this->pago_intereses($anio);
            $utilidadAntesImpuestos $utilidadOperacion - $gastosFinancieros;
            $isrptu = $this->isrptu($utilidadAntesImpuestos);
            $utilidadNeta = $utilidadAntesImpuestos - $isrptu;
            $dividendos = $this->dividendos($utilidadNeta);
            $utilidadesRetenidas = $this->utilidadesRetenidas($utilidadNeta);
        }

    }

    ///////////////////////////////////////////////////////////////////////
    //////////////////////// BALANCE GENERAL //////////////////////////////
    ///////////////////////////////////////////////////////////////////////

    private function activo_efectivo($anio){
        $resultado = 0;
        // Se utilizan los registros del estado de resultados para calcular este punto
        $ventasB = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();
        // Ademas se consulta el registro de politicas
        $politicas = Politicas::where('id_empresa', \Auth::user()->id_empresa)->first();

        $resultado = $ventasB->ventas_brutas * ($politicas->dias_efectivo / 365);

        return $resultado;
    }

    private function cuentas_cobrar($anio){
        $resultado = 0;
        // Se utilizan los registros del estado de resultados para calcular este punto
        $ventasB = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();
        // Ademas se consulta el registro de politicas
        $politicas = Politicas::where('id_empresa', \Auth::user()->id_empresa)->first();

        $resultado = $ventasB->ventas_brutas * ($politicas->dias_clientes / 365);

        return $resultado;
    }

    private function inventario($anio){
        $resultado = 0;
        // Se utilizan los registros del estado de resultados para calcular este punto
        $ventasB = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();
        // Ademas se consulta el registro de politicas
        $politicas = Politicas::where('id_empresa', \Auth::user()->id_empresa)->first();

        $resultado = $ventasB->ventas_brutas * ($politicas->dias_inventarios / 365);

        return $resultado;
    }

    private function otros_activos_cir($anio){
        $resultado = 0;
        // Se utilizan los registros del estado de resultados para calcular este punto
        $ventasB = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();

        $resultado = 0.07 * $ventasB->ventas_brutas;

        return $resultado;
    }

    private function activo_fijo_neto($anio){
        $resultado = 0;
        for($i=1;$i<=$anio;$i++){
            if($i==1){
                $activos = Activos::where('id_empresa', \Auth::user()->id_empresa)->first();
                $inversion = Desglose_apoyo_destino::where('id_empresa', \Auth::user()->id_empresa)->sum('inversion');

                $resultado = $activos->activos_fijos + $inversion;
            }
            else{
                $resultado = $resultado + $this->incrementoAFN($anio);
            }
        }

        return $resultado;
    }

    private function activo_fijo_neto(){
        $resultado = 0;
        $activos = Activos::where('id_empresa', \Auth::user()->id_empresa)->first();

        $resultado = $activos->activo_diferido;

        return $resultado;
    }

    private function proveedores($anio){
        $resultado = 0;
        $costoV = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();
        $proveedores = Activos::where('id_empresa', \Auth::user()->id_empresa)->first();
        
        $costoV = $costoV->costo_ventas;
        $proveedores = $proveedores->dias_proveedores;

        $resultado = $costoV * ($proveedores / 365);

        return $resultado;
    }

    private function otros_pasivos_circulante($anio){
        $resultado = 0;
        $costoV = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();
        
        $costoV = $costoV->costo_ventas;

        $resultado = $costoV * 0.1;

        return $resultado;
    }

    private function pago_capital($anio){
        $resultado = 0;
        $amort = Reporte_amortizacion::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->sum('pago_capital');
        
        $resultado = $amort;

        return $resultado;
    }

    private function bancos_largo_plazo($anio){
        // Esta tabla contiene una columna donde su valor representa si son pasivos adicionales o actuales, pero dado que se requiere la suma de ambos (adicionales y actuales) no se agrega como criterio de búsqueda
        $pasivos = Pasivos_actuales::where('id_empresa', \Auth::user()->id_empresa)->('monto');

        $resultado = $pasivos - $this->pago_capital($anio);

        return $resultado;
    }

    private function total_capital($anio){
        $capitalContable = Capital_contable::where('id_empresa', \Auth::user()->id_empresa)->first();
        $capitalAportado = $capitalContable->aportado;
        
        $capitalAdicional = Capital_contable_actual::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['adiciona_proyecto', 1]
        )->sum('monto');

        $capitalAportado = $capitalAportado + $capitalAdicional;
        
        $capitalGanado = $capitalContable->ganado;
        $excesoInsuficiencia = $capitalContable->exceso_insuficiencia;
        $capGanado = 0;

        for($i=1;$i<=$anio;$i++){
            $utRetenidas = Reporte_estado_resultados::where(
                ['id_empresa', \Auth::user()->id_empresa],
                ['anio', $i]
            )->first();

            if($i==1){
                $capGanado = $capitalGanado - $excesoInsuficiencia + $utRetenidas->ut_retenida;
            }
            else{
                $capGanado = $capGanado + $utRetenidas;
            }
        }

        $totalCapital = $capGanado + $capitalAportado;

        return $totalCapital;

    }

    // Función encargada a hacer los calculos para el balance general del reporte
    public function balanceGral(){
        // Al igual que el Estado de Resultados se realizaran calculos por año, por eso se utiliza un for
        // NOTA: EL 3 ES PROVICIONAL, DEBE CAMBIARSE POR EL NUMERO DE AÑOS INGRESADOS EN SUPUESTOS PROYECCIONES YA QUE AHI SE DELIMITA EL MAXIMO QUE SE PUEDEN CALCULAR
        for($anio=1;$anio<=3;$anio++){
            ////////// ACTIVO ////////////
            $activoEfectivo = $this->activo_efectivo($anio);
            $cuentasCobrar = $this->cuentas_cobrar($anio);
            $inventario = $this->inventario($anio);
            $otrosActivos = $this->otros_activos_cir($anio);
            $totalActivoCirculante = $activoEfectivo + $cuentasCobrar + $inventario + $otrosActivos;
            $activoFijoNeto = $this->activo_fijo_neto($anio);
            $totalActivoDiferido = $this->total_activo_diferido();
            $totalActivo = $totalActivoCirculante + $totalActivoDiferido + $activoFijoNeto;

            ///////// PASIVOS //////////
            $proveedores = $this->proveedores($anio);
            $otrosPasivosCir = $this->otros_pasivos_circulante($anio);
            $doctosPagar = $this->pago_capital($anio);
            $totalPasivoCirculante = $proveedores + $otrosPasivosCir + $doctosPagar;
            $bancosLargoPlazo = $this->bancos_largo_plazo($anio) - $doctosPagar;
            $totalPasivoLargoPlazo = $bancosLargoPlazo;
            $totalPasivo = $totalPasivoCirculante + $totalPasivoLargoPlazo;

            ////////// CAPITAL /////////
            $totalCapital1 = $this->total_capital($anio);
            $totalCapital = $totalCapital1 + ($totalActivo - ($totalPasivo+$totalCapital1));
            $pasivoCapital = $totalPasivo + $totalCapital;
        }
    }

    ///////////////////////////////////////////////////////////////////////
    //////////////////////// FLUJO EFECTIVO ///////////////////////////////
    ///////////////////////////////////////////////////////////////////////

    private function ingresos_ventas($anio){
        $ventasBrutas = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();

        return $ventasBrutas->ventas_brutas;
    }

    private function apoyos($anio){

        $apoyos = 0;

        if($anio==1){
            $apoyos = Pasivos_actuales::where(
                ['id_empresa', \Auth::user()->id_empresa],
                ['adicionales_proyecto', 1]
            )->sum('monto');
        }

        return $apoyos;
    }

    private function total_capital_adicional($anio){
        $capital = 0;

        if($anio==1){
            $capital = Capital_contable_actual::where(
                ['id_empresa', \Auth::user()->id_empresa],
                ['adiciona_proyecto', 1]
            )->sum('monto');
        }

        return $capital;
    }

    private function costo_ventas($anio){
        $costoVentas = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();

        return $costoVentas->costo_ventas;
    }

    private function admon_ventas($anio){
        $admonVentas = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();

        return $admonVentas->gastos_admon_ventas;
    }

    private function pago_capital_apoyo($anio){
        $capital = Reporte_amortizacion::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->sum('pago_capital');

        return $capital;
    }

    private function pago_interes_apoyo($anio){
        $interes = Reporte_amortizacion::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->sum('pago_intereses');

        return $interes;
    }

    private function isr_ptu($anio){
        $isrptu = Reporte_estado_resultados::where(
            ['id_empresa', \Auth::user()->id_empresa],
            ['anio', $anio]
        )->first();

        return $isrptu->ISRPTU;
    }

    // Función encargada de llenar las tablas de flujo de efectivo del reporte 
    public function flujo_efectivo(){
        // NOTA: EL 3 ES PROVICIONAL, DEBE CAMBIARSE POR EL NUMERO DE AÑOS INGRESADOS EN SUPUESTOS PROYECCIONES YA QUE AHI SE DELIMITA EL MAXIMO QUE SE PUEDEN CALCULAR
        for($anio=1;$anio<=3;$anio++){
            $ingresosVentas = $this->ventasBrutas($anio);
            $apoyo = $this->apoyos($anio);
            $aportaciones = $this->total_capital_adicional($anio);
            $total_fuentes = $ingresosVentas + $apoyo + $aportaciones;

            $costoVentas = $this->costo_ventas($anio);
            $gtosOperacion = $this->admon_ventas($anio);
            $incCapitalTrabajo = 0;
            $pagosCapital = $this->pago_capital_apoyo($anio);
            $pagosInteres = $this->pago_interes_apoyo($anio);
            $inversion = 0;
            $impuestos = $this->isr_ptu($anio);
            $total_aplicaciones = $costoVentas + $gtosOperacion + $incCapitalTrabajo + $pagosCapital + $pagosInteres + $inversion + $impuestos;

            $flujoEfectivoNeto = $total_fuentes + $total_aplicaciones;
        }
    }

    ///////////////////////////////////////////////////////////////////////
    //////////////////////// EVALUACION PROYECTO //////////////////////////
    ///////////////////////////////////////////////////////////////////////

    private function flujo_positivo($anio){
        $resultado = 0;
        if($anio>0){
            $flujPos = Reporte_flujo_efectivo::where(
                ['id_empresa', \Auth::user()->id_empresa],
                ['anio', $anio]
            )->first();

            $resultado = $flujPos->total_fuentes;
        }

        return $resultado;
    }

    private function flujo_negativo($anio){
        $resultado = 0;
        if($anio>0){
            $flujPos = Reporte_flujo_efectivo::where(
                ['id_empresa', \Auth::user()->id_empresa],
                ['anio', $anio]
            )->first();

            $resultado = $flujPos->total_aplicaciones;
        }

        return $resultado;
    }

    private function indice_anual($anio){
        $resultado = 0;
        for($i=0;$i<=$anio;$i++){
            if($i==1){
                $incUnidadesVendidas = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i]
                )->first();
                $incUnidadesVendidas = $incUnidadesVendidas->incremento_unidades_vendidas;

                $resultado = (1+$incUnidadesVendidas);
            }
            elseif($i>1){
                $incUnidadesVendidas = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i]
                )->first();
                $incUnidadesVendidas = $incUnidadesVendidas->incremento_unidades_vendidas;

                $resultado = $resultado * (1+$incUnidadesVendidas);
            }
        }

        return $resultado;
    }

    private function mercancia_comercializada($anio){
        $resultado = 0;
        for($i=0;$i<=$anio;$i++){
            if($i==1){
                $unidadesAnio = Mezcla_productos_servicio::where('id_empresa', \Auth::user()->id_empresa)->sum('unidades_mes');
                $unidadesAnio = $unidadesAnio * 12;

                $incUnidadesVendidas = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i]
                )->first();
                $incUnidadesVendidas = $incUnidadesVendidas->incremento_unidades_vendidas;

                $resultado = $unidadesAnio * (1+$incUnidadesVendidas);
            }
            elseif($i>1){
                $resultado = $resultado * $this->indice_anual($i);
            }
        }

        return $resultado;
    }

    private function capacidad_utilizada($anio){
        $resultado = 0;
        for($i=0;$i<=$anio;$i++){
            if($i==1){
                $capacidadNueva = Capacidad_nueva::where('id_empresa', \Auth::user()->id_empresa)->first();
                $capacidadNueva = $capacidadNueva->porc_capacidad_utilizada_nueva;

                $incUnidadesVendidas = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i]
                )->first();
                $incUnidadesVendidas = $incUnidadesVendidas->incremento_unidades_vendidas;

                $resultado = $capacidadNueva * (1+$incUnidadesVendidas);
            }
            elseif($i>1){
                $incUnidadesVendidas = Ingresos_costos::where(
                    ['id_empresa', \Auth::user()->id_empresa],
                    ['anio', $i]
                )->first();
                $incUnidadesVendidas = $incUnidadesVendidas->incremento_unidades_vendidas;

                $resultado = $resultado * (1+$incUnidadesVendidas);
            }
        }

        return $resultado;
    }

    private function Valor_presente_neto(){
        //
    }

    private function beneficio_costo(){
        //
    }

    private function tasa_interna_retorno(){
        //
    }

    private function payback(){
        //
    }

    public function evaluacion_proyecto(){
        // NOTA: EL 3 ES PROVICIONAL, DEBE CAMBIARSE POR EL NUMERO DE AÑOS INGRESADOS EN SUPUESTOS PROYECCIONES YA QUE AHI SE DELIMITA EL MAXIMO QUE SE PUEDEN CALCULAR
        for($anio=0;$anio<=3;$anio++){
            $flujoPositivo = $this->flujo_positivo($anio);
            $flujoNegativo = $this->flujo_negativo($anio);
            $flujosIncrementales = $flujoPositivo - $flujoNegativo;

            $mercanciaComerc = $this->mercancia_comercializada($anio);
            $capacidad_usada = $this->capacidad_utilizada($anio);
        }
    }

    public function index(){

        return view('modulos.Resultados', 
            [
                'title'                     => 'Reporte AFIP',
            ]
        );
    }

}
