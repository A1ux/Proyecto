<?php include("../../header.php"); ?>

    <title>Inyeccion</title>
    
    <section id="injection">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Inyeccion</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <ul class="list-group">
          <li class="list-group-item active">SQL Injection</li>
          <li class="list-group-item list-group-item-danger"><a href="simplesqlinjection.php">Simple SQL Injection</a></li>
          <li class="list-group-item list-group-item-danger"><a href="#">Blind SQL Injection</a></li>
          <li class="list-group-item list-group-item-danger">Error Based</li>
          <li class="list-group-item list-group-item-danger">Time Based</li> 
          <li class="list-group-item list-group-item-danger"><a href="loginbypass.php">Login Bypass</a></li>
          <li class="list-group-item list-group-item-success">Mitigacion</li> 
        </ul>
        <ul class="list-group">
          <li class="list-group-item active"> <a href="commandinjection.php">Command Injection</a></li>
          <li class="list-group-item list-group-item-success">Mitigacion</li> 
        </ul>
        <ul class="list-group">
          <li class="list-group-item active">NoSQL Injection</li>
          <li class="list-group-item list-group-item-success">Mitigacion</li> 
        </ul>
        <ul class="list-group">
          <li class="list-group-item active">GraphQL Injection (Pendiente)</li>
          <li class="list-group-item list-group-item-success">Mitigacion</li> 
        </ul>             
    </div> <!--/.container -->
    </section> <!--/.container

<?php include("../../footer.php"); ?>
