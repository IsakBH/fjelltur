<?php
require_once dirname(__DIR__, 2) . "/config/database.php";
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fjelltur_id = $_POST['slett-fjelltur-id'];
    echo $fjelltur_id;
}


// session_start();
// require_once dirname(__DIR__, 2) . "/config/database.php";
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $fjelltur_navn = htmlspecialchars($_POST['fjelltur-navn']);
//     $fjelltur_navn_trimmed = preg_replace('/\s+/', '-', $fjelltur_navn);
//     $fjelltur_beskrivelse = $_POST['fjelltur-beskrivelse'];
//     $fjelltur_fjell = $_POST['fjelltur-fjell'];
//     $fjelltur_dato = $_POST['fjelltur-dato'];
//     $user_id = $_SESSION['user']['id'];

//     // thumbnail
//     $fjelltur_thumbnail_filnavn = $fjelltur_navn_trimmed . "-" . $fjelltur_dato;

//     $allowed = ['jpg', 'jpeg', 'png']; // filtypene bruker for lov til å laste opp
//     $filename = $_FILES['fjelltur-thumbnail']['name'];
//     $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

//     if (in_array($file_extension, $allowed)) {
//         // lag random filnavn og last bildet opp til uploads
//         $new_filename = $fjelltur_thumbnail_filnavn . "." .$file_extension;
//         if(move_uploaded_file($_FILES['fjelltur-thumbnail']['tmp_name'], '../../storage/images/thumbnails/' . $new_filename)){
//             echo "Upload av thumbnailen funket dritfint! :D";

//             $sql = "insert into fjelltur (navn, beskrivelse, dato, thumbnail, person, fjell) values (?, ?, ?, ?, ?, ?)";
//             $stmt = $mysqli->prepare($sql);
//             $stmt->bind_param("ssssii", $fjelltur_navn, $fjelltur_beskrivelse, $fjelltur_dato, $new_filename, $user_id, $fjelltur_fjell);
//             if($stmt->execute()){
//                 echo "Jeg klarte det! Fjellturen er nå i databasen.";
//                 header('Location: ../../pages/fjelltur.php');
//             } else {
//                 echo "Jeg klarte ikke å legge til fjellturen din i databasen! NEIIIIIIIIII! Dette er ikke kult...";
//             }

//         } else {
//             echo "Upload av thumbnail FUNKET IKKE!!!! IKKE KULT!!!!!!!";
//         }
//     }
// }
