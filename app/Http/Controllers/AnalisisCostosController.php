<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costos_fijos_mensuale;
use App\Costos_variables_unitario;


use App\Mezcla_productos_servicio;



class AnalisisCostosController extends Controller
{
    // Función que muestra la vista de la sección
    public function show()
    {
        return view('modulos/AnalisisDeCostos', ['title' => 'Sección 2: Análisis de Costos']);
    }

    // Función que accede a la base de datos y crea la tabla de Costos Fijos Mensuales
    public function getCostosFijosMes(){
        // Hace la consulta y lo guarda en una variable
        //$CostosFijoMes = \DB::select('CALL III_pro_select_cfms_id(?)', array(\Auth::user()->id_usuario));
        $CostosFijoMes = Costos_fijos_mensuale::where('id_empresa','=',\Auth::user()->id_empresa)->get();

        // Variable que guarda la tabla a mostrar
        $tabla = '
        <table id="TablaCostosFijosMes" class="table display responsive nowrap">
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th>Monto Mensual</th>
                    <th class="wd-5p tx-center">Editar</th>
                    <th class="wd-5p tx-center">Eliminar</th>
                </tr>
            </thead>
            <tbody>';
        $filaTotales = '';
        $total=0;
        // Recorre los registros traidos de la base de datos
        foreach($CostosFijoMes as $row){
            // Y se agregan a la tabla
            $total+=$row->monto_mensual;
            $tabla .= '
                <tr>
                    <td>'.$row->concepto.'</td>
                    <td>$ '.number_format($row->monto_mensual,2).'</td>
                    <td><button onclick="llenarFormCostosFijoMesEdit('.$row->id.')" class="modal-effect btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom"> <i class="icon ion-edit"></i> </button></td>
                    <td><button onclick="deleteCostoFijoMes('.$row->id.')" class="btn-oblong btn-danger"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
            $filaTotales = '
            <tr>
                <td class="tx-bold">Total</td>
                <td>$ '.number_format($total,2).'</td>
                <td></td>
                <td></td>
            </tr>';
        }
        $tabla .= $filaTotales;
        // Etiquetas de cierre de la tabla   
        $tabla .='
            </tbody>
        </table>';
        
        // Retorna en formato json
        return $tabla;
    }

    // Función que agrega un registro de Costos Fijos Mensuales
    public function addCostoFijosMes(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'cfmName' => 'required',
            'monto_mensual' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado

        /*\DB::select('CALL III_pro_insert_cfm(?,?,?)', array(
            $request->cfmName,
            $request->monto_mensual,
            \Auth::user()->id_usuario
        ));*/
        $datos= new Costos_fijos_mensuale;
        $datos->concepto=$request->cfmName;
        $datos->monto_mensual=$request->monto_mensual;
        $datos->id_empresa=\Auth::user()->id_empresa;
        $datos->save();


        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Función que devuelve el contenido de un registro de Costo Fijo Mensual
    public function getUnCostoFijoMes($id)
    {
        // Se realiza la solicitud
        //$CFM = \DB::select('CALL III_pro_select_cfm(?)', array($id));
        $dato = Costos_fijos_mensuale::where('id','=',$id)->get();

        // Y regresa el registro
        return \Response::json( array(
            'CFM' => $dato,
            'id' => $id
        ));

    }

    // Función que edita un registro de Costos Fijos Mensuales
    public function editCostoFijoMes(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'cfmName' => 'required',
            'monto_mensual' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        $datos = Costos_fijos_mensuale::find($request->idCostoFijoMes);
        $datos->concepto=$request->cfmName;
        $datos->monto_mensual=$request->monto_mensual;
       
        $datos->save();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Modificación exitosa!']);
    }

    // Función que elimina un registro de Costos Fijos Mensuales
    public function deleteCostoFijoMes($id, Request $request)
    {
        //$delete = \DB::select('CALL III_pro_delete_cfm(?)', array($id));
        $delete=Costos_fijos_mensuale::find($id);
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

    //////////////////////////////////////////// COSTOS VARIABLES UNITARIOS /////////////////////////////

    // Función que accede a la base de datos y crea la tabla de Costos Variables Unitarios
    public function getCostosVariablesUnit(){
        // Hace la consulta y lo guarda en una variable
        //$CVU = \DB::select('CALL III_pro_select_cvus_id(?)', array(\Auth::user()->id_usuario));
        $CVU= Costos_variables_unitario::where('id_empresa','=',\Auth::user()->id_empresa)->get();
        // Variable que guarda la tabla a mostrar
        $sumaPorcentaje=0;
        $sumaCostoUni=0;
        $tabla = '
        <table id="TablaCostosVariablesUnit" class="table display responsive nowrap">
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th>Costo Unitario</th>
                    <th>Porcentaje Precio Unitario</th>
                    <th class="wd-5p">Editar</th>
                    <th class="wd-5p">Eliminar</th>
                </tr>
            </thead>
            <tbody>';
        
        // Recorre los registros traidos de la base de datos
        foreach($CVU as $row){
            // Y se agregan a la tabla
            $sumaCostoUni+=$row->costo_unitario;
            $sumaPorcentaje+=$row->porcentaje_ventas;
            $tabla .= '
                <tr>
                    <td>'.$row->concepto.'</td>
                    <td>$ '.number_format($row->costo_unitario,2).'</td>
                    <td>'.number_format($row->porcentaje_ventas,2).' %</td>
                    <td><button onclick="llenarFormCostosVariablesUnitEdit('.$row->id.')" class="modal-effect btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom"> <i class="icon ion-edit"></i> </button></td>
                    <td><button onclick="deleteCostoVaraibleUnitario('.$row->id.')" class="btn-oblong btn-danger"><i class="icon ion-trash-a"></i></button></td>
                </tr>
            ';
        }
        // Etiquetas de cierre de la tabla   
        $tabla .='
        <tr>
            <td><b>Total</b> </td>
            <td>'.number_format($sumaCostoUni,2).'</td>
            <td>'.number_format($sumaPorcentaje,2).'</td>
            <td></td>
            <td></td>
        </tr>
            </tbody>
        </table>';
        
        // Retorna en formato json
        return $tabla;
    }

    // Función que devuelve el contenido de un registro de Costo Variable Unitario
    public function getUnCostoVariableUnit($id)
    {
        // Se realiza la solicitud
        $CVU = Mezcla_productos_servicio::where('id','=',$id)->get();

        // Y regresa el registro
        return \Response::json( array(
            'CVU' => $CVU,
            'id' => $id
        ));

    }

    // Función que agrega un registro de Costos Variables Unitarios
    public function addCostoVariableUnit(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'cvuName' => 'required',
            'costoU' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }
        //sumar columnas ventas de productos o servicios
        

        $prodSer = Mezcla_productos_servicio::where('id_empresa','=',\Auth::user()->id_empresa)->get();

        $totalUnidades = 0;
        $totalVentas = 0;
        $ite = 0;
        foreach($prodSer as $row){
            //suma
            
            $totalUnidades += $row->unidades_mes;
            $totalVentas += $row->ventas_mes;
            $ite++;
        }

        $total=round((($request->costoU/ ($totalVentas / $totalUnidades))*100),2);

        
        $datos = new Costos_variables_unitario;
        $datos->concepto=$request->cvuName;
        $datos->costo_unitario=$request->costoU;
        $datos->porcentaje_ventas=$total;
        $datos->id_empresa=\Auth::user()->id_empresa;
        $datos->save();

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!']);
    }

    // Función que edita un registro de Costos Variables Unitarios
    public function editCostoVariableUnit(Request $request)
    {
        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'cvuName' => 'required',
            'costoU' => 'required'
        );

        // Se validan
        $error = \Validator::make($request->all(), $rules);

        // Si hay errores
        if($error->fails())
        {
            // Regresa el array de los errores en formato Json
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // Si no hubo errores se ejecuta el procedimiento almacenado
        \DB::select('CALL III_pro_edit_cvu(?,?,?)', array(
            $request->idCVU,
            $request->cvuName,
            $request->costoU
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Modificación exitosa!']);
    }

    // Función que elimina un registro de Costos Variables Unitarios
    public function deleteCostoVariableUnit($id, Request $request)
    {
        //$delete = \DB::select('CALL III_pro_delete_cvu(?)', array($id));
        $delete = Costos_variables_unitario::find($id);
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

    ////////////////////// COSTOS VARIABLES UNITARIOS TOTAL ////////////////////////
    // Regresa un array con los registros de Costos variables unitarios total
   /* public function getCVUTotal(){
        // Hace la consulta y lo guarda en una variable
        $res = \DB::select('CALL III_pro_get_cvu_totalPorcentaje(?)', array(\Auth::user()->id_usuario));

        // Se inicia la variable para guardar el contenido html por mostrar
        $tabla = '';
        // Luego con los datos obtenidos de la consulta se guardan en filas
        if($res){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>COSTO VARIABLE UNITARIO TOTAL</span>
                    <span>'.$res[0]->costo_variable_unitario.' unidades</span>
                </p>
                <p class="invoice-info-row">
                    <span>PORCENTAJE PRECIO UNITARIO TOTAL</span>
                    <span>'.$res[0]->total_porcentajes_precios_unitarios.' %</span>
                </p>
            </div>';
        } else{
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>COSTO VARIABLE UNITARIO TOTAL</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>PORCENTAJE PRECIO UNITARIO TOTAL</span>
                    <span>N/A</span>
                </p>
            </div>';
        }
        
        // Retorna la tabla
        return $tabla;
        
    }*/

}
