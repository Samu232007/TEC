<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el rol de administrador
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] !== 'administrativo' && $_SESSION['rol'] !== 'admin')) {
    header('Location: login'); // Redirigir al inicio de sesión
    exit;
}
?>

<html lang="en">
    <link rel="stylesheet" href="styles.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link class="icono" rel="website icon" href="https://i.postimg.cc/m26svsjB/logo-tec-enca2.png" type="png">
</head>
<body>

<div class="switch-button">
    <!-- Checkbox -->
    <input type="checkbox" name="switch-button" id="toggle-mode" class="switch-button__checkbox">
    <!-- Botón -->
    <label for="switch-label" class="switch-button__label"></label>
</div>

    <h1>Welcome administrativo</h1>
    <form action="logout_C">
    <button>cerrar sesión</button>
    </form>
    <h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
</body>

<script src="tema.js"></script>

</html>