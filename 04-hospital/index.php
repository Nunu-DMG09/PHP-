<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Pacientes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="formulario">
        <h2>Registro de Pacientes</h2>
        <form action="registro.php" method="post">
            <label for="nombre">Nombre completo:</label>
            <input type="text" name="nombre" required>
            <?php if (isset($_GET['errorNombre'])) echo "<p class='error'>".$_GET['errorNombre']."</p>"; ?>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" min="0" required>
            <?php if (isset($_GET['errorEdad'])) echo "<p class='error'>".$_GET['errorEdad']."</p>"; ?>

            <label for="sexo">Sexo:</label>
            <select name="sexo" required>
                <option value="">Seleccione</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>

            <label for="sintomas">Síntomas:</label>
            <textarea name="sintomas" rows="4" required></textarea>

            <input type="submit" value="Registrar">
            <input type="reset" value="Limpiar">
        </form>
    </div>
</body>
</html>

