<?php include("../../header.php"); ?>

<title>Cifrados obsoletos y debiles</title>

<section id="template">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center">Cifrados obsoletos y debiles</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>

        <p>El asegurar las comunicaciones como HTTPS no es suficiente con la generacion de certificados, tambien se deben de verificar factores como los siguientes:</p>

        <h3>Versiones debiles de SSL o TLS</h3>
        <ul>
            <li>SSL Version 3</li>
            <li>SSL Version 2</li>
            <li>SSL Version 1.0</li>
        </ul>

        <h3>Cifrados TLS soportados pero debiles de SSL</h3>
        <ul>
            <li>Cifrado RSA de tipo export-grade</li>
            <li>Cifrado DH del tipo export-grade</li>
            <li>Cifrado TLS basados en el algoritmo RC4</li>
            <li>Cifrado DH menor a 2048 bits</li>
            <li>Cifrado TLS con tamano de bloque de 64 bits</li>
        </ul>

        <p>Aunque estas practicas algunas son mucho mas complicadas de explotar es posible que pueda ser posible, asi que siempre es mejor seguir estas recomendaciones y evitar usar este tipos de cifrados y checar que el cifrado este soportado</p>

        <p>Una manera de realizar esto es con la herramienta sslscan que lista los protocolos habilitados y los cifrados que utiliza como por ejemplo:</p>

        <pre>sslscan --no-color https&colon;&sol;&sol;owasp&period;org&sol;&NewLine;Version&colon; 2&period;0&period;10&NewLine;OpenSSL 1&period;1&period;1l  24 Aug 2021&NewLine;&NewLine;Connected to 172&period;67&period;10&period;39&NewLine;&NewLine;Testing SSL server owasp&period;org on port 443 using SNI name owasp&period;org&NewLine;&NewLine;  SSL&sol;TLS Protocols&colon;&NewLine;SSLv2     disabled&NewLine;SSLv3     disabled&NewLine;TLSv1&period;0   disabled&NewLine;TLSv1&period;1   disabled&NewLine;TLSv1&period;2   enabled&NewLine;TLSv1&period;3   enabled&NewLine;&NewLine;  TLS Fallback SCSV&colon;&NewLine;Server supports TLS Fallback SCSV&NewLine;&NewLine;  TLS renegotiation&colon;&NewLine;Session renegotiation not supported&NewLine;&NewLine;  TLS Compression&colon;&NewLine;OpenSSL version does not support compression&NewLine;Rebuild with zlib1g-dev package for zlib support&NewLine;&NewLine;  Heartbleed&colon;&NewLine;TLSv1&period;3 not vulnerable to heartbleed&NewLine;TLSv1&period;2 not vulnerable to heartbleed&NewLine;&NewLine;  Supported Server Cipher&lpar;s&rpar;&colon;&NewLine;Preferred TLSv1&period;3  128 bits  TLS&lowbar;AES&lowbar;128&lowbar;GCM&lowbar;SHA256        Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;3  256 bits  TLS&lowbar;AES&lowbar;256&lowbar;GCM&lowbar;SHA384        Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;3  256 bits  TLS&lowbar;CHACHA20&lowbar;POLY1305&lowbar;SHA256  Curve 25519 DHE 253&NewLine;Preferred TLSv1&period;2  256 bits  ECDHE-ECDSA-CHACHA20-POLY1305 Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  128 bits  ECDHE-ECDSA-AES128-GCM-SHA256 Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  128 bits  ECDHE-ECDSA-AES128-SHA        Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  256 bits  ECDHE-ECDSA-AES256-GCM-SHA384 Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  256 bits  ECDHE-ECDSA-AES256-SHA        Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  128 bits  ECDHE-ECDSA-AES128-SHA256     Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  256 bits  ECDHE-ECDSA-AES256-SHA384     Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  256 bits  ECDHE-RSA-CHACHA20-POLY1305   Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  128 bits  ECDHE-RSA-AES128-GCM-SHA256   Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  128 bits  ECDHE-RSA-AES128-SHA          Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  128 bits  AES128-GCM-SHA256&NewLine;Accepted  TLSv1&period;2  128 bits  AES128-SHA&NewLine;Accepted  TLSv1&period;2  256 bits  ECDHE-RSA-AES256-GCM-SHA384   Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  256 bits  ECDHE-RSA-AES256-SHA          Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  256 bits  AES256-GCM-SHA384&NewLine;Accepted  TLSv1&period;2  256 bits  AES256-SHA&NewLine;Accepted  TLSv1&period;2  128 bits  ECDHE-RSA-AES128-SHA256       Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  128 bits  AES128-SHA256&NewLine;Accepted  TLSv1&period;2  256 bits  ECDHE-RSA-AES256-SHA384       Curve 25519 DHE 253&NewLine;Accepted  TLSv1&period;2  256 bits  AES256-SHA256&NewLine;&NewLine;  Server Key Exchange Group&lpar;s&rpar;&colon;&NewLine;TLSv1&period;3  128 bits  secp256r1 &lpar;NIST P-256&rpar;&NewLine;TLSv1&period;3  192 bits  secp384r1 &lpar;NIST P-384&rpar;&NewLine;TLSv1&period;3  260 bits  secp521r1 &lpar;NIST P-521&rpar;&NewLine;TLSv1&period;3  128 bits  x25519&NewLine;TLSv1&period;2  128 bits  secp256r1 &lpar;NIST P-256&rpar;&NewLine;TLSv1&period;2  192 bits  secp384r1 &lpar;NIST P-384&rpar;&NewLine;TLSv1&period;2  260 bits  secp521r1 &lpar;NIST P-521&rpar;&NewLine;TLSv1&period;2  128 bits  x25519&NewLine;&NewLine;  SSL Certificate&colon;&NewLine;Signature Algorithm&colon; ecdsa-with-SHA256&NewLine;ECC Curve Name&colon;      prime256v1&NewLine;ECC Key Strength&colon;    128&NewLine;&NewLine;Subject&colon;  sni&period;cloudflaressl&period;com&NewLine;Altnames&colon; DNS&colon;&ast;&period;owasp&period;org&comma; DNS&colon;sni&period;cloudflaressl&period;com&comma; DNS&colon;owasp&period;org&NewLine;Issuer&colon;   Cloudflare Inc ECC CA-3&NewLine;&NewLine;Not valid before&colon; Jul  5 00&colon;00&colon;00 2021 GMT&NewLine;Not valid after&colon;  Jul  4 23&colon;59&colon;59 2022 GMT</pre>

    </div> <!--/.container -->
    </section> 
    

<?php include("../../footer.php"); ?>