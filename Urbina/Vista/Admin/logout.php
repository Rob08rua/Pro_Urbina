<?php
// Iniciar la sesión
session_start();

// Verificar si la sesión ya está activa
if (isset($_SESSION['admin_id'])) {
    // Destruir todas las variables de sesión
    session_unset();

    // Destruir la sesión
    session_destroy();

    // Redirigir al usuario a la página de login
    header("Location: Login_Admin.php");
    exit();
} else {
    // Si no hay sesión activa, redirigir directamente al login
    header("Location: Login_Admin.php");
    exit();
}
?>