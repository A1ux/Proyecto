<?php
  if (!isset($_SESSION)) { session_start(); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Conferencias</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Inicio</a>
      <a class="nav-item nav-link" href="registro.php">Registro</a>
      <?php
      if(isset($_SESSION["user"])){
        echo "<a class='nav-item nav-link' href='administracion.php'>Administracion</a>";
        echo "<a class='nav-item nav-link' href='cerrarsesion.php'>Cerrar Sesion</a>";
      }else{
        echo "<a class='nav-item nav-link' href='login.php'>Iniciar Sesion</a>";
      }
      ?>
    </div>
  </div>
</nav>