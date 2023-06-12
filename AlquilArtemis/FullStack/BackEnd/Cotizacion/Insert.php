<?php
require_once("../Config/Conectar.php");
require_once("./Cotizacion.php");
$Cotizacion = new Cotizacion();
$Cotizacion->IdCotizacion=$_POST["IdCotizacion"];
$Cotizacion->IdEmpleado=$_POST["IdEmpleado"];
$Cotizacion->IdProducto=$_POST["IdProducto"];
$Cotizacion->IdCliente=$_POST["IdCliente"];
$Cotizacion->Insert();
echo"
<script>
alert('Regsitro Exitoso');
document.location='../../FrontEnd/TableCotizaciones.php';
</script>
";

?>