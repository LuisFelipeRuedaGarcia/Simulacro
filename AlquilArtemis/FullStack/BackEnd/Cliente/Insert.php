<?php
require_once("../Config/Conectar.php");
require_once("./Cliente.php");
$Cliente = new Cliente();
$Cliente->IdCliente=$_POST["IdCliente"];
$Cliente->Nombre=$_POST["Nombre"];
$Cliente->Correo=$_POST["Correo"];
$Cliente->Telefono=$_POST["Telefono"];
$Cliente->Insert();
echo"
<script>
alert('Regsitro Exitoso');
document.location='../../FrontEnd/TableClientes.php';
</script>
";

?>