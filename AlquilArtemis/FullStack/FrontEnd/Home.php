<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlquilArtemis</title>
</head>
<body>
    <h1>Bienvenido <?=$_SESSION["Username"]?> </h1>
    <fieldset>
        <legend>
            Ir a...
        </legend>
        <a href="./TableClientes.php">Clientes</a>
        <a href="./TableCotizaciones.php">Cotizaciones</a>
        <a href="./TableEmpleados.php">Empleados</a>
        <a href="./TableProductos.php">Productos</a>
    </fieldset>
</body>
</html>