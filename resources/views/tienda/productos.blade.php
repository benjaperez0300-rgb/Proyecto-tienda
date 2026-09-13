```blade
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
         ENCABEZADO
    ========================= -->

    <header class="header-principal">

        <div class="header-left">

            <button
                class="btn-menu"
                aria-label="Abrir menú"
            >
                <span></span>
                <span></span>
            </button>

            <a href="/" class="logo">
                TIENDA DE ROPA
            </a>

        </div>


        <div class="header-right">

            <a href="buscar" class="nav-item">
                BUSCAR
            </a>

            <a href="perfil" class="nav-item">
                MI CUENTA
            </a>

            <a href="/carrito" class="nav-item carrito">
                CARRITO <span>[ 0 ]</span>
            </a>

        </div>

    </header>


    <!-- =========================
         PRODUCTO
    ========================= -->

    <main class="producto-contenedor">

        <!-- GALERÍA -->

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


        <!-- INFORMACIÓN DEL PRODUCTO -->

        <section class="producto-detalle">

            <div class="producto-cabecera">

                <h1 class="producto-titulo">
                    {{ $producto->nombre }}
                </h1>

                <button
                    class="btn-favorito"
                    aria-label="Guardar en favoritos"
                >
                    ♡
                </button>

            </div>


            <!-- PRECIO -->

            <div class="producto-precio">

                <span>
                    UYU {{ number_format($producto->precio, 2, ',', '.') }}
                </span>

            </div>


            <!-- CUOTAS -->

            <p class="nota-cuotas">
                *POSIBILIDAD DE PAGO EN CUOTAS SIN INTERESES
            </p>


            <!-- CÓDIGO DE BARRA -->

            <div class="producto-variante">

                <span class="color-codigo">
                    CÓDIGO | {{ $producto->codigo_barra }}
                </span>

            </div>


            <!-- INFORMACIÓN -->

            <div class="producto-descripcion">

                <p>
                    <strong>Material:</strong>
                    {{ $producto->material }}
                </p>

                <p>
                    <strong>Género:</strong>
                    {{ $producto->genero }}
                </p>

            </div>


            <!-- FORMULARIO -->

            <form
                action="/carrito/agregar"
                method="POST"
                class="form-producto"
            >

                @csrf

                <input
                    type="hidden"
                    name="producto_id"
                    value="{{ $producto->id }}"
                >


                <!-- TALLE -->

                <div class="grupo-selector">

                    <label
                        for="talle"
                        class="label-oculto"
                    >
                        Seleccionar Talle
                    </label>

                    <select
                        name="talle"
                        id="talle"
                        class="select-talle"
                        required
                    >

                        <option value="" disabled selected>
                            SELECCIONAR TALLE
                        </option>

                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>

                    </select>

                </div>


                <!-- BOTÓN -->

                <button
                    type="submit"
                    class="btn-anadir"
                >
                    AÑADIR AL CARRITO
                </button>

            </form>

        </section>

    </main>


    <!-- FOOTER -->

    <footer class="footer-principal">

        <span>
            TIENDA DE ROPA
        </span>

        <span>
            © 2026
        </span>

    </footer>

</body>

</html>
```
