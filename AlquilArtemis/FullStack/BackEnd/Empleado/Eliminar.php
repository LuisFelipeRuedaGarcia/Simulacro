<?php
require_once("../Config/Conectar.php");
require_once("./Empleado.php");
$Empleado = new Empleado();
$Empleado->IdEmpleado=$_GET['id'];
$Empleado->Delete();
echo "
<script>
alert('Eliminación exotiosa');
document.location = '../../FrontEnd/TableEmpleados.php';
</script>
";
?>