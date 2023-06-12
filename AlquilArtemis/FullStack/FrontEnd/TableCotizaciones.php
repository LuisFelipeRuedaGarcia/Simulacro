<?php
require_once("../BackEnd/Config/Conectar.php");
require_once("../BackEnd/Cotizacion/Cotizacion.php");

$Cotizacion = new Cotizacion();
$All=$Cotizacion->Fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Cotizaciones</title>
</head>
<body>
    <h1>Cotizaciones</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cotizacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../BackEnd/Cotizacion/Insert.php" method="POST">
      <div class="modal-body">
        <label for="IdCotizacion">IdCotizacion</label>
        <input type="text" name="IdCotizacion" id="IdCotizacion">
        <br><label for="IdEmpleado">IdEmpleado</label>
        <input type="text" name="IdEmpleado" id="IdEmpleado">
        <br><label for="IdProducto">IdProducto</label>
        <input type="text"  name="IdProducto" id="IdProducto">
        <br><label for="IdCliente">IdCliente</label>
        <input type="text" name="IdCliente" id="IdCliente">

        <br><label for="Fecha">Fecha</label>
        <input type="text" name="Fecha" id="Fecha">

        <br><label for="Hora">Hora</label>
        <input type="text" name="Hora" id="Hora">

        <br><label for="DuracionDias">DuracionDias</label>
        <input type="text" name="DuracionDias" id="DuracionDias">

        <br><label for="PrecioPorDia">PrecioPorDia</label>
        <input type="text" name="PrecioPorDia" id="PrecioPorDia">

        <br><label for="TotalPesos">TotalPesos</label>
        <input type="text" name="TotalPesos" id="TotalPesos">

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
                IdEmpleado
            </th>
            <th>
                IdProducto
            </th>
            <th>
                IdCliente
            </th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>DuracionDias</th>
            <th>PrecioPorDia</th>
            <th>TotalPesos</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            
            <tr>
                <td>0</td>
                <td>lu</td>
                <td>0</td>
                <td>911</td>
                <td>2023-12-31</td>
                <td>09:00:00</td>
                <td>3</td>
                <td>4000</td>
                <td>12000</td>
                <td><a href="#" class="btn btn-warning">Editar</a></td>
                <td><a href="#" class="btn btn-danger">Eliminar</a></td>
            </tr>
            <?php
            foreach ($All as $key => $value) {
                echo "
                <tr>
                <td>{$value['IdCotizacion']}</td>
                <td>{$value['IdEmpleado']}</td>
                <td>{$value['IdProducto']}</td>
                <td>{$value['IdCliente']}</td>
                <td>{$value['Fecha']}</td>
                <td>{$value['Hora']}</td>
                <td>{$value['DuracionDias']}</td>
                <td>{$value['PrecioPorDia']}</td>
                <td>{$value['TotalPesos']}</td>
                
                <td><a href='../BackEnd/Cotizacion/Update.php?id={$value['IdCotizacion']}' class='btn btn-warning'>Editar</a></td>
                <td><a href='../BackEnd/Cotizacion/Delete.php?id={$value['IdCotizacion']}' class='btn btn-danger'>Eliminar</a></td>
                </tr>
                "
                ;
            }
            ?>
        </tbody>
    </table>
</body>
</html>