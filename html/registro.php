<?php

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$contrasenia = $_POST["contrasenia"];
$servername = "143.198.97.131";
$username = "root";
$password = "G@rr0y023HMGB$}";
$db ="Resturante";

$conn = mysqli_connect($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}

$sql = "INSERT INTO Usuarios (nombre,correo,contrasenia) VALUES ('$nombre', '$correo', '$contrasenia')";

if ($conn->query($sql) === TRUE) {
    echo "Se registro exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
