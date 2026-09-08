<!DOCTYPE html> <html lang="es"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nuestras vestimentas</title>

<style>
    /* =========================
       CATÁLOGO
    ========================= */

    .catalogo {
        min-height: 100vh;
        padding: 120px 32px 60px;
        background: #f7f7f7;
    }

    .titulo-seccion {
        text-align: center;
        font-family: Georgia, "Times New Roman", serif;
        font-size: 40px;
        font-weight: normal;
        margin: 0 0 15px;
    }

    .subtitulo-seccion {
        text-align: center;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: #777;
        margin-bottom: 60px;
    }

    /* =========================
       GRID DE CATEGORÍAS
    ========================= */

    .grid-categorias {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .categoria {
        background: white;
        height: 500px;

        display: flex;
        align-items: center;
        justify-content: center;

        position: relative;
        overflow: hidden;

        cursor: pointer;
    }

    /* Fondo de cada categoría */

    .categoria::before {
        content: "";
        position: absolute;
        inset: 0;

        background: linear-gradient(
            135deg,
            #eeeeee,
            #d5d5d5
        );

        transition: transform 0.5s ease;
    }

    .categoria:hover::before {
        transform: scale(1.05);
    }

    /* Información de la categoría */

    .categoria-info {
        position: relative;
        z-index: 2;

        background: white;

        padding: 18px 30px;

        text-align: center;
    }

    .numero-categoria {
        display: block;

        font-family: Georgia, "Times New Roman", serif;

        font-size: 28px;

        margin-bottom: 8px;
    }

    .nombre-categoria {
        display: block;

        font-size: 12px;

        text-transform: uppercase;

        letter-spacing: 3px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .grid-categorias {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media (max-width: 600px) {

        .catalogo {
            padding: 80px 20px 40px;
        }

        .titulo-seccion {
            font-size: 32px;
        }

        .subtitulo-seccion {
            font-size: 11px;
            margin-bottom: 40px;
        }

        .grid-categorias {
            grid-template-columns: 1fr;
        }

        .categoria {
            height: 400px;
        }

    }
</style>

</head> <body>
<!-- =========================
     CATÁLOGO DE VESTIMENTAS
========================= -->

<section class="catalogo" id="catalogo">

    <h1 class="titulo-seccion">
        Nuestras vestimentas
    </h1>

    <p class="subtitulo-seccion">
        Explora nuestras categorías
    </p>


    <div class="grid-categorias">


        <!-- CATEGORÍA #01 -->

        <div class="categoria">

            <div class="categoria-info">

                <span class="numero-categoria">
                    #01
                </span>

                <span class="nombre-categoria">
                    Vestimenta clásica
                </span>

            </div>

        </div>


        <!-- CATEGORÍA #02 -->

        <div class="categoria">

            <div class="categoria-info">

                <span class="numero-categoria">
                    #02
                </span>

                <span class="nombre-categoria">
                    Vestimenta casual
                </span>

            </div>

        </div>


        <!-- CATEGORÍA #03 -->

        <div class="categoria">

            <div class="categoria-info">

                <span class="numero-categoria">
                    #03
                </span>

                <span class="nombre-categoria">
                    Vestimenta urbana
                </span>

            </div>

        </div>


        <!-- CATEGORÍA #04 -->

        <div class="categoria">

            <div class="categoria-info">

                <span class="numero-categoria">
                    #04
                </span>

                <span class="nombre-categoria">
                    Vestimenta formal
                </span>

            </div>

        </div>


        <!-- CATEGORÍA #05 -->

        <div class="categoria">

            <div class="categoria-info">

                <span class="numero-categoria">
                    #05
                </span>

                <span class="nombre-categoria">
                    Vestimenta deportiva
                </span>

            </div>

        </div>


        <!-- CATEGORÍA #06 -->

        <div class="categoria">

            <div class="categoria-info">

                <span class="numero-categoria">
                    #06
                </span>

                <span class="nombre-categoria">
                    Nueva colección
                </span>

            </div>

        </div>


    </div>

</section>

</body> </html>
