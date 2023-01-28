<?php
$id = $_GET["id"];

$db = new SQLite3("../private/pastes.db");

$stmt = $db->prepare("SELECT p.text
   FROM Paste AS p
   WHERE p.id = ?");

$stmt->bindValue(1, $id, SQLITE3_INTEGER);
$results = $stmt->execute();


$res = array();
while ($row = $results->fetchArray()) {
    array_push($res, htmlspecialchars($row["text"]));
    break;
}

if (count($res) == 1) {
    header("Content-Type: application/json");
    echo json_encode($res[0]);
    http_response_code(200);
    exit();
} else {
    // paste not found
    http_response_code(404);
    exit("Paste does not exist!");
}
