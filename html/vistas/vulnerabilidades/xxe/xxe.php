<?php include("../../header.php"); ?>

<title>XXE</title>
<script src="script.js"></script>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">XXE</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

    <br>
    <div id="registration">
        <h2>Crear cuenta</h2>
        <div id="RegisterUserForm">
            <fieldset>
                <p>
                <label for="email">Correo</label>
                <input id="email" name="email" type="email" class="text"
                value="" />
                </p>
                <p>
                <label for="password">Contrasena</label>
                <input id="password" name="password" class="text"
                type="password" />
                </p>
                <p><input id="acceptTerms" name="acceptTerms" type="checkbox"
                />
                <label for="acceptTerms">
                    Acepto los terminos y condiciones
                </label>
                </p>
                <p>
                <button id="registerNew"
                    onclick="XMLFunction()">Registrar</button>
                </p>
            </fieldset>
        </div>
    </div>
    <div id="errorMessage" color="red">
    </div>


    </div> <!--/.container -->
    </section> <!--/.contaier
    

<?php include("../../footer.php"); ?>