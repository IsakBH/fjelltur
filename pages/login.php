<?php
require_once dirname(__DIR__, 2) . "/fjelltur/config/database.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Logg inn med Google</h2>
        <p>For å bruke dette programmet må du logge inn med Google.</p>
        <i>Hvorfor må jeg logge inn med Google?</i>
        <li>Du må logge inn med Google fordi dette programmet henter data fra Fitbits APIer, som bruker Google OAuth2.0 for autentisering. Les <a href="privacypolicy.txt">personvernsreglene her</a></li>
    </body>
</html>