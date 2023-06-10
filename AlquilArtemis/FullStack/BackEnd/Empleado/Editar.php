<?php
echo $_GET["id"];
require_once("../Config/Conectar.php");
require_once("./Empleado.php");
$Empleado = new Empleado();
$Empleado->IdEmpleado=[$_GET["id"]];
$Array = $Empleado->FetchOne();
echo "zzz";
var_dump($Empleado->IdEmpleado) ;
echo "aquíiiiii";
var_dump($Array);
?>
<form action="" method="POST">
    <label for="IdEmpleado">ID</label>
    <input type="text" name="IdEmpleado" id="IdEmpleado" value="<?=$Array[0]['IdEmpleado']?>">
    <label for="Username">Username</label>
    <input type="text" name="Username" id="Username" value="<?= $Array[0]['Username']?>">
    <label for="Password">Contraseña</label>
    <input type="text"name="Password" id="Password" value="<?=$Array[0]['Password']?>">
    <input type="submit" name="Editar" value="Editar">
</form>