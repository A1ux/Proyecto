<?php include("header.php"); ?>
<title>Administracion</title>

<?php
if(isset($_SESSION["user"])){
}else{
  http_response_code(403);
  die();
}
?>

<?php include("menu.php"); ?>

<?php include("footer.php"); ?>