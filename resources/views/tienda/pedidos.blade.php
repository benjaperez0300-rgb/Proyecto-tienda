<!DOCTYPE html>

<html lang="es">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mis pedidos | Tienda de Ropa</title>

<link rel="stylesheet" href="{{ asset('css/pagina.css') }}">


</head>

<body>

<header>


<a href="{{ route('tienda.pagina') }}" class="logo">
    TIENDA DE ROPA
</a>

<nav class="menu">

    <a href="{{ route('tienda.pagina') }}">
        Inicio
    </a>

    <a href="{{ route('tienda.catalogo') }}">
        Catálogo
    </a>

    <a href="{{ route('tienda.carrito') }}">
        Carrito
    </a>

</nav>


</header>

<main class="contenedor">


<h1>Mis pedidos</h1>

@if (session('success'))

    <div class="mensaje mensaje-exito">
        {{ session('success') }}
    </div>

@endif


@if (session('error'))

    <div class="mensaje mensaje-error">
        {{ session('error') }}
    </div>

@endif


@if ($pedidos->isEmpty())

    <p>
        Todavía no realizaste ningún pedido.
    </p>

    <a href="{{ route('tienda.catalogo') }}">
        Ver catálogo
    </a>

@else

   @foreach ($pedidos as $pedido)

    <section class="pedido">

        <h2>
            Pedido #{{ $pedido->id }}
        </h2>

        <p>
            <strong>Fecha:</strong>
            {{ $pedido->fecha_pedido }}
        </p>

        <p>
            <strong>Estado:</strong>
            {{ $pedido->estadosPedido->nombre ?? 'Sin estado' }}
        </p>


        <h3>Productos</h3>

        @foreach ($pedido->productosPedido as $detalle)

            <div class="producto-pedido">

                <p>
                    <strong>Producto:</strong>
                    {{ $detalle->variante->producto->nombre }}
                </p>

                <p>
                    <strong>Talle:</strong>
                    {{ $detalle->variante->talle->nombre }}
                </p>

                <p>
                    <strong>Color:</strong>
                    {{ $detalle->variante->color->nombre }}
                </p>

                <p>
                    <strong>Cantidad:</strong>
                    {{ $detalle->cantidad }}
                </p>

                <p>
                    <strong>Precio:</strong>
                    ${{ number_format($detalle->precio, 2, ',', '.') }}
                </p>

            </div>

        @endforeach


        <p>
            <strong>Subtotal:</strong>
            ${{ number_format($pedido->subtotal, 2, ',', '.') }}
        </p>

        <p>
            <strong>Total:</strong>
            ${{ number_format($pedido->total, 2, ',', '.') }}
        </p>

    </section>

@endforeach

@endif


</main>

<footer>


<span>
    TIENDA DE ROPA
</span>

<span>
    © {{ date('Y') }}
</span>


</footer>

</body>

</html>
