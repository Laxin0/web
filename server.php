<?php

function return_test_info(){
    $response_arr = array(
        "name" => "aaaa",
        "content" => "bbbb",
        "child_names" => array("cccc", "dddd")
    );
    header("Content-Type: application/json");
    echo json_encode($response_arr);
    exit();
}

function return_error($msg, $code=500){
    echo json_encode(["error" => $msg]);
    http_response_code($code);
    exit();
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tree";
$mysql = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysql->connect_error) {
    return_error("Could not connect to DB" . $mysql->connect_error);
}

$name = '';
if (!isset($_GET['name'])){ //TODO: Read about error handling in php
    return_error("No name was provides for searching.");
}

$name = $_GET['name'];

$query = "SELECT id, path FROM nodes WHERE name=$name";
$result = $mysql->query($query);

$row = $result->fetch_assoc();

$curent_id = $row["id"];
$path = $row["path"];

$query = "SELECT name FROM nodes WHERE parent_id=$curent_id";
$result = $mysql->query($query);

$child_names = array();
while ($row = $result->fetch_assoc()) {
    array_push($child_names, $row["name"]);
}

$response_arr = array(
    "name" => $name,
    "content" => $path,
    "child_names" => $child_names
);



$mysqli->close();
?>
