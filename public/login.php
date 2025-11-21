<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login — IPV</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body style="padding: 40px;">

    <h2>Iniciar sesión</h2>

    <form method="POST" action="../src/controllers/AuthController.php?action=login">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>

</body>
</html>
<a href="../src/controllers/AuthController.php?action=logout">Cerrar sesión</a>
