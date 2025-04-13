<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = trim($_POST["cliente"]);
    $cantidad = $_POST["cantidad"];
    $pelicula = $_POST["pelicula"];

    $errores = false;

    // Validación del nombre
    if (!preg_match("/^[a-zA-Z\s]+$/", $cliente)) {
        $errores = true;
        header("Location: index.php?errorNombre=Solo se permiten letras en el nombre.");
        exit();
    }

    // Validación de cantidad
    if (!is_numeric($cantidad) || $cantidad <= 0) {
        $errores = true;
        header("Location: index.php?errorCantidad=La cantidad debe ser un número positivo.");
        exit();
    }

    if (!$errores) {
        $precio_unitario = 18.50;
        $total = $precio_unitario * $cantidad;

        echo '<link rel="stylesheet" href="estilo.css">';
        echo '<div class="resultado-cine">';
        echo "<h2>Compra Realizada</h2>";
        echo "<p><strong>Cliente:</strong> $cliente</p>";
        echo "<p><strong>Película:</strong> $pelicula</p>";
        echo "<p><strong>Cantidad de Entradas:</strong> $cantidad</p>";
        echo "<p><strong>Total a Pagar:</strong> S/ " . number_format($total, 2) . "</p>";
        echo '</div>';
    }
}
?>

