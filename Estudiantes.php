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
    

    <!-- Menú lateral -->   
    <div class="sidebar">
            <h2>Menú</h2>
            <ul>
                <li><button id="btn-inicio">Inicio</button></li>
                <li><button id="btn-estudiantes">Mis datos</button></li>
                <li><button id="btn-carreras">Carreras y Materias</button></li>
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

    <div class="content">
        <h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
        <h2>Bienvenido <?php echo $_SESSION['ID']; ?></h2>
        
        <div class="dashboard" id="dashboard"></div>

    </div>     
</body>

<script src= "Barra.js"></script>
<script src="tema.js"></script>

<script>
    // Función para cargar datos dinámicamente en tarjetas específicas
    function cargarDatos(accion, tarjetaId) {
        fetch(`Estudiantes_C.php?accion=${accion}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById(tarjetaId).innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }

    function crearTarjeta(id, titulo) {
        const dashboard = document.getElementById('dashboard');
        const card = document.createElement('div');
        card.className = 'card';
        card.innerHTML = `
            <h3>${titulo}</h3>
            <div id="${id}"></div>
        `;
        dashboard.appendChild(card);
    }

    function limpiarDashboard() {
        const dashboard = document.getElementById('dashboard');
        dashboard.innerHTML = ''; // Elimina todo el contenido del contenedor
    }

    // Redirigir automáticamente a Estudiantes_C.php con la acción 'inicio'
    window.onload = function() {
        limpiarDashboard(); // Limpia el dashboard
        crearTarjeta('tarjeta1', 'Calendario'); // Crea la tarjeta para el calendario
        cargarDatos('calendario', 'tarjeta1'); // Carga los datos en la tarjeta
        crearTarjeta('tarjeta2', 'Horario'); // Crea la tarjeta para el horario
        cargarDatos('horario', 'tarjeta2'); // Carga los datos en la tarjeta
    };

    // Eventos para los botones
    document.getElementById('btn-inicio').addEventListener('click', function() {
        limpiarDashboard(); // Limpia el dashboard
        crearTarjeta('tarjeta1', 'Calendario'); // Crea la tarjeta para el calendario
        cargarDatos('calendario', 'tarjeta1'); // Carga los datos en la tarjeta
        crearTarjeta('tarjeta2', 'Horario'); // Crea la tarjeta para el horario
        cargarDatos('horario', 'tarjeta2'); // Carga los datos en la tarjeta
    });

    document.getElementById('btn-estudiantes').addEventListener('click', function() {
        limpiarDashboard(); // Limpia el dashboard
        crearTarjeta('tarjeta1', 'Mis Datos'); // Crea la tarjeta para los datos personales
        cargarDatos('inf_personal', 'tarjeta1'); // Carga los datos en la tarjeta
        crearTarjeta('tarjeta2', 'Mis materias'); 
        cargarDatos('materias', 'tarjeta2'); 
    });

    document.getElementById('btn-carreras').addEventListener('click', function() {
        limpiarDashboard(); // Limpia el dashboard
        crearTarjeta('tarjeta1', 'Carreras y Materias'); // Crea la tarjeta para carreras y materias
        cargarDatos('carreras_materias', 'tarjeta1'); // Carga los datos en la tarjeta
    });
</script>


</html>