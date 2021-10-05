<?php include("../../header.php"); ?>

<title>XSS Almacenado</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">XSS Almacenado</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

<p>XSS Almacenado no es muy diferente al xss reflejado, su unica diferencia radica en que implica guardar los datos que inyectamos en la base de datos haciendo que una amenaza y una carga de javascript pueda ejecutarse cada que el sistema toma algo de la base de datos.</p>

<p>Es mucho mas complicado ya que pueda llegar a terminar en una completa inutilizacion del sistema y molesto si el codigo javascript lo que quiere es arruinar la experiencia del usuario en el sistema.</p>

<p>La seguridad tambien se ve agraviada ya que puede recolectar datos del ususario, ejecutar un keylogger entre otras funciones que pueden hacerse con javascript.</p>

<p>El ejemplo que aca se lista es el uso que podria tenerse en un sistema que es el guardado de informacion en la base de datos, aqui el ejemplo es un apartado de comentarios en el cual el usuario comenta y posteriormente son visualizados por el mismo. El codigo seria el siguiente:</p>

<pre>
  &lt;&quest;php&NewLine;    &dollar;servername &equals; &quot;172&period;16&period;243&period;6&quot;&semi;&NewLine;    &dollar;username &equals; &quot;root&quot;&semi;&NewLine;    &dollar;password &equals; &quot;12345678&quot;&semi;&NewLine;    &dollar;db &equals; &apos;proyecto&apos;&semi;&NewLine;&NewLine;    &dollar;conn &equals; new mysqli&lpar;&dollar;servername&comma; &dollar;username&comma; &dollar;password&comma; &dollar;db&rpar;&semi;&NewLine;&NewLine;    if &lpar;&dollar;conn-&gt;connect&lowbar;error&rpar; &lcub;&NewLine;      die&lpar;&quot;Conexion con base de datos incorrecta&quot;&rpar;&semi;&NewLine;    &rcub;&NewLine;&NewLine;    if &lpar;isset&lpar;&dollar;&lowbar;POST&lsqb;&quot;username&quot;&rsqb;&rpar; &amp;&amp; isset&lpar;&dollar;&lowbar;POST&lsqb;&quot;comentario&quot;&rsqb;&rpar;&rpar;&lcub;&NewLine;      &dollar;stmt &equals; &dollar;conn-&gt;prepare&lpar;&quot;insert into comentarios &lpar;usuario&comma;comentario&rpar; values &lpar;&quest;&comma;&quest;&rpar;&quot;&rpar;&semi;&NewLine;      &dollar;stmt-&gt;bind&lowbar;param&lpar;&apos;ss&apos;&comma; &dollar;&lowbar;POST&lsqb;&apos;username&apos;&rsqb;&comma;&dollar;&lowbar;POST&lsqb;&apos;comentario&apos;&rsqb;&rpar;&semi;&NewLine;      if &lpar;&dollar;stmt-&gt;execute&lpar;&rpar;&rpar;&lcub;&NewLine;        echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Comentario agregadeo&lt;&sol;div&gt;&quot;&semi;&NewLine;        echo&lpar;&quot;&lt;meta http-equiv&equals;&apos;refresh&apos; content&equals;&apos;1&apos;&gt;&quot;&rpar;&semi;&NewLine;      &rcub;else&lcub;&NewLine;        echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Error al agregar comentario&lt;&sol;div&gt;&quot;&semi;&NewLine;      &rcub;&NewLine;    &rcub;else&lcub;&NewLine;      &dollar;stmt &equals; &dollar;conn-&gt;prepare&lpar;&apos;SELECT usuario&comma;comentario from comentarios&apos;&rpar;&semi;&NewLine;      &dollar;stmt-&gt;execute&lpar;&rpar;&semi;&NewLine;      &dollar;result &equals; &dollar;stmt-&gt;get&lowbar;result&lpar;&rpar;&semi;&NewLine;        while &lpar;&dollar;row&equals;&dollar;result-&gt;fetch&lowbar;assoc&lpar;&rpar;&rpar;&lcub;&NewLine;          echo &quot;&lt;div class&equals;&apos;media&apos;&gt;&NewLine;          &lt;div class&equals;&apos;media-left media-middle&apos;&gt;&NewLine;          &lt;&sol;div&gt;&NewLine;          &lt;div class&equals;&apos;media-body&apos;&gt;&quot;&semi;&NewLine;          echo &quot;&lt;div class&equals;&apos;media-body&apos;&gt;&NewLine;          &lt;h4 class&equals;&apos;media-heading&apos;&gt;&quot;&period;&dollar;row&lsqb;&apos;usuario&apos;&rsqb;&period;&quot;&lt;&sol;h4&gt;&quot;&semi;&NewLine;          echo &quot;&lt;p&gt;&quot;&period;&dollar;row&lsqb;&apos;comentario&apos;&rsqb;&period;&quot;&lt;&sol;p&gt;&quot;&semi;&NewLine;          echo &quot;&lt;&sol;div&gt;&lt;&sol;div&gt;&quot;&semi;&NewLine;        &rcub;&NewLine;    &rcub;&NewLine;&quest;&gt;
</pre>

<p>Como se pude notar el programador jamas filtro las entradas del usuario por lo cual el podria ingresar cualquier elemento javascript como en el anterior ejemplo de xss reflejado. Esta es una peticion post por lo cual se puede notar que no importa el metodo que se usa.</p>

<p>Si usted como usuario ingresa <strong>&lt;script&gt;alert&lpar;1&rpar;&lt;&sol;script&gt;</strong> podra notar que se ejecuta javascript, y si vuelve a recargar la pagina podra notar que siempre que cargue la pagina esta molesta alerta aparecera. Ahi radica lo complicado de esta vulnerabilidad que hace que en la base de datos se registre la carga de javascript y se ejecute siempre que se toma de la base de datos.</p>

<h3>Como hacerlo mas complicado?</h3>

<p>Ahora como prueba de concepto ingrese el siguiente codigo en el campo de comentario y podra ver como es facil arruinar una aplicacion web si no se tiene protegida.</p>

<pre>
&lt;script&gt;&NewLine;document&period;head&period;innerHTML &equals; &grave;&lt;style&gt;&ast; &lcub;&NewLine;  margin&colon; 0&semi;&NewLine;  padding&colon; 0&semi;&NewLine;&rcub;&NewLine;&period;hacked &lcub;&NewLine;  background&colon; black&semi;&NewLine;  color&colon; lime&semi;&NewLine;  height&colon; 100vh&semi;&NewLine;  &NewLine;  display&colon; flex&semi;&NewLine;  justify-content&colon; center&semi;&NewLine;  align-items&colon; center&semi;&NewLine;  text-align&colon; center&semi;&NewLine;  font-size&colon; 3rem&semi;&NewLine;&rcub;&lt;&sol;style&gt;&grave;&semi;&NewLine;&NewLine;document&period;body&period;innerHTML &equals; &grave;&NewLine;&lt;div class&equals;&quot;hacked&quot;&gt;&NewLine;  &lt;h1&gt;Hackeado&lt;&sol;h1&gt;&NewLine;&lt;&sol;div&gt;&NewLine;&grave;&semi;&NewLine;&NewLine;window&period;addEventListener&lpar;&apos;click&apos;&comma; e &equals;&gt; alert&lpar;&apos;Estas hackeado&apos;&rpar;&rpar;&semi;&NewLine;&lt;&sol;script&gt;
</pre>

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
      $stmt = $conn->prepare("insert into comentarios (usuario,comentario) values (?,?)");
      $stmt->bind_param('ss', $_POST['username'],$_POST['comentario']);
      if ($stmt->execute()){
        echo "<div class=\"alert alert-success\" role=\"alert\">Comentario agregadeo</div>";
        echo("<meta http-equiv='refresh' content='1'>");
      }else{
        echo "<div class=\"alert alert-success\" role=\"alert\">Error al agregar comentario</div>";
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