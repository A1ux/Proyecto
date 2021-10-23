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


        <p>Al ingresar al sistema se debe evitar que el cambiar algunos valores en el sistema permitan hacerse con una cuenta administrador sin que tenga los permisos necesarios para tener esas caracteristicas. Por eso se debe denegar el acceso a modulos de administracion a un usuario que no deba y el manejo de cookies deberia de ser con caracteres aleatorios o modulos que el propio usuario pueda modificar para hacerse con una cuenta de administrador</p>

        <img src="/images/cookie.png" alt="cookie editable">Cookie puede ser editada

        <p>Como se puede ver la cookie aca permite modificar que sea administrador, si se cambia su valor por un 1 permite que el usuario podria ser administrador y romper el control de acceso. Por lo tanto las cookies siempre deberian ser llenada de valores aleatorios y asignarle a esa cookie los permisos que el usuario deberia de tener y no usar valores que el usuario podria modificar para hacerse con el control de un sistema. Como se ve en el ejemplo de que muestra una nota qu ele usuario es admin si ese valor esta en 1 o sea true.</p>

        <pre>&lt;&quest;php&NewLine;if&lpar;count&lpar;&dollar;&lowbar;COOKIE&rpar; &gt; 0&rpar; &lcub;&NewLine;  if &lpar;&dollar;&lowbar;COOKIE&lsqb;&quot;isAdmin&quot;&rsqb; &equals;&equals; &quot;1&quot;&rpar;&lcub;&NewLine;    echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;&lt;strong&gt;Eres un usuario Admin&lt;&sol;strong&gt;&lt;&sol;div&gt;&quot;&semi;&NewLine;  &rcub;else&lcub;&NewLine;    echo &quot;&lt;div class&equals;&bsol;&quot;alert alert-success&bsol;&quot; role&equals;&bsol;&quot;alert&bsol;&quot;&gt;&lt;strong&gt;Eres un usuario sin permisos&lt;&sol;strong&gt;&lt;&sol;div&gt;&quot;&semi;&NewLine;  &rcub;&NewLine;&rcub;&NewLine;&quest;&gt;</pre>

        <p>El codigo anterior muestra como el sistema evalua la entrada de la cookie, pero podria ser esto tomarlo de cualquier otro valor que el sistema espera y que el usuario tenga acceso a modificarlo.</p>

<?php
if(count($_COOKIE) > 0) {
  if ($_COOKIE["isAdmin"] == "1"){
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario Admin</strong></div>";
  }else{
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Eres un usuario sin permisos</strong></div>";
  }
}
?>



    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>