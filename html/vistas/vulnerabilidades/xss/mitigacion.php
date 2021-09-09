<?php include("../../header.php"); ?>

<title>XSS Mitigacion</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">XSS Mitigacion</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="form-group">
    <label for="username">Usuario:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Comentario:</label>
    <textarea class="form-control" name="comentario" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Comentar</button>
</form>

<?php
    $servername = "172.16.243.6";
    $username = "root";
    $password = "12345678";
    $db = 'proyecto';

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
      die("Conexion con base de datos incorrecta");
    }

    if (isset($_POST["username"]) && isset($_POST["comentario"])){
        $user = htmlspecialchars($_POST['username'], ENT_QUOTES);
        $comentario = htmlspecialchars($_POST['comentario'], ENT_QUOTES);

        $stmt = $conn->prepare("insert into comentarios (usuario,comentario) values (?,?)");
        $stmt->bind_param('ss', $user,$comentario);
        if ($stmt->execute()){
            echo "<br><div class=\"alert alert-success\" role=\"alert\">Comentario agregadeo</div>";
            echo("<meta http-equiv='refresh' content='1'>");
        }else{
            echo "<br><div class=\"alert alert-success\" role=\"alert\">Error al agregar comentario</div>";
        }
    }else{
        $stmt = $conn->prepare('SELECT usuario,comentario from comentarios');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row=$result->fetch_assoc()){
            echo "<div class='media'>
            <div class='media-left media-middle'>
            </div>
            <div class='media-body'>";
            echo "<div class='media-body'>
            <h4 class='media-heading'>".$row['usuario']."</h4>";
            echo "<p>".$row['comentario']."</p>";
            echo "</div></div>";
        }
    }


?>

    </div> <!--/.container -->
    </section> <!--/.container


<?php include("../../footer.php"); ?>