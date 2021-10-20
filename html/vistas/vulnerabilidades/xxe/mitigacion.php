<?php include("../../header.php"); ?>

<title>Mitigacion</title>
<script src="script2.js"></script>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Mitigacion</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
    <p>La mitigacion en esta vulnerabilidad es muy simple de solucionar. Simplemente es nunca deshabilitar el cargador de xml para poder ejecutar estos servicios.</p>


    <pre>&lt;&quest;php&NewLine;libxml&lowbar;disable&lowbar;entity&lowbar;loader &lpar;true&rpar;&semi;&NewLine;&dollar;xmlfile &equals; file&lowbar;get&lowbar;contents&lpar;&apos;php&colon;&sol;&sol;input&apos;&rpar;&semi;&NewLine;&dollar;dom &equals; new DOMDocument&lpar;&rpar;&semi;&NewLine;&dollar;dom-&gt;loadXML&lpar;&dollar;xmlfile&comma; LIBXML&lowbar;NOENT &verbar; LIBXML&lowbar;DTDLOAD&rpar;&semi;&NewLine;&dollar;info &equals; simplexml&lowbar;import&lowbar;dom&lpar;&dollar;dom&rpar;&semi;&NewLine;&dollar;email &equals; &dollar;info-&gt;email&semi;&NewLine;&dollar;password &equals; &dollar;info-&gt;password&semi;&NewLine;&NewLine;echo &quot;Lo siento&comma; &dollar;email ya esta registrado&excl;&quot;&semi;&NewLine;&quest;&gt;</pre>



    <pre>curl &apos;http&colon;&sol;&sol;localhost&sol;vistas&sol;vulnerabilidades&sol;xxe&sol;processmiti&period;php&apos; -X POST --data-raw &apos;&lt;&quest;xml version&equals;&quot;1&period;0&quot; encoding&equals;&quot;UTF-8&quot;&quest;&gt;&lt;&excl;DOCTYPE root &lsqb;&lt;&excl;ENTITY test SYSTEM &quot;file&colon;&sol;&sol;&sol;etc&sol;passwd&quot;&gt;&rsqb;&gt;&lt;root&gt;&lt;email&gt;&amp;test&semi;&lt;&sol;email&gt;&lt;password&gt;test&lt;&sol;password&gt;&lt;&sol;root&gt;&apos;</pre>

    <pre>&lt;br &sol;&gt;&NewLine;&lt;b&gt;Warning&lt;&sol;b&gt;&colon;  DOMDocument&colon;&colon;loadXML&lpar;&rpar;&colon; I&sol;O warning &colon; failed to load external entity &amp;quot&semi;file&colon;&sol;&sol;&sol;etc&sol;passwd&amp;quot&semi; in &lt;b&gt;&sol;var&sol;www&sol;html&sol;vistas&sol;vulnerabilidades&sol;xxe&sol;processmiti&period;php&lt;&sol;b&gt; on line &lt;b&gt;5&lt;&sol;b&gt;&lt;br &sol;&gt;&NewLine;&lt;br &sol;&gt;&NewLine;&lt;b&gt;Warning&lt;&sol;b&gt;&colon;  DOMDocument&colon;&colon;loadXML&lpar;&rpar;&colon; Failure to process entity test in Entity&comma; line&colon; 1 in &lt;b&gt;&sol;var&sol;www&sol;html&sol;vistas&sol;vulnerabilidades&sol;xxe&sol;processmiti&period;php&lt;&sol;b&gt; on line &lt;b&gt;5&lt;&sol;b&gt;&lt;br &sol;&gt;&NewLine;&lt;br &sol;&gt;&NewLine;&lt;b&gt;Warning&lt;&sol;b&gt;&colon;  DOMDocument&colon;&colon;loadXML&lpar;&rpar;&colon; Entity &apos;test&apos; not defined in Entity&comma; line&colon; 1 in &lt;b&gt;&sol;var&sol;www&sol;html&sol;vistas&sol;vulnerabilidades&sol;xxe&sol;processmiti&period;php&lt;&sol;b&gt; on line &lt;b&gt;5&lt;&sol;b&gt;&lt;br &sol;&gt;&NewLine;&lt;br &sol;&gt;&NewLine;&lt;b&gt;Warning&lt;&sol;b&gt;&colon;  simplexml&lowbar;import&lowbar;dom&lpar;&rpar;&colon; Invalid Nodetype to import in &lt;b&gt;&sol;var&sol;www&sol;html&sol;vistas&sol;vulnerabilidades&sol;xxe&sol;processmiti&period;php&lt;&sol;b&gt; on line &lt;b&gt;6&lt;&sol;b&gt;&lt;br &sol;&gt;&NewLine;Lo siento&comma;  ya esta registrado&excl;</pre>


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


    <p></p>
    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>