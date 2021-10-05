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

<p>La mitigacion de un xss es mas facil de lo que se cree, no es mas que filtrar los datos ingresados por el usuario. Al tratarse de php hay una manera especifica de hacerlo. Haciendo uso la funcion <strong>htmlspecialchars</strong> la cual su funcion es convertir caracteres espciales a entidades html
</p>

<p>Por ejemplo los valores siguientes seria su conversion asi:</p>

<ul> 
  <li>&lt; se convierte en &amp;lt&semi;</li>
  <li>&gt; se convierte en &amp;gt&semi;</li>
  <li>&sol; se convierte en &amp;sol&semi;</li>
  <li>&apos; se convierte en &amp;apos&semi;</li>
  <li>&quot; se convierte en &amp;quot&semi;</li>
  <li>&grave; se convierte en &amp;grave&semi;</li>
</ul>

<p>Todo esto hace que al querer ingresar codigo javascript PHP lo convierta a caracteres especiales que sean asi guardados en la base de datos, y el navegador entiende que valores son escritos pero si vemos el codigo fuente podremos notar que al ingresar <strong>&lt;script&gt;alert&lpar;1&rpar;&lt;&sol;script&gt;</strong> sea diferente</p>

<p>Esta es la forma en que se ve en el codigo fuente de html:</p>

<pre>
&lt;h4 class&equals;&apos;media-heading&apos;&gt;test&lt;&sol;h4&gt;&lt;p&gt;&amp;lt&semi;script&amp;gt&semi;alert&lpar;1&rpar;&amp;lt&semi;&sol;script&amp;gt&semi;&lt;&sol;p&gt;&lt;&sol;div&gt;&lt;&sol;div&gt;&lt;div class&equals;&apos;media&apos;&gt;
</pre>

<p>Y la forma de guardarse en la base de datos seria asi:</p>

<pre>
&plus;----&plus;---------&plus;---------------------------------------&plus;&NewLine;&verbar; id &verbar; usuario &verbar; comentario                            &verbar;&NewLine;&plus;----&plus;---------&plus;---------------------------------------&plus;&NewLine;&verbar; 10 &verbar; test    &verbar; &amp;lt&semi;script&amp;gt&semi;alert&lpar;1&rpar;&amp;lt&semi;&sol;script&amp;gt&semi; &verbar;&NewLine;&verbar; 11 &verbar; test    &verbar; &amp;lt&semi;script&amp;gt&semi;alert&lpar;1&rpar;&amp;lt&semi;&sol;script&amp;gt&semi; &verbar;&NewLine;&plus;----&plus;---------&plus;---------------------------------------&plus;
</pre>

<p>Ahora intenta ingresar codigo javascript y veras si es explotable.</p>

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