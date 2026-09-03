<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Tienda de Ropa</title>
    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">
</head>
<body>

    <header>
        <div class="logo">
            TIENDA DE ROPA
        </div>

        <nav class="menu">
            <a href="#registro">
                Registrarse <span id="cantidad">0</span>
            </a>
            <a href="#login">Iniciar sesión</a>
            <a href="#contacto">Ayuda</a>
        </nav>
    </header>

    <main class="contenedor">
        <section id="registro">
            <h1>Crea tu cuenta</h1>

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
            @endif

            <form action="/registro" method="POST">
                @csrf

                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                </div>

                <div class="campo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                </div>

                <div class="campo">
                    <label for="fecha_nac">Fecha de nacimiento:</label>
                    <input type="date" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac') }}" required>
                </div>

                <div class="campo">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                </div>

                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="campo">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit">Registrarse</button>
            </form>
        </section>
    </main>

    <footer id="contacto">
        <span>Mi página web</span>
        <span>© 2026</span>
        <span>Contacto</span>
    </footer>

</body>
</html>
    
     

    
        
    
