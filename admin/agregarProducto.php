<?php 
include_once '../conn_db.php';

$categoria_id = $_POST["categoria"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$url_photo = $_POST["url_photo"];
$disponibilidad = isset($_POST["disponibilidad"]) ? 1 : 0;

$stmt = $conn->prepare(
  'INSERT INTO productos (categoria_id, nombre, descripcion, precio, url_photo, disponible) 
    VALUES (?, ?, ?, ?, ?, ?)');

$stmt->bind_param('issisi', $categoria_id, $nombre, $descripcion, $precio, $url_photo, $disponibilidad);
$stmt->execute();

header("Location: inicio.php");
exit();
?>