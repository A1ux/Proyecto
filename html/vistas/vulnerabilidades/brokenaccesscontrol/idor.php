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

        <ul>
          <li>Database data</li>
          <li>Files</li>
          <li>Directories</li>
          <li>Scripts</li>
          <li>Functions</li>
        </ul>



        Evitar mostrar referencias a objetos privados como claves o nombres de archivos.
    Verificar que el acceso a los recursos mediante IDs, tenga un paso de verificación adicional para asegurar que el usuario tenga la autorización adecuada.
    Asegúrate de que las consultas estén dirigidas al propietario del recurso, esto puede lograrse con la correcta implementación de mecanismos de control de acceso.
    Analiza todos los objetos referenciados.

<pre>&lt;&quest;php&NewLine;  if &lpar;&dollar;&lowbar;SESSION&lsqb;&apos;id&apos;&rsqb; &equals; &dollar;&lowbar;GET&lsqb;&apos;id&apos;&rsqb;&rpar;&lcub;&NewLine;    echo &quot;Mostrar el resultado&quot;&semi;&NewLine;  &rcub;else&lcub;&NewLine;    echo &quot;No se tiene acceso&quot;&semi;&NewLine;  &rcub;&NewLine;&quest;&gt;</pre>


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