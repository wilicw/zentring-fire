<?php

// Cross-Origin Resource Sharing Header
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');

$json = json_decode(file_get_contents("block.json"),true);
$json = ($json["allblock"]);

echo json_encode(($json));