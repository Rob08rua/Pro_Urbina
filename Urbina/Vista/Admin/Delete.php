<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Verificar si el administrador está logueado
if (!isset($_SESSION['admin_id'])) {
    //header("Location: ../Vista/Login_Admin.php");
    header("Login_Admin.php");
    exit();
}

//include('../Controlador/Conexion_BD.php');
include('conexion.php');

// Verificar si se ha recibido el ID del producto
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el producto
    $sql = "UPDATE productos SET activo = 0 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header("Location: Admin.php");
    exit();
} else {
    echo "Error: No se ha proporcionado el ID del producto.";
}
?>
