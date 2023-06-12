<?php
require_once("../Config/Conectar.php");
require_once("./Empleado.php");
$Empleado = new Empleado();
$Empleado->Username=$_POST["Username"];
$Empleado->Password=$_POST["Password"];
if($Empleado->Login()){
    header("location:../../FrontEnd/Home.php");
    echo 3;
}else{
    echo "<script>
    alert('Usuario/Password INVALIDOS');
    document.location='../../FrontEnd/LoginRegister.php'
    </script>";
    echo 5;
}
?>