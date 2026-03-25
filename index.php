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

        <!-- google fonts roboto -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <div id="sidebar">
            <h1>Fjell</h1>
        </div>

        <div id="fjell-display">
            <div id="fjell-liste">
                <!-- Hei, dette er Isak Brun som snakker. Alt inni denne diven blir fylt inn av Javascripten. -->
            </div>
        </div>

        <script src="scripts/get_fjell.js"></script>
    </body>
</html>