<?php
session_start();
require_once dirname(__DIR__, 2) . "/config/database.php"; // kobler til database

$user = $_SESSION['user'];
$userid = $user['id'];

// henter alt fra fjell tabellen
$sql = "
select fjelltur.id, fjelltur.navn, fjelltur.beskrivelse, fjelltur.dato, fjelltur.thumbnail, person.brukernavn, fjelltur.fjell as fjellid, fjell.navn as fjellnavn
from fjelltur
join person on fjelltur.person = person.id
join fjell on fjelltur.fjell = fjell.id
where fjelltur.person = ?
order by fjelltur.dato desc;
";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
