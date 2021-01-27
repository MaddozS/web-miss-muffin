<?php
$uri = $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
$url = 'http://' . substr($uri,0, -4). "carrito.php";
session_start();

$action = $_POST["action"];
$item = $_POST["id"];

if($action === "minus"){
  $_SESSION["CART"][$item]['qty'] -= 1;
}
elseif($action === "specific"){
  $_SESSION["CART"][$item]['qty'] = $_POST["postre_qty"];;
}
else{
  $_SESSION["CART"][$item]['qty'] += 1;
}

header('Location: '. $url);
exit();
?>