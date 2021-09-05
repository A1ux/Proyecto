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



<h3>Mensaje de Prueba</h3>
<?php
    if(isset($_GET['usuario'])){
        echo "<h3 style=\"color: green\">Hola ".$_GET['usuario']."</h3>";
    }
?>

    </div> <!--/.container -->
    </section> <!--/.container
    

<?php include("../../footer.php"); ?>