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
    $Cotizacion->Fecha=$_POST["Fecha"];
    $Cotizacion->Hora=$_POST["Hora"];
    $Cotizacion->DuracionDias=$_POST["DuracionDias"];
    $Cotizacion->PrecioPorDia=$_POST["PrecioPorDia"];
    $Cotizacion->TotalPesos=$_POST["TotalPesos"];
   
/*     echo "<br>IdCotizacion".$Cotizacion->IdCotizacion;
    echo "<br>IdEmpleado".$Cotizacion->IdEmpleado;
    echo "<br>IdProducto".$Cotizacion->IdProducto;
    echo "<br>IdCliente".$Cotizacion->IdCliente;
    echo "<br>Fecha".$Cotizacion->Fecha;
    echo "<br>Hora".$Cotizacion->Hora;
    echo "<br>DuracionDias".$Cotizacion->DuracionDias;
    echo "<br>PrecioPorDia".$Cotizacion->PrecioPorDia;
    echo "<br>TotalPesos".$Cotizacion->TotalPesos;
    echo "<br> oldid".$_GET["id"]; */

/* IdCotizacion690
IdEmpleado10051079830
IdProducto1
IdCliente69222
Fecha2020-02-20
Hora02:22:22
DuracionDias2
PrecioPorDia2000
TotalPesos4000
oldid69 */

    $Cotizacion->Update($_GET["id"]);
    echo "
    <script>
    alert('Actualización Exitosa');
    document.location='../../FrontEnd/TableCotizaciones.php';
    </script>
    ";
}
?>
<!DOCTYPE text>
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
        <input value="<?=$FetchOne[0]['IdCliente']?>" type="text" name="IdCliente" id="IdCliente">

        <br><label for="Fecha">Fecha</label>
        <input value="<?=$FetchOne[0]['Fecha']?>" type="text" name="Fecha" id="Fecha">

        <br><label for="Hora">Hora</label>
        <input value="<?=$FetchOne[0]['Hora']?>" type="text" name="Hora" id="Hora">

        <br><label for="DuracionDias">DuracionDias</label>
        <input value="<?=$FetchOne[0]['DuracionDias']?>" type="text" name="DuracionDias" id="DuracionDias">

        <br><label for="PrecioPorDia">PrecioPorDia</label>
        <input value="<?=$FetchOne[0]['PrecioPorDia']?>" type="text" name="PrecioPorDia" id="PrecioPorDia">

        <br><label for="TotalPesos">TotalPesos</label>
        <input value="<?=$FetchOne[0]['TotalPesos']?>" type="text" name="TotalPesos" id="TotalPesos">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>