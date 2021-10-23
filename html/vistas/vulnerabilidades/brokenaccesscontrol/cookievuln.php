<?php
if (!isset($_COOKIE["id"])){
    $admin = "id";
    $admin_value = "aW52aXRhZG8K";
    setcookie($admin, $admin_value, time() + (86400 * 30), "/");
}
?>
<?php
if (isset($_POST['username']) && $_POST['username'] != 'admin'){
  setcookie("id", base64_encode($_POST['username']), time() + (86400 * 30), "/");
  //$_COOKIE["id"] = $_POST['username'];
}
?>



<?php include("../../header.php"); ?>

<title>Cookie predecible y editable</title>b

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Cookie predecible y editable</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>


        <p>Como se ha repetido anteriormente el uso de cookies predecibles es algo que no deberia de estar en ninguna aplicacion y deberia de generarse de manera aleatoria, asignandose a esta cookie los permisos con los que cuenta el usuario que la porta.</p>

<p>En este caso al iniciar sesion se crea una cookie de manera predecible que va asignado segun el usuario que esta iniciando sesion, al ir a la opcion de developer tools se puede mostrar que la cookie asignada al iniciar sesion, al notar esta se puede ver que la cookie se llama id con un valor asignado, como se muestra en la imagen siguiente:</p>

<img src="/images/cookiepredecibledev.png" alt="Cookie Predecible">Cookie Predecible

<p>Notando la forma de la cookie se puede hacer una busqueda sobre si es un hash o no, en este caso por los valores %3D al final dan an entender que puede estar primero en un formato URL, y al ver el otro valor que se descifra y termina en == da a entender que puede estar codificado en base64 lo que permite que pueda ser decodificado. Por lo que se procede a decodificar dando el siguiente resultado:</p>

<img src="/images/cookiepredecible.png" alt="Cookie Descifrada">Cookie descifrada

<p>Al decodificarlo se ve que la cookie en si es el nombre del usuario con el que se inicio sesion por lo que la hace predecible y que alguien mal intencionado pueda editarlo para obtener acceso a algun usuario en el sistema y hacerse pasar por el. En este caso la idea es hacerse pasar por el usuario admin, para eso lo necesario es hacer lo inverso a lo que hace el sistema y codificar nuestra cookie pero con el valor admin para poder romper el control de la aplicacion. Al hacer el cambio podemos ver como nos hacemos con el Admin</p>

<img src="/images/bypass.png" alt="Saltarse el control">Salto hacia usuario Admin

<p>Con esto cualquier usuario cambiando un valor de la cookie puede hacer que se haga con cualquier cuenta del sistema por eso siempre se debe de generar cookies aleatorias y que no generen mayor informacion. Con solo hacer una inversa para poder acceder a otros recursos como en este caso que convirtio el usuario Admin en base64 siendo un valor YWRtaW4==</p>

<hr>
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
  if ($_COOKIE["id"] == 'YWRtaW4=='){
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario Admin</strong></div>";
  }else{
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario sin permisos</strong></div>";
  }
}
?>



    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>