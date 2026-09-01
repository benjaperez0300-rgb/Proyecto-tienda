<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosPedidosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ColoresController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\MetodosPagosController;
use App\Http\Controllers\TallesController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProductosProveedorController;
use App\Http\Controllers\ProductosVariantesController;

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

Route::get('/productos', [ProductosController::class, 'index']) ->name('productos.index');

Route::post('/productos', [ProductosController::class, 'store']) ->name('productos.store');

Route::get('/productos/{id}/edit', [ProductosController::class, 'edit']) ->name('productos.edit');

Route::put('/productos/{id}', [ProductosController::class, 'update']) ->name('productos.update');

Route::get('/productos-proveedor', [ProductosProveedorController::class, 'index']) ->name('productos_proveedor.index');

Route::post('/productos-proveedor', [ProductosProveedorController::class, 'store']) ->name('productos_proveedor.store');

Route::get('/productos-variantes', [ProductosVariantesController::class, 'index']) ->name('admin.productosVariantes.index');

Route::post('/productos-variantes', [ProductosVariantesController::class, 'store']) ->name('admin.productosVariantes.store');

Route::get('/productos-variantes/{id}/edit', [ProductosVariantesController::class, 'edit']) ->name('admin.productosVariantes.edit');

Route::put('/productos-variantes/{id}', [ProductosVariantesController::class, 'update']) ->name('admin.productosVariantes.update');

Route::get('/', function () {
    return view('frontend.pagina');
});

Route::get('/registro', function () {
    return view('frontend.registro');
});

Route::get('/login', function () {
    return view('frontend.iniciar-sesion');
});
