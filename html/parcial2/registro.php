<?php include("header.php"); ?>
<title>Inicio de Sesion</title>

<div class="container-fluid">
  <h1>Registro de Usuarios</h1>
<form action="" method="post">
  <div class="form-group">
    <label for="email">Correo:</label>
    <input type="mail" class="form-control" name="correo">
  </div>
  <div class="form-group">
    <label for="pwd">Contrasena:</label>
    <input type="password" class="form-control" name="contrasena">
  </div>
  <button type="submit" class="btn btn-default">Registrarte</button>
</form>
</div>

<?php

  require 'connection.php';

  if (isset($_POST['correo']) && isset($_POST['contrasena'])){
    $fecha = date('Y-m-d H:i:s');
    $stmt = $conn->prepare('insert into usuarios (correo,contrasena,fechacreacion) values (?,?,?)');
    $stmt->bind_param('sss',$_POST['correo'],$_POST['contrasena'], $fecha);
    if ($stmt->execute()){
        echo "<script>alert('Usuario creado correctamente')</script>";
    }else{
        echo "<script>alert('Error al crear usuario')</script>";
    }
  }
?>

<?php include("footer.php"); ?>