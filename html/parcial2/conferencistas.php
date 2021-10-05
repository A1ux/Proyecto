<?php include("header.php"); ?>
<title>Conferencistas</title>

<?php include("menu.php"); ?>


<div class="container-fluid">
  <h2>Registro de Conferencistas</h2>
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
  <div class="form-group">
  <label for="profesion">Profesion:</label>
    <input type="text" class="form-control" name="profesion">
  </div>
  <div class="form-group">
  <label for="biografia">Biografia:</label>
    <input type="mail" class="form-control" name="biografia">
  </div>
  <button type="submit" class="btn btn-default">Registrar Conferencista</button>
</form>
</div>

<br>
<div class="container">
<?php
  if(isset($_SESSION["user"])){
    require "connection.php";

    if (isset($_POST['correo']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['profesion']) && isset($_POST['biografia'])){
        $fecha = date('Y-m-d H:i:s');
        $stmt = $conn->prepare('insert into conferencistas (correo,nombre, apellido,profesion,biografia) values (?,?,?,?,?)');
        $stmt->bind_param('sssss',$_POST['correo'],$_POST['nombre'], $_POST['apellido'],$_POST['profesion'],$_POST['biografia']);
        if ($stmt->execute()){
            echo "<script>alert('Registro exitosamente')</script>";
        }else{
            echo "<script>alert('Error al registrar')</script>";
        }
      }



    echo "<h2>Conferencistas</h2>";
    
    $stmt = $conn->prepare('SELECT * FROM conferencistas');
    $stmt->execute();
    $result = $stmt->get_result();

    echo"<table class=\"table\">
    <tr bgcolor='#E6E6E6'>
      <th>Correo</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Profesion</th>
      <th>Biografia</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>".$row["correo"]."</td>";
      echo "<td>".$row["nombre"]."</td>";
      echo "<td>".$row["apellido"]."</td>";
      echo "<td>".$row["profesion"]."</td>";
      echo "<td>".$row["biografia"]."</td>";
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