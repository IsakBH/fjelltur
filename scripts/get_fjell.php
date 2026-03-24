<?php
// kobler til database
require_once "../database.php";

// henter alt fra fjell tabellen
$sql = "select fjell.navn, fjell.beskrivelse, fjell.hoyde, fjell.fotografi, omrade.navn from fjell join omrade on omrade.id = fjell.region;";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
echo json_encode($result->fetch_all(MYSQLI_ASSOC));