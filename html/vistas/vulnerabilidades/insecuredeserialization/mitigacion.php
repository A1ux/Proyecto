<?php include("../../header.php"); ?>

<title>Mitigacion</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Mitigacion</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>Esta vulnerabilidad como muchas es agregar pequenos filtros a la aplicacion para evitar que el usuario inyecte solicitudes que no debe o en formatos que puedan arruinar la aplicacion.</p>

        <p>En este caso se debe evitar enviar objetos serializados, lo mejor sera verificar el uso de unserialize de php y enviar todos los datos en un formato de json hacia el usuario, siempre evitando que pueda modificar esos datos que son ingresados para poder hacerse con un administrador o ejecucion de comandos.</p>

    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>