<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Validar credenciales
$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$password'";
$result = pg_query($conexion, $query);


//añadir mensaje de error si no se encuentra el usuario
if (!$result) {
    die("Error al ejecutar la consulta.");
}

if (pg_num_rows($result) > 0) {
    // Iniciar sesión y redirigir según el rol
    session_start();

    // Obtener el ID del estudiante (Num_cedula) si el rol es estudiante
    $consulta = "SELECT Num_cedula FROM estudiante WHERE correo = '$usuario'";
    $data = pg_query($conexion, $consulta);

    if ($data && pg_num_rows($data) > 0) {
        $ID = pg_fetch_assoc($data);
        $_SESSION['ID'] = $ID['num_cedula']; // Almacena el Num_cedula en la sesión
    } else {
        $_SESSION['ID'] = null; // Si no se encuentra, asigna null
    }

    $user = pg_fetch_assoc($result);
    $_SESSION['rol'] = $user['rol'];
    $_SESSION['nombre'] = $user['nombre']; // Almacena el nombre de usuario

    switch ($user['rol']) {
        case 'admin':
            header('Location: Admin');
            break;

        case 'estudiante':
            header('Location: Estudiantes');
            break;

        case 'docente':
            header('Location: Docentes');
            break;    
            
        case 'administrativo':
            header('Location: Administrativos');
            break;  
    }

} else {
    header('Location: login?error=1');
}


pg_close($conexion);
?>