<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
     <link
        rel="stylesheet"
        href="{{ asset('css/pagina.css') }}"
    >
</head>
<body>
    
</body>
</html>
</head>


<body>


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

            <a href="#registro">
                Registrarse<span id="cantidad">0</span>
            </a>

            <a href="#login">
                Iniciar sesión
            </a>

        </nav>

    </header>


    <!-- =========================
         INICIO
    ========================= -->

    <main>

        <section class="hero">

            <div class="hero-logo">
                ABRIGO
            </div>

            <a
                href="#productos"
                class="arrow"
            >
                →
            </a>

        </section>


        <!-- =========================
             PRODUCTOS
        ========================= -->

        <section
            class="productos"
            id="productos"
        >

            <h2 class="titulo-seccion">
                Nueva colección
            </h2>

            <div class="grid">


                <div class="producto">

                    <span>
                        Producto 01
                    </span>

                </div>


                <div class="producto">

                    <span>
                        Producto 02
                    </span>

                </div>


                <div class="producto">

                    <span>
                        Producto 03
                    </span>

                </div>


                <div class="producto">

                    <span>
                        Producto 04
                    </span>

                </div>


                <div class="producto">

                    <span>
                        Producto 05
                    </span>

                </div>


                <div class="producto">

                    <span>
                        Producto 06
                    </span>

                </div>


            </div>

        </section>


        <!-- =========================
             NOSOTROS
        ========================= -->

        <section class="nosotros">

            <div class="nosotros-contenido">

                <h2>
                    Menos es más.
                </h2>

                <p>
                    Una página minimalista, elegante
                    y limpia. Podemos cambiar todo:
                    colores, imágenes, textos, botones,
                    animaciones, productos y estructura.
                </p>

            </div>

        </section>


    </main>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer id="contacto">

        <span>
            Mi página web
        </span>

        <span>
            © 2026
        </span>

        <span>
            Contacto
        </span>

    </footer>

</body>
</html>
