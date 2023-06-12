<?php
require_once("../Config/Conectar.php");
require_once("./Producto.php");
$Producto = new Producto();
$Producto->IdProducto = $_GET["id"];
$FetchOne = $Producto->FetchOne();
if(isset($_POST["Editar"])){
    $Producto->Nombre=$_POST["Nombre"];
    $Producto->Precio=$_POST["Precio"];
    $Producto->Update();
    echo "
    <script>
    alert('actualización exitosa');
    document.location='../../FrontEnd/TableProductos.php';
    </script>
    ";
}
?>
<form action="" method="Post">
    <h1>Editar</h1>
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre"
    value="<?=$FetchOne[0]["Nombre"] ?>"/>

    <label for="Precio">Precio</label>
    <input type="text" name="Precio" id="Precio"
    value="<?=$FetchOne[0]["Precio"] ?>"/>
    <input type="submit" name="Editar">
</form>

