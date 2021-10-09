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