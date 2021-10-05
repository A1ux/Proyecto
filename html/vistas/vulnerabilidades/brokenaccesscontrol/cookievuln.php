<?php
if (isset($_POST['username']) && $_POST['username'] != 'admin'){
  setcookie("id", base64_encode($_POST['username']), time() + (86400 * 30), "/");  
  //$_COOKIE["id"] = $_POST['username'];
}
?>

<?php
if (!isset($_COOKIE["id"])){
    $admin = "id";
    $admin_value = "aW52aXRhZG8K";
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
if(count($_COOKIE) > 0) {
  if ($_COOKIE["id"] == "YWRtaW4K"){
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario Admin</strong></div>";
  }else{
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario sin permisos</strong></div>";
  }
}
?>



    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>