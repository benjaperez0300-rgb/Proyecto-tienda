<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Carrito</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/pagina.css') }}"
    >

</head>

<body>


    <!-- =========================
         HEADER
    ========================= -->

    <header>

        <div class="logo">
            TIENDA DE ROPA
        </div>

        <div class="search">
            BUSCAR
        </div>

        <nav class="menu">

            <a href="{{ url('/') }}">
                Inicio
            </a>

            <a href="#registro">
                Registrarse
            </a>

            <a href="#login">
                Iniciar sesión
            </a>

        </nav>

    </header>


    <!-- =========================
         CONTENIDO DEL CARRITO
    ========================= -->

    <main>

        <section class="carrito-seccion">

            <h1 class="titulo-seccion">
                Mi carrito
            </h1>


            <!-- =========================
                 CARRITO
            ========================= -->

            <div class="carrito">


                <!-- PRODUCTO 01 -->

                <article class="carrito-producto">

                    <div class="carrito-imagen">

                        <span>
                            Producto 01
                        </span>

                    </div>

                    <div class="carrito-informacion">

                        <h2>
                            Producto 01
                        </h2>

                        <p>
                            Descripción del producto
                        </p>

                        <p>
                            Precio: $0
                        </p>

                    </div>

                    <div class="carrito-cantidad">

                        <label for="cantidad-01">
                            Cantidad
                        </label>

                        <input
                            type="number"
                            id="cantidad-01"
                            name="cantidad-01"
                            value="1"
                            min="1"
                        >

                    </div>

                    <div class="carrito-subtotal">

                        <span>
                            Subtotal
                        </span>

                        <strong>
                            $0
                        </strong>

                    </div>

                    <div class="carrito-eliminar">

                        <button type="button">
                            Eliminar
                        </button>

                    </div>

                </article>


                <!-- PRODUCTO 02 -->

                <article class="carrito-producto">

                    <div class="carrito-imagen">

                        <span>
                            Producto 02
                        </span>

                    </div>

                    <div class="carrito-informacion">

                        <h2>
                            Producto 02
                        </h2>

                        <p>
                            Descripción del producto
                        </p>

                        <p>
                            Precio: $0
                        </p>

                    </div>

                    <div class="carrito-cantidad">

                        <label for="cantidad-02">
                            Cantidad
                        </label>

                        <input
                            type="number"
                            id="cantidad-02"
                            name="cantidad-02"
                            value="1"
                            min="1"
                        >

                    </div>

                    <div class="carrito-subtotal">

                        <span>
                            Subtotal
                        </span>

                        <strong>
                            $0
                        </strong>

                    </div>

                    <div class="carrito-eliminar">

                        <button type="button">
                            Eliminar
                        </button>

                    </div>

                </article>


            </div>


            <!-- =========================
                 RESUMEN DE COMPRA
            ========================= -->

            <div class="carrito-resumen">

                <h2>
                    Resumen de compra
                </h2>

                <p>
                    Total de productos:
                    <span>2</span>
                </p>

                <p>
                    Total:
                    <strong>$0</strong>
                </p>

                <button type="button">
                    Finalizar compra
                </button>

            </div>


        </section>

    </main>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer>

        <span>
            Mi página web
        </span>

        <span>
            © 2026
        </span>

        <span>
            Contacto
        </span>

    </footer>


</body>

</html>
