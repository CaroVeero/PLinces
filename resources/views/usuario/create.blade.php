<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Crear usuario</h1>
    <!-- Errores -->
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>   
    @endif
    <form action="{{Route('usuario.registrar')}}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Ingresar nombre"> <br>
        <input type="text" name="email" placeholder="Ingresar email"> <br>
        <input type="password" name="password" placeholder="Ingrese contraseña"> <br>
        <input type="password" name="rePassword" placeholder="Ingrese nuevamente su contraseña"> <br>
        <input type="password" name="dayCode" placeholder="Ingrese código del día">
        <button type="submit">Ingresar</button>
    </form>
    <hr>
    Si usted tiene una cuenta, entonces <a href="/login">Inicie sesión</a>

</body>
</html>