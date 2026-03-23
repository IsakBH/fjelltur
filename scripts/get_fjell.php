<?php
$sql = "select * from fjell;";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$kulefjell = $result->fetch_assoc();

// sender data om fjell tilbake til javascripten
echo json_encode([
    'success' => true,
    'navn' => $kulefjell['navn'],
    'hoyde' => $kulefjell[''],
]);
