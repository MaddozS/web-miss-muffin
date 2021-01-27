<?php
$uri = $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
$url = 'http://' . substr($uri,0, -4). "carrito.php";
session_start();

if(!$_SESSION["CART"]){
  header('Location: '. $url);
  exit();
}

$id = $_POST["id"];

unset($_SESSION["CART"][$id]);
$_SESSION["ITEM_REMOVED"] = true;
header('Location: '. $url);
exit();
?>