<?php
    $servername = "172.16.243.6";
    $username = "root";
    $password = "12345678";
    $db = 'proyecto';
    
    $conn = new mysqli($servername, $username, $password, $db);
    
    if ($conn->connect_error) {
      die("Conexion con base de datos incorrecta");
    }
?>