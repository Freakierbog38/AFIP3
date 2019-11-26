<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndiceProduccionController extends Controller
{
    // Muestra la vista principal de módulo
    public function show()
    {
        return view('modulos/indiceProduccion', ['title' => 'Sección 8: Índice de Producción']);
    }

    // Regresa una variable con la tabla de Índices de Producción
    public function getIndicesProduccion(){
        // Hace la consulta y lo guarda en una variable
        $indices = \DB::select('CALL IX_pro_select_indice_ventas_id(?)', array(\Auth::user()->id_usuario));

        $tabla = '';
        $boton = '<a href="#modalAddProduccion" class="modal-effect btn btn-oblong btn-success" data-toggle="modal" data-effect="effect-slide-in-bottom">Agregar</a>';


        // Revisa si la variable tiene contenido
        if($indices){
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Mes 1</span>
                    <span>'.$indices[0]->mes_1_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 2</span>
                    <span>'.$indices[0]->mes_2_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 3</span>
                    <span>'.$indices[0]->mes_3_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 4</span>
                    <span>'.$indices[0]->mes_4_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 5</span>
                    <span>'.$indices[0]->mes_5_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 6</span>
                    <span>'.$indices[0]->mes_6_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 7</span>
                    <span>'.$indices[0]->mes_7_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 8</span>
                    <span>'.$indices[0]->mes_8_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 9</span>
                    <span>'.$indices[0]->mes_9_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 10</span>
                    <span>'.$indices[0]->mes_10_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 11</span>
                    <span>'.$indices[0]->mes_11_indice_ventas.'  </span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 12</span>
                    <span>'.$indices[0]->mes_12_indice_ventas.'  </span>
                </p>
            </div>';

            $boton = '<a href="#modalAddProduccion" class="modal-effect btn btn-oblong btn-warning" data-toggle="modal" data-effect="effect-slide-in-bottom">Editar</a>';
        }
        else{
            $tabla .= '
            <div class="col-md">
                <p class="invoice-info-row">
                    <span>Mes 1</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 2</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 3</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 4</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 5</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 6</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 7</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 8</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 9</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 10</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 11</span>
                    <span>N/A</span>
                </p>
                <p class="invoice-info-row">
                    <span>Mes 12</span>
                    <span>N/A</span>
                </p>
            </div>';
        }
        
        // Retorna en formato json
        return response()->json(['tabla' => $tabla, 'boton' => $boton]);
        
    }

    // Agrega los registros de Índices de Producción
    public function addIndicesProduccion(Request $request)
    {

        // Sirve para validar que los campos estén llenados, o verificar alguna otra validación
        $rules = array(
            'ventas1' => 'required',
            'ventas2' => 'required',
            'ventas3' => 'required',
            'ventas4' => 'required',
            'ventas5' => 'required',
            'ventas6' => 'required',
            'ventas7' => 'required',
            'ventas8' => 'required',
            'ventas9' => 'required',
            'ventas10' => 'required',
            'ventas11' => 'required',
            'ventas12' => 'required'
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
        \DB::select('CALL IX_pro_insert_indice_ventas(?,?,?,?, ?,?,?,?, ?,?,?,?, ?)', array(
            $request->ventas1,
            $request->ventas2,
            $request->ventas3,
            $request->ventas4,
            $request->ventas5,
            $request->ventas6,
            $request->ventas7,
            $request->ventas8,
            $request->ventas9,
            $request->ventas10,
            $request->ventas11,
            $request->ventas12,
            \Auth::user()->id_usuario
        ));

        // Y regresa mensaje de éxito
        return response()->json(['success' => '¡Agregado con éxito!', 'datos' => $request]);
    }

}
