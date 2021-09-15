<?php include("../../header.php"); ?>

<title>Deserializacion Insegura</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Deserializacion Insegura</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

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
    if(isset($_REQUEST['r'])){  
        $var1=unserialize($_REQUEST['r']);
        if(is_array($var1)){
            echo "<br/>".$var1[0]." - ".$var1[1];
        }
    }
    else{
        echo ""; # nothing happens here
    }
?>


    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>