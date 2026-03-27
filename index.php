<?php
session_start();
require_once "database.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="styles/styling.css" />
        <link rel="stylesheet" href="styles/sidebar.css" />
        <link rel="icon" href="storage/images/icons/favicon.ico" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

        <!-- google fonts roboto -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <div id="sidebar">
            <div id="sidebar-content">
                <h2><i class="fa-solid fa-person"></i> Deg</h2>

                <hr>

                <button class="sidebar-knapp" onclick="location.href='index.php';"><i class="fa-solid fa-home"></i>Hjem</button>
                <button class="sidebar-knapp" onclick="location.href='pages/fjelltur.php;'"><i class="fa-solid fa-person-hiking"></i>Fjellturer</button>

                <hr>

                <h2><i class="fa-solid fa-people-group"></i> Sosialt</h2>

                <hr>

                <button class="sidebar-knapp" onclick="location.href='pages/profil.php';"><i class="fa-solid fa-address-card"></i> Min profil</button>
                <button class="sidebar-knapp" onclick="location.href='pages/venner.php';"><i class="fa-solid fa-user-group"></i> Mine venner</button>
            </div>
        </div>

        <div id="fjell-display">
            <div id="fjell-liste">
                <!-- Hei, dette er Isak Brun som snakker. Alt inni denne diven blir fylt inn av Javascripten. -->
            </div>
        </div>

        <script src="scripts/get_fjell.js"></script>
    </body>
</html>