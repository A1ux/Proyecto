<?php include("../../header.php"); ?>

<title>Simple SQL Injection</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">SQL Injection simple</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
        <p>Estes un claro ejemplo que puede suceder en una pagina, la entrada que recibe espera que sea un valor de entero o flotante para poder mostrar los productos entre el valor 0 hasta el valor maximo ingresado</p>

      <form action="" method="post">
        Ingrese el precio maximo de los productos a ver:
        <input type="text" name="precio" id="precio">
        <input type="submit" value="Ver Productos">
      </form>
      <br>
       
<?php
    $cons_usuario="root";
    $cons_contra="12345678";
    $cons_base_datos="proyecto";
    $cons_equipo="172.16.243.6";
    
    $obj_conexion = 
    mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
    if(!$obj_conexion)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3>";
    }

    if (isset($_POST["precio"]) && $_POST["precio"]!=""){
      $var_consulta= "select * from products where price <= ".$_POST["precio"];
      $var_resultado = $obj_conexion->query($var_consulta);
      echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: <br>$var_consulta</div>";
    }else{
      $var_consulta= "select * from products";
      $var_resultado = $obj_conexion->query($var_consulta);
      echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: <br>$var_consulta</div>";
    }
    if($var_resultado->num_rows>0)

      {
        echo"<table class='table'>
         <tr bgcolor='#E6E6E6'>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Disponible</th>
        </tr>";
    while ($var_fila=$var_resultado->fetch_array())
    {
        echo "<tr>
        <td>".$var_fila["id"]."</td>";
        echo "<td>".$var_fila["name"]."</td>";
        echo "<td>".$var_fila["price"]."</td>";
        echo "<td>".$var_fila["stock"]."</td>";
     }
    }
    else
      {
        echo "No hay Registros";
      }
    ?>

    </div> <!--/.container -->
</section> 
    