<?php include("../../header.php"); ?>

<title>Cifrados obsoletos y debiles</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Cifrados obsoletos y debiles</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>El asegurar las comunicaciones como HTTPS no es suficiente con la generacion de certificados, tambien se deben de verificar factores como los siguientes:</p>

        <h3>Versionesa debiles de SSL o TLS</h3>
        <ul>
            <li>SSL Version 3</li>
            <li>SSL Version 2</li>
            <li>SSL Version 1.0</li>
        </ul>

        <h3>Cifrados TLS soportados pero debiles de SSL</h3>
        <ul>
            <li>Cifrado RSA de tipo export-grade</li>
            <li>Cifrado DH del tipo export-grade</li>
            <li>Cifrado TLS basados en el algoritmo RC4</li>
            <li>Cifrado DH menor a 2048 bits</li>
            <li>Cifrado TLS con tamano de bloque de 64 bits</li>
        </ul>

        <p>Aunque estas practicas algunas son mucho mas complicadas de explotar es posible que pueda ser posible, asi que siempre es mejor seguir estas recomendaciones y evitar usar este tipos de cifrados y checar que el cifrado este soportado</p>

    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>