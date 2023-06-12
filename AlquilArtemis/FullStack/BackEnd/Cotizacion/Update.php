<?php
require_once("../Config/Conectar.php");
require_once("./Cotizacion.php");
$Cotizacion = new Cotizacion();
$Cotizacion->IdCotizacion=$_GET["id"];
$FetchOne = $Cotizacion->FetchOne();

if(isset($_POST["Editar"])){
    $Cotizacion->IdCotizacion=$_POST["IdCotizacion"];
    $Cotizacion->IdEmpleado=$_POST["IdEmpleado"];
    $Cotizacion->IdProducto=$_POST["IdProducto"];
    $Cotizacion->IdCliente=$_POST["IdCliente"];
    $Cotizacion->Update($_GET["id"]);
    echo "
    <script>
    alert('Actualización Exitosa');
    document.location='../../FrontEnd/TableCotizaciones.php';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdCotizacion">IdCotizacion</label>
        <input value="<?=$FetchOne[0]['IdCotizacion']?>" type="text" name="IdCotizacion" id="IdCotizacion">
        <br><label for="IdEmpleado">IdEmpleado</label>
        <input value="<?=$FetchOne[0]['IdEmpleado']?>" type="text" name="IdEmpleado" id="IdEmpleado">
        <br><label for="IdProducto">IdProducto</label>
        <input value="<?=$FetchOne[0]['IdProducto']?>" type="text"  name="IdProducto" id="IdProducto">
        <br><label for="IdCliente">IdCliente</label>
        <input value="<?=$FetchOne[0]['IdCliente']?>" type="IdCliente" name="IdCliente" id="IdCliente">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>