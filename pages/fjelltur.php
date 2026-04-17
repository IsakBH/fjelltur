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

        <!-- Rediger fjelltur popup -->
        <dialog id="rediger-fjelltur-dialog">
            <?php
            $current_date = date("Y-m-d");
            ?>
            <h2>Rediger fjelltur</h2>
            <div id="rediger-fjelltur">
                <button class="close-dialog-button" id="close-edit-fjelltur-dialog" onclick="close_fjelltur_edit()"><i class="fa-regular fa-circle-xmark"></i></button>
                <form id="rediger-fjelltur-skjema" action="../scripts/actions/rediger_fjelltur.php" method="post" enctype="multipart/form-data">
                    <label>Navn</label> <br>
                    <input id="rediger-fjelltur-skjema-navn" type="text" placeholder="F.eks 'Vidden med Brun'" name="fjelltur-navn">

                    <br> <br>

                    <label>Beskrivelse</label> <br>
                    <textarea id="rediger-fjelltur-skjema-beskrivelse" type="text" placeholder="F.eks 'Gikk over Vidden, blah blah blah..." name="fjelltur-beskrivelse"></textarea>

                    <br> <br>

                    <label>Dato</label> <br>
                    <input id="rediger-fjelltur-skjema-dato" type="date" value="<?php echo $current_date; ?>" name="fjelltur-dato">

                    <br> <br>

                    <label>Bilde thumbnail</label> <br>
                    <input id="rediger-fjelltur-skjema-thumbnail" type="file" name="fjelltur-thumbnail">

                    <br <br> <br>

                    <label>Fjell</label> <br>
                    <select id="rediger-fjelltur-skjema-fjell" name="fjelltur-fjell">
                        <?php
                        foreach($result as $fjell){
                            $navn = $fjell['navn'];
                            $id = (int)$fjell['id'];
                            echo "<option value='$id'>$navn</option>";
                        }
                        ?>
                    </select>

                    <br> <br>

                    <input id="rediger-fjelltur-skjema-tur-id" name="rediger-fjelltur-fjelltur-id" type="text" value="Fjelltur id">

                    <input id="rediger-fjelltur-skjema-submit" type="submit" value="Registrer tur...">
                </form>
            </div>
        </dialog>

        <!--Ny fjelltur popup-->
        <dialog id="ny-fjelltur-dialog">
            <?php
            $current_date = date("Y-m-d");
            ?>
            <h2>Registrer ny fjelltur</h2>
            <div id="ny-fjelltur">
                <button class="close-dialog-button" id="close-fjelltur-dialog" onclick="close_fjelltur()"><i class="fa-regular fa-circle-xmark"></i></button>
                <form id="ny-fjelltur-skjema" action="../scripts/actions/registrer_ny_tur.php" method="post" enctype="multipart/form-data">
                    <label>Navn</label> <br>
                    <input id="fjelltur-skjema-navn" type="text" placeholder="F.eks 'Vidden med Brun'" name="fjelltur-navn" required>

                    <br> <br>

                    <label>Beskrivelse</label> <br>
                    <textarea id="fjelltur-skjema-beskrivelse" type="text" placeholder="F.eks 'Gikk over Vidden, blah blah blah..." name="fjelltur-beskrivelse" required></textarea>

                    <br> <br>

                    <label>Dato</label> <br>
                    <input id="fjelltur-skjema-dato" type="date" value="<?php echo $current_date; ?>" name="fjelltur-dato" required>

                    <br> <br>

                    <label>Bilde thumbnail</label> <br>
                    <input id="fjelltur-skjema-thumbnail" type="file" name="fjelltur-thumbnail" required>

                    <br <br> <br>

                    <label>Fjell</label> <br>
                    <select id="fjelltur-skjema-fjell" name="fjelltur-fjell" required>
                        <?php
                        foreach($result as $fjell){
                            $navn = $fjell['navn'];
                            $id = $fjell['id'];
                            echo "<option value='$id'>$navn</option>";
                        }
                        ?>
                    </select>

                    <br> <br>

                    <input id="fjelltur-skjema-submit" type="submit" value="Registrer tur...">
                </form>
            </div>
        </dialog>

        <script src="/fjelltur/scripts/js/get_fjelltur.js"></script>
        <script src="/fjelltur/scripts/js/ny_fjelltur.js"></script>
        <script src="/fjelltur/scripts/js/rediger_fjelltur.js"></script>
    </body>
</html>