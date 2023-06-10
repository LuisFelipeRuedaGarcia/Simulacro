<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
require_once("../BackEnd/Config/Conectar.php");
require_once("../BackEnd/Producto/producto.php");
$Producto = new Producto();
$AllProductos=$Producto->Fetch();
var_dump($AllProductos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Productos</title>
    <h1>Productos</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>

<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="../BackEnd/Producto/Registro.php" method="POST">
            <div class="modal-body">

                    <label for="Nombre">Nombre</label>
                    <input type="text" id="Nombre" name="Nombre">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar"/>
        </form>
      </div>
    </div>
  </div>
</div>
    <Table>
        <thead>
            <th>Id</th>
            <th>Producto</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    1
                </td>
                <td>
                    example
                </td>
            </tr>

            <?php 
          foreach($AllProductos as $key => $value){
            echo "
            <tr>
              <td>
                  {$value["IdProducto"]}
              </td>
              <td>
                  {$value["Nombre"]}
              </td>
            </tr>
            ";
          }
          ?>
        </tbody>
    </Table>
</head>
<body>
    
</body>
</html>