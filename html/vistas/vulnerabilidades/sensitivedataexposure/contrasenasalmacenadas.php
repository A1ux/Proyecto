<?php include("../../header.php"); ?>

<title>Contrasenas fuertemente almacenadas</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Contrasenas fuertemente almacenadas</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>El almacenaje de contrasenas es algo que se debe de tratar de una manera muy importante ya que existen cifrados no seguros que actualmente se siguen utilizando o simplemente realizando un proceso de hash hacia la contrasena sin contar otros puntos importantes</p>

        <p>Los puntos importantes a tomar en cuenta son:</p>

        <ul>
            <li>Aplicar algoritmo hash sobre contrasenas</li>
            <li>Aplicar un salt para que la salida del hash sea distinta</li>
            <li>Uso de algoritmos de cifrado fuertes</li>
        </ul>

        <p>El siguiente ejemplo muestra como puede aplicarse un algoritmo de cifrado sobre la contrasena usando salt y a la vez el cifrado de BCRYPT que es el predeterminado en PHP por el momento al ser seguro</p>
        <pre>&lt;&quest;php&NewLine;echo password&lowbar;hash&lpar;&quot;rasmuslerdorf&quot;&comma; PASSWORD&lowbar;DEFAULT&rpar;&semi;&NewLine;&quest;&gt;</pre>
    <p>
        Su salida seria la siguiente:
    </p>

    <pre>&dollar;2y&dollar;10&dollar;&period;vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a</pre>
    

    <p>Algoritmos que no se deben tomar en cuenta:</p>

    <ul>
        <li><strike>ECB</strike></li></li>
        <li><strike>MD5</strike></li>
        <li><strike>MD4</strike></li>
        <li><strike>mcrypt</strike></li>
        <li><strike>mdecrypt</strike></li>
    </ul>

    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>