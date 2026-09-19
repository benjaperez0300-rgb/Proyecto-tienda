<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Finalizar compra | Tienda de Ropa</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/pagina.css') }}"
    >

</head>

<body>

    <header>

        <a
            href="{{ route('tienda.pagina') }}"
            class="logo"
        >
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

    @if(session('error'))
    <p>
        {{ session('error') }}
    </p>
@endif

@if(session('success'))
    <p>
        {{ session('success') }}
    </p>
@endif

        <h1>
            Finalizar compra
        </h1>


        <!-- =========================
             DATOS DE ENTREGA
        ========================= -->

        <section>

            <h2>
                Datos de entrega
            </h2>


            @if (!$usuario->direccion)

                <p>
                    No tenés una dirección registrada.
                </p>

                <a href="{{ route('perfil') }}">
                    Completar mi dirección
                </a>

            @else

                <p>

                    <strong>
                        Dirección:
                    </strong>

                    {{ $usuario->direccion }}

                </p>

            @endif

        </section>


        <!-- =========================
             RESUMEN DE LA COMPRA
        ========================= -->

        <section>

            <h2>
                Resumen de la compra
            </h2>


            @php
                $total = 0;
            @endphp


            @foreach ($carrito->productos as $item)

                @php

                    $subtotal =
                        $item->producto->precio *
                        $item->cantidad;

                    $total += $subtotal;

                @endphp


                <div>

                    <h3>
                        {{ $item->producto->nombre }}
                    </h3>


                    @if ($item->variante)

                        <p>

                            <strong>
                                Talle:
                            </strong>

                            {{ $item->variante->talle->nombre }}

                        </p>


                        <p>

                            <strong>
                                Color:
                            </strong>

                            {{ $item->variante->color->nombre }}

                        </p>

                    @endif


                    <p>

                        <strong>
                            Cantidad:
                        </strong>

                        {{ $item->cantidad }}

                    </p>


                    <p>

                        <strong>
                            Precio:
                        </strong>

                        UYU
                        {{ number_format(
                            $item->producto->precio,
                            2,
                            ',',
                            '.'
                        ) }}

                    </p>


                    <p>

                        <strong>
                            Subtotal:
                        </strong>

                        UYU
                        {{ number_format(
                            $subtotal,
                            2,
                            ',',
                            '.'
                        ) }}

                    </p>

                </div>

                <hr>

            @endforeach


            <h3>

                Total:

                UYU
                {{ number_format(
                    $total,
                    2,
                    ',',
                    '.'
                ) }}

            </h3>

        </section>


        <!-- =========================
             MÉTODO DE PAGO
        ========================= -->

        <section>

            <h2>
                Método de pago
            </h2>


            <form
                action="{{ route('checkout.confirmar') }}"
                method="POST"
            >

                @csrf


                <!-- MÉTODO DE PAGO -->

                <label for="metodo_pago">

                    Método de pago

                </label>


                <select
                    name="metodos_pagos_id"
                    id="metodo_pago"
                    required
                >

                    <option value="">
                        Seleccioná un método de pago
                    </option>


                    @foreach ($metodosPagos as $metodo)

                        <option
                            value="{{ $metodo->id }}"
                        >

                            {{ $metodo->nombre }}

                        </option>

                    @endforeach

                </select>


                <br><br>


                <!-- CUOTAS -->

                <label for="numero_cuota">

                    Cantidad de cuotas

                </label>


                <select
                    name="numero_cuota"
                    id="numero_cuota"
                    required
                >

                    <option value="">
                        Seleccioná las cuotas
                    </option>

                    <option value="1">
                        1 cuota
                    </option>

                    <option value="3">
                        3 cuotas
                    </option>

                    <option value="6">
                        6 cuotas
                    </option>

                    <option value="12">
                        12 cuotas
                    </option>

                </select>


                <br><br>


                <!-- CONFIRMAR -->

                <button type="submit">

                    Confirmar compra

                </button>

            </form>

        </section>

    </main>


    <footer>

        <span>
            TIENDA DE ROPA
        </span>

        <span>
            © {{ date('Y') }}
        </span>

    </footer>

<script src="{{ asset('js/checkout.js') }}"></script>
</body>

</html>