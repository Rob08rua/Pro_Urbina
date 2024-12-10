<?php
include '../Modelos/nav.php';
// Iniciar sesión
session_start();

// Si el carrito no está iniciado, inicializamos el carrito
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Función para agregar un producto al carrito
function addToCart($product_id, $quantity) {
    // Verifica si el producto ya está en el carrito
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity; // Aumenta la cantidad
    } else {
        $_SESSION['cart'][$product_id] = $quantity; // Agrega el producto
    }
}

// Función para quitar un producto del carrito
function removeFromCart($product_id) {
    unset($_SESSION['cart'][$product_id]); // Elimina el producto
}

// Procesar la acción de agregar al carrito
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $product_id = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
    addToCart($product_id, $quantity);
}

// Procesar la acción de eliminar del carrito
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $product_id = $_GET['product_id'];
    removeFromCart($product_id);
} 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Agregar Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Vista/Estilos/carrito.css">
</head>
<body>
    <div class="container">
        <!-- Mostrar contenido del carrito -->
        <h2 class="mt-5">Contenido del Carrito</h2>
        <ul class="list-group">
            <?php if (!empty($_SESSION['cart'])): ?>
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $product_id => $quantity):
                    $product = $products[$product_id];
                    $total += $product['price'] * $quantity;
                ?>
                    <li class="list-group-item cart-item">
                        <?php echo $product['name']; ?> - Cantidad: <?php echo $quantity; ?> - $<?php echo $product['price'] * $quantity; ?>
                        <a href="cart.php?action=remove&product_id=<?php echo $product_id; ?>" class="btn btn-danger btn-sm float-end">Eliminar</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">Tu carrito está vacío.</li>
            <?php endif; ?>
        </ul>

        <h3 class="total mt-3">Total: $<?php echo $total; ?></h3>

        <!-- Botón de pago (en un sistema real se conectaría con un sistema de pago) -->
        <?php if (!empty($_SESSION['cart'])): ?>
            <a href="checkout.php" class="btn btn-success mt-3">Ir a pagar</a>
        <?php endif; ?>
    </div>

    <!-- Agregar Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    </div>

    <div class="container">
        
    </div>
    <?php
       include '../Modelos/footer.php';
    ?>
</body>
</html>
