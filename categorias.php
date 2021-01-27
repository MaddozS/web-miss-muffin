<?php
$title = "Nuestros productos"; 
include_once "page_parts/header.php"
?>
<!-- mantener todo en un div padre, no es necesario ponerle ni una clase de bootstrap -->
<div>
  <div class="fullscreen" id="productos">
    <h1 class="my-5 text-center title">Nuestros productos a la venta</h1>
    <div class="row row-cols-1 mx-5 card-deck justify-content-center">
    
    <?php  

    include_once 'conn_db.php';

    $sql = "SELECT * FROM clasificacion_postre";
    $result = $conn->query($sql);

    if($result && $result->num_rows){
      

      while($postre_class = $result->fetch_assoc() ){
      ?>
      <div class="col-12 col-md-4 col-xl-3 col-sm-6">
        <div class="card product" onclick="location.href = ' <?php echo 'productos.php?categoria=', $postre_class["id"]; ?> ' ">
          <img src="<?php echo $postre_class["url_photo"]; ?>" class="card-img-top" alt="Muffins">
          <div class="card-body">
            <h5 class="card-title"><?php echo $postre_class["nombre"]; ?></h5>
          </div>
        </div>
      </div>
      <?php
      }  
    }
    ?>
      
    </div>
  </div>
</div>

<?php
include_once "page_parts/footer.php"
?>