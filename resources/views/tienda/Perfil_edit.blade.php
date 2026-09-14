<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Editar Perfil</title>

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

    </nav>

</header>



<!-- =========================
     CONTENIDO
========================== -->

<main class="contenedor">

    <h1>
        Editar Perfil
    </h1>


    <!-- =========================
         ERRORES
    ========================== -->

    @if ($errors->any())

        <div class="mensaje mensaje-error">

            <p>
                Revisa los siguientes campos:
            </p>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    <!-- =========================
         FORMULARIO
    ========================== -->

    <form
        action="{{ route('perfil.update') }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <!-- NOMBRE -->

        <div class="campo">

            <label for="nombre">
                Nombre:
            </label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre', $usuario->nombre) }}"
                required
            >

        </div>



        <!-- APELLIDO -->

        <div class="campo">

            <label for="apellido">
                Apellido:
            </label>

            <input
                type="text"
                id="apellido"
                name="apellido"
                value="{{ old('apellido', $usuario->apellido) }}"
                required
            >

        </div>



        <!-- EMAIL -->

        <div class="campo">

            <label for="email">
                Email:
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $usuario->email) }}"
                required
            >

        </div>



        <!-- DIRECCIÓN -->

        <div class="campo">

            <label for="direccion">
                Dirección:
            </label>

            <input
                type="text"
                id="direccion"
                name="direccion"
                value="{{ old('direccion', $usuario->direccion) }}"
            >

        </div>



        <!-- TELÉFONO -->

        <div class="campo">

            <label for="telefono">
                Teléfono:
            </label>

            <input
                type="text"
                id="telefono"
                name="telefono"
                value="{{ old('telefono', $usuario->telefono) }}"
            >

        </div>



        <!-- FECHA DE NACIMIENTO -->

        <div class="campo">

            <label for="fecha_nac">
                Fecha de nacimiento:
            </label>

            <input
                type="date"
                id="fecha_nac"
                name="fecha_nac"
                value="{{ old('fecha_nac', $usuario->fecha_nac) }}"
            >

        </div>



        <!-- BOTONES -->

        <button type="submit">
            Actualizar Perfil
        </button>


        <a href="{{ route('perfil') }}">
            Cancelar
        </a>

    </form>

</main>

<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
