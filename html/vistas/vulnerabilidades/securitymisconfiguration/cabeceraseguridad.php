<?php include("../../header.php"); ?>

<title>Cabeceras de Seguridad</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Cabeceras de Seguridad</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>Del lado del servidor existen cabeceras importantes que se deben de manejar para que la seguridad del sitio web se mantenga asi y no puedan ser comprometidas las credenciales.</p>

        <p>La lista de headers que se deben de manejar son:</p>

        <ul>
            <li>httponly = true</li>
            <li>secure = true</li>
            <li>Strict-Transport-Security&colon; max-age&equals;&lt;expire-time&gt;&semi; includeSubDomains</li>
        </ul>

        <p>Cual es la importancia de cada uno:</p>

        <p><strong>HttpOnly:</strong> Permite que las cookies solo sean leidas a traves de http ya que por medio de javascript se podria tomar una cookie por xss.</p>
        <p><strong>Secure:</strong> Permite que las cookies solo sean transmitidas por canales seguros como HTTPS haciendo a un lado las conexiones HTTP pudiendose configurar de esa manera</p>
        <p><strong>Strict-transport-security:</strong> Permite que el navegador debe recordar este sitio para solo poder ser accesible a traves de HTTPS</p>
    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>