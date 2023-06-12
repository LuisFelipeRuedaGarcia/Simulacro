<?php
require_once("../BackEnd/Config/Conectar.php");
require_once('../BackEnd/Empleado/Empleado.php');
$Empleado = new Empleado();
$All= $Empleado->Fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Empleados</title>
</head>
<body>
    <h1>Empleados</h1>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">NuevoEmpleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../BackEnd/Empleado/Registrar.php" method="POST">
        <div class="modal-body">
        <label for="IdEmpleado">IdEmpleado</label>
            <input type="number" name="IdEmpleado">
            <br>
            <label for="Username">Username</label>
            <input type="text" name="Username">
            <br>
            <label for="Password">Contraseña</label>
            <input type="text" name="Password" id="Password">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Registrar" name="Registrar">
        </div>
      </form>
    </div>
  </div>
</div>


    <table class="table">
        <thead>
            <th>Id</th>
            <th>User</th>
            <th>Password</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    1
                </td>
                <td>
                    Example
                </td>
                <td>
                    123
                </td>
                <td>
                    <a href="#" class="btn btn-warning">Editar</a>
                </td>

                <td>
                    <a href="#" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php
            foreach($All as $key => $val){
                echo "
                <tr>
                <td>
                {$val['IdEmpleado']}
                </td>
                <td>
                    {$val['Username']}
                </td>
                <td>
                    {$val['Password']}
                </td>
                <td>
                    <a href='../BackEnd/Empleado/Editar.php?id={$val['IdEmpleado']}' class='btn btn-warning'>Editar</a>
                </td>

                <td>
                    <a href='../BackEnd/Empleado/Eliminar.php?id={$val['IdEmpleado']}' class='btn btn-danger'>Eliminar</a>
                </td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>