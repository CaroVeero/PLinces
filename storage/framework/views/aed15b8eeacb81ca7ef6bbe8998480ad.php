<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Inicio de sesión</h1>
    <!-- Errores -->
    <?php if($errors->any()): ?>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>({ $error})</li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>   
    <?php endif; ?>
    <form action="<?php echo e(Route('usuario.validar')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="email" placeholder="Ingresar email"> <br>
        <input type="password" name="password" placeholder="Ingrese contraseña"> <br>
        <button type="submit">Ingresar</button>
    </form>
    <hr>
    Si no tiene una cuenta, <a href="">haga click aquí</a>

</body>
</html><?php /**PATH C:\Users\hp\Documents\GitHub\T2-70-DSW-I\PCaro\resources\views/usuario/login.blade.php ENDPATH**/ ?>