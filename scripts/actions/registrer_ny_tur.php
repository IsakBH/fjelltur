<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fjelltur_navn = $_POST['fjelltur-navn'];
    $fjelltur_navn_trimmed = preg_replace('/\s+/', '-', $fjelltur_navn);
    $fjelltur_beskrivelse = $_POST['fjelltur-beskrivelse'];
    $fjelltur_dato = $_POST['fjelltur-dato'];
    $fjelltur_thumbnail = $_FILES['fjelltur-thumbnail'];

    // thumbnail
    $fjelltur_thumbnail_filnavn = `{$fjelltur_navn_trimmed}{$fjelltur_dato}`;

    $allowed = ['jpg', 'jpeg', 'png']; // filtypene bruker for lov til å laste opp
    $filename = $_FILES['fjelltur-thumbnail']['name'];
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if (in_array($file_extension, $allowed)) {
        // lag random filnavn og last bildet opp til uploads
        $new_filename = `$fjelltur_thumbnail_filnavn.$file_extension`;
        move_uploaded_file($_FILES['new_profile_picture']['tmp_name'], `../../storage/images/thumbnails/$new_filename`);
    }
}
