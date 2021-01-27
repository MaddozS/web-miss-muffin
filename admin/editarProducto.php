<?php
include_once '../conn_db.php';

$producto_id = $_POST["id"];
$categoria_id = $_POST["categoria"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$url_photo = $_POST["url_photo"];

$disponibilidad = isset($_POST["disponibilidad"]) ? true : false;


$stmt = $conn->prepare(
  'UPDATE productos 
    SET categoria_id = ?,  
        nombre = ?,
        descripcion = ?,
        precio = ?,
        url_photo = ?,
        disponible = ?
    WHERE id = ?');

$stmt->bind_param(
  'issisii', $categoria_id, $nombre, $descripcion, $precio, $url_photo, $disponibilidad, $producto_id);

$stmt->execute();

header("Location: inicio.php");
exit();
?>