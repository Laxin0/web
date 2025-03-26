<?php

header("Content-Type: application/json");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tree";
$mysql = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysql->connect_error) {
    echo json_encode(["error" => "Could not connect to DB" . $mysql->connect_error]);
    http_response_code(500);
    exit();
}

if (!isset($_GET['name'])){ //TODO: Read about error handling in php
    echo json_encode(["error" => "No name was provides for searching."]);
    http_response_code(400); // I don't know what code I should use
    exit();
}


/*
include("database.php");

$sql = "SELECT * FROM nodes WHERE parent_id = 1";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        foreach($row as $key => $value){
            echo "{$key}: {$value}, ";
        }
        echo "<br>";
    }
}

mysqli_close($conn);
*/
?>
