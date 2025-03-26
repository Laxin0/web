<?php

header("Content-Type: application/json");
if (isset($_GET["arg"])) {
    echo json_encode(["bratuha" => $_GET["arg"]]);
}else{
    echo json_encode(["bratuha" => "42"]);
}

?>