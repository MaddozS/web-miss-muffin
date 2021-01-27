<?php
session_start();

if(!$_SESSION["CART"]){
  $_SESSION["CART"] = array();
}

$postre_name = $_POST["nombre"];
$postre_id = $_POST["id_postre"];
$postre_qty = $_POST["postre_qty"];
$postre_cost = $_POST["precio_unit"];
$postre_categoria = $_POST["categoria"];

echo $postre_name . " " . $postre_id . " " . $postre_qty . " " . $postre_cost;

$producto = array(
  'nombre' => $postre_name,
  'id' => $postre_id,
  'qty' => $postre_qty,
  'cost_per_unit' => $postre_cost
);

if(!array_key_exists($postre_id, $_SESSION["CART"])){
  $_SESSION["CART"][$postre_id] = $producto;
}
else{
  $_SESSION["CART"][$postre_id]['qty'] += $postre_qty;
}

$_SESSION["ITEM_ADDED"] = true;

$uri = $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
$url = 'http://' . substr($uri,0, -4). "productos.php?categoria=". $postre_categoria;
header("Location: ". $url);

exit();
?>