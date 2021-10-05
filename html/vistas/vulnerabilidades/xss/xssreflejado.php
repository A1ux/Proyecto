<?php include("../../header.php"); ?>

<title>XSS Reflejado</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">XSS Reflejado</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
<p>XSS Reflejado es una forma de inyeccion de javascript de lado de cliente. Regularmente es cuando un usuario ingresa a la aplicacion un valor y este se aprovecha de esto para poder inyectar codigo javascript en la aplicacion.
</p>
<p>Que podria hacer un usuario si logra inyectar codigo javascritp?
  <ul>
    <li>Robo de Sesiones</li>
    <li>Robo de Informacion sensiblees</li>
    <li>Control del ordenador de la victima</li>
    <li>Cambio de la apariencia visual de la aplicacion</li>
  </ul>
</p>

<p>En el siguiente ejemplo es un simple ingreso de valor por metodo get, pero realmente si la peticion es post o get no tiene ninguna diferencia. La peticion post se analizara en el xss almacenado para ver que el metodo de peticion no importa.</p>

<p>La prueba que se muestra aca, es donde es un simple saludo a un usuario pero como este podria pasar que muestra un valor de un formulario y el sistema no filtra como se debe</p>

<p>El codigo de la funcion es el siguiente:</p>

<pre>&lt;&quest;php&NewLine;    if&lpar;isset&lpar;&dollar;&lowbar;GET&lsqb;&apos;usuario&apos;&rsqb;&rpar;&rpar;&lcub;&NewLine;        echo &quot;&lt;h3 style&equals;&quot;color&colon; green&quot;&gt;Hola &quot;&period;&dollar;&lowbar;GET&lsqb;&apos;usuario&apos;&rsqb;&period;&quot;&lt;&sol;h3&gt;&quot;&semi;&NewLine;    &rcub;&NewLine;&quest;&gt;</pre>

<p>Se puede notar que no filtra nada que es recibido por el usuario, lo que provoca una vulnerabilidad de inyeccion xss que permite que pueda inyectar codigo javascript de manera facil.</p>

<h2>Como se explota</h3>

<p>El valor get que espera la peticion es llamado <strong>usuario</strong>, este valor puede ser cambiado desde la url agregando un <strong>?usuario=valor</strong>. PHP tomara este valor y lo imprimira en pantalla asumiendo que es un usuario normal. Pero un usuario mal intencionado puede provecharse de esto. La primera forma de probar si es vulnerable es agregando codigo javascript en el valor de la variable usuario</p>

<p>La primera forma es agregar un script a la variable y ver si no es filtrado y pueda ejecutar javascript en nuestro navegador, eso abre la puerta a muchos otros ataques como los listados anteriormente. El codigo generalmente es el siguiente <strong>&lt;script&gt;alert&lpar;1&rpar;&lt;&sol;script&gt;</strong> aunque existen formas mas complejas de ofuscar codigo javascript para entender xss es un buen ejemplo.</p>

<p>Si cambiamos el valor de la variable<strong>usuario</strong> por una carga xss podriamos ejecutar javascript en la pagina y veriamos una alerta javascript</p>

<p></p>

<h3>Mensaje:</h3>
<?php
    if(isset($_GET['usuario'])){
        echo "<h3 style=\"color: green\">Hola ".$_GET['usuario']."</h3>";
    }
?>

    </div> <!--/.container -->
    </section> <!--/.container
    

<?php include("../../footer.php"); ?>