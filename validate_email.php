<?php

$mysqli = require __DIR__ . "/config.php";

//quering the inserted email
$sql = sprintf("SELECT * FROM user
                WHERE email = '%s'",
                $mysqli -> real_escape_string($_GET["email"]));
$result = $mysqli -> query($sql);
$is_available = $result -> num_rows === 0; //True if db returns 0 records

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);

?>
