<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Usuarios</title>
</head>
<body>
    <main class="contenedor">
        @if(session('mensaje'))
            <div class="mensaje mensaje-exito">
                {{ session('mensaje') }}
            </div>
        @endif
        @if($errors->any())
           <div class="mensaje mensaje-error">
            <p>Revisa los siguientes campos:</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Editar Usuarios</h1>
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ $usuario->name }}" required>
            </div>
            <div class="campo">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="{{ $usuario->apellido }}" required>
            </div>
            <div class="campo">
                <label for="fecha_nac">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nac" name="fecha_nac" value="{{ $usuario->fecha_nac }}" required>
            </div>
            <div class="campo">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ $usuario->email }}" required>
            </div>
            <div class="campo">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="{{ $usuario->telefono }}" required>
            </div>
            <div class="campo">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="{{ $usuario->direccion }}" required>
            </div>
    
</body>
</html>