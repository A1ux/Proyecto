<?php include("header.php"); ?>
<title>Asistentes</title>

<?php include("menu.php"); ?>


<div class="container-fluid">
  <h2>Registro de Asistentes</h2>
<form action="" method="post">
  <div class="form-group">
    <label for="email">Correo:</label>
    <input type="mail" class="form-control" name="correo">
  </div>
  <div class="form-group">
  <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre">
  </div>
  <div class="form-group">
  <label for="apellido">Apellido:</label>
    <input type="text" class="form-control" name="apellido">
  </div>
  <button type="submit" class="btn btn-default">Registrar Asistente</button>
</form>
</div>

<br>
<div class="container">
<?php
  if(isset($_SESSION["user"])){
    require "connection.php";

    if (isset($_POST['correo']) && isset($_POST['nombre']) && isset($_POST['apellido'])){
        $stmt = $conn->prepare('insert into asistentes (correo,nombre, apellido) values (?,?,?)');
        $stmt->bind_param('sss',$_POST['correo'],$_POST['nombre'], $_POST['apellido']);
        if ($stmt->execute()){
            echo "<script>alert('Registro exitosamente')</script>";
        }else{
            echo "<script>alert('Error al registrar')</script>";
        }
      }



    echo "<h2>Conferencistas</h2>";
    
    $stmt = $conn->prepare('SELECT * FROM asistentes');
    $stmt->execute();
    $result = $stmt->get_result();

    echo"<table class=\"table\">
    <tr bgcolor='#E6E6E6'>
      <th>Correo</th>
      <th>Nombre</th>
      <th>Apellido</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>".$row["correo"]."</td>";
      echo "<td>".$row["nombre"]."</td>";
      echo "<td>".$row["apellido"]."</td>";
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