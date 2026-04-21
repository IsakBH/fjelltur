<?php
// kobler til database
require_once dirname(__DIR__, 2) . "/config/database.php";

// hent data fra ajax forespørsel (ajax er sigma alfa ulv)
$data = json_decode(file_get_contents('php://input'), true);

// forbereder og utfører sql query for å slette dokumentet
// verifiserer også at brukeren eier dokumentet via user_id session variabelen
$stmt = $mysqli->prepare("DELETE FROM documents WHERE id = ? AND user_id = ?"); // forbereder sql query, '?' er en placeholder for verdiene lagt til på linjen under
$stmt->bind_param("ii", $data['id'], $_SESSION['user_id']); // binder faktiske verdier til placeholder plassene skrevet med '?' i forrige linje. "ii" betyr at begge verdiene er integers.
$success = $stmt->execute(); // utfører / kjører sql queryen

// returnerer resultatet som JSON
echo json_encode(['success' => $success]);