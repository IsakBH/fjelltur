<?php
// kobler til database
require_once dirname(__DIR__, 2) . "/config/database.php";

// henter alt fra fjell tabellen
$sql = "select fjell.navn, fjell.beskrivelse, fjell.hoyde, fjell.fotografi, omrade.navn as omradenavn from fjell join omrade on omrade.id = fjell.region order by fjell.hoyde desc;";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
echo json_encode($result->fetch_all(MYSQLI_ASSOC));