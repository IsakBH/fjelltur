<?php
// kobler til database
require_once dirname(__DIR__, 2) . "/config/database.php";

// henter alt fra fjell tabellen
$sql = "select id, navn from fjell;";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>