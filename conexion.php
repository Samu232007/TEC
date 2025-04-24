<?php
// Parámetros de conexión
$host = "tec-database.cwpm8282m1nc.us-east-1.rds.amazonaws.com";
$dbname = "Base_datos_TEC";
$user = "postgres";
$password = "SamuMoraChaves23";

// Conexión a la base de datos
$conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos.");
}
?>
