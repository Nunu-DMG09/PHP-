<?php
// Inicializar variables
$nombre = $carrera = $promedio = "";
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validación de nombre
    $nombre = trim($_POST["nombre"]);
    if (empty($nombre)) {
        $errores['nombre'] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        $errores['nombre'] = "El nombre solo debe contener letras y espacios.";
    }

    // Validación de carrera
    $carrera = $_POST["carrera"];
    if (empty($carrera)) {
        $errores['carrera'] = "Debe seleccionar una carrera.";
    }

    // Validación de promedio
    $promedio = $_POST["promedio"];
    if ($promedio === "") {
        $errores['promedio'] = "El promedio es obligatorio.";
    } elseif (!is_numeric($promedio) || $promedio < 0 || $promedio > 20) {
        $errores['promedio'] = "El promedio debe ser un número entre 0 y 20.";
    }

    // Si no hay errores, redirigir a resultado
    if (empty($errores)) {
        session_start();
        $_SESSION['nombre'] = $nombre;
        $_SESSION['carrera'] = $carrera;
        $_SESSION['promedio'] = $promedio;
        header("Location: mensualidad.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensualidad Universitaria</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <section class="container">
        <h2>Registro de Mensualidad</h2>
        <form action="" method="post">
            <label for="nombre">Nombre del Alumno:</label><br>
            <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
            <?php if (isset($errores['nombre'])): ?>
                <p class="error"><?= $errores['nombre'] ?></p>
            <?php endif; ?>
            <br>
            <br>


            <label for="carrera">Carrera:</label><br>
            <select name="carrera" id="carrera" required>
                <option value="">Seleccione una carrera</option>
                <option value="ingenieria" <?= $carrera == "ingenieria" ? "selected" : "" ?>>Ingeniería</option>
                <option value="medicina" <?= $carrera == "medicina" ? "selected" : "" ?>>Medicina</option>
                <option value="derecho" <?= $carrera == "derecho" ? "selected" : "" ?>>Derecho</option>
                <option value="arquitectura" <?= $carrera == "arquitectura" ? "selected" : "" ?>>Arquitectura</option>
                <option value="educacion" <?= $carrera == "educacion" ? "selected" : "" ?>>Educación</option>
            </select>
            <?php if (isset($errores['carrera'])): ?>
                <p class="error"><?= $errores['carrera'] ?></p>
            <?php endif; ?>
            <br>
            <br>  
            
            
            <label for="promedio">Promedio de Notas:</label><br>
            <input type="number" step="0.01" name="promedio" id="promedio" value="<?= htmlspecialchars($promedio) ?>" required>
            <?php if (isset($errores['promedio'])): ?>
                <p class="error"><?= $errores['promedio'] ?></p>
            <?php endif; ?>
            <br>
            <br>

            
            <input type="submit" value="Calcular Mensualidad">
            <input type="reset" value="Limpiar">
        </form>
    </section>
</body>
</html>

