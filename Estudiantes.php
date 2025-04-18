<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el rol de administrador
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] !== 'estudiante' && $_SESSION['rol'] !== 'admin')) {
    header('Location: login'); // Redirigir al inicio de sesión
    exit;
}
?>

<!-- Código HTML -->
<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" href="styles.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página TEC</title>
    <link class="icono" rel="website icon" href="https://i.postimg.cc/m26svsjB/logo-tec-enca2.png" type="png">
</head>

<body>
    <!-- Botón de menú hamburguesa -->
    <button id="menu-toggle" class="menu-toggle">
            <img src='https://i.postimg.cc/94ysdZ6j/menu.png' border='0' alt='menu' width='30' height='30'/>
    </button>

    <!-- Menú lateral -->   
    <div class="sidebar">
            <h2>Menú</h2>
            <ul>
                <li><button id="btn-estudiantes">Mis datos</button></li>
                <li><button id="btn-carreras">Carreras y Materias</button></li>
            </ul>
            <form action="logout_C" method="POST">
                <button class="logout-button">Cerrar sesión</button>
            </form>
    </div>

    <!-- Contenido -->
    <div class="content">
            <div class="header-buttons">
                <div class="theme-switch">
                    <input type="checkbox" id="toggle-mode" />
                    <label for="toggle-mode" class="switch">
                        <div class="sphere"></div>
                    </label>
                </div>
            </div>              

        <h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
        <h2>Bienvenido <?php echo $_SESSION['ID']; ?></h2>
        <div id="resultado"></div>
    </div>     
</body>

<script src= "Barra.js"></script>
<script src="tema.js"></script>

<script>
    // Función para cargar datos dinámicamente
    function cargarDatos(accion) {
        fetch(`Estudiantes_C.php?accion=${accion}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('resultado').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }

    // Eventos para los botones
    document.getElementById('btn-estudiantes').addEventListener('click', function() {
        cargarDatos('lista_estudiantes');
    });

    document.getElementById('btn-carreras').addEventListener('click', function() {
        cargarDatos('carreras_materias');
    });
</script>


</html>