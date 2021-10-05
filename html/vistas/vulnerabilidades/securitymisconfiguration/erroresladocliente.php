<?php include("../../header.php"); ?>

<title>Mostrar errores en el lado cliente</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Mostrar errores en el lado cliente</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
<p>Al estar en un entorno de desarrollo el programador suele activar ciertas herramientas que le ayudaran a la hora de programar pero que en entorno de produccion no deberian de estar. Claro ejemplo es cuando existe una inyeccion SQL y un usuario malintencionado se puede dar cuenta que es vulnerable ingresando comillas dobles o simples. Este error le da la entrada para saber que algo esta pasando y que puede aprovecharse</p>

<p>Pero por eso en lado de produccion es necesario desactivar todos estos errores que pueden mostrar la infraestructura que esta por debajo de la aplicacion web haciendo que sea mas segura. Esto es posible conphp configuraando su archivo php.ini</p>

<p>La idea es activar que si guarde logs pero que nunca se los muestre al cliente en su navegador por lo tanto debemos desactivar el display_errors que lo que hace es ocultarlo aunque exista un error.</p>

<pre>ini&lowbar;set&lpar;&apos;error&lowbar;reporting&apos;&comma; E&lowbar;ALL &amp; ~E&lowbar;DEPRECATED &amp; ~E&lowbar;STRICT &amp; ~E&lowbar;NOTICE&rpar;&semi;&NewLine;ini&lowbar;set&lpar;&apos;display&lowbar;errors&apos;&comma; 0&rpar;&semi;&NewLine;ini&lowbar;set&lpar;&apos;log&lowbar;errors&apos;&comma; 0&rpar;&semi;</pre>

<p>Con esto se evita que alguien pueda aprovecharse de los errores del sistema a la hora de navegar por la aplicacion.</p>

    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>