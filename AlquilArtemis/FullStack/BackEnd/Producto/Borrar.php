<?php 

require_once("../Config/Conectar.php");
require_once("./producto.php");

$producto = new Producto();
$producto->IdProducto=$_GET["id"];
$producto->Delete();
echo "
<script>
alert('Eliminación Exitosa');
document.location='../../FrontEnd/TableProductos.php';
</script>
";

?>