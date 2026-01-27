<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineaFacturaController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('/clientes', function() {
    return view('clietnes.index');
});

Route::get('/clientes/create', function() {
    return view('clientes.create');
});

Route::get('/clientes/edit', function() {
    return view('clientes.edit');
});
*/

Route::get('/clientes', [ClientesController::class, 'index']);
Route::get('/clientes/create', [ClientesController::class, 'create']);
Route::get('/clientes/{id}/edit', [ClientesController::class, 'edit']);
Route::get('/facturas/cliente/{id}', [FacturasController::class, 'facturascliente'])->middleware('auth');
Route::post('/clientes', [ClientesController::class, 'store']);
Route::patch('/clientes/{id}', [ClientesController::class, 'update']);
Route::resource('clientes', ClientesController::class)->middleware('auth');
Route::resource('facturas', FacturasController::class)->middleware('auth');
Auth::routes(['register' => false, 'reset' => false]);

Route::get('lineas/{id}', [LineaFacturaController::class, 'index'])->name('lineas.index');
Route::get('lineas/{id_factura}/create', [LineaFacturaController::class, 'create'])->name('lineas.create');
Route::post('lineas/{id_factura}', [LineaFacturaController::class, 'store'])->name('lineas.store');
Route::get('lineas/{id_factura}/edit/{id}', [LineaFacturaController::class, 'edit'])->name('lineas.edit');
Route::put('lineas/{id_factura}/{id}', [LineaFacturaController::class, 'update'])->name('lineas.update');
Route::delete('lineas/{id_factura}/{id}', [LineaFacturaController::class, 'destroy'])->name('lineas.destroy');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
