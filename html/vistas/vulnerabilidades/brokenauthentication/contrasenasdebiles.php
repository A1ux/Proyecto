<?php include("../../header.php"); ?>

<title>Contrasenas debiles</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Contrasenas debiles</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>El uso de contrasenas debiles es una practica muy comun en usuarios, si alguien deja que se utilicen contrasenas debiles podria dar la puerta abierta a que algun usuario pueda hacer uso de contrasenas como admin, password, password1, que suelen ser las mas predecibles y que no tiene muchas cuestiones como el uso de Mayusculas, caracteres especiales, numeros.</p>

        <p>Para este paso se suele utilizar mucho las expresiones regulares que ayudan a examinar el string para poder verificar que este cumpliendo con los criterios anteriormente mencionados. Las expresiones regulares es una cadena de caracteres que se utiliza para describir o encontrar patrones dentro de los strings, en base al uso de delimitadores yu ciertas reglas de sintaxis. El regex utilizado en este formulario es el siguiente</p>

        <pre>&dollar;reg &equals; &apos;&sol;&Hat;&lpar;&quest;&equals;&period;&ast;&lsqb;&excl;&commat;&num;&dollar;&percnt;&Hat;&amp;&ast;-&rsqb;&rpar;&lpar;&quest;&equals;&period;&ast;&lsqb;0-9&rsqb;&rpar;&lpar;&quest;&equals;&period;&ast;&lsqb;A-Z&rsqb;&rpar;&period;&lcub;8&comma;20&rcub;&dollar;&sol;&apos;&semi;</pre>

        <h2>Explicando la expresion regular:</h2>

        <h3>Delimitadores</h3>

        <p>Lo primero se utilizan los valores '/ /' dentro de estos iran los patrones que se espera que tenga el string</p>

        <pre>&apos;&sol; aqui iran los patrones &sol;&apos;</pre>

        <h3>Inicio y final de la cadena</h3>

        <p>Para indicarle por medio de expresiones regulares se utiliza ^ para indicar que es el inicio de una cadena y $ para indicar que es el final de una cadena</p>

        <pre>&Hat; Indica el inicio del string&NewLine;&dollar; Indica el final del string</pre>

        <pre>^ Indica el inicio del string</pre>

         <h3>Indicar numero de caracteres del string</h3>

         <p>Para indicar con una expresion regular el minimo de caracteres se hace uso de la siguiente expresion '.{8,}' que indica que puede tener un minimo de 8 caracteres para que sea aceptada.</p>

         <pre>&apos;&sol;&Hat;&period;&lcub;8&comma;&rcub;&dollar;&sol;&apos;</pre>

         <h3>Que tenga minimo un caracter que sea mayuscula</h3>

         <p>Utilizando lo anterior ahora se agregara que tenga una letra mayuscula al patron que seria el siguiente '(?=.*[A-Z])' que es cualquier valor de mayuscula de la A a la Z</p>
         
         <pre>&apos;&sol;&Hat;&lpar;&quest;&equals;&period;&ast;&lsqb;A-Z&rsqb;&rpar;&period;&lcub;8&comma;&rcub;&dollar;&sol;&apos;</pre>

         <h3>Minimo de un digito</h3>

         <p>Tambien es importante el uso de digitos en contrasenas y el siguiente patron es utilizado para esto (?=.*[0-9]). Agregado a los patrones anteriores seria el siguiente:</p>

         <pre>&apos;&sol;&Hat;&lpar;&quest;&equals;&period;&ast;&lsqb;0-9&rsqb;&rpar;&lpar;&quest;&equals;&period;&ast;&lsqb;A-Z&rsqb;&rpar;&period;&lcub;8&comma;20&rcub;&dollar;&sol;&apos;</pre>

         <h3>Minimo un caracter especial</h3>

         <p>Existen varios caracteres especiales y es una buena forma utilizarlos, el regex para utilizarlos es el siguiente '(?=.*[!@#$%^&*-])'. Y agregado a los anteriores quedaria asi:</p>

         <pre>&apos;&sol;&Hat;&lpar;&quest;&equals;&period;&ast;&lsqb;&excl;&commat;&num;&dollar;&percnt;&Hat;&amp;&ast;-&rsqb;&rpar;&lpar;&quest;&equals;&period;&ast;&lsqb;0-9&rsqb;&rpar;&lpar;&quest;&equals;&period;&ast;&lsqb;A-Z&rsqb;&rpar;&period;&lcub;8&comma;20&rcub;&dollar;&sol;&apos;</pre>

         <p>Se ven otros valores como ? y .* y la explicacion es la siguiente:</p>

         <pre>&period;&ast; &colon; Puede estar 1 o mas veces en el string&NewLine;&quest;&equals; &colon; Puede estar en cualquier posicion del string</pre>

         <h2>Codigo final de validacion</h2>

         <p>La expresion regular valida que en la entrada de password contenga todos los patrones que en la variable $reg se le indican.</p>

        <pre>&lt;&quest;php&NewLine;    if &lpar;isset&lpar;&dollar;&lowbar;POST&lsqb;&apos;username&apos;&rsqb;&rpar; &amp;&amp; isset&lpar;&dollar;&lowbar;POST&lsqb;&apos;password&apos;&rsqb;&rpar;&rpar;&lcub;&NewLine;      &NewLine;   &dollar;reg &equals; &apos;&sol;&Hat;&lpar;&quest;&equals;&period;&ast;&lsqb;&excl;&commat;&num;&dollar;&percnt;&Hat;&amp;&ast;-&rsqb;&rpar;&lpar;&quest;&equals;&period;&ast;&lsqb;0-9&rsqb;&rpar;&lpar;&quest;&equals;&period;&ast;&lsqb;A-Z&rsqb;&rpar;&period;&lcub;8&comma;20&rcub;&dollar;&sol;&apos;&semi;&NewLine;   &NewLine;   if &lpar;preg&lowbar;match&lpar;&dollar;reg&comma; &dollar;&lowbar;POST&lsqb;&apos;password&apos;&rsqb;&rpar;&rpar;&lcub;&NewLine;      echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Contrasena aceptable&lt;&sol;div&gt;&quot;&semi;&NewLine;   &rcub;else&lcub;&NewLine;      echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-danger&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;Contrasena debil&lt;&sol;div&gt;&quot;&semi;&NewLine;   &rcub;&NewLine;   &rcub;&NewLine;&quest;&gt;</pre>

   
        <hr>
        <h1>Mitigacion</h1>

        <div class="login">
            <div class="account-login">
               <h3>Registrar Usuario</h3>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="text" placeholder="Usuario" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena"  class="form-control" name="password">
                  </div>
                  <input type="submit" class="btn" value="Registrar">
               </form>
            </div>
        </div>
<br>
<?php
    if (isset($_POST['username']) && isset($_POST['password'])){
      
   $reg = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
   
   if (preg_match($reg, $_POST['password'])){
      echo "<div class=\"alert alert-success\" role=\"alert\">Contrasena aceptable</div>";
   }else{
      echo "<div class=\"alert alert-danger\" role=\"alert\">Contrasena debil</div>";
   }
   }
?>

    </div> <!--/.container -->
    </section>
 
    

<?php include("../../footer.php"); ?>