<?php 
require_once("../Config/Conectar.php");
require_once("./Cotizacion.php");
$Cotizacion = new Cotizacion();
$Cotizacion->IdCotizacion=$_GET["id"];
$Cotizacion->Delete();
echo"
<script>
alert('Eliminación exitosa');
document.location='../../FrontEnd/TableCotizaciones.php';
</script>
";
?>