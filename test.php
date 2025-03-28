<?php

header("Content-Type: application/json");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tree";
$mysql = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$query = "SELECT * FROM nodes";
$result = $mysql->query($query);


echo json_encode($result);

?>