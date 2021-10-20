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

        <p>Siempre las protecciones adicionales que se le pueden dar al sistema vienen con el propio lenguaje en este caso no es la excepcion, existen diferentes maneras de proteger el sql injection y las maneras pueden ser las siguientes:</p>

        <ul>
          <li>Uso de consultas parametrizadas (como usadas en este ejemplo)</li>
          <li>Uso de procedimientos almacenados</li>
          <li>Validacion de entrada de lista de permitidos</li>
          <li>Escapar todas las entradas proporcionadas por el usuario</li>
          <li>Uso del privilegio minimo</li>
        </ul>

        <p>El codigo utilizado es el siguiente:</p>

        <pre>&lt;&quest;php&NewLine;&dollar;servername &equals; &quot;172&period;16&period;243&period;6&quot;&semi;&NewLine;&dollar;username &equals; &quot;root&quot;&semi;&NewLine;&dollar;password &equals; &quot;12345678&quot;&semi;&NewLine;&dollar;db &equals; &apos;proyecto&apos;&semi;&NewLine;&NewLine;&dollar;conn &equals; new mysqli&lpar;&dollar;servername&comma; &dollar;username&comma; &dollar;password&comma; &dollar;db&rpar;&semi;&NewLine;&NewLine;if &lpar;&dollar;conn-&gt;connect&lowbar;error&rpar; &lcub;&NewLine;  die&lpar;&quot;Conexion con base de datos incorrecta&quot;&rpar;&semi;&NewLine;&rcub;&NewLine;if &lpar;isset&lpar;&dollar;&lowbar;POST&lsqb;&quot;precio&quot;&rsqb;&rpar; &amp;&amp; &dollar;&lowbar;POST&lsqb;&quot;precio&quot;&rsqb;&excl;&equals;&quot;&quot;&rpar;&lcub;&NewLine;  &dollar;price &equals; &dollar;&lowbar;POST&lsqb;&quot;precio&quot;&rsqb;&semi;&NewLine;  &dollar;query &equals; &quot;SELECT &ast; FROM products where price &lt;&equals; &quest;&quot;&semi;&NewLine;  &dollar;stmt &equals; &dollar;conn-&gt;prepare&lpar;&dollar;query&rpar;&semi;&NewLine;  &dollar;stmt-&gt;bind&lowbar;param&lpar;&apos;d&apos;&comma; &dollar;price&rpar;&semi;&NewLine;  &dollar;stmt-&gt;execute&lpar;&rpar;&semi;&NewLine;  &dollar;consulta &equals; sprintf&lpar;str&lowbar;replace&lpar;&apos;&quest;&apos;&comma;&apos;&percnt;s&apos;&comma;&dollar;query&rpar;&comma;&dollar;price&rpar;&semi;&NewLine;  &dollar;result &equals; &dollar;stmt-&gt;get&lowbar;result&lpar;&rpar;&semi;&NewLine;  echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Tu consulta sql es&colon; &lt;br&gt;&lt;strong&gt;&dollar;consulta&lt;&sol;strong&gt;&lt;&sol;div&gt;&quot;&semi;&NewLine;&rcub;else&lcub;&NewLine;  &dollar;stmt &equals; &dollar;conn-&gt;prepare&lpar;&apos;SELECT &ast; FROM products&apos;&rpar;&semi;&NewLine;  &dollar;stmt-&gt;execute&lpar;&rpar;&semi;&NewLine;  &dollar;result &equals; &dollar;stmt-&gt;get&lowbar;result&lpar;&rpar;&semi;&NewLine;  echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Tu consulta sql es&colon; SELECT &ast; FROM products&lt;br&gt;&lt;strong&gt;&lt;&sol;strong&gt;&lt;&sol;div&gt;&quot;&semi;&NewLine;&rcub;&NewLine;&NewLine;  echo&quot;&lt;table class&equals;&bsol;&quot;table&bsol;&quot;&gt;&NewLine;  &lt;tr bgcolor&equals;&apos;&num;E6E6E6&apos;&gt;&NewLine;    &lt;th&gt;ID&lt;&sol;th&gt;&NewLine;    &lt;th&gt;Nombre&lt;&sol;th&gt;&NewLine;    &lt;th&gt;Precio&lt;&sol;th&gt;&NewLine;    &lt;th&gt;Disponible&lt;&sol;th&gt;&NewLine;  &lt;&sol;tr&gt;&quot;&semi;&NewLine;  while &lpar;&dollar;row &equals; &dollar;result-&gt;fetch&lowbar;assoc&lpar;&rpar;&rpar; &lcub;&NewLine;    echo &quot;&lt;tr&gt;&quot;&semi;&NewLine;    echo &quot;&lt;td&gt;&quot;&period;&dollar;row&lsqb;&quot;id&quot;&rsqb;&period;&quot;&lt;&sol;td&gt;&quot;&semi;&NewLine;    echo &quot;&lt;td&gt;&quot;&period;&dollar;row&lsqb;&quot;name&quot;&rsqb;&period;&quot;&lt;&sol;td&gt;&quot;&semi;&NewLine;    echo &quot;&lt;td&gt;&quot;&period;&dollar;row&lsqb;&quot;price&quot;&rsqb;&period;&quot;&lt;&sol;td&gt;&quot;&semi;&NewLine;    echo &quot;&lt;td&gt;&quot;&period;&dollar;row&lsqb;&quot;stock&quot;&rsqb;&period;&quot;&lt;&sol;td&gt;&quot;&semi;&NewLine;    echo &quot;&lt;&sol;tr&gt;&quot;&semi;&NewLine;  &rcub;&NewLine;  echo &quot;&lt;&sol;table&gt;&quot;&semi;&NewLine;&NewLine;&dollar;stmt-&gt;close&lpar;&rpar;&semi;&NewLine;&quest;&gt;&NewLine;</pre>

        <p>En este ejemplo se puede ver que se hace uso de consultas parametrizadas con bind_param enviando los parametros asi que aunque se intente inyectar codigo con las comillas o comentar algo este no lo tomara y lo guardara asi en la base de datos. La funcion que hace eso y mejora la consultas sql es la siguiente:</p>

        <pre>&dollar;price &equals; &dollar;&lowbar;POST&lsqb;&quot;precio&quot;&rsqb;&semi;&NewLine;&dollar;query &equals; &quot;SELECT &ast; FROM products where price &lt;&equals; &quest;&quot;&semi;&NewLine;&dollar;stmt &equals; &dollar;conn-&gt;prepare&lpar;&dollar;query&rpar;&semi;&NewLine;&dollar;stmt-&gt;bind&lowbar;param&lpar;&apos;d&apos;&comma; &dollar;price&rpar;&semi;&NewLine;&dollar;stmt-&gt;execute&lpar;&rpar;&semi;</pre>

        <hr>
        <h2>Mitigacion de Inyeccion SQL</h2>

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