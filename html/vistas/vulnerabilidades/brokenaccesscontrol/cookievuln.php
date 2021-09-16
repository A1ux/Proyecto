<?php
if (!isset($_COOKIE["id"])){
    $admin = "id";
    $admin_value = "";
    setcookie($admin, $admin_value, time() + (86400 * 30), "/");
}
?>

<?php include("../../header.php"); ?>

<title>Cookie predecible y editable</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Cookie predecible y editable</h3>
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
<br>

<?php
if (isset($_POST['username']) && $_POST['username'] != 'admin'){
    $_COOKIE["id"] = md5($_POST['username']);
}
?>

<?php
if(count($_COOKIE) > 0) {
  if ($_COOKIE["id"] == "21232f297a57a5a743894a0e4a801fc3"){
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario Admin</strong></div>";
  }else{
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario sin permisos</strong></div>";
  }
}else{
  setcookie("usuario", "", time() + 3600, '/');
}
?>



    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>