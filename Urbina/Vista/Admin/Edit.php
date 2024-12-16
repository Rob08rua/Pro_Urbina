<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Verificar si el administrador está logueado
if (!isset($_SESSION['admin_id'])) {
    //header("Location: ../Vista/Login_Admin.php");
    header("Location: Login_Admin.php");
    exit();
}

//include('../Controlador/Conexion_BD.php');
include('conexion.php');
$producto = null;

//if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_Producto'])) {
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    //$id_Producto = $_GET['id_Producto'];
    $id_Producto = $_GET['id'];

    // Consultar los detalles del producto
    //$sql = "SELECT * FROM Producto WHERE id_Producto = ?";
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_Producto]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        echo "Producto no encontrado.";
        exit();
    }    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    // Actualizar el producto en la base de datos
    //$sql = "UPDATE Producto SET Nombre_Producto = ?, Precio = ?, Descripcion_Producto = ? WHERE id_Producto = ?";
    $sql = "UPDATE productos SET nombre = ?, precio = ?, cantidad = ?, descripcion = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre, $precio, $cantidad, $descripcion, $id_Producto]);

    header("Location: Admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Editar Producto</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($producto['cantidad']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
