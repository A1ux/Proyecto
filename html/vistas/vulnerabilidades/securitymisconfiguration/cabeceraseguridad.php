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

        <h3>X-Frame-Options</h3>

        <p>El encabezado de respuesta HTTP X-Frame-Options puede ser usado para indicar si deber&iacute;a permit&iacute;rsele a un navegador renderizar una p&aacute;gina en un &lt;frame&gt;&comma; &lt;iframe&gt; o &lt;object&gt; &period; Las p&aacute;ginas webs pueden usarlo para evitar ataques de clickjacking &comma; asegur&aacute;ndose que su contenido no es embebido en otros sitios&period;</p>

        <pre>X-Frame-Options&colon; DENY&NewLine;X-Frame-Options&colon; SAMEORIGIN&NewLine;X-Frame-Options&colon; ALLOW-FROM https&colon;&sol;&sol;example&period;com&sol;</pre>

        <p>Para mas informacion visitar:</p>
      
        <ul>
          <li>https://developer.mozilla.org/es/docs/Web/HTTP/Cookies#cookies_secure_y_httponly</li>
        </ul>

        <h3>Cookies: Secure y HttpOnly</h3>

        <p>Secure: Asegura que la cookie sea transportada por HTTPS y HttpOnly que la cookie sea manejada por HTTP o HTTPS y no por javascript que podria recibir un ataque con XSS</p>

        <pre>&lt;&quest;php&NewLine;&dollar;arr&lowbar;cookie&lowbar;options &equals; array &lpar;&NewLine;                &apos;expires&apos; &equals;&gt; time&lpar;&rpar; &plus; 60&ast;60&ast;24&ast;30&comma;&NewLine;                &apos;path&apos; &equals;&gt; &apos;&sol;&apos;&comma;&NewLine;                &apos;domain&apos; &equals;&gt; &apos;&period;example&period;com&apos;&comma;&NewLine;                &apos;secure&apos; &equals;&gt; true&comma;&NewLine;                &apos;httponly&apos; &equals;&gt; true&comma;    &NewLine;                &apos;samesite&apos; &equals;&gt; &apos;None&apos;&NewLine;                &rpar;&semi;&NewLine;setcookie&lpar;&apos;TestCookie&apos;&comma; &apos;The Cookie Value&apos;&comma; &dollar;arr&lowbar;cookie&lowbar;options&rpar;&semi;   &NewLine;&quest;&gt;</pre>

        <p>Para mas informacion visitar:</p>
      
        <ul>
          <li>https://developer.mozilla.org/es/docs/Web/HTTP/Headers/X-Frame-Options</li>
        </ul>

        <h3>Strict-Transport-Security</h3>

        <p>Es una característica de seguridad que permite a un sitio web indicar a los navegadores que sólo se debe comunicar con HTTPS en lugar de usar HTTP.</p>

        <pre>Strict-Transport-Security&colon; max-age&equals;&lt;expire-time&gt;&NewLine;Strict-Transport-Security&colon; max-age&equals;&lt;expire-time&gt;&semi; includeSubDomains&NewLine;Strict-Transport-Security&colon; max-age&equals;&lt;expire-time&gt;&semi; preload</pre>

        <p>Para mas informacion visitar:</p>
      
        <ul>
          <li>https://developer.mozilla.org/es/docs/Web/HTTP/Headers/Strict-Transport-Security</li>
        </ul>

        <h3>Content Security Policy</h3>

        <p>Es una capa de seguridad adicional que ayuda a prevenir y mitigar algunos tipos de ataque, incluyendo Cross Site Scripting ( XSS (en-US) ) y ataques de inyección de datos. Estos ataques son usados con diversos propósitos, desde robar información hasta desfiguración de sitios o distribución de malware .</p>

        <pre>&lt;&quest;php&NewLine;&Tab;header&lpar;&quot;Content-Security-Policy&colon; default-src &apos;self&apos;&quot;&rpar;&semi;&NewLine;&quest;&gt;</pre>

        <p>Para mas informacion visitar:</p>
      
        <ul>
          <li>https://developer.mozilla.org/es/docs/Web/HTTP/CSP</li>
        </ul>
        
    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>