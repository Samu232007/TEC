<?php
include 'session_manager.php'; 

// Verificar si el usuario ha iniciado sesión y tiene el rol de administrador
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] !== 'admin')) {
    header('Location: login'); // Redirigir al inicio de sesión
    exit;
}
?>

<html lang="en">
    <link rel="stylesheet" href="styles.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link class="icono" rel="website icon" href="https://i.postimg.cc/m26svsjB/logo-tec-enca2.png" type="png">
</head>

<body>

    <!-- Menú lateral -->   
    <div class="sidebar">
            <h2>Menú</h2>
            <ul>
                <li><button id="btn-estudiantes">Página de estudiantes</button></li>
                <li><button id="btn-docentes">Página de docentes</button></li>
                <li><button id="btn-administrativos">Página de administrativos</button></li>
            </ul>
            <form action="logout_C" method="POST">
                <button class="logout-button">Cerrar sesión</button>
            </form>
    </div>
    
    <nav class="header-buttons">
            <div class="theme-switch">
                    <input type="checkbox" id="toggle-mode" />
                        <label for="toggle-mode" class="switch">
                            <div class="sphere"></div>
                        </label>
            </div>
                <button id="menu-toggle" class="menu-toggle">
                    <img src='https://i.postimg.cc/94ysdZ6j/menu.png' border='0' alt='menu' width='30' height='30'/>
                </button>
    </nav>  

    <!-- Contenido -->
    <div class="content">

    <h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
    
    <div class="terminal">
        <div id="terminal-output" class="terminal-output"></div>
        <div class="terminal-input">
            <span class="prompt">Base_datos_TEC-#</span>
            <input type="text" id="command-input" autocomplete="on" placeholder="Escribe tu comando SQL aquí">
        </div>
    </div>
</body>

<script src= "Barra.js"></script>
<script src="tema.js"></script>

<script src="terminal.js"></script>

<script>
    // Función para cargar datos dinámicamente
    function cargarDatos(accion) {
        fetch(`Admin_C.php?accion=${accion}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('resultado').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }

    // Eventos para los botones
    document.getElementById('btn-estudiantes').addEventListener('click', function() {
        window.location.href = 'Estudiantes'; // Redirigir a la página de estudiantes
    });

    document.getElementById('btn-docentes').addEventListener('click', function() {
        window.location.href = 'Docentes'; // Redirigir a la página de estudiantes
    });

    document.getElementById('btn-administrativos').addEventListener('click', function() {
        window.location.href = 'Administrativos'; // Redirigir a la página de estudiantes
    });
</script>

</html>
