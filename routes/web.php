<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosPedidosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ColoresController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\MetodosPagosController;
use App\Http\Controllers\TallesController;
use App\Http\Controllers\ProveedorController;

Route::get('/estados-pedidos', [EstadosPedidosController::class, 'index']);

Route::post('/estados-pedidos', [EstadosPedidosController::class, 'store']);

Route::get('/categorias', [CategoriasController::class, 'index']) ->name('categorias.index');

Route::post('/categorias', [CategoriasController::class, 'store']) ->name('categorias.store');

Route::get('/categorias/{id}/edit', [CategoriasController::class, 'edit']) ->name('categorias.edit');

Route::put('/categorias/{id}', [CategoriasController::class, 'update']) ->name('categorias.update');

Route::get('/colores', [ColoresController::class, 'index']);

Route::post('/colores', [ColoresController::class, 'store']);

Route::get('/marcas', [MarcasController::class, 'index']);

Route::post('/marcas', [MarcasController::class, 'store']);

Route::get('/metodos-pagos', [MetodosPagosController::class, 'index']);

Route::post('/metodos-pagos', [MetodosPagosController::class, 'store']);

Route::get('/talles', [TallesController::class, 'index']);

Route::post('/talles', [TallesController::class, 'store']);

Route::get('/proveedores', [ProveedorController::class, 'index']) ->name('proveedores.index');

Route::post('/proveedores', [ProveedorController::class, 'store']) ->name('proveedores.store');

Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit']) ->name('proveedores.edit');

Route::put('/proveedores/{id}', [ProveedorController::class, 'update']) ->name('proveedores.update');
