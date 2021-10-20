<?php include("../../header.php"); ?>


<title>Command Injection</title>
<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">COMMAND INJECTION</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>La inyección de comandos es un ataque en el que el objetivo es la ejecución de comandos arbitrarios en el sistema operativo host a través de una aplicación vulnerable. Los ataques de inyección de comandos son posibles cuando una aplicación pasa datos no seguros proporcionados por el usuario (formularios, cookies, encabezados HTTP, etc.) a un shell del sistema. En este ataque, los comandos del sistema operativo proporcionados por el atacante generalmente se ejecutan con los privilegios de la aplicación vulnerable. Los ataques de inyección de comandos son posibles en gran parte debido a una validación de entrada insuficiente. </p>

        <p>Este ataque se diferencia de la inyección de código en que la inyección de código le permite al atacante agregar su propio código que luego es ejecutado por la aplicación. En Command Injection, el atacante extiende la funcionalidad predeterminada de la aplicación, que ejecuta comandos del sistema, sin la necesidad de inyectar código.</p>

      <h2>Ejecucion de Comando</h2>

      <p>Esta prueba emula una ejecucion de comandos, se solicita al usuario ingresar una ip para realizar ping y en pantalla mostrar el resultado, pero se puede ingresar otros comandos sabiendo que este esta ejecutado sobre un sistema Linux. El codigo que se ejecuta es el siguiente:</p>

      <pre>&lt;&quest;php&NewLine;      if &lpar;&dollar;&lowbar;SERVER&lsqb;&quot;REQUEST&lowbar;METHOD&quot;&rsqb; &equals;&equals; &quot;POST&quot;&rpar; &lcub;&NewLine;        &sol;&sol; collect value of input field&NewLine;        &dollar;file &equals; &dollar;&lowbar;POST&lsqb;&apos;fname&apos;&rsqb;&semi;&NewLine;        if &lpar;empty&lpar;&dollar;file&rpar;&rpar; &lcub;&NewLine;          echo &quot;&lt;div class&equals;&quot;alert alert-danger&quot; role&equals;&quot;alert&quot;&gt;No se coloco ip&lt;&sol;div&gt;&quot;&semi;&NewLine;        &rcub; else &lcub;&NewLine;          echo &quot;&lt;pre&gt;&quot;&semi;&NewLine;          system&lpar;&quot;ping -c1 &dollar;file&quot;&rpar;&semi;&NewLine;          echo &quot;&lt;&sol;pre&gt;&quot;&semi;&NewLine;          echo &quot;&lt;div class&equals;&quot;alert alert-success&quot; role&quot;alert&quot;&gt;Tu consulta es&colon; ping -c 1 &dollar;file&lt;&sol;div&gt;&quot;&semi;&NewLine;        &rcub;&NewLine;      &rcub;&NewLine;&quest;&gt;</pre>

      <p>Al analizar la web esto nos puede recordar a los resultados que arroja el ejecutar <strong>ping -c1 $ip</strong>, dando a una idea a un atacante de inyectar codigo para ejecutar algo mas que solo un ping hacia una ip</p>

      <h3>Como inyectar comandos</h3>

      <p>En Linux es comun el uso de la terminal por eso, se conocen varias formas de inyectar otros comandos como el uso de && o || que son las mas comunes. Si se esta familiarizado con la terminal sera muy facil agregar otra inyeccion.</p>

      <hr>
      <h1>Explotacion</h1>

      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Ingrese la ip que desea hacer ping: <input type="text" name="fname">
        <input type="submit">
      </form>
      <br>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $file = $_POST['fname'];
        if (empty($file)) {
          echo "<div class=\"alert alert-danger\" role=\"alert\">No se coloco ip</div>";
        } else {
          echo "<pre>";
          system("ping -c1 $file");
          echo "</pre>";
          echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta es: ping -c 1 $file</div>";
        }
      }
      ?>
    </div> <!--/.container -->
    </section> <!--/.container
    
<?php include("../../footer.php"); ?>