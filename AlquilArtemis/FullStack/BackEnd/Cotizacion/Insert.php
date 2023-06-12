<?php
require_once("../Config/Conectar.php");
require_once("./Cotizacion.php");
$Cotizacion = new Cotizacion();
$Cotizacion->IdCotizacion=$_POST["IdCotizacion"];
$Cotizacion->IdEmpleado=$_POST["IdEmpleado"];
$Cotizacion->IdProducto=$_POST["IdProducto"];
$Cotizacion->IdCliente=$_POST["IdCliente"];
$Cotizacion->Fecha=$_POST["Fecha"];
$Cotizacion->Hora=$_POST["Hora"];
$Cotizacion->DuracionDias=$_POST["DuracionDias"];
$Cotizacion->PrecioPorDia=$_POST["PrecioPorDia"];
$Cotizacion->TotalPesos=$_POST["TotalPesos"];
$Cotizacion->Insert();

echo"
<script>
alert('Registro Exitoso');
document.location='../../FrontEnd/TableCotizaciones.php';
</script>
";

?>