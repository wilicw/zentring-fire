<?
$wish = base64_encode($_POST['wish']);
$block0hash = "137cf7d5da66f94af938c8a98d87e6102dd96ba88c572732d06be530e9d10b2d32665856401a1fb17c4fa2e74ffc24f0c5a8c9ff2a5a16953588bed5471c3410";
$data = file_get_contents("block.json");
$data = json_decode($data);
if(hash('sha512',$data->allblock[0]->id.",".base64_encode($data->allblock[0]->text))!=$block0hash){
  echo "block Chain Error";
  exit();
}

foreach($data->allblock as $value){
  $end = $value->id;
}

$prehash = hash('sha512',$data->allblock[$end]->id.",".base64_encode($data->allblock[$end]->text));
$id = $end+1;
$hash = hash('sha512', $id.",".base64_encode($wish).",".$prehash);
$time = date("Y,m/d - h:i:sa");

$data->allblock[$id]->id = $id;
$data->allblock[$id]->hash = $hash;
$data->allblock[$id]->text = $wish;
$data->allblock[$id]->time = $time;
$data->allblock[$id]->prehash = $prehash;

$data = json_encode($data);


$file = fopen("block.json","w+"); //開啟檔案
fwrite($file,$data);
fclose($file);

echo $data;
