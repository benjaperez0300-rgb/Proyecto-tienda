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
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DetalleComprasController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\Carrito_ProductosController;
use App\Http\Controllers\Movimiento_inventarioController;
use App\Http\Controllers\Pedidos_productosController;

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

Route::get('/usuarios', [UsuariosController::class, 'index']) ->name('usuarios.index');

Route::post('/usuarios', [UsuariosController::class, 'store']) ->name('usuarios.store');

Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'edit']) ->name('usuarios.edit');

Route::put('/usuarios/{id}', [UsuariosController::class, 'update']) ->name('usuarios.update');

Route::get('/pedidos', [PedidoController::class, 'index']) ->name('pedidos.index');

Route::post('/pedidos', [PedidoController::class, 'store']) ->name('pedidos.store');

Route::get('/pedidos/{id_pedidos}/edit', [PedidoController::class, 'edit']) ->name('pedidos.edit');

Route::put('/pedidos/{id_pedidos}', [PedidoController::class, 'update']) ->name('pedidos.update');

Route::get('/pagos', [PagosController::class, 'index']) ->name('pagos.index');

Route::post('/pagos', [PagosController::class, 'store']) ->name('pagos.store');

Route::get('/pagos/{id}/edit', [PagosController::class, 'edit']) ->name('pagos.edit');

Route::put('/pagos/{id}', [PagosController::class, 'update']) ->name('pagos.update');

Route::get('/facturas', [FacturaController::class, 'index']) ->name('facturas.index');

Route::post('/facturas', [FacturaController::class, 'store']) ->name('facturas.store');

Route::get('/facturas/{id}/edit', [FacturaController::class, 'edit']) ->name('facturas.edit');

Route::put('/facturas/{id}', [FacturaController::class, 'update']) ->name('facturas.update');

Route::get('/compras', [ComprasController::class, 'index']) ->name('compras.index');

Route::post('/compras', [ComprasController::class, 'store']) ->name('compras.store');

Route::get('/compras/{id}/edit', [ComprasController::class, 'edit']) ->name('compras.edit');

Route::put('/compras/{id}', [ComprasController::class, 'update']) ->name('compras.update');

Route::get('/detalle-compras', [DetalleComprasController::class, 'index']) ->name('detalle_compras.index');

Route::post('/detalle-compras', [DetalleComprasController::class, 'store']) ->name('detalle_compras.store');

Route::get('/detalle-compras/{id}/edit', [DetalleComprasController::class, 'edit']) ->name('detalle_compras.edit');

Route::put('/detalle-compras/{id}', [DetalleComprasController::class, 'update']) ->name('detalle_compras.update');

Route::get('/carrito', [CarritoController::class, 'index']) ->name('carrito.index');

Route::post('/carrito', [CarritoController::class, 'store']) ->name('carrito.store');

Route::get('/carrito-productos', [Carrito_ProductosController::class, 'index']) ->name('carrito_productos.index');

Route::post('/carrito-productos', [Carrito_ProductosController::class, 'store']) ->name('carrito_productos.store');

Route::get('/carrito-productos/{id}/edit', [Carrito_ProductosController::class, 'edit']) ->name('carrito_productos.edit');

Route::put('/carrito-productos/{id}', [Carrito_ProductosController::class, 'update']) ->name('carrito_productos.update');

Route::get('/movimiento-inventario', [Movimiento_inventarioController::class, 'index']) ->name('movimiento_inventario.index');

Route::post('/movimiento-inventario', [Movimiento_inventarioController::class, 'store']) ->name('movimiento_inventario.store');

Route::get('/movimiento-inventario/{id}/edit', [Movimiento_inventarioController::class, 'edit']) ->name('movimiento_inventario.edit');

Route::put('/movimiento-inventario/{id}', [Movimiento_inventarioController::class, 'update']) ->name('movimiento_inventario.update');

Route::get('/pedidos-productos', [Pedidos_productosController::class, 'index']) ->name('pedidos_productos.index');

Route::post('/pedidos-productos', [Pedidos_productosController::class, 'store']) ->name('pedidos_productos.store');

Route::get('/pedidos-productos/{id}/edit', [Pedidos_productosController::class, 'edit']) ->name('pedidos_productos.edit');

Route::put('/pedidos-productos/{id}', [Pedidos_productosController::class, 'update']) ->name('pedidos_productos.update');

Route::get('/', function () {
    return view('frontend.pagina');
});

Route::get('/registro', function () {
    return view('frontend.registro');
});

Route::get('/login', function () {
    return view('frontend.iniciar-sesion');
});
