<?php include("../../header.php"); ?>

<title>SQLi Login Bypass</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">SQLi Login Bypass</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
      
        <div class="login">
            <div class="account-login">
               <h1>Inicio de Sesion</h1>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="text" placeholder="Usuario" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena"  class="form-control" name="password">
                  </div>
                  <input type="submit" class="btn" value="Iniciar Sesion">
               </form>
            </div>
        </div>
   </body>

<?php
    if (isset($_POST['username']) && isset($_POST['password'])){
      
      require "connection.php";

      $var_consulta= "select * from users where name = '".$_POST["username"]."' and "." password = '".$_POST["password"]."';";
      $var_resultado = $obj_conexion->query($var_consulta);
      
      if($var_resultado->num_rows>0){
        echo "<h3 style=\"color: green\">Inicio de sesion exitoso</h3>";
      }else{
        echo "<h3 style=\"color: red\">Datos incorrectos</h3>";
      }
      echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: <br><strong>$var_consulta</strong></div>";
    }
?>

    </div> <!--/.container -->
    </section> <!--/.container

<?php include("../../footer.php"); ?>