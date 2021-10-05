<?php include("../../header.php"); ?>

<title>Transmision de datos con protocolos seguros</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Transmision de datos con protocolos seguros</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>
            Todos conocemos actualmente el uso de HTTPS en las paginas web, generalmente aunque no es labor del programador este tipo de opciones si es una de las opciones que se suele olvidar a la hora de implementar. El trabajar bajo HTTP permite que todo el trafico que es generado pueda ser escuchado por cualquier delincuente y pueda tomar las credenciales o datos que se estan transmitiendo.
        </p>

        <p>
            Generalmente se hace uso de certificados SSL que existen tipos como autofirmados y los generados por autoridades reconocidas. La idea es tener un certificado que permita que el trafico no se pueda capturar y que puedan ver los datos ahi transmitidos
        </p>

        <p>
            Al tratarse de tema web se explica protocolos seguros como HTTPS pero tambien seria bueno tomar en cuenta olvidar protocolos como FTP que tambien muchas veces sirven para subir archivos a un servidor web.
        </p>

        <p>Si no se desea comprar un certificado para nuestra web, existen entidades como Lets Encrypt para poder generar certificados en base a nuestra ip publica y el dominio que tenemos apuntando hacia este. Y todo servidores web como Apache, IIS, Nginx entre otros.</p>
        
    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>