<?php include("../../header.php"); ?>

<title>Registros</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Registros</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>Las aplicaciones generalmente estan hechas para cumplir con sus prometidos y funciones que estan implementadas, pero la seguridad va un punto mas alla de solo cumplir con funciones. Al ser aplicaciones web y expuestas publicamente, cualquier usuario malintencionado podra llegar a ella y hacer y ejecutar herramientas automatizadas o manuales sobre ella.</p>

        <p>Por eso el registro lleva una importante funcion en las aplicaciones web, el poder registrar los eventos que realiza un usuario de la aplicacion o externo es importante. Estos registros serviran para evaluar los registros y ver si se esta cometiendo un ataque contra la aplicacion o que pasos esta siguiendo un ciber delincuente para explotar una aplicacion.</p>

        <p>Estos logs que son generados son de gran herramienta ya sea para monitorear y detener un ataque o para saber que fue el ataque se uso y herramientas que esta utilizando el atacante.</p>

        <p>Los principales registros que deberian guardarse son:</p>

        <ul>
            <li>Registros de inicio de sesion</li>
            <li>Registro de fallos</li>
            <li>Registro de transacciones</li>
        </ul>

        <p>Y evitar siempre:</p>

        <ul>
            <li>Registros poco claros</li>
            <li>Registros inadecuados</li>
            <li>Nunca guardar registros</li>
            <li>Registros unicamente de forma local</li>
        </ul>
        
    </div> <!--/.container -->
    </section>

<?php include("../../footer.php"); ?>