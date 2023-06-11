<?php
/* echo $_GET["id"]; */
require_once("../Config/Conectar.php");
require_once("./Empleado.php");
$Empleado = new Empleado();
$Empleado->IdEmpleado=$_GET["id"];
$Array = $Empleado->FetchOne();

if(isset($_POST["Editar"])){
echo"algo!";
    $Empleado->Username = $_POST["Username"];
    $Empleado->Password = $_POST["Password"];
    $Empleado->IdEmpleado = $_POST["IdEmpleado"];

    $Empleado->Update($_GET["id"]);
    echo "
    <script>
    alert('actualización exitosa');
    document.location='../../FrontEnd/TableEmpleados.php';
    </script>
    ";
}
?>
<form action="" method="POST">
    <label for="IdEmpleado">ID</label>
    <input type="text" name="IdEmpleado" id="IdEmpleado" value="<?=$Array[0]['IdEmpleado']?>">
    <label for="Username">Username</label>
    <input type="text" name="Username" id="Username" value="<?= $Array[0]['Username']?>">
    <label for="Password">Contraseña</label>
    <input type="text" name="Password" id="Password" value="123">
    <input type="submit" name="Editar" value="Editar">
</form>