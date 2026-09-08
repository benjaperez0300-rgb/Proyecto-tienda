<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - Tienda de Ropa</title>

    <!-- Enlace a tu CSS (Asegúrate de ajustar la ruta según tu entorno) -->
    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">
    <!-- <link rel="stylesheet" href="pagina.css"> -->
</head>

<!-- Agregamos min-height y flexbox al body para empujar el footer al fondo siempre -->
<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0;">

    <!-- =========================
         HEADER
    ========================= -->
    <header>
        <div class="logo">
            TIENDA DE ROPA
        </div>

        <div class="search">
            BUSCAR
        </div>

        <nav class="menu">
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ url('/categorias') }}">Categorías</a>
            <a href="{{ url('/carrito') }}">Carrito</a>
            <a href="#registro">Registrarse</a>
            <a href="#login">Iniciar sesión</a>
        </nav>
    </header>


    <!-- =========================
         CONTENIDO PRINCIPAL
    ========================= -->
    <!-- flex-grow: 1 hace que la sección ocupe todo el espacio sobrante -->
    <main style="flex: 1;">
        <section class="productos">
            
            <h1 class="titulo-seccion">
                Colecciones
            </h1>

            <!-- Menú rápido de géneros -->
            <div class="menu" style="justify-content: center; margin-bottom: 50px; gap: 30px;">
                <a href="#hombre">Hombre</a>
                <a href="#mujer">Mujer</a>
                <a href="#ninos">Niños</a>
            </div>

            <!-- SECCIÓN HOMBRE -->
            <h2 id="hombre" style="font-family: Georgia, serif; font-weight: normal; margin: 40px 0 20px; text-transform: uppercase; font-size: 20px; letter-spacing: 2px;">
                Hombre
            </h2>
            
            <div class="grid">
                <div class="producto" onclick="location.href='{{ url('/productos?genero=hombre&tipo=camperas') }}'">
                    <span>Camperas</span>
                </div>

                <div class="producto" onclick="location.href='{{ url('/productos?genero=hombre&tipo=buzos') }}'">
                    <span>Buzos</span>
                </div>

                <div class="producto" onclick="location.href='{{ url('/productos?genero=hombre&tipo=pantalones') }}'">
                    <span>Pantalones</span>
                </div>
            </div>

            <!-- SECCIÓN MUJER -->
            <h2 id="mujer" style="font-family: Georgia, serif; font-weight: normal; margin: 60px 0 20px; text-transform: uppercase; font-size: 20px; letter-spacing: 2px;">
                Mujer
            </h2>

            <div class="grid">
                <div class="producto" onclick="location.href='{{ url('/productos?genero=mujer&tipo=camperas') }}'">
                    <span>Camperas</span>
                </div>

                <div class="producto" onclick="location.href='{{ url('/productos?genero=mujer&tipo=buzos') }}'">
                    <span>Buzos</span>
                </div>

                <div class="producto" onclick="location.href='{{ url('/productos?genero=mujer&tipo=pantalones') }}'">
                    <span>Pantalones</span>
                </div>
            </div>

            <!-- SECCIÓN NIÑOS -->
            <h2 id="ninos" style="font-family: Georgia, serif; font-weight: normal; margin: 60px 0 20px; text-transform: uppercase; font-size: 20px; letter-spacing: 2px;">
                Niños
            </h2>

            <div class="grid">
                <div class="producto" onclick="location.href='{{ url('/productos?genero=ninos&tipo=camperas') }}'">
                    <span>Camperas</span>
                </div>

                <div class="producto" onclick="location.href='{{ url('/productos?genero=ninos&tipo=buzos') }}'">
                    <span>Buzos</span>
                </div>

                <div class="producto" onclick="location.href='{{ url('/productos?genero=ninos&tipo=pantalones') }}'">
                    <span>Pantalones</span>
                </div>
            </div>

        </section>
    </main>


    <!-- =========================
         FOOTER
    ========================= -->
    <footer style="margin-top: 80px;">
        <span>Mi página web</span>
        <span>© 2026</span>
        <span>Contacto</span>
    </footer>

</body>
</html>
