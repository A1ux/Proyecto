<?php include("../../header.php"); ?>

<title>Software vulnerable con CVE</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Software vulnerable con CVE</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

    <p>Generalmente en nuestro codigo se suele utilizar muchas veces librerias y software que agregan valor a nuestras aplicaciones. Por lo cual muchas veces se suele agregar software que esta en su ultima version. Pero con el pasar del tiempo se olvidan de este software y su actualizacion a nuevas versiones.</p>
    
    <p>En aplicaciones web, lo mas recurrente es utilizar tecnologias como bootstrap, jquery, o hasta el propio php o servidor en si como apache. El mayor problema que surge a la hora de agregar software es que con el tiempo son encontradas nuevas vulnerabilidades y al no ser actualizadas estan expuestas a que cualquier usuario se aproveche de nuestro sitio web a traves de ese software.</p>

    <p>Como evitamos:</p>

    <ul>
        <li>Actualizar constantemente el software</li>
    </ul>

    <p>Aunque parezca algo tan facil es algo que se suele olvidar en muchos de los sistemas, una aplicacion no debe actualizar solamente sus modulos o funciones si no lo que lo rodea para que la seguridad sea maxima. Es muy facil saber que software conocido puede contener vulnerabilidades, desde una busqueda rapida en la web o en el listado CVE.</p>

    <p>Vulnerabilidades y exposiciones comunes (CVE por sus siglas en ingles) este es un listado en el cual son las vulnerabilidades que se han encontrado y reportado de todo tipo de software, desde reconocidos coo php, bootstrap, jquery, apache y muchas tecnologias webs. Un ejemplo de vulnerabilidades que han sido reportadas para PHP seria el siguiente:</p>


    <ul>
    <li><a href="https://www.cvedetails.com/product/128/PHP-PHP.html?vendor_id=74">PHP</a></li>
    <li><a href="https://www.cvedetails.com/product/11031/Jquery-Jquery.html?vendor_id=6538">Jquery</a></li>
    <li><a href="https://www.cvedetails.com/product/66/Apache-Http-Server.html?vendor_id=45">Apache HTTP Server</a></li>
    </ul>

    <p>Y asi como se listan aca ejemplos de estos, existen muchas otras vulnerabilidades de miles de servicios que han sido reportados, por eso antes de agregar componentes a nuestras aplicaciones es necesario que realizar una busqueda de si esto no convertira la aplicacion en vulnerable. Y periodicamente buscar si existen CVEs confirmados para actualizar estos componentes y no dejar la puerta abierta hacia una vulnerabilidad.</p>
    
       </div> <!--/.container -->
</section> 
    

<?php include("../../footer.php"); ?>