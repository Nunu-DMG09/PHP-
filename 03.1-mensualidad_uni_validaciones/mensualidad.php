<?php
session_start();

if (!isset($_SESSION['nombre'], $_SESSION['carrera'], $_SESSION['promedio'])) {
    header("Location: index.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$carrera = $_SESSION['carrera'];
$promedio = floatval($_SESSION['promedio']);

// Mensualidades base
$mensualidades = [
    "ingenieria" => 800,
    "medicina" => 1000,
    "derecho" => 700,
    "arquitectura" => 900,
    "educacion" => 600
];

$mensualidadBase = $mensualidades[$carrera];
$descuento = 0;

if ($promedio >= 18) {
    $descuento = 0.20;
} elseif ($promedio >= 16) {
    $descuento = 0.10;
} elseif ($promedio >= 14) {
    $descuento = 0.05;
}

$descuentoTotal = $mensualidadBase * $descuento;
$mensualidadFinal = $mensualidadBase - $descuentoTotal;
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <section class="container">
        <h2>Resumen de Mensualidad</h2>
        <p><strong>Alumno:</strong> <?= htmlspecialchars($nombre) ?></p>
        <p><strong>Carrera:</strong> <?= ucfirst($carrera) ?></p>
        <p><strong>Promedio:</strong> <?= number_format($promedio, 2) ?></p>
        <p><strong>Mensualidad Base:</strong> S/ <?= number_format($mensualidadBase, 2) ?></p>
        <p><strong>Descuento:</strong> S/ <?= number_format($descuentoTotal, 2) ?></p>
        <p><strong><u>Mensualidad Final:</u></strong> S/ <?= number_format($mensualidadFinal, 2) ?></p>
        <a href="index.php">← Calcular otra mensualidad</a>
    </section>
</body>
</html>

