<?php
  session_start();
  require'connection.php';

  if (isset($_POST['correo']) && isset($_POST['contrasena'])){
    $username = $_POST['correo'];
    $password = $_POST['contrasena'];
    $query = "SELECT * from usuarios where correo = ? and contrasena = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $_SESSION["user"] = $row['correo'];
    }
    echo "<script> window.location='index.php'; </script>";
  }
  
?>