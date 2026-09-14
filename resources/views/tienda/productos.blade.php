<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $producto->nombre }} - Tienda de Ropa</title>

    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">

</head>

<body>


    <!-- =========================
         HEADER
    ========================= -->

    <header>

        <a href="{{ route('tienda.pagina') }}" class="logo">
            TIENDA DE ROPA
        </a>


        <div class="search">
            BUSCAR
        </div>


        <nav class="menu">

            @if (session()->has('usuario_id'))

                <!-- =========================
                     USUARIO LOGUEADO
                ========================= -->

                <a href="{{ route('tienda.pagina') }}">
                    Inicio
                </a>

                <a href="{{ route('tienda.categorias') }}">
                    Categorías
                </a>

                <a href="{{ route('tienda.catalogo') }}">
                    Catálogo
                </a>

                <a href="{{ route('tienda.carrito') }}">
                    Carrito
                </a>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit">
                        Cerrar sesión
                    </button>

                </form>

            @else

                <!-- =========================
                     USUARIO NO LOGUEADO
                ========================= -->

                <a href="{{ route('tienda.pagina') }}">
                    Inicio
                </a>

                <a href="{{ route('tienda.categorias') }}">
                    Categorías
                </a>

                <a href="{{ route('tienda.catalogo') }}">
                    Catálogo
                </a>

                <a href="{{ route('tienda.carrito') }}">
                    Carrito
                </a>

                <a href="{{ route('registro') }}">
                    Registrarse
                </a>

                <a href="{{ route('login') }}">
                    Iniciar sesión
                </a>

            @endif

        </nav>

    </header>


    <!-- =========================
         PRODUCTO
    ========================= -->

    <main class="producto-contenedor">


        <!-- =========================
             GALERÍA
        ========================= -->

        <section class="producto-galeria">

            <div class="imagen-item">

                <div class="placeholder-imagen">

                    <span>
                        IMAGEN PRINCIPAL DEL PRODUCTO
                    </span>

                </div>

            </div>


            <div class="imagen-item">

                <div class="placeholder-imagen">

                    <span>
                        SEGUNDA VISTA / DETALLE
                    </span>

                </div>

            </div>

        </section>


        <!-- =========================
             INFORMACIÓN
        ========================= -->

        <section class="producto-detalle">


            <div class="producto-cabecera">

                <h1 class="producto-titulo">
                    {{ $producto->nombre }}
                </h1>

            </div>


            <!-- =========================
                 PRECIO
            ========================= -->

            <div class="producto-precio">

                <span>
                    UYU {{ number_format($producto->precio, 2, ',', '.') }}
                </span>

            </div>


            <!-- =========================
                 CUOTAS
            ========================= -->

            <p class="nota-cuotas">
                *POSIBILIDAD DE PAGO EN CUOTAS SIN INTERESES
            </p>


            <!-- =========================
                 CÓDIGO DE BARRA
            ========================= -->

            <div class="producto-variante">

                <span class="color-codigo">

                    CÓDIGO |
                    {{ $producto->codigo_barra }}

                </span>

            </div>


            <!-- =========================
                 INFORMACIÓN
            ========================= -->

            <div class="producto-descripcion">

                <p>

                    <strong>
                        Material:
                    </strong>

                    {{ $producto->material }}

                </p>


                <p>

                    <strong>
                        Género:
                    </strong>

                    {{ $producto->genero }}

                </p>

            </div>


            <!-- =========================
                 AGREGAR AL CARRITO
            ========================= -->

            @if (session()->has('usuario_id'))

                <form
                    action="{{ route('carrito.store') }}"
                    method="POST"
                    class="form-producto"
                >

                    @csrf


                    <input
                        type="hidden"
                        name="producto_id"
                        value="{{ $producto->id }}"
                    >


                    <button
                        type="submit"
                        class="btn-anadir"
                    >
                        AÑADIR AL CARRITO
                    </button>

                </form>

            @else

                <div class="producto-login">

                    <p>
                        Debes iniciar sesión para agregar productos al carrito.
                    </p>

                    <a href="{{ route('login') }}">
                        Iniciar sesión
                    </a>

                </div>

            @endif


        </section>

    </main>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer class="footer-principal">

        <span>
            TIENDA DE ROPA
        </span>

        <span>
            © {{ date('Y') }}
        </span>

    </footer>

<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
