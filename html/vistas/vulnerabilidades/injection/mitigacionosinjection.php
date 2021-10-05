<?php include("../../header.php"); ?>


<title>Mitigacion Command Injection</title>
<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Mitigacion Command Injection</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>La tarea de mitigar un command injection es siempre filtrar las entradas del usuario en esta caso ya que es una ejecucion de comandos se debe escapaar y no permitir que un comando vaya concatenado a otro.</p>

        <p>Esto se hace a traves de la propia funcion de PHP que es <strong>escapeshellarg</strong> la cual hace que la entrada del usuario no se concatene a otro comando y si se anade mas valores no permita su ejecucion solamente por el valor que se espera. Este es el codigo en funcion:</p>

        <pre>&lt;&quest;php&NewLine;      if &lpar;&dollar;&lowbar;SERVER&lsqb;&quot;REQUEST&lowbar;METHOD&quot;&rsqb; &equals;&equals; &quot;POST&quot;&rpar; &lcub;&NewLine;        &sol;&sol; collect value of input field&NewLine;        &dollar;ip &equals; &dollar;&lowbar;POST&lsqb;&apos;fname&apos;&rsqb;&semi;&NewLine;        if &lpar;empty&lpar;&dollar;ip&rpar;&rpar; &lcub;&NewLine;          echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-danger&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;No se coloco ip&lt;&sol;div&gt;&quot;&semi;&NewLine;        &rcub; else &lcub;&NewLine;          &dollar;ipescape &equals; escapeshellarg&lpar;&dollar;ip&rpar;&semi;&NewLine;          echo &quot;&lt;pre&gt;&quot;&semi;&NewLine;          system&lpar;&apos;ping -c1 &apos;&period;escapeshellarg&lpar;&dollar;ip&rpar;&rpar;&semi;&NewLine;          echo &quot;&lt;&sol;pre&gt;&quot;&semi;&NewLine;          echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Tu consulta es&colon; &lt;br&gt;&lt;strong&gt;ping -c1 &dollar;ipescape&lt;&sol;strong&gt;&lt;&sol;div&gt;&quot;&semi;&NewLine;        &rcub;&NewLine;      &rcub;&NewLine;&quest;&gt;</pre>

        <h3>Ejemplo mitigacion:</h3>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Ingrese la ip que desea hacer ping: <input type="text" name="fname">
        <input type="submit">
      </form>
      <br>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $ip = $_POST['fname'];
        if (empty($ip)) {
          echo "<div class=\"alert alert-danger\" role=\"alert\">No se coloco ip</div>";
        } else {
          $ipescape = escapeshellarg($ip);
          echo "<pre>";
          system('ping -c1 '.escapeshellarg($ip));
          echo "</pre>";
          echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta es: <br><strong>ping -c1 $ipescape</strong></div>";
        }
      }
      ?>
    </div> <!--/.container -->
    </section> <!--/.container
    
<?php include("../../footer.php"); ?>