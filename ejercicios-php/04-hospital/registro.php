<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    $sintomas = trim($_POST["sintomas"]);

    $errores = false;

    // Validar nombre solo letras
    if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        $errores = true;
        header("Location: index.html?errorNombre=El nombre solo debe contener letras.");
        exit();
    }

    // Validar edad
    if (!is_numeric($edad) || $edad < 0) {
        $errores = true;
        header("Location: index.html?errorEdad=Edad inválida.");
        exit();
    }

    if (!$errores) {
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Paciente Registrado</title>
            <style>
                body {
                    font-family: "Segoe UI", sans-serif;
                    background-color: #eafaf1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .contenedor {
                    background-color: #ffffff;
                    padding: 30px;
                    border-radius: 15px;
                    box-shadow: 0 0 15px rgba(0,0,0,0.1);
                    width: 450px;
                    text-align: center;
                }
                h2 {
                    color: #2d8a5d;
                    margin-bottom: 20px;
                }
                p {
                    color: #333;
                    font-size: 1.1em;
                    margin: 10px 0;
                }
                .volver {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 10px 20px;
                    background-color: #2d8a5d;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                }
                .volver:hover {
                    background-color: #24724b;
                }
            </style>
        </head>
        <body>
            <div class="contenedor">
                <h2>Paciente registrado correctamente</h2>
                <p><strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '</p>
                <p><strong>Edad:</strong> ' . htmlspecialchars($edad) . '</p>
                <p><strong>Sexo:</strong> ' . htmlspecialchars($sexo) . '</p>
                <p><strong>Síntomas:</strong> ' . nl2br(htmlspecialchars($sintomas)) . '</p>
                <a class="volver" href="index.php">Registrar otro paciente</a>
            </div>
        </body>
        </html>';
    }
}
?>


