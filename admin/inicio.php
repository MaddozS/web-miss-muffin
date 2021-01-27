<?php 
include_once '../conn_db.php';

session_start();
if (!isset($_SESSION["SESSION_STARTED"])) {
  header("Location: logIn.php");
  exit();
}

$sql_productos = "SELECT * FROM productos;";
$result_productos = $conn->query($sql_productos);

$sql_categorias = 'SELECT id, nombre FROM clasificacion_postre;';
$result_categorias = $conn->query($sql_categorias);

$categorias = array();
if ($result_categorias->num_rows > 0) {
  while ($cat = $result_categorias->fetch_assoc()) {
    array_push($categorias, $cat);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link type='text/css' rel='stylesheet' href="../css/styles.css">
  <link rel="icon" type="img/png" href="../img/logo.png" >
  <title>Admin</title>
  <style>
    input, textarea{
      background-color: transparent;
      box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
     height: 100%;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <h3>Productos</h3>
      <p>Podrás editar cada uno de los productos, no olvides guardar los cambios hechos.</p>
    </div>

    <div class="row my-2">
      <button class="btn btn-primary col-2" data-bs-toggle="collapse" data-bs-target="#newProduct" aria-expanded="false" aria-controls="newProduct">
        Agregar nuevo producto
      </button>
      <div class="collapse" id="newProduct">
        <form class="border my-3 rounded p-2" action="agregarProducto.php" method="post">

          <div class="row">
            <div class="form-floating mb-3 col">
              <input class="form-control" id="nombre_producto" name="nombre" placeholder="Nombre del producto">
              <label for="nombre_producto ps-2">Nombre del postre</label>
            </div>

            <div class="input-group col mb-3">
              <div class="input-group-text">$</div>
              <input type="text" class="form-control" id="precio_producto" placeholder="Precio" name="precio">
            </div>

            <div class="form-floating mb-3 col">
              <input class="form-control" id="url_photo_producto" name="url_photo" placeholder="URL del producto">
              <label for="url_photo_producto">URL de la foto del producto</label>
            </div>

            
            <div class="form-floating col">
              <select class="form-select" id="floatingSelect" name="categoria">
              <?php 
                foreach($categorias as &$categoria){
                  ?>
                  <option value="<?php echo $categoria["id"]; ?>"> 
                    <?php echo $categoria["nombre"];?> 
                  </option>
                  <?php
                }
              ?>
              </select>
              <label for="floatingSelect">Categoría</label>
            </div>
            
          </div>

          <div class="row">
            <div class="form-floating mb-3 col-12">
              <input class="form-control" name="descripcion" id="descripcion_producto" placeholder="Descripcion del producto">
              <label for="descripcion_producto">Descripcion</label>
            </div>
            <div class="col-12 d-flex">
              <div class="form-check form-switch ms-auto">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="disponibilidad" value="disponible">
                <label class="form-check-label" for="flexSwitchCheckDefault">Disponibilidad</label>
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <button type="submit" class="btn btn-success col-2 m-2">
              Agregar producto
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
    <div class="table-responsive col-12">
      <table class="table table-striped border tablesorter" id="table" >
        <thead>
          <th class="col-2">Producto</th>
          <th>Descripción</th>
          <th class="col-1">Precio</th>
          <th class="col">URL de imagen</th>
          <th class="col-2">Categoría</th>
          <th class="col-1">Disponibilidad</th>
          <th class="col-2"></th>
        </thead>

        <tbody>
        <?php 
          if ($result_productos->num_rows > 0) {
            while ($productoEncontrado = $result_productos->fetch_assoc()) {
              ?>
                <tr>
                  <form action="editarProducto.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $productoEncontrado['id'] ?>">
                  <td class="p-0">
                    <input type="text" name="nombre" class="border-0 p-2 w-100" value="<?php echo $productoEncontrado['nombre'] ?>">
                  </td>
                  <td class="p-0">
                    <textarea name="descripcion" class="border-0 p-2 w-100"><?php echo $productoEncontrado['descripcion'] ?></textarea>
                  </td>
                  <td class="p-0">
                    <input type="text" name="precio" class="border-0 p-2 w-100" value="<?php echo $productoEncontrado['precio'] ?>">
                  </td>
                  <td class="p-0">
                    <textarea name="url_photo" class="border-0 p-2 w-100"><?php echo $productoEncontrado['url_photo'] ?></textarea>
                  </td>
                  <td class="p-0 text-center">
                    <select name="categoria" class="form-select" >
                      <?php 
                      foreach($categorias as &$categoria){
                        ?>
                        <option 
                          value="<?php echo $categoria["id"]; ?>"
                          <?php echo $categoria["id"] === $productoEncontrado['categoria_id']? "selected": "";?> 
                          > 
                          <?php echo $categoria["nombre"];?> 
                        </option>
                        <?php
                      }
                      ?>
                    </select>
                  </td>
                  <td class="p-0 text-center ">
                    <div class="form-switch form-check d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" name="disponibilidad" value="disponible"
                      <?php echo $productoEncontrado["disponible"] ? "checked": "";?> >
                    </div>
                  </td>
                  <td class="p-0 text-center">
                    <button type="submit" class="btn btn-success m-2">Guardar cambios</button>
                  </td>
                  </form>
                </tr>
              <?php
            }
          } 
          else {
              echo "<p> No se encontraron datos </p>";
          }
          ?>
        </tbody>
      </table>
    </div>
    </div>
          <div>
          <button type="button" class="btn btn-danger" onclick="location.href='../index.php'">Regresar</button>
          </div>

  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>