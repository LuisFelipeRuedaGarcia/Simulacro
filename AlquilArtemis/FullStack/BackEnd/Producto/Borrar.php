<?php 

require_once("../Config/Conectar.php");
require_once("./Producto.php");

$Producto = new Producto();
$Producto->IdProducto=$_GET["id"];
$Producto->Delete();
echo "
<script>
alert('Eliminación Exitosa');
document.location='../../FrontEnd/TableProductos.php';
</script>
";

?>