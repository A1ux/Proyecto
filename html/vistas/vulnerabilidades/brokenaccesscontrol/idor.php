<?php include("../../header.php"); ?>

<title>Insecure Direct Object Reference</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Insecure Direct Object Reference</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>


        <p>El IDOR es un tipo de vulnerabilidad que ocurre cuando una aplicación le permite a un usuario acceder directamente a objetos (como recursos, funciones o archivos) en función de la consulta que éste realice, sin realizar el debido control de acceso.</p>
        
        Los recursos a los que podria acceder serian:

        <ul>
          <li>Datos</li>
          <li>Archivos</li>
          <li>Directorios</li>
          <li>Scripts</li>
          <li>Funciones</li>
        </ul>

        <p>En este caso se muestra la vulnerabilidad enviando una peticion para que el usuario pida los datos que tienen almacenado de si mismo en la tabla de usuarios, esto podria indicar una forma de poder editar sus datos, en la peticion se envia su id de usuario, pero si el usuario decide cambiar el valor puede ver datos de otros usuarios y eso se convierte en un IDOR ya que no deberia tener mas acceso que el de su propio usuario y puede ir recorriendo la aplicacion para tomar todos esos datos.</p>

        <h1>Mitigacion</h1>

        Evitar mostrar referencias a objetos privados como claves o nombres de archivos.
    Verificar que el acceso a los recursos mediante IDs, tenga un paso de verificación adicional para asegurar que el usuario tenga la autorización adecuada.
    Asegúrate de que las consultas estén dirigidas al propietario del recurso, esto puede lograrse con la correcta implementación de mecanismos de control de acceso.
    Analiza todos los objetos referenciados.

<pre>&lt;&quest;php&NewLine;  if &lpar;&dollar;&lowbar;SESSION&lsqb;&apos;id&apos;&rsqb; &equals; &dollar;&lowbar;GET&lsqb;&apos;id&apos;&rsqb;&rpar;&lcub;&NewLine;    echo &quot;Mostrar el resultado&quot;&semi;&NewLine;  &rcub;else&lcub;&NewLine;    echo &quot;No se tiene acceso&quot;&semi;&NewLine;  &rcub;&NewLine;&quest;&gt;</pre>


<hr>
<h1>IDOR</h1>

<h3>Envie una peticion con el parametro id con el valor de su id de usuario</h3>

<?php
require "connection.php";
    if (isset($_GET['id'])){

      require "connection.php";

      $var_consulta= "select * from users where id = ".$_GET['id'].";";
      $var_resultado = $obj_conexion->query($var_consulta);
      if($var_resultado->num_rows>0){
        echo"<table class=\"table\">
        <tr bgcolor='#E6E6E6'>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contrasena</th>
            <th>Administrador</th>
        </tr>";
        while ($var_fila=$var_resultado->fetch_array()){
          echo "<tr>";
          echo "<td>".$var_fila["id"]."</td>";
          echo "<td>".$var_fila["name"]."</td>";
          echo "<td>".$var_fila["password"]."</td>";
          echo "<td>".$var_fila["isAdmin"]."</td>";
          echo "</tr>";
        }
        echo "</table>";
    }else{
      echo "No hay Registros";
    }
  }

?>


    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>