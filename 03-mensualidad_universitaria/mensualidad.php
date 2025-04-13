<?php
$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];
$promedio = $_POST['promedio'];

$mensualidadBase = 0;

// Determinar mensualidad base según carrera
switch ($carrera) {
    case 'ingenieria':
        $mensualidadBase = 800;
        break;
    case 'medicina':
        $mensualidadBase = 1000;
        break;
    case 'derecho':
        $mensualidadBase = 700;
        break;
    case 'arquitectura':
        $mensualidadBase = 900;
        break;
    case 'educacion':
        $mensualidadBase = 600;
        break;
    default:
        $mensualidadBase = 0;
        break;
}

// Aplicar descuento por buen promedio
$descuento = 0;

if ($promedio >= 18) {
    $descuento = 0.20; // 20%
} elseif ($promedio >= 16) {
    $descuento = 0.10; // 10%
} elseif ($promedio >= 14) {
    $descuento = 0.05; // 5%
}

$descuentoTotal = $mensualidadBase * $descuento;
$mensualidadFinal = $mensualidadBase - $descuentoTotal;
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
        <p><strong>Alumno:</strong> <?php echo $nombre; ?></p>
        <p><strong>Carrera:</strong> <?php echo ucfirst($carrera); ?></p>
        <p><strong>Promedio:</strong> <?php echo $promedio; ?></p>
        <p><strong>Mensualidad Base:</strong> S/ <?php echo number_format($mensualidadBase, 2); ?></p>
        <p><strong>Descuento:</strong> S/ <?php echo number_format($descuentoTotal, 2); ?></p>
        <p><strong>Mensualidad Final:</strong> S/ <?php echo number_format($mensualidadFinal, 2); ?></p>
    </section>
</body>
</html>
