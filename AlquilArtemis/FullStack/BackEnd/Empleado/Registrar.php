<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
require_once("../Config/Conectar.php");
require_once("./Empleado.php");
$Empleado = new Empleado();
$Empleado->IdEmpleado=$_POST["IdEmpleado"];
$Empleado->Username=$_POST["Username"];
$Empleado->Password=$_POST["Password"];

echo "dsfgvabrgnbrymdtuj,";
if($Empleado->CheckUsername()){
    echo "<script>
    alert('Usuario ya existente, toma otro nombre');</script>";
}else{
    $Empleado->Insert();
    echo "<script>
    alert('Registro Exitoso');
    </script>";
}

if(isset($_POST["Registrar"]))
    {
        echo "<script>
        document.location='../../FrontEnd/TableEmpleados.php'
        </script>";
    /* header("location:../../FrontEnd/TableEmpleados.php"); */
}
else{

    echo "<script>
    document.location='../../../FrontEnd/LoginRegister.php'
    </script>";
/*     header("location:../../FrontEnd/LoginRegister.php"); */
}
?>