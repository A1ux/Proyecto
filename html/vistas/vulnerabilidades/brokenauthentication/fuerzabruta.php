<?php include("../../header.php"); ?>

<title>Fuerza Bruta</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Fuerza Bruta</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

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

    </div> <!--/.container -->
    </section>
 
    

<?php include("../../footer.php"); ?>