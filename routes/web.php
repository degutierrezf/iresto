<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MesasController@mostrar_mesas');

// Muestra el total de mesas del Restaurant
Route::get('mesas', 'MesasController@mostrar_mesas');
//Apertura de la Mesa
Route::post('AperturaMesa', 'PedidosController@apertura');


// Muestra el detalle de cada Mesa
Route::post('mesa', 'PedidosController@detalle_mesa');
// Carga Menu al Pedido
Route::post('MenuMesa', 'PedidosController@menu_mesa');
// Confirma el Detalle del Pedido
Route::post('ConfirmarPedido', 'PedidosController@ConfirmarPedido');
// Anula el Detalle del Pedido
Route::post('AnularDetalle', 'PedidosController@AnularDetalle');
// Cerrar Mesa
Route::post('CerrarMesa', 'PedidosController@CerrarMesa');
// Pagar Mesa
Route::post('PagarMesa', 'PedidosController@PagarMesa');


// Muestra Menú Restoran
Route::get('resto/activas', 'RestoController@activas');
Route::get('resto/realizadas', 'RestoController@realizadas');
Route::get('resto/informe', 'RestoController@informe');

// Muestra Menú Cabaña
Route::get('cabana/reserva', 'CabanaController@reserva');
Route::get('cabana/activas', 'CabanaController@activas');
Route::get('cabana/historicas', 'CabanaController@historicas');
Route::get('cabana/informe', 'CabanaController@informe');

// Muesta Menú Pagos
Route::get('pagos/activos', 'PagosController@activos');
Route::get('pagos/historicos', 'PagosController@historicos');
Route::get('pagos/informe', 'PagosController@informe');

// Muesta Menú Clientes/Proveedor
Route::get('clipro/nuevo', 'ClientesProveedoresController@nuevo');
Route::get('clipro/gestion', 'ClientesProveedoresController@gestion');

// Muestra Menú Inventario
Route::get('inventario/subproducto', 'InventarioController@subproducto');
Route::get('inventario/producto', 'InventarioController@producto');
Route::get('inventario/stockminimo', 'InventarioController@stockminimo');
Route::get('inventario/compra', 'InventarioController@compra');
Route::get('inventario/bodega', 'InventarioController@bodega');

// Muestra Menú Informes
Route::get('estadisticas/ventas', 'InformesController@ventas');
Route::get('estadisticas/compras', 'InformesController@compras');
Route::get('estadisticas/estadisticas_venta', 'InformesController@e_ventas');
Route::get('estadisticas/estadisticas_reservas', 'InformesController@e_reservas');
Route::get('estadisticas/estadisticas_inventario', 'InformesController@e_inventario');

// Muestra Opciones Generales
Route::get('opciones/general', 'OpcionesController@general');
Route::get('opciones/usuarios', 'OpcionesController@usuarios');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
