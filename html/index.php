<!DOCTYPE html>
<!--
	Delex by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8"/>

  <!-- Site Title-->
  <title>TOP 10 OWASP Vulnerabilidades</title>

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

  <!-- Google-fonts -->
  <link href='http://fonts.googleapis.com/css?family=Signika+Negative:300,400,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <!-- Fonts-style -->
  <link rel="stylesheet" href="css/styles.css"/>
  <!-- Fonts-style -->
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <!-- Modal-Effect -->
  <link href="css/component.css" rel="stylesheet">
  <!-- owl-carousel -->
  <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
  <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
  <!-- Template Styles-->
  <link rel="stylesheet" href="css/style.css"/>
  <!-- Template Color-->
  <link rel="stylesheet" type="text/css" href="css/green.css" media="screen" id="color-opt" />



</head>

<body data-spy="scroll" data-offset="80">

  <!-- Preloader -->
  <div class="animationload">
    <div class="loader">
        Cargando la matrix....
    </div>
  </div> 
  <!-- End Preloader -->


  <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">A1ux</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Home</a></li>
          <li><a href="recursos.php">Recursos</a></li>
          <li><a href="herramientas.php">Herramientas</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>

    <!-- /HOME -->
    <section class="main-home" id="home">
      <div class="home-page-photo"></div> <!-- Background image -->
      <div class="home__header-content">
        <div id="main-home-carousel" class="owl-carousel">
          <div>
            <h1 class="intro-title">OWASP</h1>
            <p class="intro-text">Es un proyecto de código abierto dedicado a determinar y combatir las causas que hacen que el software sea inseguro. La Fundación OWASP es un organismo sin ánimo de lucro que apoya y gestiona los proyectos e infraestructura de OWASP. La comunidad OWASP está formada por empresas, organizaciones educativas y particulares de todo mundo. Juntos constituyen una comunidad de seguridad informática que trabaja para crear artículos, metodologías, documentación, herramientas y tecnologías que se liberan y pueden ser usadas gratuitamente por cualquiera. </p>
          </div><!--slide item like paragraph-->

          <div>
            <h1 class="intro-title">Top 10 OWASP</h1>
            <p class="intro-text">Al ser la prioridad del proyecto la seguridad de aplicaciones web OWASP menciona el top 10 de ataques y vulnerabilidades a las que están expuestas este elemento de las empresas modernas. Recomienda que desde el desarrollo de la misma y las pruebas de penetración se considere los riesgos constantes a los que están expuestos las páginas de las empresas mediante la lista OWASP top 10</p>
            <a class="btn btn-custom" href="#">Aprender</a>
          </div><!--slide item like paragraph-->

        </div>
      </div>
    </section>
    <!-- /End HOME -->

    <!-- / SERVICES -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Vulnerabilidades</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-4"> <!-- Service-item -->
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-design-graphic-tablet-streamline-tablet color-l-orange"></i> 
                </div>
                <h5><a href="/vistas/vulnerabilidades/injection/index.php">Inyeccion</a></h5>
                <p>Los ataques por inyección se refieren a una amplia clase de vectores de ataque. En un ataque de inyección, un atacante proporciona información no confiable a un programa. Esta entrada es procesada por un intérprete como parte de un comando o consulta. A su vez, esto altera la ejecución de ese programa.</p>
              </div>
            </div>
          </div>

          <div class="col-sm-4"> <!-- Service-item -->
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-design-pencil-rule-streamline color-l-blue"></i> 
                </div>
                <h5><a href="/vistas/vulnerabilidades/brokenauthentication/index.php">Perdida de Autenticacion</a></h5>
                <p>La autenticación rota generalmente se debe a funciones de administración de sesión y autenticación mal implementadas. Los ataques de autenticación rota tienen como objetivo apoderarse de una o más cuentas y otorgar al atacante los mismos privilegios que al usuario atacado. La autenticación se "rompe" cuando los atacantes pueden comprometer contraseñas, claves o tokens de sesión, información de la cuenta del usuario y otros detalles para asumir las identidades del usuario.</p>
              </div>
            </div>
          </div>

          <div class="col-sm-4"> <!-- Service-item -->
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-speech-streamline-talk-user color-l-yellow"></i> 
                </div>
                <h5><a href="/vistas/vulnerabilidades/sensitivedataexposure/index.php">Exposicion de Datos Sensibles</a></h5>
                <p>La exposición de datos confidenciales ocurre cuando una aplicación, empresa u otra entidad expone inadvertidamente datos personales. La exposición de datos sensibles difiere de una violación de datos, en la que un atacante accede y roba información.</p>
              </div>
            </div>
          </div>
        </div> <!--/.row -->

        <div class="row">
          <div class="col-sm-4"> <!-- Service-item -->
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-settings-streamline-2 color-l-purple"></i> 
                </div>
                <h5><a href="/vistas/vulnerabilidades/xxe/index.php">Entidades Externas XML (XXE)</a></h5>
                <p>La inyección de entidad externa XML (también conocida como XXE) es una vulnerabilidad de seguridad web que permite a un atacante interferir con el procesamiento de datos XML de una aplicación. A menudo permite que un atacante vea archivos en el sistema de archivos del servidor de aplicaciones e interactúe con cualquier sistema de back-end o externo al que la aplicación pueda acceder.</p>
              </div>
            </div>
          </div>

          <div class="col-sm-4"> <!-- Service-item -->
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-streamline-umbrella-weather color-l-pink"></i> 
                </div>
                <h5><a href="/vistas/vulnerabilidades/brokenaccesscontrol/index.php">Perdida de Control de Acceso</a></h5>
                <p>El control de acceso hace cumplir la política de modo que los usuarios no pueden actuar fuera de sus permisos previstos. Las fallas generalmente conducen a la divulgación de información no autorizada, la modificación o destrucción de todos los datos, o la realización de una función comercial fuera de los límites del usuario.</p>
              </div>
            </div>
          </div>

          <div class="col-sm-4"> <!-- Service-item -->
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-caddie-shopping-streamline color-l-green"></i> 
                </div>
                <h5><a href="/vistas/vulnerabilidades/securitymisconfiguration/index.php">Configuracion de Seguridad Incorrecta</a></h5>
                <p>Las configuraciones incorrectas de seguridad son controles de seguridad que se configuran de manera incorrecta o se dejan inseguros, lo que pone en riesgo sus sistemas y datos. Básicamente, cualquier cambio de configuración mal documentado, configuración predeterminada o un problema técnico en cualquier componente de sus puntos finales podría provocar una configuración incorrecta.</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4"> <!-- Service-item -->
              <div class="text-center services-item">
                <div class="col-wrapper">
                  <div class="icon-border"> 
                    <i class="icon-settings-streamline-2 color-l-purple"></i> 
                  </div>
                  <h5><a href="/vistas/vulnerabilidades/xss/index.php">Cross-Site Scripting (XSS)</a></h5>
                  <p>Los ataques Cross-Site Scripting (XSS) son un tipo de inyección, en el que se inyectan scripts maliciosos en sitios web que de otro modo serían benignos y confiables. Los ataques XSS ocurren cuando un atacante usa una aplicación web para enviar código malicioso, generalmente en forma de un script del lado del navegador, a un usuario final diferente.</p>
                </div>
              </div>
            </div>
  
            <div class="col-sm-4"> <!-- Service-item -->
              <div class="text-center services-item">
                <div class="col-wrapper">
                  <div class="icon-border"> 
                    <i class="icon-streamline-umbrella-weather color-l-pink"></i> 
                  </div>
                  <h5><a href="/vistas/vulnerabilidades/insecuredeserialization/index.php">Deserializacion Insegura</a></h5>
                  <p>La deserialización insegura ocurre cuando un sitio web deserializa los datos controlables por el usuario. Esto potencialmente permite a un atacante manipular objetos serializados para pasar datos dañinos al código de la aplicación.</p>
                </div>
              </div>
            </div>
  
            <div class="col-sm-4"> <!-- Service-item -->
              <div class="text-center services-item">
                <div class="col-wrapper">
                  <div class="icon-border"> 
                    <i class="icon-caddie-shopping-streamline color-l-green"></i> 
                  </div>
                  <h5><a href="/vistas/vulnerabilidades/usingcomponentswithknownvulnerabilities/index.php">Uso de componentes con vulnerabilidades Conocidas</a></h5>
                  <p>Las vulnerabilidades conocidas son vulnerabilidades que se descubrieron en componentes de código abierto y se publicaron en NVD, avisos de seguridad o rastreadores de problemas. Desde el momento de la publicación, los piratas informáticos que encuentran la documentación pueden aprovechar una vulnerabilidad. Según OWASP, el problema de utilizar componentes con vulnerabilidades conocidas es muy frecuente. Además, el uso de componentes de código abierto está tan extendido que muchos líderes de desarrollo ni siquiera saben lo que tienen.</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4"> <!-- Service-item -->
                <div class="text-center services-item">
                  <div class="col-wrapper">
                    <div class="icon-border"> 
                      <i class="icon-settings-streamline-2 color-l-purple"></i> 
                    </div>
                    <h5><a href="/vistas/vulnerabilidades/insufficientloggingandmonitoring/index.php">Registro y Monitoreo Insuficientes</a></h5>
                    <p>Cuando un infiltrado malintencionado con motivos auténticos para consultar bases de datos, acceder a aplicaciones, modificar configuraciones del sistema y ofuscar registros, las organizaciones se quedan impotentes para detectar lo que sucedió. Por lo tanto, los detalles del registro del acceso de los usuarios son esenciales para proteger y prevenir la violación/robo de datos.</p>
                  </div>
                </div>
              </div>
        </div> <!--/.row -->
      </div> <!--/.container -->

    <!-- / End services-->

    <!-- FOOTER begings -->
      <div class="footer-bottom text-center"> <!-- Footer-copyright -->
        <p>©2021 Santos. Design By <a href="http://a1ux.github.io">Cristian Santos aka A1ux</a></p>
      </div>
    <!-- End footer begings -->


    <!-- Scroll top -->
    <a href="#" class="back-to-top"> <i class="fa fa-chevron-up"> </i> </a>


    <!-- Style switcher -->
    <div id="style-switcher" style="left: 0px;">
        <div>
            <h3>Select your color</h3>
            <ul class="pattern">
                <li><a class="color1" href="#"></a></li>
                <li><a class="color2" href="#"></a></li>
                <li><a class="color3" href="#"></a></li>
                <li><a class="color4" href="#"></a></li>
                <li><a class="color5" href="#"></a></li>
                <li><a class="color6" href="#"></a></li>
                <li><a class="color7" href="#"></a></li>
                <li><a class="color8" href="#"></a></li>
                <li><a class="color9" href="#"></a></li>
                <li><a class="color10" href="#"></a></li>
                <li><a class="color11" href="#"></a></li>
                <li><a class="color12" href="#"></a></li>
            </ul>
        </div>      
        <div class="bottom">
            <a href="#" class="settings"><i class="fa fa-refresh fa-spin"></i></a>
        </div>
    </div>
    <!-- end Style switcher --> 


    <!-- JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <!-- initialize jQuery Library -->
     <script src="js/jquery.min.js"></script>
     <!-- jquery easing -->
     <script src="js/jquery.easing.min.js"></script>
     <!-- Bootstrap -->
     <script src="js/bootstrap.min.js"></script>
     <!-- modal-effect -->
     <script src="js/classie.js"></script>
     <script src="js/modalEffects.js"></script>
     <!-- Counter-up -->
     <script src="js/waypoints.min.js" type="text/javascript"></script>
     <script src="js/jquery.counterup.min.js" type="text/javascript"></script>
     <!-- SmoothScroll -->
     <script src="js/SmoothScroll.js"></script>
     <!-- Parallax -->
     <script src="js/jquery.stellar.min.js"></script>
     <!-- Jquery-Nav -->
     <script src="js/jquery.nav.js"></script>
     <!-- Owl carousel -->                                                      
     <script type="text/javascript" src="js/owl.carousel.min.js"></script>
     <!-- App JS -->
     <script src="js/app.js"></script>

     <!-- Switcher script for demo only -->
    <script type="text/javascript" src="js/switcher.js"></script>


  </body>
</html>
