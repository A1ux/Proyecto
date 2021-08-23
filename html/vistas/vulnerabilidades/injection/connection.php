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
?>
