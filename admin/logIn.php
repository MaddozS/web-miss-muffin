<?php 
session_start();
$status = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['user'] === "admin" && $_POST['password']  === "admin") {
    $_SESSION["SESSION_STARTED"] = true;
    header("Location: inicio.php");
    exit();
  }
  else{
    $status = "wrong credentials";
    //echo $status;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION["SESSION_STARTED"])) {
  header("Location: inicio.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link type='text/css' rel='stylesheet' href="../css/styles.css">
  <link rel="icon" type="img/png" href="../img/logo.png" >
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
</head>
<body>
  
  <div class="container pt-5 mt-5">
    
    <div class="toast d-flex align-items-center text-white bg-danger border-0 position-absolute top-0 end-0 m-4" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body">
        Credenciales incorrectas
      </div>
      <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>

    <div class="row justify-content-center mt-5">
      <form class="col-4" method="POST" action="logIn.php">
        <h1 class="text-center">¡Bienvenido de nuevo!</h1>
        <div class="mb-3">
          <label class="form-label fw-bold">Usuario</label>
          <input type="text" class="form-control" id="user" name="user">
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="text-center">
          <button type="button" class="btn btn-danger" onclick="location.href='../index.php'">Regresar</button>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
        
      </form>
    </div>
  </div>
  <script src="../js/bootstrap.min.js"></script>
  <script>
    function showSuccessAddedItem() {
      let toastElList = [].slice.call(document.querySelectorAll('.toast'))
      let toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl, {
          delay: 4000
        })
      })
      toastList.forEach(toast => toast.show());
    }
  </script>

<?php 
  if($status == "wrong credentials") {
    echo '<script> showSuccessAddedItem(); </script>';
  }
?>

</body>
</html>