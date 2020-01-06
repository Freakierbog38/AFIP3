<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fecha_balance_general;
use App\Activos;
use App\Desglose_activo;
use App\Pasivo;
use App\Capital_contable;
class BalanceGralHistoricoController extends Controller
{
    // Muestra la vista principal de módulo
    public function show(){
        return view('modulos/BalanceGeneralHistorico', ['title' => 'Sección 4: Balance General Histórico']);
    } 

    // Función que agrega la fecha a un Balance General Historico
    public function addFechaBalanceGral(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'fecha_bal' => 'required',
            'numero_mes' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $anio = explode("-", $request->fecha_bal)[0];

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        $id_empresa=\Auth::user()->id_empresa;
         
        $datos= Fecha_balance_general::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            ['anio'=>$anio,
            'fecha'=>$request->fecha_bal,
            'numero_meses'=>$request->numero_mes,
            'id_empresa'=>$id_empresa]
        
        );
        
        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con la fecha de Balance General
    public function getFechaBalanceGral(){
        

        // Hace la consulta y lo guarda en una variable
        $fecha = Fecha_balance_general::where('id_empresa','=',\Auth::user()->id_empresa)->get();

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        
        // Revisa si la variable tiene contenido
        if($fecha){
            $tabla .= $fecha[0]->fecha.' ('.$fecha[0]->numero_meses.' meses)';
           
        }
        else{
            $tabla .= 'No hay fecha asignada';
           
        }
        
        // Retorna la tabla
        return $tabla;
        
    }

    // Función que agrega un Activo 
    public function addActivo(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'activo_cir' => 'required',
            'activo_dif' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = new Activos;
        $datos->circulante=$request->activo_cir;
        $datos->fijo=0;
        $datos->diferido=$request->activo_dif;
        $datos->id_empresa=\Auth::user()->id_empresa;
        $datos->save();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con la tabla de Activos
    public function getActivos(){
        // Hace la consulta y lo guarda en una variable
        //$acti = Activos::where('id_empresa','=',\Auth::user()->id_empresa)->get();
        $acti= Activos::where('id_empresa','=',\Auth::user()->id_empresa)->get();

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        $boton = '<a href="#modalAddActivo" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';
        $total=0; //$activos[0]->circulante+$activos[0]->fijo+$activos[0]->diferido;
        $n=0;
        $datosReturn=array('total_activos'=>0);
        // Revisa si la variable tiene contenido
        foreach($acti as $activos){
            $total=$activos->circulante+$activos->fijo+$activos->diferido; 
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Activo Circulante</span>
                    <span>$ '.number_format($activos->circulante,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Activo Fijo</span>
                    <span>$ '.number_format($activos->fijo,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Activo Diferido</span>
                    <span>$ '.number_format($activos->diferido,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">$ '.number_format($total,2).'</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddActivo" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
            $n++;
            $datosReturn['total_activos']=$total;
        }
        
        if($n==0){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Activo Circulante</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Activo Fijo</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Activo Diferido</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">N/A</span>
                </p>
            </div>';
        }
        
        // Retorna la tabla
        return response()->json(['tabla' => $tabla, 'boton' => $boton, 'datos' => $datosReturn]);
        
    }

    // Función que agrega un Desglose de Activo
    public function addDesgloseActivo(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'activo_fijo' => 'required',
            'monto_activo' => 'required',
            'valor_un' => 'required',
            'depreciacion' => 'required',
            'anios_restantes' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        $id_empresa=\Auth::user()->id_usuario;
        
        $datos = new Desglose_activo;
        $total = $request->valor_un*$request->monto_activo;

        $datos->concepto = $request->activo_fijo;
        $datos->cantidad = $request->valor_un;
        $datos->valor_historico = $request->monto_activo;
        $datos->total = $total;
        $datos->depreciacion = $request->depreciacion;
        $datos->anios_restantes = $request->anios_restantes;
        $datos->id_empresa = $id_empresa;
        $datos->save();
        

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'valor'=>0]);
    }

    // Función que devuelve el contenido de un Desglose Activo
    public function getUnDesgloseActivo($id)
    {
        // Se realiza la solicitud
        $activoD = Desglose_activo::where('id','=',$id)->get();
        // Y regresa el registro
        return \Response::json( array(
            'AD' => $activoD,
            'id' => $id
        ));

    }

    // Función que edita un Desglose de Activo
    public function editarDesgloseActivo(Request $request)
    {
        $rules = array(
            'activo_fijo' => 'required',
            'monto_activo' => 'required',
            'valor_un' => 'required',
            'depreciacion' => 'required',
            'anios_restantes' => 'required'
        );

        $error = \Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        \DB::select('CALL V_pro_edit_activo_fijo(?,?,?,?,?,?,?)', array(
            $request->id,
            $request->activo_fijo,
            $request->monto_activo,
            $request->valor_un,
            $request->depreciacion,
            $request->anios_restantes,
            \Auth::user()->id_usuario
        ));

        return response()->json(['success' => '¡El registro ha sido modificado con éxito!']);

    }

    // Regresa una variable con la tabla de Desglose de Activos
    public function getDesgloseActivos(){
        // Hace la consulta y lo guarda en una variable
        $activoD = Desglose_activo::where('id_empresa','=',\Auth::user()->id_empresa)->get();

        $total = array(
            'cantidad' => 0,
            'totalMes' => 0,
            'depreciacion'=>0,
            'valor_historico'=>0
        );

        $ite = 0;

        // Variable que guarda la tabla a mostrar
        $tabla = '
        <table id="TablaDesgloseActivos" class="table display responsive nowrap">
            <thead>
                <tr>
                    <th>Activo Fijo Aportado</th>
                    <th>Valor Histórico</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Depreciación</th>
                    <th>Años Restantes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';
        // Recorre los registros traidos de la base de datos
        foreach($activoD as $row){
            // Y se agregan a la tabla
            $tabla .= '
                <tr>
                    <td> '.$row->concepto.'</td>
                    <td>$ '.number_format($row->valor_historico,2).'</td>
                    <td> '.number_format($row->cantidad,2).'</td>

                    <td>$ '.number_format($row->total,2).'</td>
                    <td>$ '.number_format($row->depreciacion,2).'</td>
                    <td>'.$row->anios_restantes.'</td>
                    <td><button onclick="borrarDesgloseActivo('.$row->id.')" class="btn-oblong btn-danger delete-ProSer"><i class="icon ion-trash-a"></i></button></td>
                </tr>';
            $total['cantidad'] += $row->cantidad;
            $total['totalMes'] += $row->total;
            $total['depreciacion']+=$row->depreciacion;
            $total['valor_historico']+=$row->valor_historico;
            $ite++;
        }

        if($ite>0){
            $tabla .= '
                    <tr class="tx-bold">
                        <td>Total</td>
                        <td>$ '.number_format( $total['valor_historico']/*($total['totalMes'] / $total['cantidad'])*/, 2 ).'</td>
                        <td> '.number_format($total['cantidad'],2).'</td>
                        <td>$ '.number_format( $total['totalMes'],2).'</td>
                        <td>$ '.number_format( $total['depreciacion'],2).'</td>
                        <td></td>
                        <td></td>
                    </tr>
                ';
        }
        
        // Etiquetas de cierre de la tabla   
        $tabla .='
            </tbody>
        </table>';

      //sumaVentasMes = Desglose_activo::where('id_empresa','=',$id_empresa)->sum('total');
       //el 'find' solo funciona con las llaves primarias de las tablas
       /*$edit = Activos::where('id_empresa', '=',\Auth::user()->id_empresa);
       $edit->fijo=$total['totalMes'];
       $edit->save();*/ 

       $sumaVentasMes=$this->editSumTotalActivoFijo($total['totalMes']);
        // Retorna en formato json
        return  $var = array('tabla'=>$tabla, 'total'=>$sumaVentasMes);
        
    }

    public function editSumTotalActivoFijo($total){
        $id_empresa=\Auth::user()->id_empresa;

        $datos= Activos::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            ['fijo'=>$total]
        
        );
        return $total;
    }

    // Función que elimina un desglose de activo
    public function deleteDesgloseActivo($id, Request $request)
    {
        $delete= Desglose_activo::find($id);
        $delete->delete();
        $mensaje = 'El registro fue eliminado';
        
        if($request->ajax()){
            return response()->json([
                'id' => $id,
                'mensaje' => $mensaje
            ]);
        }
        
        return 'Ocurrio un error';

    }


    // Regresa una variable con la tabla de Pasivos
    public function getPasivos(){
        // Hace la consulta y lo guarda en una variable
        $pasiv = Pasivo::where('id_empresa','=',\Auth::user()->id_empresa)->get();
        //$pasivos = \DB::select('CALL V_pro_select_pasivos_id(?)', array(\Auth::user()->id_usuario));

        $tabla = '';
        $boton = '<a href="#modalAddPasivo" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';
        $n=0;
        $total=0;


        // Revisa si la variable tiene contenido
        $datos=array('largo'=>0,'corto'=>0, 'total_pasivos'=>0);
        foreach($pasiv as $pasivos){
            $n++;
            $total=$pasivos->corto_plazo+$pasivos->largo_plazo;
            
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Pasivo Corto Plazo</span>
                    <span>$ '.number_format($pasivos->corto_plazo,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Pasivo Largo Plazo</span>
                    <span>$ '.number_format($pasivos->largo_plazo,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">$ '.number_format($total,2).'</span>
                </p>
            </div>';
            $datos['corto']=$pasivos->corto_plazo;
            $datos['largo']=$pasivos->largo_plazo;
            $datos['total_pasivos']=$total;



            $boton = '<a href="#modalAddPasivo" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        if($n==0){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Pasivo Corto Plazo</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Pasivo Largo Plazo</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">N/A</span>
                </p>
            </div>';
        }
        
        // Retorna en formato json
        return response()->json(['tabla' => $tabla, 'boton' => $boton,'datos' => $datos, 'total_pasivos'=>$total ]);
        
    }

    // Función que agrega un Pasivo
    public function addPasivo(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'pasivo_cor' => 'required',
            'pasivo_lar' => 'required'
        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        $id_empresa=\Auth::user()->id_empresa;
         
        $datos= Pasivo::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            ['corto_plazo'=>$request->pasivo_cor,
            'largo_plazo'=>$request->pasivo_lar]
        
        );
       
        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Regresa una variable con la tabla de Capital Contable
    public function getCapitalContable(){
        // Hace la consulta y lo guarda en una variable
        $capcont = Capital_contable::where('id_empresa','=',\Auth::user()->id_empresa)->get();
        $tabla = '';
        $boton = '<a href="#modalAddCapCon" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';
        $n=0;
        $datos=array('capital_aportado'=> 0, 'capital_ganado' => 0);
        $total_sum=0;

        // Revisa si la variable tiene contenido
        foreach($capcont as $capcon){
            $total_sum=$capcon->capital_aportado+$capcon->capital_ganado+$capcon->exceso_insuficiencia;
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Capital Aportado</span>
                    <span>$ '.number_format($capcon->capital_aportado,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Capital Ganado</span>
                    <span>$ '.number_format($capcon->capital_ganado,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span>Exceso/Insufuciencia</span>
                    <span '.($capcon->exceso_insuficiencia < 0 ? 'class="tx-danger"' : '').'>$ '.number_format($capcon->exceso_insuficiencia,2).'</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold '.($total_sum < 0 ? 'tx-danger' : '').'">$ '.number_format($total_sum,2).'</span>
                </p>
            </div>';

            $boton = '<a href="#modalAddCapCon" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
            $datos['capital_aportado'] = $capcon->capital_aportado;
            $datos['capital_ganado'] = $capcon->capital_ganado;
            $n++;
        }
        if($n==0){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Capital Aportado</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Capital Ganado</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Exceso/Insufuciencia</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span class="tx-bold">Total</span>
                    <span class="tx-bold">N/A</span>
                </p>
            </div>';
        }
        
        // Retorna en formato json
        return response()->json(['tabla' => $tabla, 'boton' => $boton, 'datos'=>$datos]);
        
    }

    // Función que agrega un Capital Contable
    public function addCapitalContable(Request $request)
    {
        // // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'capital_apor' => 'required',
            'capital_gan' => 'required'            

        );

        // // Se validan
        $error = \Validator::make($request->all(), $rules);

        // // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // Si no hubo errores se ejecuta el procedimiento almacenado
        $id_empresa=\Auth::user()->id_empresa;

        $total_exceso_insuficiencia=$request->total_activo-$request->total_pasivo-$request->capital_apor-$request->capital_gan;
        
        $datos = Capital_contable::updateOrInsert(
            ['id_empresa'=>$id_empresa],

            ['capital_aportado'=>$request->capital_apor,
            'capital_ganado'=>$request->capital_gan,
            'exceso_insuficiencia'=>$total_exceso_insuficiencia,
            'id_empresa'=>$id_empresa]
        
        );

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!','datos'=>$request]);
    }

}
