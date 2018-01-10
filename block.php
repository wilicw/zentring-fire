<?


// Cross-Origin Resource Sharing Header
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');

$json = json_decode(file_get_contents("block.json"),true);
$json = ($json["allblock"]);
//print_r($json);
$toShow = "{ \"allblock\":[";
foreach($json as $item){
	$toShow .= "{";
	$toShow .= "\"id\":\"" . $item["id"] . "\",";
	$toShow .= "\"hash\":\"" . $item["hash"] . "\",";
	$toShow .= "\"text\":\"" . $item["text"] . "\",";
	$toShow .= "\"time\":\"" . $item["time"] . "\",";
	$toShow .= "\"prehash\":\"" . $item["prehash"] . "\"";
	$toShow .= "},";
}
$toShow .= "]}";
//print_r(array_reverse($json));
//echo json_encode(($json));
echo str_replace("},]}","}]}",$toShow);
