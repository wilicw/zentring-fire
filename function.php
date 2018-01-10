<?
if(!session_id()){
	session_start();
}
include "define.php";
function HTML_replace($string){
	$result = mb_ereg_replace("<","&#60;",$string);
	$result = mb_ereg_replace(">","&#62;",$result);
	$result = mb_ereg_replace("\"","&#34;",$result);
	return $result;
}
function URL_replace($string){
	$result = mb_ereg_replace("&","%26",$string);
	return $result;
}
function account($row){
if(!session_id()){
	session_start();
}
	$servername = "localhost";
	$sql_username = "root";
	$sql_password = "p02097128@AT";
	
	$username = @$_SESSION['username'];
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=account;charset=utf8", $sql_username, $sql_password);
	
		$query = $conn->query("SELECT * FROM account where `username` = '$username'");
		$result = $query->fetch();
		
		$return = $result[$row];

	}catch(Exception $e){
		$return = "{%NULL%}";
	}
	$conn = null;
	
	if($row == "image" && $return == ""){
		$return = "//zentring.net/account/none.png";
	}
	
	return $return;
}

function search($row,$username){
	$servername = "localhost";
	$sql_username = "root";
	$sql_password = "p02097128@AT";
	
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=account;charset=utf8", $sql_username, $sql_password);
	
		$query = $conn->query("SELECT * FROM account where `username` = '$username'");
		$result = $query->fetch();
		
		$return = $result[$row];

	}catch(Exception $e){
		$return = "{%NULL%}";
	}
	$conn = null;
	
	if($row == "image" && $return == ""){
		$return = "//zentring.net/account/none.png";
	}
	
	return $return;
}

function getIPA() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getIPS($type){
	switch($type){
		case "HTTP_CLIENT_IP":
			$ipaddress = @$_SERVER['HTTP_CLIENT_IP'];
			break;
		case "HTTP_X_FORWARDED_FOR":
			$ipaddress = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			break;
		case "HTTP_X_FORWARDED":
			$ipaddress = @$_SERVER['HTTP_X_FORWARDED'];
			break;
		case "HTTP_X_CLUSTER_CLIENT_IP":
			break;
		case "HTTP_FORWARDED_FOR":
			$ipaddress = @$_SERVER['HTTP_FORWARDED_FOR'];
			break;
		case "HTTP_FORWARDED":
			$ipaddress = @$_SERVER['HTTP_FORWARDED'];
			break;
		case "REMOTE_ADDR":
			$ipaddress = @$_SERVER['REMOTE_ADDR'];
			break;
		case "HTTP_VIA":
			break;
		default:
			$ipaddress = "";
			break;
	}
	return $ipaddress;
}


function select($row,$value,$where,$table,$db){
if(!session_id()){
	session_start();
}
	$servername = "localhost";
	$sql_username = "root";
	$sql_password = "p02097128@AT";
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $sql_username, $sql_password);
	
		$query = $conn->query("SELECT * FROM `$table` where `$where` = '$value'");
		$result = $query->fetch();
		
		$return = $result[$row];

	}catch(Exception $e){
		$return = "{%NULL%}";
	}
	$conn = null;
	return $return;
}

function select2($row,$value2,$where2,$value,$where,$table,$db){
if(!session_id()){
	session_start();
}
	$servername = "localhost";
	$sql_username = "root";
	$sql_password = "p02097128@AT";
	
	try {
		$connstr = "mysql:host=$servername;dbname=$db;charset=utf8";
		$conn = new PDO($connstr, $sql_username, $sql_password);
	
		$querystr = "SELECT * FROM `$table` where `$where` = '$value' and `$where2` = '$value2'";
		//echo $querystr;
		$query = $conn->query($querystr);
		$result = $query->fetch();
		
		$return = $result[$row];

	}catch(PDOException $e){
		$return = "{%NULL%}";
	}
	$conn = null;
	return $return;
}

function select3($row,$value3,$where3,$value2,$where2,$value,$where,$table,$db){
if(!session_id()){
	session_start();
}
	$servername = "localhost";
	$sql_username = "root";
	$sql_password = "p02097128@AT";
	
	try {
		$connstr = "mysql:host=$servername;dbname=$db;charset=utf8";
		$conn = new PDO($connstr, $sql_username, $sql_password);
	
		$querystr = "SELECT * FROM `$table` where `$where` = '$value' and `$where2` = '$value2' and `$where3` = '$value3'";
		//echo $querystr;
		$query = $conn->query($querystr);
		$result = $query->fetch();
		
		$return = $result[$row];

	}catch(PDOException $e){
		$return = "{%NULL%}";
	}
	$conn = null;
	return $return;
}

function lesson($row,$cs,$ls){
	
return select3($row,'lesson','type',$cs,'class',$ls,'lesson','lesson','learn');
}

function test($row,$cs,$ls){
	
	return select3($row,'test','type',$cs,'class',$ls,'lesson','lesson','learn');
}//#DD171F
function codeFormate($context){
	
	$lines = explode("\n", $context);
	foreach($lines as $line){
		
		if(substr(trim($line), 0, 5) == "using"){
			$line = mb_ereg_replace("using","<font color=\"#FF0060\">using</font>",$line);
		}
		
		if(substr(trim($line), 0, 9) == "namespace"){
			$line = mb_ereg_replace("namespace","<font color=\"#FF0060\">namespace</font>",$line);
		}
		
		if(substr(trim($line), 0, 6) == "public"){
			$line = mb_ereg_replace("public","<font color=\"#FF0060\">public</font>",$line);
		}
		
		if(substr(trim($line), 0, 26) == "/// &#60;summary&#62;"){
			$line = mb_ereg_replace("/// &#60;summary&#62;","<font color=\"#57A64A\">/// &#60;summary&#62;",$line);
		}
		if(substr(trim($line), 0, 27) == "/// &#60;/summary&#62;"){
			$line = mb_ereg_replace("/// &#60;/summary&#62;","/// &#60;/summary&#62;</font>",$line);
		}
		
		$first = substr($line, 1);
		
		/*$TryStrpos=strpos($line,'.');

		if($TryStrpos === false){
			//no find'
		}else{
			echo '關鍵字符 w 在原始字串的第'.$TryStrpos.'位置';
		}*/
		$line = mb_ereg_replace("","",$line);
		
		$result .= $line."\n";
	}
	//$result = mb_ereg_replace("","",$context);
	return $result;
}

function cardType($card){
	if (preg_match("/^4[0-9]{6,}$/", $card)) {
		return "Visa";
	}
	if (preg_match("/^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/", $card)) {
		return "MasterCard";
	}
	if (preg_match("/^3[47]/", $card)) {
		return "AMEX";
	}
	if (preg_match("/^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)/", $card)) {
		return "Discover";
	}
	if (preg_match("/^36/", $card)) {
		return "Diners";
	}
	if (preg_match("/^30[0-5]/", $card)) {
		return "Diners";
	}
	if (preg_match("/^35(2[89]|[3-8][0-9])/", $card)) {
		return "JCB";
	}
	if (preg_match("/^(4026|417500|4508|4844|491(3|7))/", $card)) {
		return "Visa";
	}
	return "?";
}

function cardCheck($strDigits){
    $sum = 0;
    $alt = false;
    for($i = strlen($strDigits) - 1; $i >= 0; $i--) 
    {
        if($alt)
        {
           $temp = $strDigits[$i];
           $temp *= 2;
           $strDigits[$i] = ($temp > 9) ? $temp = $temp - 9 : $temp;
        }
        $sum += $strDigits[$i];
        $alt = !$alt;
    }
    return $sum % 10 == 0;
}

function randText($length = 8) {
	$password_len = $length;	//字串長度
	$password = '';
	$word = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';   //亂數內容
	$len = strlen($word);
	for ($i = 0; $i < $password_len; $i++) {
		$password .= $word[rand() % $len];
	}
	return $password;
}


include __DIR__ . "/account/google/vendor/autoload.php";
function isLogin(){
	if(isset($_SESSION["login"]) && $_SESSION["login"]){
		return true;
	}else{
		return false;
	}
}

function isBase64($string){
	if ( base64_encode(base64_decode($string, true)) === $string){
		return true;
	} else {
		return false;
	}
}

function newmail($username){
	$hMS = new COM("hMailServer.Application", NULL, CP_UTF8) or Die ("Did not instantiate hMailServer");
	
	$hMS->Authenticate("Administrator", "p02097128@AT");
	
	$Domain = $hMS->Domains->ItemByName("zentring.net");
	
	$Account = $Domain->Accounts->Add();
	
	$Account->Address = $username . "@zentring.net";
	$Account->Password = "a100200300@AT";
	$Account->Active = true;
	$Account->MaxSize = 0;
	
	$Account->Save();
}
class HTTP {
    /**
     * @description Make HTTP-GET call
     * @param       $url
     * @param       array $params
     * @return      HTTP-Response body or an empty string if the request fails or is empty
     */
    public static function Get($url, array $params) {
        $query = http_build_query($params); 
        $ch    = curl_init($url.'?'.$query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    /**
     * @description Make HTTP-POST call
     * @param       $url
     * @param       array $params
     * @return      HTTP-Response body or an empty string if the request fails or is empty
     */
    public static function Post($url, array $params) {
        $query = http_build_query($params);
        $ch    = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    /**
     * @description Make HTTP-PUT call
     * @param       $url
     * @param       array $params
     * @return      HTTP-Response body or an empty string if the request fails or is empty
     */
    public static function Put($url, array $params) {
        $query = \http_build_query($params);
        $ch    = \curl_init();
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_HEADER, false);
        \curl_setopt($ch, \CURLOPT_URL, $url);
        \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, 'PUT');
        \curl_setopt($ch, \CURLOPT_POSTFIELDS, $query);
        $response = \curl_exec($ch);
        \curl_close($ch);
        return $response;
    }
    /**
     * @category Make HTTP-DELETE call
     * @param    $url
     * @param    array $params
     * @return   HTTP-Response body or an empty string if the request fails or is empty
     */
    public static function Delete($url, array $params) {
        $query = \http_build_query($params);
        $ch    = \curl_init();
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_HEADER, false);
        \curl_setopt($ch, \CURLOPT_URL, $url);
        \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, 'DELETE');
        \curl_setopt($ch, \CURLOPT_POSTFIELDS, $query);
        $response = \curl_exec($ch);
        \curl_close($ch);
        return $response;
    }
}
?>