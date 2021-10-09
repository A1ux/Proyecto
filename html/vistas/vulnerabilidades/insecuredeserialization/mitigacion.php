<?php include("../../header.php"); ?>

<title>Mitigacion</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Mitigacion</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <h1>FALTA</h1>
<?php 
    class PHPObjectInjection{
        public $inject;
        function __construct(){
        }
        function __wakeup(){
            if(isset($this->inject)){
                eval($this->inject);
            }
        }
    }
    if(isset($_REQUEST['datos'])){  
        $var1=unserialize($_REQUEST['datos']);
        if(is_array($var1)){
            echo "<br/>".$var1[0]." - ".$var1[1];
        }
    }
    else{
        echo "Ingrese una peticion get en el valor 'datos'"; # nothing happens here
    }
?>


    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>