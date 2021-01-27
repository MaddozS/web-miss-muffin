<?php
include_once "page_parts/header.php";

include_once "conn_db.php";

session_start();
?>
<!-- Inicio del contenedor -->
<div class="position-relative">


    <div class="toast-container position-absolute top-0 end-0 p-3">
        <div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            Se eliminó el producto exitósamente
        </div>
        <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row border-bottom mb-3">
            <h1>Carrito</h1>
            <br>
            <h3>Tu carrito contiene los siguientes artículos:</h3>
        </div>

<?php
if(!isset($_SESSION["CART"]) || count($_SESSION["CART"]) < 1 ) {
  ?>
    <div class="row justify-content-center">
        <h2 class="text-center my-5 col-12">No tienes artículos agregados al carrito</h2>
        <a class="btn btn-light add col-3" href="categorias.php" role="button">¡Busca tu postre ahora!</a>
    </div>
  <?php
}
else{
?>
        <div class="row">
            <table class="table table-hover col-12">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" >Producto</th>
                    <th scope="col" >Cantidad</th>
                    <th scope="col" >Costo por unidad</th>
                    <th scope="col" class="text-center">Eliminar</th>
                    <th scope="col" class="text-center">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $total = 0;
                $_SESSION['CART_TO_PDF'] = "";
                foreach ($_SESSION["CART"] as $id => $item ) {
                    $totalArt = $item['qty']*$item['cost_per_unit'];
                    ?> 
                    <tr>
                    <th scope="col" class="text-center"><?php echo $item['id'];?></th>
                    <th scope="col"><?php echo $item['nombre'];?></th>
                    <th scope="col">
                        <form action="cart/edit.php" method="post">
                            <div class="qty-input excluded">
                                <input name="id" value="<?php echo $id;?>" type="hidden">
                                <button type="submit" name="action" value="specific" hidden></button>
                                <button class="qty-count qty-count--minus" type="submit" name="action" value="minus">-</button>
                                <input name="postre_qty" class="product-qty" type="number" min="1" max="100" value="<?php echo $item['qty'];?>">
                                <button class="qty-count qty-count--add" type="submit" name="action" value="add">+</button>
                            </div>
                        </form>
                    </th>
                    <th scope="col"><?php echo '$'.$item['cost_per_unit'].' MXN';?></th>
                    <th class="text-center">
                        <form action="cart/remove.php" method="post">
                            <input name="id" value="<?php echo $id;?>" type="hidden">
                            <span class="table-remove"><button type="submit" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                        </form>   
                    </th>
                    <th scope="col" class="text-center"><?php echo '$'.$totalArt.' MXN';?></th>
                    </tr>
                    <?php
                    $total = $total + $totalArt;
                    $_SESSION['CART_TO_PDF'] .= $item['nombre'].' ('.$item['qty'].')'.' Subtotal: $'.$totalArt.' MXN\n';
                }
                $_SESSION['CART_TO_PDF'] .= ' Total: $'.$total.' MXN\n';
                ?>
                </tbody>
            </table>
        </div>

        <div class="text-end pt-4 fw-bold">
            <p><?php echo 'Total: $'.$total.' MXN';?></p>
            <form action="pdfDownload.php" method="post" target='_blank'>
                <input name="articulos" value="<?php echo $articulos;?>" type="hidden">
                <button type="submit" class="btn btn-primary">Generar en PDF</button>
            </form>
        </div>
<?php
}
?>
    </div>
<?php
   include_once "page_parts/footer.php";
   if(isset($_SESSION["ITEM_REMOVED"])){
       if($_SESSION["ITEM_REMOVED"]) echo '<script> showSuccessAddedItem(); </script>';
    //echo '<script> showSuccessAddedItem(); </script>';
    $_SESSION["ITEM_REMOVED"] = false;
  }
?>
<!-- Fin del contenedor -->
</div>

<script>
    let qtyForms = $('.qty-input')
    qtyForms.map(function(){
        var $minusBtn = $(this).find(".qty-count--minus");
        var $addBtn = $(this).find(".qty-count--add");

        
        var $inputs = $(this).find(".product-qty");

        var qtyMin = parseInt($inputs.attr("min"));
        var qtyMax = parseInt($inputs.attr("max"));
        if($inputs.val() <= qtyMin){
            $minusBtn.attr("disabled", true);
        }
        else{
            $minusBtn.attr("disabled", false);
        }
        
        if($inputs.val() >= qtyMax){
            $addBtn.attr("disabled", true);
        }
        else{
            $addBtn.attr("disabled", false);
        }
    })
</script>