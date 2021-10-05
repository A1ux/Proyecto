<?php include("header.php"); ?>
<title>Conferencias</title>

<?php include("menu.php"); ?>


<div class="container-fluid">
  <h2>Registro de Conferencias</h2>
<form action="" method="post">
  <div class="form-group">
    <label for="email">Correo:</label>
    <input type="mail" class="form-control" name="correo">
  </div>
  <div class="form-group">
  <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre">
  </div>
  <button type="submit" class="btn btn-default">Registrar Conferencia</button>
</form>
</div>

<br>
<div class="container">
<?php
  if(isset($_SESSION["user"])){
    require "connection.php";

    if (isset($_POST['correo']) && isset($_POST['nombre'])){
        $stmt = $conn->prepare('insert into conferencias (nombre, correo_Conferencistas) values (?,?)');
        $stmt->bind_param('ss',$_POST['nombre'],$_POST['correo']);
        if ($stmt->execute()){
            echo "<script>alert('Registro exitosamente')</script>";
        }else{
            echo "<script>alert('Error al registrar')</script>";
        }
    }

    echo "<h2>Conferencistas</h2>";
    $stmt = $conn->prepare('SELECT * FROM conferencias');
    $stmt->execute();
    $result = $stmt->get_result();

    echo"<table class=\"table\">
    <tr bgcolor='#E6E6E6'>
      <th>Nombre</th>
      <th>Correo Ponente</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>".$row["nombre"]."</td>";
      echo "<td>".$row["correo_Conferencistas"]."</td>";
      echo "</tr>";
    }
    echo "</table>";
  $stmt->close();
  }else{
    echo "<h1>NO TIENE PERMISOS</h1>";
  }
?>
</div>

<?php include("footer.php"); ?>