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
    <?php if($errors->any()): ?>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>   
    <?php endif; ?>
    <form action="<?php echo e(Route('usuario.registrar')); ?>" method="POST">
        <?php echo csrf_field(); ?>
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
</html><?php /**PATH C:\Users\hp\Documents\GitHub\T2-70-DSW-I\PLinces\resources\views/usuario/create.blade.php ENDPATH**/ ?>