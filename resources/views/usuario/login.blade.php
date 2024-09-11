<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Inicio de sesión</h1>
    <!-- Errores -->
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>   
    @endif
    <form action="{{Route('usuario.validar')}}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Ingresar email"> <br>
        <input type="password" name="password" placeholder="Ingrese contraseña"> <br>
        <button type="submit">Ingresar</button>
    </form>
    <hr>
    Si no tiene una cuenta, <a href="{{Route('usuario.registrar')}}">haga click aquí</a>

</body>
</html>