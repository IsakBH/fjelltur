<?php
session_start();
require_once dirname(__DIR__, 2) . "/config/database.php";

$allowed = ['jpg', 'jpeg', 'png']; // filtypene bruker for lov til å laste opp
$user = $_SESSION['user'];
$user_id = $user['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fjelltur_navn = htmlspecialchars($_POST['fjelltur-navn']);
    $fjelltur_navn_trimmed = preg_replace('/\s+/', '-', $fjelltur_navn);
    $fjelltur_beskrivelse = $_POST['fjelltur-beskrivelse'];
    $fjelltur_fjell = intval($_POST['fjelltur-fjell']);
    $fjelltur_dato = $_POST['fjelltur-dato'];
    $fjelltur_id = $_POST['rediger-fjelltur-fjelltur-id'];

    if ($_FILES['fjelltur-thumbnail']['error'] === UPLOAD_ERR_OK) {
        // thumbnail
        $fjelltur_thumbnail_filnavn = $fjelltur_navn_trimmed . "-" . $fjelltur_dato;
        $filename = $_FILES['fjelltur-thumbnail']['name'];
        $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed)){
            // lag random filnavn og last bildet opp til uploads
            $new_filename = $fjelltur_thumbnail_filnavn . "." . $file_extension;
            if (move_uploaded_file($_FILES['fjelltur-thumbnail']['tmp_name'], '../../storage/images/thumbnails/' . $new_filename)) {
                echo "Upload av thumbnailen funket dritfint! :D <br>";

                $sql = "update fjelltur set navn = ?, beskrivelse = ?, dato = ?, fjell = ? where id = ?;";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sssii", $fjelltur_navn, $fjelltur_beskrivelse, $fjelltur_dato, $fjelltur_fjell, $fjelltur_id);

                if ($stmt->execute()) {
                    echo "Jeg klarte det! Fjellturen din er nå redigert til dine ønsker. <br>";
                    var_dump($fjelltur_navn, $fjelltur_beskrivelse, $fjelltur_dato, $fjelltur_fjell, $user_id);
                    header('Location: ../../pages/fjelltur.php');
                }
                else {
                    echo "Jeg klarte ikke å legge til fjellturen din i databasen! NEIIIIIIIIII! Dette er ikke kult...";
                }
            }
            else {
                echo "Filen du lastet opp er ikke i riktig filtype..";
            }
        }
    }
    else {
        $sql = "update fjelltur set navn = ?, beskrivelse = ?, dato = ?, fjell = ? where id = ?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssii", $fjelltur_navn, $fjelltur_beskrivelse, $fjelltur_dato, $fjelltur_fjell, $fjelltur_id);
        if ($stmt->execute()) {
            echo "Jeg klarte det! Fjellturen din er nå redigert til dine ønsker. <br>";
            var_dump($fjelltur_navn, $fjelltur_beskrivelse, $fjelltur_dato, $fjelltur_fjell, $user_id);
            header('Location: ../../pages/fjelltur.php');
        }
        else {
            echo "Jeg klarte ikke å legge til fjellturen din i databasen! NEIIIIIIIIII! Dette er ikke kult...";
        }
    }
}
