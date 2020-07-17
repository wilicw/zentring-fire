<?php
// Cross-Origin Resource Sharing Header
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="og:title" content="Zentring Fire 許願火">
  <meta name="og:description" content="Zentring Fire 許願火，第一個採用區塊鍊的許願火，讓你心想事成">
  <meta name="og:type" content="website">
  <meta name="og:url" content="https://fire.dev.zentring.net/">
  <meta name="og:image" content="https://fire.dev.zentring.net/fire.png">
  <title>Zentring Fire 許願火</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="toastr.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="stylesheets/fire.css">
</head>
<body>
  <br>
  <div class="container">
  <h4 class="display-4"><p class="text-center">Zentring Fire 許願火</p></h4>
  <h5 class="display-5"><p class="text-center">第一個採用區塊鍊的許願火，讓你心想事成</p></h5>
  <ul class="nav justify-content-center">
  <li class="nav-item"><a class="nav-link active" href="./">許願</a></li>
  <li class="nav-item"><a class="nav-link" href="download-block">下載區塊</a></li>
  <li class="nav-item"><a class="nav-link" href="allwish">看看別人的願望</a></li>
  <li class="nav-item"><a class="nav-link" href="#" onclick="getblock()">更新區塊</a></li>
  </ul>
  <div id="allbody">
