<?php include("../../header.php"); ?>

<title>Monitoreo</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Monitoreo</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>El monitoreo es otra de las partes importantes de seguridad y que es mas olvidado que el registro. De que vale tener registros si nunca son leidos o monitoreados constantemente. La importancia de los registros radica en monitorearlos y generar alertas con estos para indicar al administrador de la aplicacion que se esta realizando un ataque o algun error generado en la aplicacion.</p>

        <p>Las aplicaciones web pueden ser accedidas por miles y millones por eso el registro y monitoreo es importante para saber que esta pasando con nuestra aplicacion y que problemas poder solucionar. Si no se tiene un monitoreo constante sobre estos logs que son generadas por la aplicacion estamos a ciegas sobre lo que los usuarios ingresan a la aplicacion y que sistemas o modulos de la aplicacion estan accediendo.</p>

        <p>Que se deberia de monitorear:</p>

        <ul>
            <li>Inicios de sesion</li>
            <li>Intentos de inicio de sesion</li>
            <li>Listado de directorios por fuerza bruta</li>
            <li>Fuzzing sobre formularios web</li>
            <li>Inyecciones sql o xss a traves de reglas</li>
        </ul>
    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>