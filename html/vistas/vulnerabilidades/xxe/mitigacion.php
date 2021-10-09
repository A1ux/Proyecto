<?php include("../../header.php"); ?>

<title>Mitigacion</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Mitigacion</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
    <p>La mitigacion en esta vulnerabilidad es muy simple de solucionar. Simplemente es nunca deshabilitar el cargador de xml para poder ejecutar estos servicios.</p>


    <pre>&lt;&quest;php&NewLine;libxml&lowbar;disable&lowbar;entity&lowbar;loader &lpar;false&rpar;&semi;&NewLine;&dollar;xmlfile &equals; file&lowbar;get&lowbar;contents&lpar;&apos;php&colon;&sol;&sol;input&apos;&rpar;&semi;&NewLine;&dollar;dom &equals; new DOMDocument&lpar;&rpar;&semi;&NewLine;&dollar;dom-&gt;loadXML&lpar;&dollar;xmlfile&comma; LIBXML&lowbar;NOENT &verbar; LIBXML&lowbar;DTDLOAD&rpar;&semi;&NewLine;&dollar;info &equals; simplexml&lowbar;import&lowbar;dom&lpar;&dollar;dom&rpar;&semi;&NewLine;&dollar;email &equals; &dollar;info-&gt;email&semi;&NewLine;&dollar;password &equals; &dollar;info-&gt;password&semi;&NewLine;&NewLine;echo &quot;Lo siento&comma; &dollar;email ya esta registrado&excl;&quot;&semi;&NewLine;&quest;&gt;</pre>

    <p></p>
    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>