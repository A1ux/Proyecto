<?php include("../../header.php"); ?>

<title>Mitigacion SQL Injection</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Mitigacion SQL Injection</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Ingrese el precio maximo de los productos a ver:
        <input type="text" name="precio">
        <input type="submit" value="Ver Productos">
      </form>
      <br>

<?php
$servername = "172.16.243.6";
$username = "root";
$password = "12345678";
$db = 'proyecto';

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
  die("Conexion con base de datos incorrecta");
}
if (isset($_POST["precio"]) && $_POST["precio"]!=""){
  $price = $_POST["precio"];
  $query = "SELECT * FROM products where price <= ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('d', $price);
  $stmt->execute();
  $consulta = sprintf(str_replace('?','%s',$query),$price);
  $result = $stmt->get_result();
  echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: <br><strong>$consulta</strong></div>";
}else{
  $stmt = $conn->prepare('SELECT * FROM products');
  $stmt->execute();
  $result = $stmt->get_result();
  echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: SELECT * FROM products<br><strong></strong></div>";
}

  echo"<table class=\"table\">
  <tr bgcolor='#E6E6E6'>
    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Disponible</th>
  </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["price"]."</td>";
    echo "<td>".$row["stock"]."</td>";
    echo "</tr>";
  }
  echo "</table>";

$stmt->close();
?>


    </div> <!--/.container -->
    </section> <!--/.container
    

<?php include("../../footer.php"); ?>