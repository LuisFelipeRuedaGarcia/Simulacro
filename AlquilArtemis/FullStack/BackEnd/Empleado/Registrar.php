<?php
require_once("../Config/Conectar.php");
require_once("./Empleado.php");
$empleado = new Empleado();
$empleado->IdEmpleado=$_POST["IdEmpleado"];
$empleado->Username=$_POST["Username"];
$empleado->Password=$_POST["Password"];
$empleado->Insert();
echo "<script>
alert('Registro Exitoso');
document.location='../../FrontEnd/TableEmpleados.php'
</script>";
?>