<?php
if (!isset($_COOKIE["isAdmin"])){
    $admin = "isAdmin";
    $admin_value = "0";
    setcookie($admin, $admin_value, time() + (86400 * 30), "/");
}
?>

<?php include("../../header.php"); ?>

<title>Rol de Admin Modificable</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Rol de Admin Modificable</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>



<?php
if(count($_COOKIE) > 0) {
  echo "Cookies habilitadas<br>";
  if ($_COOKIE["isAdmin"] == "1"){
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario Admin</strong></div>";
  }else{
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario sin permisos</strong></div>";
  }
}else{
  echo "Cookies deshabilitadas";
  setcookie("admin", "0", time() + 3600, '/');
}
?>



    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>