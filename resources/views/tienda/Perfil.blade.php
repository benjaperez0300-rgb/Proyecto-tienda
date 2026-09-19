<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mi perfil</title>

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


<main class="contenedor">

    @if (session('mensaje'))

        <div class="mensaje mensaje-exito">

            {{ session('mensaje') }}

        </div>

    @endif


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

    <section class="perfil">

        <h1>
            Perfil de Usuario
        </h1>


        <h2>
            Información del Perfil
        </h2>


        <p>
            <strong>Nombre:</strong>
            {{ $usuario->nombre }} {{ $usuario->apellido }}
        </p>


        <p>
            <strong>Email:</strong>
            {{ $usuario->email }}
        </p>


        <p>
            <strong>Teléfono:</strong>

            {{ $usuario->telefono ?? 'No especificado' }}

        </p>


        <p>
            <strong>Dirección:</strong>

            {{ $usuario->direccion ?? 'No especificada' }}

        </p>


        <p>
            <strong>Fecha de nacimiento:</strong>

            {{ $usuario->fecha_nac ?? 'No especificada' }}

        </p>


        <a href="{{ route('perfil.edit') }}">
            Editar Perfil
        </a>

    </section>

    <section class="historial">

        <h2>
            Historial de compras
        </h2>


        @if ($pedidos->isEmpty())

            <p>
                No has realizado ninguna compra aún.
            </p>

        @else

            <ul>

                @foreach ($pedidos as $pedido)

                    <li>

                        <strong>
                            Orden #{{ $pedido->id }}
                        </strong>

                        -

                        {{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y') }}

                        <br>

                        Total:

                        ${{ number_format($pedido->total, 2, ',', '.') }}

                    </li>

                @endforeach

            </ul>

        @endif

    </section>

    <div class="volver">

    <a href="{{ route('tienda.pedidos') }}">
        Ver todos mis pedidos
    </a>

</div>

    <div class="volver">

        <a href="{{ route('tienda.pagina') }}">
            ← Volver a la tienda
        </a>

    </div>


</main>

<script src="{{ asset('js/perfil.js') }}"></script>
</body>

</html>
