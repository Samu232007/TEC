<?php
// Parámetros de conexión
$host = "localhost";
$dbname = "Base_datos_TEC";
$user = "postgres";
$password = "admin";

// Conexión a la base de datos
$conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos.");
}
?>