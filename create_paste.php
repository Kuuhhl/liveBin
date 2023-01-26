<?php
$content = $_POST["text"];

if (is_null($content))
{
    $content = "";
}

$db = new SQLite3("pastes.db");
$db->exec("INSERT INTO Paste(text) VALUES('" . $content . "');");

$last_id = $db->lastInsertRowID();
http_response_code(200);
echo $last_id;
echo $content;
exit();
