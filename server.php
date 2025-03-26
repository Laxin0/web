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
$name = '';
if(isset($_GET['id'])){
     $name = $mysql->query("SELECT name FROM nodes WHERE id={$_GET['id']}");
}
if (!isset($_GET['name'])){ //TODO: Read about error handling in php
    echo json_encode(["error" => "No name was provides for searching."]);
    http_response_code(400); // I don't know what code I should use
    exit();
}
$name = $_GET['name'];

$query = "SELECT id, path FROM nodes WHERE name=$name";
$result = $mysql->query($query);
if ($result->num_rows != 1) {
    echo json_encode(["error" => "There is rows with name"]);
    http_response_code(400); // I don't know what code I should use
    exit();
}


$row = $result->fetch_assoc();

$curent_id = $row["id"];
$path = $row["path"];
echo json_encode(["name" => $name, "id" => $curent_id, "path"=> $path]);
exit();
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

echo json_encode(["name" => $name]);

$mysqli->close();
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
