<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['fjelltur-thumbnail']) && $_FILES['fjelltur_thumbnail']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png']; // filtypene bruker for lov til å laste opp
        $filename = $_FILES['fjelltur-thumbnail']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            // lag random filnavn og last bildet opp til uploads
            $new_filename = uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['new_profile_picture']['tmp_name'], '../uploads/' . $new_filename);

            // oppdater profilbilde i databasen
            $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("si", $new_filename, $_SESSION['user_id']);

            if ($stmt->execute()) {
                $_SESSION['profile_picture'] = $new_filename;
                $success = "Oppdatering av profilbilde vellykket";
            } else {
                $error = "Oppdatering av profilbilde mislykket";
            }
        }
    }
}