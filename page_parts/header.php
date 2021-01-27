<?php
$uri = $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="<?php echo "http://",$uri, "/css/bootstrap.min.css" ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type='text/css' rel='stylesheet' href="<?php echo "http://",$uri, "/css/styles.css" ?>">
  <link rel="icon" type="img/png" href="<?php echo "http://",$uri, "/img/logo.png" ?>">
  <title> <?php 
  if(isset($title)){
    echo $title;
  }
  else{ echo "Respostería Miss Muffin"; }?> </title>
</head>
<body>

<?php 
  include_once 'page_parts/navbar.php';
?>