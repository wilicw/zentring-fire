<?php
$file = "block.json";
header("Content-type:application");
header("Content-Length:" .(string)(filesize($file)));
header("Content-Disposition: attachment; filename=".$file);
readfile($file);
