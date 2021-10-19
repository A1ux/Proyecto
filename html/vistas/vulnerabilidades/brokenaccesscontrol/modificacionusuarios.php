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

<pre>&lt;&quest;php&NewLine;   &dollar;usuario &equals; &dollar;&lowbar;SESSION&lsqb;&apos;usuario&apos;&rsqb;&semi;&NewLine;   &dollar;result &equals; mysqli&lowbar;query&lpar;&dollar;conn&comma; &quot;SELECT &ast;from users WHERE username&equals;&apos;&quot; &period; &dollar;&lowbar;SESSION&lsqb;&quot;username&quot;&rsqb; &period; &quot;&apos;&quot;&rpar;&semi;&NewLine;   &dollar;row &equals; mysqli&lowbar;fetch&lowbar;array&lpar;&dollar;result&rpar;&semi;&NewLine;   if &lpar;&dollar;&lowbar;POST&lsqb;&quot;currentPassword&quot;&rsqb; &equals;&equals; &dollar;row&lsqb;&quot;password&quot;&rsqb;&rpar; &lcub;&NewLine;      mysqli&lowbar;query&lpar;&dollar;conn&comma; &quot;UPDATE users set password&equals;&apos;&quot; &period; &dollar;&lowbar;POST&lsqb;&quot;newPassword&quot;&rsqb; &period; &quot;&apos; WHERE username&equals;&apos;&quot; &period; &dollar;&lowbar;SESSION&lsqb;&quot;username&quot;&rsqb; &period; &quot;&apos;&quot;&rpar;&semi;&NewLine;      &dollar;message &equals; &quot;Password cambiada&quot;&semi;&NewLine;   &rcub;else&lcub;&NewLine;      &dollar;message &equals; &quot;Error al procesar&quot;&semi;&NewLine;&rcub;&NewLine;&quest;&gt;</pre>




        <div class="login">
            <div class="account-login">
               <h1>Cambio de Contrasena</h1>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="hidden" placeholder="Usuario" class="form-control" name="username" value="usuario1">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena actual"  class="form-control" name="password">
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