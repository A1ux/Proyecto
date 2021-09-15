<?php include("../../header.php"); ?>

<title>Simple SQL Injection</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">SQL Injection simple</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>


    <br/>
    <img src='img/logo.png'>
    <br/>
    <h2><i>Stay in touch, and keep up with the latest.</i></h2>
    <div id="registration">
        <h2>Create an Account</h2>
        <div id="RegisterUserForm">
            <fieldset>
                <p>
                <label for="name">Name</label>
                <input id="name" name="name" type="text" class="text"
                value="" />
                </p>

                <p>
                <label for="tel">Phone Number</label>
                <input id="tel" name="tel" type="tel" class="text" value=""
                />
                </p>

                <p>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="text"
                value="" />
                </p>

                <p>
                <label for="password">Password</label>
                <input id="password" name="password" class="text"
                type="password" />
                </p>

                <p><input id="acceptTerms" name="acceptTerms" type="checkbox"
                />
                <label for="acceptTerms">
                    I agree to the <a href="">Terms and Conditions</a> and
                    <a href="">Privacy Policy</a>
                </label>
                </p>

                <p>
                <button id="registerNew"
                    onclick="XMLFunction()">Register</button>
                </p>
            </fieldset>
        </div>
    </div>
    <div id="errorMessage" color="red">
    </div>


    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>