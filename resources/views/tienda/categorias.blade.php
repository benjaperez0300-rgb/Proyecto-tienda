<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categorías - Tienda de Ropa</title>

    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">

</head>

<body>


    <!-- =========================
         ENCABEZADO
    ========================== -->

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

                <a href="{{ route('perfil') }}">
                    Mi perfil
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



    <!-- =========================
         CONTENIDO PRINCIPAL
    ========================== -->

    <main>

        <section class="productos">

            <h1 class="titulo-seccion">
                Categorías
            </h1>


            @if ($categorias->isEmpty())

                <p>
                    No hay categorías disponibles.
                </p>

            @else

                <div class="grid">

                    @foreach ($categorias as $categoria)

                        <a
                            href="{{ route('tienda.categoria', $categoria->id) }}"
                            class="producto"
                        >

                            <h2>
                                {{ $categoria->nombre }}
                            </h2>


                            @if ($categoria->descripcion)

                                <p>
                                    {{ $categoria->descripcion }}
                                </p>

                            @endif

                        </a>

                    @endforeach

                </div>

            @endif

        </section>

    </main>



    <!-- =========================
         PIE DE PÁGINA
    ========================== -->

    <footer>

        <span>
            Mi página web
        </span>

        <span>
            © {{ date('Y') }}
        </span>

        <span>
            Contacto
        </span>

    </footer>

<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>

