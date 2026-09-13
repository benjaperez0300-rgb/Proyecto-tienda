<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">
    <title>Editar Perfil</title>
</head>
<body>
    <main class="contenedor">
        <h1>Editar Perfil</h1>
        <form action="{{ route('perfil.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $usuario->email }}" required>
            </div>
            <div class="campo">
                <label for="contraseña">Contraseña:</label>
                <input type="text" id="contraseña" name="contraseña" value="{{ $usuario->contraseña }}" required>
            </div>
            <div class="campo">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="{{ $usuario->direccion }}" required>
            </div>
            <div class="campo">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="{{ $usuario->telefono }}" required>
            </div>
            <button type="submit">Actualizar Perfil</button>
        </form>
    </main>
</body>
</html>