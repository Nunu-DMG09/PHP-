<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>PAGO EMPLEADO</h1>
    </header>

    <section>
        <table>
            <form action="empleado.php" method="post">

                <tr>
                    <td width="200">Empleado</td>
                    <td><input type="text" name="txtEmpleado" id="" size="40"></td>
                </tr>
                <tr>
                    <td width="200">Horas Trabajadas</td>
                    <td><input type="text" name="txtHoras" id=""></td>
                </tr>
                <tr>
                    <td width="200">Tarifa por horas</td>
                    <td><input type="text" name="txtTarifa" id=""></td>
                </tr>
                <tr>
                    <td width="200"></td>
                    <td>
                        <input type="submit" value="Procesar">
                        <input type="reset" value="Limpiar">
                    </td>
                </tr>

                <!--Codigo PHP-->

                <?php

                $empleado = $_POST['txtEmpleado'];
                $horas = $_POST['txtHoras'];
                $tarifa = $_POST['txtTarifa'];

                //Realizar calculo
                $salario = $horas * $tarifa;
                $descuentoSeguroSalud = $salario * 0.12;
                $descuentoAfp = $salario * 0.10;
                $salario_neto = $salario - $descuentoSeguroSalud - $descuentoAfp;

                ?>

                <tr>
                    <td>Empleado:</td>
                    <td><?php echo $empleado; ?></td>
                </tr>

                <tr>
                    <td>Horas Trabajadas:</td>
                    <td><?php echo $horas; ?></td>
                </tr>

                <tr>
                    <td>Tarifa Horas:</td>
                    <td><?php echo "S/ ".  number_format($tarifa,2); ?></td>
                </tr>

                <tr>
                    <td>Salario Bruto:</td>
                    <td><?php echo "S/ ".  number_format($salario,2); ?></td>
                </tr>

                <tr>
                    <td>Descuento de Seguro:</td>
                    <td><?php echo "S/ ".  number_format($descuentoSeguroSalud,2); ?></td>
                </tr>

                <tr>
                    <td>Descuento de AFP:</td>
                    <td><?php echo "S/ ".  number_format($descuentoAfp,2); ?></td>
                </tr>

                <tr>
                    <td>Sueldo Neto:</td>
                    <td><?php echo "S/ ".  number_format($salario_neto,2); ?></td>
                </tr>

            </form>
        </table>
    </section>

</body>
</html>