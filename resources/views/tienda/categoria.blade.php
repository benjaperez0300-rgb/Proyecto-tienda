<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $categoria->nombre }} - Tienda de Ropa
    </title>

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

                <a href="{{ route('perfil') }}">
                    Mi perfil
                </a>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

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

        <section class="productos">


            <h1 class="titulo-seccion">

                {{ $categoria->nombre }}

            </h1>


            @if ($categoria->descripcion)

                <p class="descripcion-categoria">

                    {{ $categoria->descripcion }}

                </p>

            @endif


            @if ($productos->isEmpty())

                <div class="sin-categorias">

                    <p>
                        No hay productos disponibles
                        en esta categoría.
                    </p>

                    <a href="{{ route('tienda.categorias') }}">
                        Volver a categorías
                    </a>

                </div>

            @else

                <div class="grid">


                    @foreach ($productos as $producto)

                        <a
                            href="{{ route('tienda.producto', $producto->id) }}"
                            class="producto"
                        >

                            <div class="producto-info">


                                <h2 class="producto-nombre">

                                    {{ $producto->nombre }}

                                </h2>


                                <p class="producto-precio">

                                    ${{ number_format(
                                        $producto->precio,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </p>


                                @if ($producto->material)

                                    <p class="producto-dato">

                                        Material:
                                        {{ $producto->material }}

                                    </p>

                                @endif


                                @if ($producto->genero)

                                    <p class="producto-dato">

                                        Género:
                                        {{ $producto->genero }}

                                    </p>

                                @endif


                                <span class="producto-ver">

                                    Ver producto

                                </span>


                            </div>

                        </a>

                    @endforeach


                </div>

            @endif


        </section>


        <div class="volver-categorias">

            <a href="{{ route('tienda.categorias') }}">

                ← Volver a categorías

            </a>

        </div>


    </main>

    <footer>

        <span>
            Mi página web
        </span>

        <span>
            © {{ date('Y') }}
        </span>


    </footer>

</body>

</html>
