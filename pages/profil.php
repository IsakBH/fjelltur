<?php
session_start();
require_once dirname(__DIR__, 2) . "/fjelltur/config/database.php";

$filepath = $_SERVER['PHP_SELF']; // henter filepathen (f.eks 'fjelltur/index.php') veldig tøft
$filename = basename($filepath); // henter filnavnet fra filepathen den hentet tidligere (f.eks 'index.php')

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Min profil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="../styles/styling.css" />
        <link rel="stylesheet" href="../styles/sidebar.css" />
        <link rel="icon" href="../storage/images/icons/favicon.ico" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

        <!-- google fonts roboto -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <!-- Sidebaren -->
        <?php
        include("../storage/includes/sidebar.php");
        ?>

        <div id="profile-container">
            <h2><?php echo $user['name']; ?></h2>
        </div>

    </body>
</html>