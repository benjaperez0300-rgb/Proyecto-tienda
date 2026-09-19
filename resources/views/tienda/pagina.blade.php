<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tienda</title>

    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">
</head>

<body>

    <header>

        <div class="logo">
            TIENDA DE ROPA
        </div>

        <div class="search">
            BUSCAR
        </div>

        <nav class="menu">

            @if (session()->has('usuario_id'))


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


 

    <footer id="contacto">

        <span>
            Mi página web
        </span>

        <span>
            © {{ date('Y') }}
        </span>

    </footer>

</body>

</html>

