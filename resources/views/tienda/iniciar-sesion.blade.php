<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">

    <title>Iniciar Sesión</title>

</head>

<body>

    <header>

        <a href="{{ route('tienda.pagina') }}" class="logo">
            TIENDA DE ROPA
        </a>

        <nav class="menu">

            <a href="{{ route('registro') }}">
                Registrarse
            </a>

            <a href="{{ route('login') }}">
                Iniciar sesión
            </a>

        </nav>

    </header>


    <main class="contenedor">

        <h1>
            Iniciar sesión
        </h1>

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


       

        <form
            action="{{ route('login.post') }}"
            method="POST"
        >

            @csrf


            <div class="campo">

                <label for="email">
                    Email:
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >

            </div>


            <div class="campo">

                <label for="password">
                    Contraseña:
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >

            </div>


            <button type="submit">
                Iniciar sesión
            </button>

        </form>

    </main>

    <footer id="contacto">

        <span>
            Mi página web
        </span>

        <span>
            © {{ date('Y') }}
        </span>

        <span>
            Contacto
        </span>

    </footer>

<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
