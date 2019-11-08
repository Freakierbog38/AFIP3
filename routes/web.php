<?php

use Illuminate\Support\Facades\Auth;

// Ruta para mostrar el login (sólo los "invitados" pueden entrar, los usuarios logeados no podrán)
Route::get('login', 'UsuariosController@showLoginForm')->middleware('guest');

// Ruta para autenticar al usuario mediante el login
Route::post('login', 'UsuariosController@login')->name('login');

// Ruta para autenticar al usuario mediante el login
Route::post('logout', 'UsuariosController@logout');

// Ruta para mostrar el formulario de registro de usuarios (sólo los "invitados" pueden entrar, los usuarios logeados no podrán)
Route::get('registro', 'UsuariosController@registroForm')->middleware('guest');

// Ruta para registrar usuarios
Route::post('registro', 'UsuariosController@registro');


// Grupo de rutas a las cuales sólo los usuarios autenticados podrán acceder
Route::group(['middleware' => 'auth'], function( ){
    
    Route::get('/', function() {
        return view('modulos/principal', ['title' => 'AFIP', 'prince' => true]);
    });

    // Ruta para registrar la empresa del usuario, y así terminar el registro
    Route::post('registroEmpresa', 'UsuariosController@registroEmpresa');

    Route::get('/info', function() {
        return view('modulos/info', ['title' => '¿Qué es AFIP?']);
    });
    
    Route::get('/ayuda', function() {
        return view('modulos/ayuda', ['title' => 'Módulo de Ayuda']);
    });
    
    Route::get('/formularios', function() {
        return view('modulos/formularios', ['title' => 'Entrada de Datos']);
    });
    
    Route::get('/reporte', function() {
        return view('modulos/reporte', ['title' => 'Reporte AFIP']);
    });

});

// Grupo de rutas del módulo Análisis de Ventas
Route::group(['middleware' => 'auth', 'prefix'=> 'analisisVentas'], function( ){
    
    // Muestra la vista principal del módulo
    Route::get('/main', 'AnalisisVentasController@show');

    // Ruta para agregar registros a Ventas de Productos o Servicios
    Route::get('/getVentasProdSer', 'AnalisisVentasController@getVentasProdSer');

    // Ruta que regresa un registro de un Producto o Servicio, sólo de uno
    Route::post('/selectUnProSer/{id}', 'AnalisisVentasController@selectUnProSer');

    // Ruta que edita un registro de un Producto o Servicio
    Route::post('/editarVentasProSer', 'AnalisisVentasController@editarVentasProSer');

    // Ruta para eliminar un registro de Ventas de Producto o Servicio
    Route::delete('/eliminarVentasProSer/{id}', 'AnalisisVentasController@eliminarVentasProSer');

    // Ruta para agregar un registro de Ventas de Producto o Servicio
    Route::post('/agregarVentasProSer', 'AnalisisVentasController@agregarVentasProSer');

    // Ruta para obtener los registros de Estacionalidad de Ventas
    Route::get('/getEstacionalidadVentas', 'AnalisisVentasController@getEstacionalidadVentas');

    // Ruta para agregar registros a Estacionalidad de Ventas
    Route::post('/agregarEstacionalidadVentas', 'AnalisisVentasController@agregarEstacionalidadVentas');

    // Ruta para obtener los registros de Resultados Ventas/Servicios
    Route::get('/getResultados', 'AnalisisVentasController@getResultados');

    // Ruta para eliminar un registro de Estacionalidad de Ventas
    Route::delete('/eliminarEstacionalidadVentas/{id}', 'AnalisisVentasController@eliminarEstacionalidadVentas');

});

// Grupo de rutas del módulo Análisis de Costos
Route::group(['middleware' => 'auth', 'prefix'=> 'analisisCostos'], function( ){
    
    // Muestra la vista principal del módulo
    Route::get('/main', 'AnalisisCostosController@show');

    // Regresa la información de registros de Costos Fijos Mensuales
    Route::get('/getCostosFijosMes', 'AnalisisCostosController@getCostosFijosMes');

    // Regresa la información de un registro de Costos Fijos Mensuales
    Route::get('/getUnCostoFijoMes/{id}', 'AnalisisCostosController@getUnCostoFijoMes');

    // Agrega un registro de Costo Fijo Mensual
    Route::post('/addCostoFijosMes', 'AnalisisCostosController@addCostoFijosMes');

    // Edita un registro de Costo Fijo Mensual
    Route::post('/editCostoFijoMes', 'AnalisisCostosController@editCostoFijoMes');

    // Elimina un registro de Costo Fijo Mensual
    Route::delete('/deleteCostoFijoMes/{id}', 'AnalisisCostosController@deleteCostoFijoMes');

    ////////////////////////////////////////////////////////////////////////////////////////////////

    // Regresa la información de registros de Costos Variables Unitarios
    Route::get('/getCostosVariablesUnit', 'AnalisisCostosController@getCostosVariablesUnit');

    // Regresa la información de un registro de Costos Variables Unitarios
    Route::get('/getUnCostoVariableUnit/{id}', 'AnalisisCostosController@getUnCostoVariableUnit');

    // Agrega un registro de Costo Variable Unitario
    Route::post('/addCostoVariableUnit', 'AnalisisCostosController@addCostoVariableUnit');

    // Edita un registro de Costo Variable Unitario
    Route::post('/editCostoVariableUnit', 'AnalisisCostosController@editCostoVariableUnit');

    // Elimina un registro de Costo Variable Unitario
    Route::delete('/deleteCostoVariableUnit/{id}', 'AnalisisCostosController@deleteCostoVariableUnit');

    /////////////////////////////////////////////////////////////////////////////////////////////////////
    // Regresa la información de registros de Costos Variables Unitarios Total
    Route::get('/getCVUTotal', 'AnalisisCostosController@getCVUTotal');

});

// Grupo de rutas del módulo Análisis de Capacidad Instalada
Route::group(['middleware' => 'auth', 'prefix'=> 'analisisCapacidadInstalada'], function( ){
    
    // Muestra la vista principal del módulo
    Route::get('/main', 'CapacidadInstaladaController@show');

    //  Obtiene los datos de la bd
    Route::get('/getCapacidadInstalada', 'CapacidadInstaladaController@getCapacidadInstalada');

    // Agrega el registro de Capacidad Instalada
    Route::post('/addCapacidadInstalada', 'CapacidadInstaladaController@addCapacidadInstalada');

});

// Grupo de rutas del módulo Balance General Histórico
Route::group(['middleware' => 'auth', 'prefix'=> 'balanceGeneralHistorico'], function( ){
    
    // Muestra la vista principal del módulo
    Route::get('/main', 'BalanceGralHistoricoController@show');



    // Agrega el registro para la fecha de un Balance General Histórico
    Route::post('/addFechaBalanceGral', 'BalanceGralHistoricoController@addFechaBalanceGral');

    // Regresa la fecha del Balance General Histórico
    Route::get('/getFechaBalanceGral', 'BalanceGralHistoricoController@getFechaBalanceGral');


    // Agrega el registro para un Activo
    Route::post('/addActivo', 'BalanceGralHistoricoController@addActivo');

    // Regresa la tabla de activos
    Route::get('/getActivos', 'BalanceGralHistoricoController@getActivos');



    // Regresa la tabla de desglose activos
    Route::get('/getDesgloseActivos', 'BalanceGralHistoricoController@getDesgloseActivos');

    // Regresa un registro de desglose activos
    Route::get('/getUnDesgloseActivo/{id}', 'BalanceGralHistoricoController@getUnDesgloseActivo');

    // Agrega un registro para un Desglose de Activo
    Route::post('/addDesgloseActivo', 'BalanceGralHistoricoController@addDesgloseActivo');

    // Edita un registro para un Desglose de Activo
    // Route::post('/editDesgloseActivo', 'BalanceGralHistoricoController@editDesgloseActivo');

    // Borrar un registro para un Desglose de Activo
    Route::delete('/deleteDesgloseActivo/{id}', 'BalanceGralHistoricoController@deleteDesgloseActivo');



    // Regresa la tabla de Pasivos
    Route::get('/getPasivos', 'BalanceGralHistoricoController@getPasivos');

    // Agrega un registro para un pasivo
    Route::post('/addPasivo', 'BalanceGralHistoricoController@addPasivo');



    // Regresa la tabla de Capital Contable
    Route::get('/getCapitalContable', 'BalanceGralHistoricoController@getCapitalContable');

    // Agrega un registro para una Capital Contable
    Route::post('/addCapitalContable', 'BalanceGralHistoricoController@addCapitalContable');

});

// Grupo de rutas del módulo Estado de Resultados Históricos
Route::group(['middleware' => 'auth', 'prefix'=> 'resultadosHistorico'], function( ){
    
    // Muestra la vista principal del módulo
    Route::get('/main', 'ResultadosHistoricoController@show');


    //  Obtiene los datos de la fecha
    Route::get('/getFecha', 'ResultadosHistoricoController@getFecha');

    // Agrega la fecha para Resultados Historicos
    Route::post('/addFecha', 'ResultadosHistoricoController@addFecha');

    
    //  Obtiene la tabla de Cifras en Pesos Nominales
    Route::get('/getCifrasNomina', 'ResultadosHistoricoController@getCifrasNomina');

    // Agrega registro en Cifras en Pesos Nominales
    Route::post('/addCifrasNomina', 'ResultadosHistoricoController@addCifrasNomina');

});

// Grupo de rutas del módulo Supuestos Proyecciones
Route::group(['middleware' => 'auth', 'prefix'=> 'supuestosProyecciones'], function( ){
    
    // Muestra la vista principal del módulo
    Route::get('/main', 'SupuestosProyeccionesController@show');


    //  Obtiene la tabla de Costos Con Apoyo
    Route::get('/getIngresosCostosCA', 'SupuestosProyeccionesController@getIngresosCostosCA');

    // Agrega registro en Costos Con Apoyo
    Route::post('/addIngresosCostosCA', 'SupuestosProyeccionesController@addIngresosCostosCA');

    // Elimina registros en Costos Con Apoyo
    Route::delete('/deleteIngresosCostosCA/{id}', 'SupuestosProyeccionesController@deleteIngresosCostosCA');


    //  Obtiene la tabla de Costos Sin Apoyo
    Route::get('/getIngresosCostosSA', 'SupuestosProyeccionesController@getIngresosCostosSA');

    // Agrega registro en Costos Sin Apoyo
    Route::post('/addIngresosCostosSA', 'SupuestosProyeccionesController@addIngresosCostosSA');

    // Elimina registros en Costos Sin Apoyo
    Route::delete('/deleteIngresosCostosSA/{id}', 'SupuestosProyeccionesController@deleteIngresosCostosSA');


    //  Obtiene la tabla de Políticas
    Route::get('/getPoliticas', 'SupuestosProyeccionesController@getPoliticas');

    // Agrega registro Políticas
    Route::post('/addPoliticas', 'SupuestosProyeccionesController@addPoliticas');


    //  Obtiene la tabla de Macroeconómicos y Financieros
    Route::get('/getMacroFina', 'SupuestosProyeccionesController@getMacroFina');

    // Agrega registro Macroeconómicos y Financieros
    Route::post('/addMacroFina', 'SupuestosProyeccionesController@addMacroFina');

});

// Grupo de rutas del módulo Financiamiento Solicitado
Route::group(['middleware' => 'auth', 'prefix'=> 'financiamientoSolicitado'], function( ){

    // Muestra la vista principal del módulo
    Route::get('/main', 'apoyoSolicitadoController@show');


    // Obtiene la tabla con la información de Pasivos Actuales
    Route::get('getPasivosActuales', 'apoyoSolicitadoController@getPasivosActuales');

    // Agrega registro Pasivos Actuales
    Route::post('addPasivosActuales', 'apoyoSolicitadoController@addPasivosActuales');

    // Elimina registros en Pasivos Actuales
    Route::delete('/deletePasivosActuales/{id}', 'apoyoSolicitadoController@deletePasivosActuales');


    // Obtiene la tabla con la información de Pasivos Adicionales en el Desarrollo
    Route::get('getPasivosDesarollo', 'apoyoSolicitadoController@getPasivosDesarollo');

    // Agrega registro Pasivos Adicionales en el Desarrollo
    Route::post('addPasivosDesarollo', 'apoyoSolicitadoController@addPasivosDesarollo');

    // Elimina registros en Pasivos Adicionales en el Desarrollo
    Route::delete('/deletePasivosDesarollo/{id}', 'apoyoSolicitadoController@deletePasivosDesarollo');


    // Obtiene la tabla con la información de Capital Contable Actual
    Route::get('getCapitalActual', 'apoyoSolicitadoController@getCapitalActual');

    // Agrega registro Pasivos Capital Contable Actual
    Route::post('addCapitalActual', 'apoyoSolicitadoController@addCapitalActual');

    // Elimina registros en Capital Contable Actual
    Route::delete('/deleteCapitalActual/{id}', 'apoyoSolicitadoController@deleteCapitalActual');


    // Obtiene la tabla con la información de Capital Adicional de Desarrollo
    Route::get('getCapitalDesarrollo', 'apoyoSolicitadoController@getCapitalDesarrollo');

    // Agrega registro Pasivos Capital Adicional de Desarrollo
    Route::post('addCapitalDesarrollo', 'apoyoSolicitadoController@addCapitalDesarrollo');

    // Elimina registros en Capital Adicional de Desarrollo
    Route::delete('/deleteCapitalDesarrollo/{id}', 'apoyoSolicitadoController@deleteCapitalDesarrollo');


    // Obtiene la tabla con la información de Financiamiento
    Route::get('getFinanciamiento', 'apoyoSolicitadoController@getFinanciamiento');

    // Agrega registro Financiamiento
    Route::post('addFinanciamiento', 'apoyoSolicitadoController@addFinanciamiento');

    // Elimina registros en Financiamiento
    Route::delete('/deleteFinanciamiento/{id}', 'apoyoSolicitadoController@deleteFinanciamiento');


    // Obtiene la tabla con la información de Destino de las inversiones
    Route::get('getInversiones', 'apoyoSolicitadoController@getInversiones');

    // Agrega registro Destino de las inversiones
    Route::post('addInversion', 'apoyoSolicitadoController@addInversion');

    // Elimina registros en Destino de las inversiones
    Route::delete('/deleteInversion/{id}', 'apoyoSolicitadoController@deleteInversion');


    // Obtiene la tabla con la información de Desglose de las inversiones
    Route::get('getDesgloseInversiones', 'apoyoSolicitadoController@getDesgloseInversiones');

    // Agrega registro Desglose de las inversiones
    Route::post('addDesgloseInversion', 'apoyoSolicitadoController@addDesgloseInversion');

    // Elimina registros en Desglose de las inversiones
    Route::delete('/deleteDesgloseInversion/{id}', 'apoyoSolicitadoController@deleteDesgloseInversion');


    // Obtiene la tabla con la información de Capacidada de activos y utilizada
    Route::get('getCapacidadAU', 'apoyoSolicitadoController@getCapacidadAU');

    // Agrega registro Capacidada de activos y utilizada
    Route::post('addCapacidadAU', 'apoyoSolicitadoController@addCapacidadAU');

    // Elimina registros en Capacidada de activos y utilizada
    Route::delete('/deleteCapacidadAU/{id}', 'apoyoSolicitadoController@deleteCapacidadAU');

});

// Grupo de rutas del módulo Índice de Producción
Route::group(['middleware' => 'auth', 'prefix'=> 'indiceProduccion'], function( ){

    // Muestra la vista principal del módulo
    Route::get('/main', 'IndiceProduccionController@show');


    // Obtiene la tabla con la información de Índices de Producción
    Route::get('getIndicesProduccion', 'IndiceProduccionController@getIndicesProduccion');

    // Agrega registro Índices de Producción
    Route::post('addIndicesProduccion', 'IndiceProduccionController@addIndicesProduccion');

});

// Grupo de rutas del módulo Reporte
Route::group(['middleware' => 'auth', 'prefix'=> 'resultados'], function( ){

    // Muestra la vista principal del módulo
    Route::get('/', 'ResultadosController@index');

});

Route::get('/prueba', function() {
    $usuarios = App\Rol::all();
    foreach($usuarios as $user){
        echo $user->rol.'<br>';
    }
});