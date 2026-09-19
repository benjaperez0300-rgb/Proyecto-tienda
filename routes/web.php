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
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DetalleComprasController;
use App\Http\Controllers\CarritosController;
use App\Http\Controllers\Carrito_ProductosController;
use App\Http\Controllers\Movimiento_inventarioController;
use App\Http\Controllers\Pedidos_productosController;
use App\Http\Controllers\CheckoutController;


// ==================================================
// INICIO
// ==================================================

Route::get('/', function () {

    return redirect()->route('tienda.pagina');

});


// ==================================================
// TIENDA - INICIO
// ==================================================

Route::get('/tienda', function () {

    return view('tienda.pagina');

})->name('tienda.pagina');


// ==================================================
// TIENDA - CATEGORÍAS
// ==================================================

Route::get(
    '/tienda/categorias',
    [CategoriasController::class, 'tienda']
)->name('tienda.categorias');


Route::get(
    '/tienda/categoria/{id}',
    [CategoriasController::class, 'mostrarCategoria']
)->name('tienda.categoria');


// ==================================================
// TIENDA - CATÁLOGO
// ==================================================

Route::get(
    '/tienda/catalogo',
    [ProductosController::class, 'catalogo']
)->name('tienda.catalogo');


// ==================================================
// TIENDA - PRODUCTO
// ==================================================

Route::get(
    '/tienda/producto/{id}',
    [ProductosController::class, 'show']
)->name('tienda.producto');


// ==================================================
// REGISTRO
// ==================================================

Route::get('/registro', function () {

    return view('tienda.registro');

})->name('registro');


Route::post(
    '/registro',
    [UsuariosController::class, 'store']
)->name('registro.store');


// ==================================================
// LOGIN
// ==================================================

Route::get(
    '/iniciar-sesion',
    [UsuariosController::class, 'showLogin']
)->name('login');


Route::post(
    '/iniciar-sesion',
    [UsuariosController::class, 'login']
)->name('login.post');


// ==================================================
// LOGOUT
// ==================================================

Route::post(
    '/logout',
    [UsuariosController::class, 'logout']
)->name('logout');


// ==================================================
// PERFIL - USUARIO
// ==================================================

Route::get(
    '/perfil',
    [UsuariosController::class, 'perfil']
)->name('perfil');


Route::get(
    '/perfil/editar',
    [UsuariosController::class, 'editPerfil']
)->name('perfil.edit');


Route::put(
    '/perfil',
    [UsuariosController::class, 'updatePerfil']
)->name('perfil.update');


// ==================================================
// CARRITO - USUARIO
// ==================================================

Route::get(
    '/tienda/carrito',
    [CarritosController::class, 'index']
)->name('tienda.carrito');


Route::post(
    '/carrito',
    [CarritosController::class, 'store']
)->name('carrito.store');


// ==================================================
// CARRITO - PRODUCTOS
// ==================================================

Route::put(
    '/carrito-producto/{id}',
    [Carrito_ProductosController::class, 'update']
)->name('carrito_productos.actualizar');


Route::delete(
    '/carrito-producto/{id}',
    [Carrito_ProductosController::class, 'destroy']
)->name('carrito_productos.destroy');

// ==================================================
// CHECKOUT Y MIS PEDIDOS
// ==================================================

Route::get(
    '/checkout',
    [CheckoutController::class, 'index']
)->name('checkout');

Route::post(
    '/checkout/confirmar',
    [PedidosController::class, 'confirmarCompra']
)->name('checkout.confirmar');

Route::get(
    '/mis-pedidos',
    [PedidosController::class, 'misPedidos']
)->name('tienda.pedidos');


// ==================================================
// ADMIN - INICIO
// ==================================================

Route::get('/admin', function () {

    if (!session('usuario_id')) {

        return redirect()->route('login');

    }

    if (session('usuario_rol') !== 'admin') {

        return redirect()->route('tienda.pagina');

    }

    return view('admin.inicio');

})->name('admin.inicio');


// ==================================================
// ADMIN - ESTADOS DE PEDIDOS
// ==================================================

Route::get(
    '/estados-pedidos',
    [EstadosPedidosController::class, 'index']
)->name('estados_pedidos.index');


Route::post(
    '/estados-pedidos',
    [EstadosPedidosController::class, 'store']
)->name('estados_pedidos.store');


// ==================================================
// ADMIN - CATEGORÍAS
// ==================================================

Route::get(
    '/categorias',
    [CategoriasController::class, 'index']
)->name('categorias.index');


Route::post(
    '/categorias',
    [CategoriasController::class, 'store']
)->name('categorias.store');


Route::get(
    '/categorias/{id}/edit',
    [CategoriasController::class, 'edit']
)->name('categorias.edit');


Route::put(
    '/categorias/{id}',
    [CategoriasController::class, 'update']
)->name('categorias.update');


// ==================================================
// ADMIN - COLORES
// ==================================================

Route::get(
    '/colores',
    [ColoresController::class, 'index']
)->name('colores.index');


Route::post(
    '/colores',
    [ColoresController::class, 'store']
)->name('colores.store');


// ==================================================
// ADMIN - MARCAS
// ==================================================

Route::get(
    '/marcas',
    [MarcasController::class, 'index']
)->name('marcas.index');


Route::post(
    '/marcas',
    [MarcasController::class, 'store']
)->name('marcas.store');


// ==================================================
// ADMIN - MÉTODOS DE PAGO
// ==================================================

Route::get(
    '/metodos-pagos',
    [MetodosPagosController::class, 'index']
)->name('metodos_pagos.index');


Route::post(
    '/metodos-pagos',
    [MetodosPagosController::class, 'store']
)->name('metodos_pagos.store');


// ==================================================
// ADMIN - TALLES
// ==================================================

Route::get(
    '/talles',
    [TallesController::class, 'index']
)->name('talles.index');


Route::post(
    '/talles',
    [TallesController::class, 'store']
)->name('talles.store');


// ==================================================
// ADMIN - PROVEEDORES
// ==================================================

Route::get(
    '/proveedores',
    [ProveedorController::class, 'index']
)->name('proveedores.index');


Route::post(
    '/proveedores',
    [ProveedorController::class, 'store']
)->name('proveedores.store');


Route::get(
    '/proveedores/{id}/edit',
    [ProveedorController::class, 'edit']
)->name('proveedores.edit');


Route::put(
    '/proveedores/{id}',
    [ProveedorController::class, 'update']
)->name('proveedores.update');


// ==================================================
// ADMIN - PRODUCTOS
// ==================================================

Route::get(
    '/productos',
    [ProductosController::class, 'index']
)->name('productos.index');


Route::post(
    '/productos',
    [ProductosController::class, 'store']
)->name('productos.store');


Route::get(
    '/productos/{id}/edit',
    [ProductosController::class, 'edit']
)->name('productos.edit');


Route::put(
    '/productos/{id}',
    [ProductosController::class, 'update']
)->name('productos.update');


// ==================================================
// ADMIN - PRODUCTOS PROVEEDOR
// ==================================================

Route::get(
    '/productos-proveedor',
    [ProductosProveedorController::class, 'index']
)->name('productos_proveedor.index');


Route::post(
    '/productos-proveedor',
    [ProductosProveedorController::class, 'store']
)->name('productos_proveedor.store');


// ==================================================
// ADMIN - PRODUCTOS VARIANTES
// ==================================================

Route::get(
    '/productos-variantes',
    [ProductosVariantesController::class, 'index']
)->name('admin.productosVariantes.index');


Route::post(
    '/productos-variantes',
    [ProductosVariantesController::class, 'store']
)->name('admin.productosVariantes.store');


Route::get(
    '/productos-variantes/{id}/edit',
    [ProductosVariantesController::class, 'edit']
)->name('admin.productosVariantes.edit');


Route::put(
    '/productos-variantes/{id}',
    [ProductosVariantesController::class, 'update']
)->name('admin.productosVariantes.update');


// ==================================================
// ADMIN - USUARIOS
// ==================================================

Route::get(
    '/usuarios',
    [UsuariosController::class, 'index']
)->name('usuarios.index');


Route::post(
    '/usuarios',
    [UsuariosController::class, 'storeAdmin']
)->name('usuarios.storeAdmin');


Route::get(
    '/usuarios/{id}/edit',
    [UsuariosController::class, 'edit']
)->name('usuarios.edit');


Route::put(
    '/usuarios/{id}',
    [UsuariosController::class, 'update']
)->name('usuarios.update');


// ==================================================
// ADMIN - PEDIDOS
// ==================================================

Route::get(
    '/pedidos',
    [PedidosController::class, 'index']
)->name('pedidos.index');

Route::post(
    '/pedidos',
    [PedidosController::class, 'store']
)->name('pedidos.store');

Route::get(
    '/pedidos/{id_pedidos}/edit',
    [PedidosController::class, 'edit']
)->name('pedidos.edit');

Route::put(
    '/pedidos/{id_pedidos}',
    [PedidosController::class, 'update']
)->name('pedidos.update');

// ==================================================
// ADMIN - PAGOS
// ==================================================

Route::get(
    '/pagos',
    [PagosController::class, 'index']
)->name('pagos.index');


Route::post(
    '/pagos',
    [PagosController::class, 'store']
)->name('pagos.store');


Route::get(
    '/pagos/{id}/edit',
    [PagosController::class, 'edit']
)->name('pagos.edit');


Route::put(
    '/pagos/{id}',
    [PagosController::class, 'update']
)->name('pagos.update');


// ==================================================
// ADMIN - FACTURAS
// ==================================================

Route::get(
    '/facturas',
    [FacturasController::class, 'index']
)->name('facturas.index');


Route::post(
    '/facturas',
    [FacturasController::class, 'store']
)->name('facturas.store');


Route::get(
    '/facturas/{id}/edit',
    [FacturasController::class, 'edit']
)->name('facturas.edit');


Route::put(
    '/facturas/{id}',
    [FacturasController::class, 'update']
)->name('facturas.update');


// ==================================================
// ADMIN - COMPRAS
// ==================================================

Route::get(
    '/compras',
    [ComprasController::class, 'index']
)->name('compras.index');


Route::post(
    '/compras',
    [ComprasController::class, 'store']
)->name('compras.store');


Route::get(
    '/compras/{id}/edit',
    [ComprasController::class, 'edit']
)->name('compras.edit');


Route::put(
    '/compras/{id}',
    [ComprasController::class, 'update']
)->name('compras.update');


// ==================================================
// ADMIN - DETALLE DE COMPRAS
// ==================================================

Route::get(
    '/detalle-compras',
    [DetalleComprasController::class, 'index']
)->name('detalle_compras.index');


Route::post(
    '/detalle-compras',
    [DetalleComprasController::class, 'store']
)->name('detalle_compras.store');


Route::get(
    '/detalle-compras/{id}/edit',
    [DetalleComprasController::class, 'edit']
)->name('detalle_compras.edit');


Route::put(
    '/detalle-compras/{id}',
    [DetalleComprasController::class, 'update']
)->name('detalle_compras.update');


// ==================================================
// CARRITO PRODUCTOS
// ==================================================

Route::post(
    '/carrito-productos',
    [Carrito_ProductosController::class, 'store']
)->name('carrito_productos.store');


// ==================================================
// ADMIN - MOVIMIENTO INVENTARIO
// ==================================================

Route::get(
    '/movimiento-inventario',
    [Movimiento_inventarioController::class, 'index']
)->name('movimiento_inventario.index');


Route::post(
    '/movimiento-inventario',
    [Movimiento_inventarioController::class, 'store']
)->name('movimiento_inventario.store');


Route::get(
    '/movimiento-inventario/{id}/edit',
    [Movimiento_inventarioController::class, 'edit']
)->name('movimiento_inventario.edit');


Route::put(
    '/movimiento-inventario/{id}',
    [Movimiento_inventarioController::class, 'update']
)->name('movimiento_inventario.update');


// ==================================================
// ADMIN - PEDIDOS PRODUCTOS
// ==================================================

Route::get(
    '/pedidos-productos',
    [Pedidos_productosController::class, 'index']
)->name('pedidos_productos.index');


Route::post(
    '/pedidos-productos',
    [Pedidos_productosController::class, 'store']
)->name('pedidos_productos.store');


Route::get(
    '/pedidos-productos/{id}/edit',
    [Pedidos_productosController::class, 'edit']
)->name('pedidos_productos.edit');


Route::put(
    '/pedidos-productos/{id}',
    [Pedidos_productosController::class, 'update']
)->name('pedidos_productos.update');
