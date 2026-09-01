<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="{{ asset('css/pagina.css') }}"
    >
    <title>Iniciar Sesion</title>
</head>
<body>
    <header>

        <div class="logo">
            TIENDA DE ROPA
        </div>

        <nav class="menu">

            <a href="#registro">
                Registrarse<span id="cantidad">0</span>
            </a>

            <a href="#login">
                Iniciar sesión
            </a>

            <a href="#contacto">
                Ayuda
            </a>

        </nav>

    </header>
    <main class="contenedor">
        <h1>Iniciar sesión</h1>
        @if (session('mensaje'))
            <div class="mensaje mensaje-exito">
                {{ session('mensaje') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mensaje mensaje-error">

                <p>Revisa los siguientes campos:</p>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
            <form action="/login" method="post">
                @csrf
                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="campo">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Iniciar sesión</button>
            </form>
    </main>
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