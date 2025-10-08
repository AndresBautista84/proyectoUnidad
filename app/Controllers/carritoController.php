<?php
session_start();
require_once __DIR__ . '/../models/producto.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_id = $_POST["usuario_id"];
    $producto_id = $_POST["producto_id"];
    $cantidad = $_POST["cantidad"];

    // Obtener datos reales del producto desde la BD
    $producto = Producto::buscarPorId($producto_id);

    if ($producto) {
        $item = [
            "id" => $producto_id,
            "cantidad" => $cantidad
        ];
        $_SESSION["carrito"][$usuario_id][] = $item;
    }

    header("Location: ../views/Carrito.php?usuario_id=$usuario_id");
    exit;
}

// Eliminar producto del carrito
if (isset($_GET["eliminar"])) {
    $usuario_id = $_GET["usuario_id"];
    $indice = $_GET["eliminar"];
    if (isset($_SESSION["carrito"][$usuario_id][$indice])) {
        unset($_SESSION["carrito"][$usuario_id][$indice]);
        $_SESSION["carrito"][$usuario_id] = array_values($_SESSION["carrito"][$usuario_id]);
    }
    header("Location: ../views/Carrito.php?usuario_id=$usuario_id");
    exit;
}
?>
<?php
session_start();

if (isset($_GET["eliminar"])) {
    $usuario_id = $_GET["usuario_id"];
    $indice = $_GET["eliminar"];
    if (isset($_SESSION["carrito"][$usuario_id][$indice])) {
        unset($_SESSION["carrito"][$usuario_id][$indice]);
        $_SESSION["carrito"][$usuario_id] = array_values($_SESSION["carrito"][$usuario_id]); // Reindexar
    }
    header("Location: ../views/Carrito.php?usuario_id=$usuario_id");
    exit;
}
?>