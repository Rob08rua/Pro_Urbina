<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
define('MONEDA', '$');

// Verificar si el administrador está logueado
if (!isset($_SESSION['admin_id'])) {
    //header("Location: ../Vista/Login_Admin.php");
    header("Location: Login_Admin.php");
    exit();
}

// Obtener los datos del administrador
$admin_id = $_SESSION['admin_id'];
$admin_username = $_SESSION['admin_username'];

// Incluir los archivos necesarios
//include('../Modelos/nav.php');
//include('../Controlador/Conexion_BD.php');
include('nav.php');
include('conexion.php');

// Consulta para obtener todos los productos
//$sql = "SELECT * FROM Producto WHERE activo = 1";
$sql = "SELECT * FROM productos WHERE activo = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="../Vista/Estilos/admin.css">-->
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4">Bienvenido al Panel de Administración, <?php echo htmlspecialchars($admin_username); ?></h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Gestión de Productos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Botón para agregar un nuevo producto -->
                            <div class="col-md-3">
                                <a href="save.php" class="btn btn-success btn-lg btn-block">Agregar Producto</a>
                            </div>
                        </div>
                        <br>

                        <!-- Tabla para listar los productos -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($producto['nombre']); ?></td> <!-- Ajusta el nombre de la clave -->
                                    <td><?php echo MONEDA . htmlspecialchars($producto['precio']); ?></td> <!-- Ajusta la clave del precio -->
                                    <td><?php echo htmlspecialchars($producto['cantidad']); ?></td>
                                    <td>
                                        <!--id_Producto-->
                                        <a href="Edit.php?id=<?php echo $producto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="Delete.php?id=<?php echo $producto['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Botón de salir -->
        <div class="mb-4">
          <a href="logout.php" class="btn btn-danger btn-sm">Cerrar sesión</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
