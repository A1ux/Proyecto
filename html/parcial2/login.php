<?php include("header.php"); ?>
<title>Inicio de Sesion</title>

<div class="container-fluid">
  <h1>Inicio de Sesion</h1>
<form action="session.php" method="post">
  <div class="form-group">
    <label for="email">Correo:</label>
    <input type="correo" class="form-control" name="correo">
  </div>
  <div class="form-group">
    <label for="pwd">Contrasena:</label>
    <input type="password" class="form-control" name="contrasena">
  </div>
  <button type="submit" class="btn btn-default">Iniciar sesion</button>
</form>
</div>

<?php include("footer.php"); ?>