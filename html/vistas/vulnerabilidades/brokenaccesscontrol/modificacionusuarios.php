<?php include("../../header.php"); ?>

<title>Modificacion de datos de otro usuario</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Modificacion de datos de otro usuario</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>Otra forma de romper el acceso es que un usuario pueda modificar datos de otro usuario si no cuenta con los permisos necesarios que solo deberian ser para un rol administrador o necesario para poder editar datos. Pueden existir muchas formas para editar datos  y pueden ser ya sea cambiando un valor de entrada que es lo mas comun.</p>

        <p>En este caso existe una vulnerabilidad que permite que se pueda cambiar la contrasena de un usuario no basandose en la cookie del usuario que se ha repetido siempre que deberia de ser aleatoria, pero en esta vulnerabilidad de manera representativa es enviada una peticion post con el usuario al que se desea cambiar la contrasena, aunque es de tipo hidden no lo vemos de manera grafica ahora pero al ver el codigo fuente se puede ver como existe:</p>


        <pre>&lt;div class&equals;&quot;login&quot;&gt;&NewLine;            &lt;div class&equals;&quot;account-login&quot;&gt;&NewLine;               &lt;h1&gt;Cambio de Contrasena&lt;&sol;h1&gt;&NewLine;               &lt;form action&equals;&quot;&lt;&quest;php echo &dollar;&lowbar;SERVER&lsqb;&quot;PHP&lowbar;SELF&quot;&rsqb;&semi; &quest;&gt;&quot; class&equals;&quot;login-form&quot; method&equals;&quot;post&quot;&gt;&NewLine;                  &lt;div class&equals;&quot;form-group&quot;&gt;&NewLine;                     &lt;input type&equals;&quot;hidden&quot; placeholder&equals;&quot;Usuario&quot; class&equals;&quot;form-control&quot; name&equals;&quot;username&quot; value&equals;&quot;usuario1&quot;&gt;&NewLine;                  &lt;&sol;div&gt;&NewLine;                  &lt;div class&equals;&quot;form-group&quot;&gt;&NewLine;                     &lt;input type&equals;&quot;password&quot; placeholder&equals;&quot;Contrasena nueva&quot;  class&equals;&quot;form-control&quot; name&equals;&quot;password&quot;&gt;&NewLine;                  &lt;&sol;div&gt;&NewLine;                  &lt;div class&equals;&quot;form-group&quot;&gt;&NewLine;                     &lt;input type&equals;&quot;password&quot; placeholder&equals;&quot;Contrasena nueva&quot;  class&equals;&quot;form-control&quot; name&equals;&quot;newpassword&quot;&gt;&NewLine;                  &lt;&sol;div&gt;&NewLine;                  &lt;input type&equals;&quot;submit&quot; class&equals;&quot;btn&quot; value&equals;&quot;Iniciar Sesion&quot;&gt;&NewLine;               &lt;&sol;form&gt;&NewLine;            &lt;&sol;div&gt;&NewLine;        &lt;&sol;div&gt;</pre>


        <p>En este valor que es enviado se puede ver que envia el nombre del usuario que esta oculto ya que es un tipo hidden, si nosotros modificamos ese valor puede pasar que podria cambiar la contrasena de otro usuario que no deberia y deberia estar rompiendo el control, una mitigacion que se ha repetido anteriormente es asignar un usuario a la cookie que deberia de ser aleatoria y segun el usuario que sea propietario de esa cookie cambiarlo automaticamente y practicamente tambien hacer verificacion de contrasena actual.</p>


<hr>

        <div class="login">
            <div class="account-login">
               <h1>Cambio de Contrasena</h1>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="hidden" placeholder="Usuario" class="form-control" name="username" value="usuario1">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena nueva"  class="form-control" name="password">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena nueva"  class="form-control" name="newpassword">
                  </div>
                  <input type="submit" class="btn" value="Iniciar Sesion">
               </form>
            </div>
        </div>

<?php
if (isset($_POST['username'])){
   echo "<br><div class=\"alert alert-success\" role=\"alert\"><strong>Ha cambiado la contrasena de ".$_POST['username']."</strong></div>";
}

?>


    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>