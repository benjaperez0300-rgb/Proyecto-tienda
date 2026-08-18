<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosPedidosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ColoresController;

Route::get('/estados-pedidos', [EstadosPedidosController::class, 'index']);

Route::post('/estados-pedidos', [EstadosPedidosController::class, 'store']);

Route::get('/categorias', [CategoriasController::class, 'index']);

Route::post('/categorias', [CategoriasController::class, 'store']);

Route::get('/colores', [ColoresController::class, 'index']);

Route::post('/colores', [ColoresController::class, 'store']);

