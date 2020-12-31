
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iniciar Sesion</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body background="imagen/f1.jpg">

  <div class="container">
    <div class="card card-login mx-auto mt-5 caja-login">
      <div class="card-header">Inicio</div>
      <div class="card-body">
        <form action="controlador/validar.php" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario"  autofocus="autofocus">
              <label for="usuario">Usuario</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
              <label for="password">Password</label>
            </div>
          </div>
          <div class="form-group">
            <?php
            $msg = $_GET['msg'] ; 
            if ( isset($msg)){
              if ( $msg == 1){
                echo "<p align='center' class='bg-danger'>Usuario o Contraseña incorrecta</p>";
              }elseif ( $msg == 2) {
                echo "<p align='center' class='bg-danger'>Campos en blanco</p>";
              }
            }
            ?>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login">
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>