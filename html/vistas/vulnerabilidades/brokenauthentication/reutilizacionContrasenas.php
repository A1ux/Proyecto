<?php include("../../header.php"); ?>

<title>Reutilizacion de Contrasenas</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Reutilizacion de Contrasenas</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>Las contrasenas forman parte del dia a dia para poder entrar a los sistemas, es el uso cotidiano y lo mas normal. Pero existe otro punto a tomar en cuenta siempre y es que las aplicaciones deberian tener un control sobre las contrasenas, la reutilizacion de contrasenas juega un papel muy importante ya que aunque la contrasena pida cambio cada cierto tiempo no servira de nada si se siguen utilizando contrasenas que han sidos utilizadas antes por el usuario.</p>

        <p>Por tal razon se deberia de contar con un minimo de 5 contrasenas almacenadas que pudo usar el usuario anteriormente, pero para eso es necesario tener una tabla adicional en la cual se iran guardando contrasenas de los usuarios, como la siguiente:</p>

        <pre>CREATE TABLE IF NOT EXISTS tblpasswordhistory &lpar;&NewLine;  id int&lpar;11&rpar; NOT NULL AUTO&lowbar;INCREMENT&comma;&NewLine;  name varchar&lpar;150&rpar; DEFAULT NULL&comma;&NewLine;  password varchar&lpar;200&rpar; DEFAULT NULL&comma;&NewLine;  PostingDate timestamp NOT NULL DEFAULT CURRENT&lowbar;TIMESTAMP&comma;&NewLine;  primary key&lpar;id&rpar;&NewLine;&rpar;&semi;</pre>

        La estructura guarda el nombre del usuario en este caso pudiendo ser su correo o algo que lo identifique unicamente, de mejor manera que sea una llave primaria, para este caso de ejemplo no se utilizo de esta manera. Y su contrasena y la fecha que es creada que automaticamente la anade mysql a la hora de registrar el dato. Luego de esto la idea es ejecutar una consulta como la siguiente para tomar las ultimas contrasenas que han sido almacenadas y ver si ya existen en el historial.

        <pre>mysql&gt; select &ast; from tblpasswordhistory where name &equals; &apos;admin&apos; order by id desc limit 5&semi;&NewLine;&plus;----&plus;-------&plus;-----------&plus;---------------------&plus;&NewLine;&verbar; id &verbar; name  &verbar; password  &verbar; PostingDate         &verbar;&NewLine;&plus;----&plus;-------&plus;-----------&plus;---------------------&plus;&NewLine;&verbar;  6 &verbar; admin &verbar; password2 &verbar; 2021-10-20 19&colon;04&colon;44 &verbar;&NewLine;&verbar;  5 &verbar; admin &verbar; password1 &verbar; 2021-10-20 19&colon;04&colon;43 &verbar;&NewLine;&verbar;  4 &verbar; admin &verbar; password  &verbar; 2021-10-20 19&colon;04&colon;43 &verbar;&NewLine;&verbar;  3 &verbar; admin &verbar; test123   &verbar; 2021-10-20 19&colon;04&colon;43 &verbar;&NewLine;&verbar;  2 &verbar; admin &verbar; abcd1234  &verbar; 2021-10-20 19&colon;04&colon;43 &verbar;&NewLine;&plus;----&plus;-------&plus;-----------&plus;---------------------&plus;&NewLine;5 rows in set &lpar;0&period;00 sec&rpar;</pre>

        <p>Utilizando estos datos con php se hace una comprobacion para ver si la contrasena nueva que se quiere registrar existe y si no existe actualiza a la nueva contrasena y la registra en esta tabla tambien y si existe pide nuevamente registrar los nuevos datos. Se aprovecha de guardar todas las contrasenas en un array para luego ver si la nueva contrasena que se quiere colocar existe en ese array verificando que si existe lanza una alerta que ya esta ingresado y si no el proceso es satisfactorio.</p>

        <pre>if &lpar;isset&lpar;&dollar;&lowbar;POST&lsqb;&apos;passwordlold&apos;&rsqb;&rpar; &amp;&amp; isset&lpar;&dollar;&lowbar;POST&lsqb;&quot;passwordnew1&quot;&rsqb;&rpar; &amp;&amp; isset&lpar;&dollar;&lowbar;POST&lsqb;&quot;passwordnew2&quot;&rsqb;&rpar;&rpar; &lcub;&NewLine;  &sol;&sol; en este caso se hara por defecto el usuario admin pero se puede cambiar&NewLine;  &sol;&sol;if para verificar contrasena actual&NewLine;&NewLine;  if &lpar;&dollar;&lowbar;POST&lsqb;&quot;passwordnew1&quot;&rsqb; &equals;&equals; &dollar;&lowbar;POST&lsqb;&quot;passwordnew2&quot;&rsqb;&rpar;&lcub;&NewLine;    &dollar;newpass &equals; &dollar;&lowbar;POST&lsqb;&quot;passwordnew1&quot;&rsqb;&semi;&NewLine;    &dollar;query &equals; &quot;select &ast; from tblpasswordhistory where name &equals; &apos;admin&apos; order by id desc limit 5&semi;&quot;&semi;&NewLine;    &dollar;stmt &equals; &dollar;conn-&gt;prepare&lpar;&dollar;query&rpar;&semi;&NewLine;    &dollar;stmt-&gt;execute&lpar;&rpar;&semi;&NewLine;    &dollar;result &equals; &dollar;stmt-&gt;get&lowbar;result&lpar;&rpar;&semi;&NewLine;    &dollar;results &equals; &dollar;result-&gt;fetch&lowbar;all&lpar;&rpar;&semi;&NewLine;    &dollar;passwrd &equals; array&lpar;&rpar;&semi;    &NewLine;&NewLine;    foreach &lpar;&dollar;results as &dollar;rt&rpar;&lcub;&NewLine;      echo &dollar;rt-&gt;password&semi;&NewLine;      array&lowbar;push&lpar;&dollar;passwrd&comma; &dollar;rt&lsqb;2&rsqb;&rpar;&semi;&NewLine;    &rcub;&NewLine;&NewLine;    if &lpar;in&lowbar;array&lpar;&dollar;newpass&comma; &dollar;passwrd&rpar;&rpar;&lcub;&NewLine;      echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-danger&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Su contrasena ha sido usada anteriormente&lt;&sol;div&gt;&quot;&semi;&NewLine;      &sol;&sol;requiere que ingrese otra contrasena&NewLine;    &rcub;else&lcub;&NewLine;      echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Se actualizo su contrasena&lt;&sol;div&gt;&quot;&semi;&NewLine;      &sol;&sol;actaliza la tabla de base de datos con nueva contrasena&NewLine;    &rcub;&NewLine;&NewLine;    &NewLine;  &rcub;else&lcub;&NewLine;    echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-danger&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Las contasenas no coinciden&lt;&sol;div&gt;&quot;&semi;&NewLine;  &rcub;&NewLine;&rcub;else&lcub;&NewLine;  echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-danger&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Ingrese todos los valores necesarios&lt;&sol;div&gt;&quot;&semi;&NewLine;&rcub;</pre>
        
        <hr>
        <h1>Mitigacion</h1>
        <div class="login">
            <div class="account-login">
               <h1>Cambiar contrasena</h1>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena actual"  class="form-control" name="passwordold">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena nueva"  class="form-control" name="passwordnew1">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena nueva"  class="form-control" name="passwordnew2">
                  </div>
                  <input type="submit" class="btn" value="Registrar">
               </form>
            </div>
        </div>

        <br>

<?php
$servername = "172.16.243.6";
$username = "root";
$pass = "12345678";
$db = 'proyecto';

$conn = new mysqli($servername, $username, $pass, $db);

if ($conn->connect_error) {
  die("Conexion con base de datos incorrecta");
}

if (isset($_POST['passwordold']) && isset($_POST["passwordnew1"]) && isset($_POST["passwordnew2"])) {
  // en este caso se hara por defecto el usuario admin pero se puede cambiar
  //if para verificar contrasena actual

  if ($_POST["passwordnew1"] == $_POST["passwordnew2"]){
    $newpass = $_POST["passwordnew1"];
    $query = "select * from tblpasswordhistory where name = 'admin' order by id desc limit 5;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $results = $result->fetch_all();
    $passwrd = array();    

    foreach ($results as $rt){
      echo $rt->password;
      array_push($passwrd, $rt[2]);
    }

    if (in_array($newpass, $passwrd)){
      echo "<div class=\"alert alert-danger\" role=\"alert\">Su contrasena ha sido usada anteriormente</div>";
      //requiere que ingrese otra contrasena
    }else{
      echo "<div class=\"alert alert-success\" role=\"alert\">Se actualizo su contrasena</div>";
      //actaliza la tabla de base de datos con nueva contrasena
    }

    
  }else{
    echo "<div class=\"alert alert-danger\" role=\"alert\">Las contasenas no coinciden</div>";
  }
}else{
  echo "<div class=\"alert alert-danger\" role=\"alert\">Ingrese todos los valores necesarios</div>";
}


?>

    </div> <!--/.container -->
    </section>
 
    

<?php include("../../footer.php"); ?>