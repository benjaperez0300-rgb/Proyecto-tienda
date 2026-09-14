```blade
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tienda</title>

    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">
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
         INICIO
    ========================= -->

    <main>

        <section class="hero">

            <div class="hero-logo">
                ABRIGO
            </div>

            <a
                href="#productos"
                class="arrow"
            >
                →
            </a>

        </section>


        <!-- =========================
             PRODUCTOS
        ========================= -->

        <section
            class="productos"
            id="productos"
        >

            <h2 class="titulo-seccion">
                Nueva colección
            </h2>

            <div class="grid">

                <div class="producto">

                    <span>
                        Producto 01
                    </span>

                </div>

                <div class="producto">

                    <span>
                        Producto 02
                    </span>

                </div>

                <div class="producto">

                    <span>
                        Producto 03
                    </span>

                </div>

                <div class="producto">

                    <span>
                        Producto 04
                    </span>

                </div>

                <div class="producto">

                    <span>
                        Producto 05
                    </span>

                </div>

                <div class="producto">

                    <span>
                        Producto 06
                    </span>

                </div>

            </div>

        </section>


        <!-- =========================
             SOBRE NOSOTROS
        ========================= -->

        <section class="nosotros">

            <div class="nosotros-contenido">

                <h2>
                    Menos es más.
                </h2>

                <p>
                    Una página minimalista, elegante
                    y limpia. Podemos cambiar todo:
                    colores, imágenes, textos, botones,
                    animaciones, productos y estructura.
                </p>

            </div>

        </section>

    </main>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer id="contacto">

        <span>
            Mi página web
        </span>

        <span>
            © {{ date('Y') }}
        </span>

    </footer>
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>

