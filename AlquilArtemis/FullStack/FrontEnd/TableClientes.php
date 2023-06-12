<?php
require_once("../BackEnd/Config/Conectar.php");
require_once("../BackEnd/Cliente/Cliente.php");

$Cliente = new Cliente();
$All=$Cliente->Fetch();
var_dump($All);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../BackEnd/Cliente/Insert.php" method="POST">
      <div class="modal-body">
        <br><label for="IdCliente">IdCliente</label>
        <input type="text" name="IdCliente" id="IdCliente">
        <br><label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre">
        <br><label for="Correo">Correo</label>
        <input type="text" name="Correo" id="Correo">
        <br><label for="Telefono">Telefono</label>
        <input type="text" name="Telefono", id="Telefono">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Registrar" name="Registrar"/>

      </div>
      </form>
    </div>
  </div>
</div>
    <table class="table">
        <thead>
            <th>
                Id
            </th>
            <th>
                Nombre
            </th>
            <th>
                Correo
            </th>
            <th>
                Telefono
            </th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            
            <tr>
                <td>0</td>
                <td>lu</td>
                <td>correo@correo.com</td>
                <td>911</td>
                <td><a href="#" class="btn btn-warning">Editar</a></td>
                <td><a href="#" class="btn btn-danger">Eliminar</a></td>
            </tr>
            <?php
            foreach ($All as $key => $value) {
                echo "
                <tr>
                <td>{$value['IdCliente']}</td>
                <td>{$value['Nombre']}</td>
                <td>{$value['Correo']}</td>
                <td>{$value['Telefono']}</td>
                <td><a href='../BackEnd/Cliente/Update.php?id={$value['IdCliente']}' class='btn btn-warning'>Editar</a></td>
                <td><a href='../BackEnd/Cliente/Delete.php?id={$value['IdCliente']}' class='btn btn-danger'>Eliminar</a></td>
                </tr>
                "
                ;
            }
            ?>
        </tbody>
    </table>
</body>
</html>