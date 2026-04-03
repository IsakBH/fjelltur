<?php
session_start();
require_once dirname(__DIR__, 2) . "/fjelltur/config/database.php";
require_once dirname(__DIR__, 2) . "/fjelltur/scripts/actions/check_auth.php";
require_once dirname(__DIR__, 2) . "/fjelltur/scripts/actions/get_fjellnavn.php";

$filepath = $_SERVER['PHP_SELF']; // henter filepathen (f.eks 'fjelltur/index.php') veldig tøft
$filename = basename($filepath); // henter filnavnet fra filepathen den hentet tidligere (f.eks 'index.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Fjelltur</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="../styles/styling.css" />
        <link rel="stylesheet" href="../styles/sidebar.css" />
        <link rel="stylesheet" href="/fjelltur/styles/dialogs.css" />
        <link rel="stylesheet" href="/fjelltur/styles/variables.css" />
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

        <div id="fjelltur-display" class="display">
            <div id="fjelltur-liste" class="liste">
                <!-- Hei, dette er Isak Brun som snakker. Alt inni denne diven blir fylt inn av Javascripten. -->
            </div>

            <button class="ny-knapp" id="ny-fjelltur" onclick="open_new_hike()"><i class="fa-solid fa-plus"></i> Registrer ny fjelltur</button>
        </div>

        <!--Ny fjelltur popup-->
        <dialog id="ny-fjelltur-dialog">
            <?php
            $current_date = date("Y-m-d");
            ?>
            <h2>Registrer ny fjelltur</h2>
            <div id="ny-fjelltur">
                <button class="close-dialog-button" id="close-fjelltur-dialog" onclick="close_fjelltur()"><i class="fa-regular fa-circle-xmark"></i></button>
                <form id="ny-fjelltur-skjema">
                    <label>Navn</label> <br>
                    <input id="fjelltur-skjema-navn" type="text" placeholder="F.eks 'Vidden med Brun'">

                    <br> <br>

                    <label>Beskrivelse</label> <br>
                    <textarea id="fjelltur-skjema-beskrivelse" type="text" placeholder="F.eks 'Gikk over Vidden, blah blah blah..."></textarea>

                    <br> <br>

                    <label>Dato</label> <br>
                    <input id="fjelltur-skjema-dato" type="date" value="<?php echo $current_date; ?>">

                    <br> <br>

                    <label>Bilde thumbnail</label> <br>
                    <input id="fjelltur-skjema-thumbnail" type="file">

                    <br <br> <br>

                    <label>Fjell</label> <br>
                    <select id="fjelltur-skjema-fjell">
                        <?php
                        foreach($result as $fjell){
                            $navn = $fjell['navn'];
                            echo "<option value'$navn'>$navn</option>";
                        }
                        ?>
                    </select>

                    <input id="fjelltur-skjema-submit" type="submit">
                </form>
            </div>
        </dialog>

        <!--<script src="../scripts/get_fjell.js"></script>-->
        <script src="/fjelltur/scripts/js/get_fjelltur.js"></script>
        <script src="/fjelltur/scripts/js/ny_fjelltur.js"></script>
    </body>
</html>