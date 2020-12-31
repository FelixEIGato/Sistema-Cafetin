<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CAFETIN UNTELS</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrarse</div>
      <div class="card-body">
        <form action="registrar.php" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="add-usu" name="add-usu" class="form-control" placeholder="Usuario"  autofocus="autofocus">
                  <label for="add-usu">Usuario</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="Password" id="add-pass" name="add-pass" class="form-control" placeholder="Password" >
                  <label for="add-pass">Password</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="add-nomb" name="add-nomb" class="form-control" placeholder="Nombres" >
              <label for="add-nomb">Nombres</label>
            </div>
          </div>
          <div class="form-group">
            <?php
            $id = $_GET['msg'];
            if ( isset($id) ){
              if ( $id == 1 ){
                echo "<p align='center' class='bg-danger'>Campos en blanco</p>";
              }elseif ($id == 2) {
                echo "<p align='center' class='bg-danger'>Máxima longitud 20</p>";
              }
            }
            ?>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Registrarse">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
