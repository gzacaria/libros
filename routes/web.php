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

Route::resource("clientes","ClienteController"); //asignamos un recurso a una ruta
Route::resource("libros","LibrosController");
Route::resource("proveedores","ProveedoresController");
Route::resource("stock","StockController");
Route::resource("contactos","ContactoController");
Route::resource("facturas","FacturaController");

Route::post('facturas/{factura_id}/detalle/store','FacturaController@detalleaddstore');
Route::get('facturas/{id}/detalle/add','FacturaController@detalleadd');
Route::get('facturas/detalle/delete/{detalle_id}','FacturaController@detalledelete');