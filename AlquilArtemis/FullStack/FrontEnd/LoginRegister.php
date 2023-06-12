<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ~ Register </title>
</head>
<body>
    <h1>Ingresa tus Datos!</h1>
    <fieldset>
        <legend>Registrate</legend>
        <form action="../BackEnd/Empleado/Registrar.php/" method="POST">
            <br><label for="Username">Username</label>
            <input type="text" name="Username", id="Username">
            <br><label for="Password">Password</label>
            <input type="text" name="Password" id="Password">
            <br><input type="submit" name="Submit" Value="Registar">
        </form>
    </fieldset>

    <fieldset>
        <legend>Ingresa</legend>
        <form action="../BackEnd/Empleado/Login.php" method="POST">
            <br><label for="Username">Username</label>
            <input type="text" name="Username", id="Username">

            <br><label for="Password">Password</label>
            <input type="text" name="Password" id="Password">
            <br><input type="submit" name="Submit" Value="Login">
        </form>
    </fieldset>

</body>
</html>