<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto - Tienda de Ropa</title>
    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">
</head>
<body>

    <!-- Encabezado / Barra Superior -->
    <header class="header-principal">
        <div class="header-left">
            <button class="btn-menu" aria-label="Abrir menú">
                <span></span>
                <span></span>
            </button>
            <a href="/" class="logo">TIENDA DE ROPA</a>
        </div>

        <div class="header-right">
            <a href="#buscar" class="nav-item">BUSCAR</a>
            <a href="#perfil" class="nav-item">MI CUENTA</a>
            <a href="#carrito" class="nav-item cesta">CESTA <span>[ 0 ]</span></a>
        </div>
    </header>

    <!-- Contenido Principal del Producto -->
    <main class="producto-contenedor">

        <!-- Columna Izquierda: Galería de Imágenes -->
        <section class="producto-galeria">
            <div class="imagen-item">
                <div class="placeholder-imagen">
                    <span>IMAGEN PRINCIPAL DEL PRODUCTO</span>
                </div>
            </div>
            <div class="imagen-item">
                <div class="placeholder-imagen">
                    <span>SEGUNDA VISTA / DETALLE</span>
                </div>
            </div>
        </section>

        <!-- Columna Derecha: Información del Producto -->
        <section class="producto-detalle">
            
            <div class="producto-cabecera">
                <h1 class="producto-titulo">NOMBRE DEL PRODUCTO</h1>
                <button class="btn-favorito" aria-label="Guardar en favoritos">♡</button>
            </div>

            <div class="producto-precio">
                <span>UYU 0,00</span>
            </div>

            <p class="nota-cuotas">*POSIBILIDAD DE PAGO EN CUOTAS SIN INTERESES</p>

            <div class="producto-variante">
                <span class="color-codigo">COLOR | CÓDIGO DE REFERENCIA</span>
            </div>

            <!-- Formulario de Selección y Compra -->
            <form action="/carrito/agregar" method="POST" class="form-producto">
                <input type="hidden" name="producto_id" value="">

                <!-- Selección de Talle -->
                <div class="grupo-selector">
                    <label for="talle" class="label-oculto">Seleccionar Talle</label>
                    <select name="talle" id="talle" class="select-talle" required>
                        <option value="" disabled selected>SELECCIONAR TALLE</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>

                <!-- Botón de Añadir Principal -->
                <button type="submit" class="btn-anadir">AÑADIR AL CARRITO</button>
            </form>

            <!-- Descripción del producto -->
            <div class="producto-descripcion">
                <p>Descripción detallada del producto. Aquí irá la información sobre el corte de la prenda, el tipo de tela, cuello, mangas y terminaciones generales.</p>
            </div>

        </section>

    </main>

    <!-- Pie de página -->
    <footer class="footer-principal">
        <span>TIENDA DE ROPA</span>
        <span>© 2026</span>
        <a href="#contacto">CONTACTO</a>
    </footer>

</body>
</html>
