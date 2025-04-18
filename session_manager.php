<?php
session_start();

// Configurar la cookie de sesión para que expire al cerrar el navegador
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0, // Expira al cerrar el navegador
        'path' => '/',
        'domain' => '', // Deja vacío para localhost
        'secure' => isset($_SERVER['HTTPS']), // Solo cookies seguras si usas HTTPS
        'httponly' => true, // Evita acceso desde JavaScript
        'samesite' => 'Strict' // Evita que la cookie se envíe en solicitudes de terceros
    ]);
    session_start();
}

// Tiempo máximo de inactividad (30 minutos)
$tiempo_maximo_inactividad = 30*60; // 30 minutos en segundos

// Verificar inactividad
if (isset($_SESSION['ultima_actividad'])) {
    $tiempo_inactivo = time() - $_SESSION['ultima_actividad'];
    if ($tiempo_inactivo > $tiempo_maximo_inactividad) {
        session_unset();
        session_destroy();
        header('Location: login?error=2');
        exit();
    }
}

// Actualizar última actividad
$_SESSION['ultima_actividad'] = time();
?>