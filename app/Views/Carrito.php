<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Urban Beat - Carrito de Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f0f0f0;
      font-family: Arial, sans-serif;
      padding-top: 80px;
      padding-bottom: 40px;
    }
    .logo-text {
      font-family: 'Bungee', cursive;
      font-size: 28px;
      color: #3f4f74;
      margin-left: 20px;
    }
    .container {
      max-width: 900px;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h1 {
      font-weight: bold;
      color: #2c3e50;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th {
      background-color: #2c3e50;
      color: white;
      padding: 15px;
    }
    td {
      padding: 15px;
      border-bottom: 1px solid #ddd;
    }
    tr:nth-child(even) { background-color: #b0c4de; }
    tr:nth-child(odd) { background-color: #87a8d0; }
    .btn {
      background-color: #2c3e50;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
      text-decoration: none;
    }
    .btn:hover { background-color: #34495e; }
    .total {
      font-size: 1.3em;
      text-align: right;
      margin-top: 15px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <span class="logo-text">Urban Beat</span>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="mujeres.php">Volver al catálogo</a></li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <h1 class="text-center mb-4">🛍️ Carrito de Compras</h1>

    <?php
    session_start();
    $usuario_id = $_GET["usuario_id"];

    // Conexión a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "urbanbeat");
    if ($mysqli->connect_errno) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Obtener productos del carrito en sesión
    $carrito = $_SESSION["carrito"][$usuario_id] ?? [];
    $productos = [];
    $total = 0;

    // Buscar datos reales de cada producto en la BD
    foreach ($carrito as $item) {
        $producto_id = $item["id"];
        $cantidad = $item["cantidad"];
        $query = $mysqli->prepare("SELECT nombre, precio, talla, color FROM productos WHERE id = ?");
        $query->bind_param("i", $producto_id);
        $query->execute();
        $result = $query->get_result();
        if ($row = $result->fetch_assoc()) {
            $row["cantidad"] = $cantidad;
            $productos[] = $row;
            $total += $row["precio"] * $cantidad;
        }
        $query->close();
    }
    ?>

    <?php if (count($productos) > 0): ?>
      <table>
        <thead>
          <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($productos as $i => $p): 
            $subtotal = $p["precio"] * $p["cantidad"];
          ?>
          <tr>
            <td><?= htmlspecialchars($p["nombre"]) ?></td>
            <td><?= htmlspecialchars($p["cantidad"]) ?></td>
            <td>Q<?= number_format($p["precio"], 2) ?></td>
            <td>Q<?= number_format($subtotal, 2) ?></td>
            <td>
              <a href="../controllers/carritoController.php?eliminar=<?= $i ?>&usuario_id=<?= $usuario_id ?>" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="total">
        Total: Q<?= number_format($total, 2) ?>
      </div>

      <div class="d-flex justify-content-between mt-4">
        <form action="../controllers/FacturaController.php" method="POST">
          <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
          <input type="hidden" name="accion" value="confirmar">
          <button type="submit" class="btn">Confirmar Compra</button>
        </form>
        <a href="mujeres.php" class="btn">Seguir Comprando</a>
      </div>

    <?php else: ?>
      <div class="alert alert-info text-center">
        Tu carrito está vacío 😢<br>
        <a href="mujeres.php" class="btn mt-3">Ver Catálogo</a>
      </div>
    <?php endif; ?>
  </div>

</body>
</html>