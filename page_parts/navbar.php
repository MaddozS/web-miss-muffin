<?php 

$pages = array(
  "Inicio" => "index.php", 
  "Productos" => "categorias.php", 
  "Contacto" => "#footer", 
  "Cotiza tus postres" => "carrito.php"
);


  function getStatus($url) {
    $uri = $_SERVER['REQUEST_URI'];
    $parts = explode("/", $uri);
    
    $page = $parts[sizeof($parts)-1];

    if($page === "" && $url=== "index.php"){
      return true;
    }
    return $page === $url;
  }

?>

<nav class="navbar navbar-expand-lg navbar-light borderNavbar sticky-top logo-bg-color p-0">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a href="admin/logIn.php" class="navbar-brand ms-5 ps-3">
      <img src="img/logo.png" loading="lazy" width="80" height="80">
    </a>
    
    <div class="collapse navbar-collapse justify-content-lg-center" id="navbarTogglerDemo03">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <?php
          foreach($pages as $page => $url) {
            ?>
            <li class="nav-item">
              <a class="nav-link 
              <?php 
                $isActive = getStatus($url);
                echo $isActive ? "active" : "";
              ?> " href="<?php echo $url; ?>"><?php echo $page; ?></a>
            </li>
            <?php
          }
        ?>
      </ul>

      <div class="row  justify-content-end mb-4 mb-lg-0">
        <a href="carrito.php" class="pe-2 col-3 col-sm-2 col-lg-12 me-lg-2">
          <i class="fas fa-shopping-cart fa-2x" style="color: #D381C2;"></i>
        </a>
      </div>

    </div>
    
  </div>
  
</nav>

<style>
.borderNavbar{
  border-bottom: solid #D381C2;
}
</style>
