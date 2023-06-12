<?php
require_once("../Config/Conectar.php");
require_once("./Cliente.php");
$Cliente = new Cliente();
$Cliente->IdCliente=$_GET["id"];
$FetchOne = $Cliente->FetchOne();

if(isset($_POST["Editar"])){
    $Cliente->IdCliente=$_POST["IdCliente"];
    $Cliente->Nombre=$_POST["Nombre"];
    $Cliente->Correo=$_POST["Correo"];
    $Cliente->Telefono=$_POST["Telefono"];
    $Cliente->Update($_GET["id"]);
    echo "
    <script>
    alert('Actualización Exitosa');
    document.location='../../FrontEnd/TableClientes.php';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdCliente">IdCliente</label>
        <input value="<?=$FetchOne[0]['IdCliente']?>" type="text" name="IdCliente" id="IdCliente">
        <br><label for="Nombre">Nombre</label>
        <input value="<?=$FetchOne[0]['Nombre']?>" type="text" name="Nombre" id="Nombre">
        <br><label for="Correo">Correo</label>
        <input value="<?=$FetchOne[0]['Correo']?>" type="text"  name="Correo" id="Correo">
        <br><label for="Telefono">Telefono</label>
        <input value="<?=$FetchOne[0]['Telefono']?>" type="Telefono" name="Telefono" id="Telefono">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>