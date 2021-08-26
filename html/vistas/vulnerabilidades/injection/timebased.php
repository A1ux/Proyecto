<?php include("../../header.php"); ?>

<title>Time-Based SQL Injection</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Time-Based SQL Injection</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <div class="login">
            <div class="account-login">
               <h1>Crear usuario</h1>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="text" placeholder="Usuario" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena"  class="form-control" name="password">
                  </div>
                  <input type="submit" class="btn" value="Crear">
               </form>
            </div>
        </div>

<?php
  if (isset($_POST['username']) && isset($_POST['password'])){
      
    require "connection.php";

    $var_consulta= "insert into users(name,password,isAdmin) values('".$_POST["username"]."','".$_POST["password"]."',false);";
    $var_resultado = $obj_conexion->query($var_consulta);
    
    echo "<br>";
    echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: <br><strong>$var_consulta</strong></div>";
  }
?>

    </div> <!--/.container -->
    </section> <!--/.container
    

<?php include("../../footer.php"); ?>