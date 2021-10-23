<?php include("../../header.php"); ?>

<title>Admin Desprotegido</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Admin Desprotegido</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
        <!-- Administracion /vistas/vulnerabilidades/brokenaccesscontrol/admin.php -->

        <p>Otro punto a tener en cuenta en la seguridad es la manera en que se protege modulos de la aplicacion, existen siempre directorios o rutas para poder administrar la aplicacion que es para el superusuario que permite hacer todo en la aplicacion.</p>

        <p>A veces se puede hacer una busqueda automatizada para encontrar la ruta de la administracion o a veces puede ir en el codigo o una simple aplicacion. Al querer ingresar a ese modulo de administracion se debe de hacer la verificacion a traves de cookies y esperando que esa cookie sea lo suficientemente aleatoria para que no pueda ser modificada de alguna manera para poder acceder al sistema de administracion.</p>

        <p>Una manera de bloquear el acceso en php </p>

        <pre>&lt;&quest;php&NewLine;if &lpar;&dollar;&lowbar;SESSION&lsqb;&apos;isAdmin&apos;&rsqb; &equals; true&rpar;&lcub;&NewLine;   &sol;&sol;Dar acceso&NewLine;&rcub;else&lcub;&NewLine;   http&lowbar;response&lowbar;code&lpar;403&rpar;&semi;&NewLine;&rcub;&NewLine;&quest;&gt;</pre>


    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>