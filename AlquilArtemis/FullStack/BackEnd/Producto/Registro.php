<?php

    require_once("../Config/Conectar.php");
    require_once("./Producto.php");
    $Producto = new Producto();
/*     $Producto->IdProducto=$_POST["IdProducto"]; */
    $Producto->Nombre=$_POST["Nombre"];
    $Producto->Precio=$_POST["Precio"];
    $Producto->Insert();
    echo"<script>
    alert('Registro Exitoso');
    document.location='../../FrontEnd/TableProductos.php';
    </script>
    ";


?>