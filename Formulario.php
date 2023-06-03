<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Formulario PhP </title> 
   <link href="php.css"   rel="stylesheet" type="text/css">

</head>

<body>
    <div class="grupo">
        <form method="POST" action="">
        <h2><em> Formulario php </em></h2>
    <label for="nombre"> Nombre <span><em> (requerido) </em></span></label>
    <input type="text" name="nombre" class="form-input" required/><br></br>
    
    <label for="aoellido"> Apellido <span><em> (requerido) </em></span></label>
    <input type="text" name="apellido" class="form-input" required/><br></br>

    <label for="email"> Email <span><em> (requerido) </em></span></label>
    <input type="email" name="email" class="form-input" required/><br></br>

    <input class="form-btn" name="submit" type="submit" value="Suscribirse"/>

<?php

if($_POST){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cursosql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn-> connect_error){
        die("Connection failed:". $conn-> connect_error);
    }
    
    $sql = "INSERT INTO usuario (nombre, apellido, email)
    VALUES ('$nombre', '$apellido', '$email')";
    
    if($conn->query($sql) === TRUE){
        echo "Nuevo registro creado";
    }else{
        echo "Error:" .$sql. "<br>". $conn->error;
    }
    $conn->close();



}

?>

</form>
</div>
</body>
</html>

