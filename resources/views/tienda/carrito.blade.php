<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi carrito | Tienda de Abrigos</title>

    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>

<body>

    <header>

        <a href="{{ route('tienda.pagina') }}" class="logo">
            Tienda de Abrigos
        </a>

        <nav>
            <a href="{{ route('tienda.pagina') }}">
                Inicio
            </a>

            <a href="{{ route('tienda.carrito') }}">
                Mi carrito
            </a>
        </nav>

    </header>


    <main>

        <section class="titulo">

            <h1>Mi carrito</h1>

            <p>
                Revisá los productos que agregaste.
            </p>

        </section>


        {{-- MENSAJE DE ÉXITO --}}

        @if(session('success'))

            <div class="mensaje mensaje-exito">
                {{ session('success') }}
            </div>

        @endif


        {{-- MENSAJE DE ERROR --}}

        @if(session('error'))

            <div class="mensaje mensaje-error">
                {{ session('error') }}
            </div>

        @endif


        {{-- CARRITO CON PRODUCTOS --}}

        @if($carrito && $carrito->productos->count() > 0)

            @php
                $total = 0;
            @endphp


            <div class="carrito-contenido">


                {{-- PRODUCTOS --}}

                <section class="lista-productos">

                    <h2>Productos</h2>


                    @foreach($carrito->productos as $item)

                        @php
                            $subtotal = $item->producto->precio * $item->cantidad;
                            $total += $subtotal;
                        @endphp


                        <article class="producto">

                            <div class="producto-info">

                                   <h3> 
                                     {{ $item->producto->nombre }}
                                    </h3>


                                   <p class="precio"> 
                                    Precio:
                                     ${{ number_format($item->producto->precio, 2, ',', '.') }}
                                   </p>


                                   @if ($item->variante)
                                      <p> 
                                        <strong>Talle:</strong>
                                        {{ $item->variante->talle->nombre }}
                                      </p>
                                       
                                       <p>
                                         <strong>Color:</strong>
                                         {{ $item->variante->color->nombre }}
                                       </p>
                                   @endif



                                {{-- FORMULARIO PARA ACTUALIZAR CANTIDAD --}}

                                <form
                                    action="{{ route('carrito_productos.actualizar', $item->id) }}"
                                    method="POST"
                                    class="form-cantidad"
                                >

                                    @csrf

                                    @method('PUT')

                                    <label for="cantidad-{{ $item->id }}">
                                        Cantidad:
                                    </label>

                                    <input
                                        type="number"
                                        id="cantidad-{{ $item->id }}"
                                        name="cantidad"
                                        value="{{ $item->cantidad }}"
                                        min="1"
                                    >

                                    <button type="submit">
                                        Actualizar
                                    </button>

                                </form>

                            </div>


                            <div class="producto-acciones">

                                <p class="subtotal">
                                    ${{ number_format($subtotal, 2, ',', '.') }}
                                </p>


                                {{-- ELIMINAR PRODUCTO --}}

                                <form
                                    action="{{ route('carrito_productos.destroy', $item->id) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-eliminar"
                                    >
                                        Quitar
                                    </button>

                                </form>

                            </div>

                        </article>

                    @endforeach

                </section>



                {{-- RESUMEN --}}

                <aside class="resumen">

                    <h2>Resumen</h2>


                    <div class="resumen-linea">

                        <span>
                            Productos
                        </span>

                        <span>
                            {{ $carrito->productos->count() }}
                        </span>

                    </div>


                    <div class="resumen-linea total">

                        <span>
                            Total
                        </span>

                        <span>
                            ${{ number_format($total, 2, ',', '.') }}
                        </span>

                    </div>


                   <a href="{{ route('checkout') }}"class="btn-comprar"> Continuar con la compra</a>

                </aside>

            </div>


        {{-- CARRITO VACÍO --}}

        @else

            <section class="carrito-vacio">

                <h2>
                    Tu carrito está vacío
                </h2>

                <p>
                    Todavía no agregaste ningún producto.
                </p>

                <a
                    href="{{ route('tienda.pagina') }}"
                    class="btn-comprar"
                >
                    Ver productos
                </a>

            </section>

        @endif


        <div class="volver">

            <a href="{{ route('tienda.pagina') }}">
                ← Volver a la tienda
            </a>

        </div>

    </main>
<script src="{{ asset('js/carrito.js') }}"></script>
</body>

</html>