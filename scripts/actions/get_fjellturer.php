<?php
// kobler til database
require_once dirname(__DIR__, 2) . "/config/database.php";

// henter alt fra fjell tabellen
$sql = "
select fjelltur.navn, fjelltur.beskrivelse, fjelltur.dato, person.brukernavn, fjell.navn as fjellnavn
from fjelltur
join person on fjelltur.person = person.id
join fjell on fjelltur.fjell = fjell.id;
";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
