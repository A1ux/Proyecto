<?php include("../../header.php"); ?>

<title>Admin Desprotegido</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Admini Desprotegido</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

<?php
$cookie_admin = "admin";
$cookie_value = "1";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>