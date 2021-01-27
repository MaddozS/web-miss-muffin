<?php
include_once "page_parts/header.php";

include_once "conn_db.php";
session_start();
//echo $_SESSION["ITEM_ADDED"]. "asdasdsad";
?>

<!-- productos.php boton galleta

producto.php

$_GET["categoria"] = 1 -->

<!-- mantener todo en un div padre, no es necesario ponerle ni una clase de bootstrap -->
<div class="position-relative">
  <div class="toast-container position-absolute top-0 end-0 p-3">
    <div class="toast d-flex align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body">
        ¡El producto ha sido agregado con éxito!
      </div>
      <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
  <div class="container mt-5">
  <?php 

    $stmt = $conn->prepare('SELECT * FROM productos WHERE categoria_id = ?');
    $stmt->bind_param('i', $_GET["categoria"]);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result && $result->num_rows){
      while($postre = $result->fetch_assoc() ){
        ?>
            <h1 class="mb-3"><?php echo $postre["nombre"];?></h1>
            <!-- <h5>Categoría</h5> -->
            <div class="row mb-5">
            <div class="imagen col-4">
                <img src="<?php echo $postre["url_photo"]; ?>" style="width: 100%;">
            </div>
            <div class="col-8">
                <p> <?php echo $postre["descripcion"]; ?> </p>
                <p> <h4>Precio: </h4> $<?php echo $postre["precio"]; ?> MXN</p>
                <?php 
                  if($postre["disponible"] > 0){
                    ?>
                    <form action="cart/add.php" method="post" class="add-cart-form" >
                      <input name="nombre" value="<?php echo $postre["nombre"];?>" type="hidden">
                      <input name="id_postre" value="<?php echo $postre["id"];?>" type="hidden">
                      <input name="precio_unit" value="<?php echo $postre["precio"];?>" type="hidden">
                      <input name="categoria" value="<?php echo $_GET["categoria"];?>" type="hidden">

                      <div class="qty-input">
                        <button class="qty-count qty-count--minus" data-action="minus" type="button"> - </button>
                        <input name="postre_qty" class="product-qty" type="number" min="1" max="100" value="1">
                        <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                      </div>

                      <button class="btn btn-light add" type="submit" >Añadir a carrito</button>
                    </form>
                    <?php
                  }
                  else{
                    ?>
                    <button class="btn btn-light" disabled >No disponible por el momento</button>
                    <?php
                  }
                ?>
                
            </div>
            </div>
        <?php
      }
    }
    else{
      header("Location: categorias.php");
    }
  ?>
  </div>
</div>


<?php
  
  include_once "page_parts/footer.php";
  //echo $_SESSION["ITEM_ADDED"]. "asdasdsad";
  if($_SESSION["ITEM_ADDED"]){
    echo '<script> showSuccessAddedItem(); </script>';
    //echo '<script> showSuccessAddedItem(); </script>';
    $_SESSION["ITEM_ADDED"] = false;
  }
?>