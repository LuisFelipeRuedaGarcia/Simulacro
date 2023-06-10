<?php
require_once("../Config/Conectar.php");
require_once("./producto.php");
$producto = new Producto();
$producto->IdProducto = $_GET["id"];
$FetchOne = $producto->FetchOne();
var_dump($FetchOne);
if(isset($_POST["Editar"])){
    $producto->Nombre=$_POST["Nombre"];
    $producto->Update();
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
    <input type="submit" name="Editar">
</form>

