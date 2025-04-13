<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compra de Entradas - Cine</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <section class="formulario">
        <h2>Compra de Entradas</h2>
        <form action="cine.php" method="post">
            <label for="cliente">Nombre del Cliente:</label>
            <input type="text" name="cliente" id="cliente" required>
            <?php if (isset($_GET['errorNombre'])) echo "<p class='error'>{$_GET['errorNombre']}</p>"; ?>

            <label for="cantidad">Cantidad de Entradas:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" required>
            <?php if (isset($_GET['errorCantidad'])) echo "<p class='error'>{$_GET['errorCantidad']}</p>"; ?>

            <label for="pelicula">Película:</label>
            <select name="pelicula" id="pelicula" required>
                <option value="">-- Selecciona una película --</option>
                <option value="Avengers">Avengers</option>
                <option value="Spider-Man">Spider-Man</option>
                <option value="Oppenheimer">Oppenheimer</option>
            </select>

            <input type="submit" value="Comprar">
            <input type="reset" value="Limpiar">
        </form>
    </section>
</body>
</html>
