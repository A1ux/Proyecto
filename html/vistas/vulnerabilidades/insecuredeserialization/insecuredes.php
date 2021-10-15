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

        <pre>&lt;&quest;php&NewLine;&NewLine;if &lpar;isset&lpar;&dollar;&lowbar;GET&lsqb;&apos;serializado&apos;&rsqb;&rpar;&rpar;&lcub;&NewLine;    &dollar;serializado &equals; base64&lowbar;decode&lpar;&dollar;&lowbar;GET&lsqb;&apos;serializado&apos;&rsqb;&rpar;&semi;&NewLine;    Class  ConvisoPerson&lcub;&NewLine;        public &dollar;username&semi;&NewLine;        public &dollar;team&semi;&NewLine;        public &dollar;age&semi;&NewLine;        public &dollar;office&semi;&NewLine;        public &dollar;accountAdmin&semi;&NewLine;        public  function  validateAdmin&lpar;&rpar;&lcub;&NewLine;            if &lpar;&dollar;this-&gt;accountAdmin&rpar;&lcub;&NewLine;                echo  &apos; &lsqb;&plus;&rsqb; &apos;  &period;  &dollar;this-&gt;username &period;  &apos; es administrador&bsol;n&apos;&semi;&NewLine;            &rcub; else &lcub;&NewLine;                echo  &apos; &lsqb;&plus;&rsqb; &apos;  &period;  &dollar;this-&gt;username &period;  &apos; no es administrador&bsol;n&apos;&semi;&NewLine;            &rcub;&NewLine;        &rcub;&NewLine;    &rcub;&NewLine;&NewLine;    &dollar;admin&lowbar;unserialize &equals; new ConvisoPerson&lpar;&rpar;&semi;&NewLine;    echo gettype&lpar;&dollar;admin&lowbar;unserialize&rpar;&semi;&NewLine;    &num;&dollar;admin&lowbar;unserialize &equals; serialize&lpar;&dollar;serializado&rpar;&semi;&NewLine;    &num;echo gettype&lpar;&dollar;admin&lowbar;unserialize&rpar;&semi;&NewLine;&NewLine;    &num;echo &dollar;admin&lowbar;unserialize&semi;&NewLine;&NewLine;    &dollar;admin&lowbar;unserialize &equals; unserialize&lpar;&dollar;serializado&rpar;&semi;&NewLine;    &sol;&sol;echo &dollar;admin&lowbar;unserialize&semi;&NewLine;    echo &dollar;admin&lowbar;unserialize-&gt;validateAdmin&lpar;&rpar;&semi;&NewLine;&rcub;&NewLine;&quest;&gt;</pre>

        <p>Lo que aqui se muestra es la ejecucion de la funcion unserialize que hace descifrar los datos serializados, estos pueden venir desde un formulario u otra forma pero la idea es notar que el sistema recibe estos datos y luego muestra una salida de estos. El ejemplo que podria recibir seria:</p>

        <pre>Base64<br>TzoxMzoiQ29udmlzb1BlcnNvbiI6NTp7czo4OiJ1c2VybmFtZSI7czo2OiJBbnRvbnkiO3M6NDoidGVhbSI7czo1OiJQVGFhUyI7czozOiJhZ2UiO2k6MTc7czo2OiJvZmZpY2UiO3M6NjoiSW50ZXJuIjtzOjEyOiJhY2NvdW50QWRtaW4iO2I6MDt9<br><br>Serializado<br>O:13:"ConvisoPerson":5:{s:8:"username";s:6:"Antony";s:4:"team";s:5:"PTaaS";s:3:"age";i:17;s:6:"office";s:6:"Intern";s:12:"accountAdmin";b:0;}</pre>

        <p>La cadena anterior muestra una estructura en tipo de objeto serializado, primero 0:13 da a entender que el valor de la clase tendra un nombre de 13 caracteres. Y las variables que  almacena son 5. Luego siguiendo una string de 8 caracteres llamada "username. Luego le sigue otra string de 6 caracteres con valor Antony y asi sucesivamente como i que significa que es un valor entero, pero aca lo importante es ver en el valor booleano de accountAdmin que es 0 si no es admin y 1 si lo es. Ese es el valor que podriamos modificar.</p>

        <p>Ahora con todo esto y sabiendo un atacante que espera objetos serializados podria aprovecharse de ejecutar comandos en la aplicacion, todo con este objeto serializado, o tambien podria hacerse de ser Administrador como en este ejemplo, cambiando el valor donde se define si es Admin o no, haciendo el cambio en el valor de accountAdmin de b que significa boolean a 1.</p>

        <pre>O:13:"ConvisoPerson":5:{s:8:"username";s:6:"Antony";s:4:"team";s:5:"PTaaS";s:3:"age";i:17;s:6:"office";s:6:"Intern";s:12:"accountAdmin";b:1;}</pre>
<?php

if (isset($_GET['serializado'])){
    $serializado = base64_decode($_GET['serializado']);
    Class  ConvisoPerson{
        public $username;
        public $team;
        public $age;
        public $office;
        public $accountAdmin;
        public  function  validateAdmin(){
            if ($this->accountAdmin){
                echo  ' [+] '  .  $this->username .  ' es administrador\n';
            } else {
                echo  ' [+] '  .  $this->username .  ' no es administrador\n';
            }
        }
    }

    $admin_unserialize = new ConvisoPerson();
    echo gettype($admin_unserialize);

    $admin_unserialize = unserialize($serializado);
    echo $admin_unserialize->validateAdmin();
}else{
    echo "<h3 color='red'>Ingrese una peticion get con la variable serializado en base64</h3>";
}
?>

    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>