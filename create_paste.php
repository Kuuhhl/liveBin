<!DOCTYPE html>

<head>

    <meta charset="utf-8" />
    <title>LiveBin - New Paste</title>
    <meta name="description" content="Service to easily share your clipboard." />
    <link rel="stylesheet" href="style.css" />
</head>
<?php
$content = $_POST["text"];

if (is_null($content)) {
    $content = "";
}

$db = new SQLite3("pastes.db");
$db->exec("INSERT INTO Paste(text) VALUES('" . $content . "');");

$last_id = $db->lastInsertRowID();
http_response_code(200);
$paste_link = "https://" . $_SERVER["HTTP_HOST"] . "?id=" . $last_id;
echo "Your paste-link: <a href='" . $paste_link . "'>" . $paste_link . "</a>";
exit();
?>
