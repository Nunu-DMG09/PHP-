<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Formulario de Trabajo</title>
</head>
<body>
    <section>
        <form action="" method="post">
            <h2>Formulario de Registro de Trabajo</h2>

            <label for="nombre">Nombre del Empleado:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="horas">Horas Trabajadas:</label>
            <input type="number" name="horas" id="horas" min="0" required>

            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria" required>
                <option value="">Seleccione una categoría</option>
                <option value="jefe">Jefe</option>
                <option value="administrativo">Administrativo</option>
                <option value="tecnico">Técnico</option>
                <option value="operario">Operario</option>
                <option value="gerencial">Gerencial</option>
                <option value="practicante">Practicante</option>
            </select>

            <input type="submit" value="Enviar">
            <input type="reset" value="Limpiar">
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $empleado = $_POST['nombre'];
            $horas = $_POST['horas'];
            $categoria = $_POST['categoria'];

            // Tarifa por categoría
            $tarifa = 0;
            switch ($categoria) {
                case "jefe":
                    $tarifa = 50;
                    break;
                case "administrativo":
                    $tarifa = 40;
                    break;
                case "tecnico":
                    $tarifa = 30;
                    break;
                case "operario":
                    $tarifa = 25;
                    break;
                case "gerencial":
                    $tarifa = 20;
                    break;
                case "practicante":
                    $tarifa = 10;
                    break;
            }

            $sueldo_bruto = $horas * $tarifa;
            $descuento_salud = $sueldo_bruto * 0.12;
            $descuento_afp = $sueldo_bruto * 0.10;
            $descuento_total = $descuento_salud + $descuento_afp;
            $sueldo_neto = $sueldo_bruto - $descuento_total;

            echo "<div class='resultados'>";
            echo "<h3>Resultados del Cálculo</h3>";
            echo "<p><strong>Empleado:</strong> $empleado</p>";
            echo "<p><strong>Puesto:</strong> $categoria</p>";
            echo "<p><strong>Sueldo Bruto:</strong> S/ " . number_format($sueldo_bruto, 2) . "</p>";
            echo "<p><strong>Descuento Total:</strong> S/ " . number_format($descuento_total, 2) . "</p>";
            echo "<p><strong>Sueldo Neto:</strong> S/ " . number_format($sueldo_neto, 2) . "</p>";
            echo "</div>";
        }
        ?>
    </section>
</body>
</html>