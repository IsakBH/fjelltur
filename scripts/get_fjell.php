<?php
// kobler til database
require_once "../database.php";

// henter alt fra fjell tabellen
$sql = "select * from fjell;";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
echo json_encode($result->fetch_all(MYSQLI_ASSOC));