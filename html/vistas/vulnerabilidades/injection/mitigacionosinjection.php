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