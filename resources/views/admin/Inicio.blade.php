<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Panel de administración
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}"
    >

</head>

<body>

    <header class="admin-header">

        <div class="admin-logo">
            TIENDA DE ROPA
        </div>

        <div class="admin-titulo">
            PANEL DE ADMINISTRACIÓN
        </div>

        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="btn-cerrar"
            >
                Cerrar sesión
            </button>

        </form>

    </header>


    <main class="admin-contenedor">

        <h1>
            Panel de administración
        </h1>

        <p class="admin-descripcion">
            Administrá los diferentes elementos de la tienda.
        </p>


        <!-- PRODUCTOS -->

        <section class="admin-seccion">

            <h2>
                Productos
            </h2>

            <div class="admin-grid">

                <a
                    href="{{ route('productos.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Productos
                    </h3>

                    <p>
                        Administrar productos.
                    </p>

                </a>


                <a
                    href="{{ route('admin.productosVariantes.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Variantes
                    </h3>

                    <p>
                        Administrar variantes de productos.
                    </p>

                </a>


                <a
                    href="{{ route('categorias.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Categorías
                    </h3>

                    <p>
                        Administrar categorías.
                    </p>

                </a>


                <a
                    href="{{ route('marcas.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Marcas
                    </h3>

                    <p>
                        Administrar marcas.
                    </p>

                </a>


                <a
                    href="{{ route('colores.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Colores
                    </h3>

                    <p>
                        Administrar colores.
                    </p>

                </a>


                <a
                    href="{{ route('talles.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Talles
                    </h3>

                    <p>
                        Administrar talles.
                    </p>

                </a>

            </div>

        </section>


        <!-- PROVEEDORES E INVENTARIO -->

        <section class="admin-seccion">

            <h2>
                Proveedores e inventario
            </h2>

            <div class="admin-grid">

                <a
                    href="{{ route('proveedores.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Proveedores
                    </h3>

                    <p>
                        Administrar proveedores.
                    </p>

                </a>


                <a
                    href="{{ route('productos_proveedor.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Productos por proveedor
                    </h3>

                    <p>
                        Administrar productos asociados a proveedores.
                    </p>

                </a>


                <a
                    href="{{ route('movimiento_inventario.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Movimiento de inventario
                    </h3>

                    <p>
                        Administrar movimientos del inventario.
                    </p>

                </a>

            </div>

        </section>


        <!-- PEDIDOS Y VENTAS -->

        <section class="admin-seccion">

            <h2>
                Pedidos y ventas
            </h2>

            <div class="admin-grid">

                <a
                    href="{{ route('pedidos.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Pedidos
                    </h3>

                    <p>
                        Ver y administrar pedidos.
                    </p>

                </a>


                <a
                    href="{{ route('pedidos_productos.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Productos de pedidos
                    </h3>

                    <p>
                        Ver los productos incluidos en cada pedido.
                    </p>

                </a>


                <a
                    href="{{ route('estados_pedidos.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Estados de pedidos
                    </h3>

                    <p>
                        Administrar estados de los pedidos.
                    </p>

                </a>


                <a
                    href="{{ route('pagos.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Pagos
                    </h3>

                    <p>
                        Administrar pagos.
                    </p>

                </a>


                <a
                    href="{{ route('metodos_pagos.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Métodos de pago
                    </h3>

                    <p>
                        Administrar métodos de pago.
                    </p>

                </a>


                <a
                    href="{{ route('facturas.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Facturas
                    </h3>

                    <p>
                        Administrar facturas.
                    </p>

                </a>

            </div>

        </section>


        <!-- COMPRAS -->

        <section class="admin-seccion">

            <h2>
                Compras
            </h2>

            <div class="admin-grid">

                <a
                    href="{{ route('compras.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Compras
                    </h3>

                    <p>
                        Administrar compras.
                    </p>

                </a>


                <a
                    href="{{ route('detalle_compras.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Detalle de compras
                    </h3>

                    <p>
                        Ver el detalle de las compras.
                    </p>

                </a>

            </div>

        </section>


        <!-- USUARIOS -->

        <section class="admin-seccion">

            <h2>
                Usuarios
            </h2>

            <div class="admin-grid">

                <a
                    href="{{ route('usuarios.index') }}"
                    class="admin-card"
                >

                    <h3>
                        Usuarios
                    </h3>

                    <p>
                        Administrar usuarios y roles.
                    </p>

                </a>

            </div>

        </section>

    </main>


    <footer class="admin-footer">

        <span>
            TIENDA DE ROPA
        </span>

        <span>
            © {{ date('Y') }}
        </span>

    </footer>

</body>

</html>