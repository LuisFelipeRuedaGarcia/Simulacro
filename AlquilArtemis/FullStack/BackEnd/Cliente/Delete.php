<?php 
require_once("./Cliente.php");
$Cliente = new Cliente();
$Cliente->IdCliente=$_GET["id"];
/* $Cliente->Delete(); */
echo"
<script>
alert('Eliminación exitosa');
document.location='../../FrontEnd/TableClientes.php';
</script>
";
?>