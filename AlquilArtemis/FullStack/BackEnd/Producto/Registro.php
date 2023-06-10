<?php

    require_once("../Config/Conectar.php");
    require_once("./producto.php");
    $producto = new Producto();
/*     $producto->IdProducto=$_POST["IdProducto"]; */
    $producto->Nombre=$_POST["Nombre"];
    $producto->Insert();
    echo"<script>
    alert('Registro Exitoso');
    document.location='../../FrontEnd/TableProductos.php';</script>
    ";


?>