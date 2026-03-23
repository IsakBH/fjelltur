<?php
session_start();
require_once "database.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="styles/styling.css" />
        <link rel="icon" href="" />
    </head>

    <body>
        <?php
        /*$sql = "select * from fjell;";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $kulefjell = $result->fetch_assoc();
        print_r(array_keys($kulefjell));*/
        ?>

        <div id="fjell-display">
            <div id="fjell-liste">

            </div>
        </div>

        <script src="scripts/get_fjell.js"></script>
    </body>
</html>