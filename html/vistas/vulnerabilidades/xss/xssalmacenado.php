<?php include("../../header.php"); ?>

<title>XSS Almacenado</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">XSS Almacenado</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>


<form role="form">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
    //comentario llevaria
    //nombre, comentario, pagina
?>

    </div> <!--/.container -->
    </section> <!--/.container
    

<?php include("../../footer.php"); ?>