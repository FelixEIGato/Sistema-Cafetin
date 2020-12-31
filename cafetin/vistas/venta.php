<?php
 
include "../modelo/clproductos.php";

session_start();
$p = new Producto();


?>
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

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">CAFETIN UNTELS</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

  
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      
    </form>

    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo "Bienvenido ". $_SESSION['nombre'] ?>
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="producto.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Productos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="venta.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Ventas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reporte.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Reporte de ventas</span></a>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Venta</a>
          </li>
          <li class="breadcrumb-item active">Generar Venta</li>
        </ol>
             
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Ventas</div>
            <div class="card-body">
              <div class="form-group">
                <form action=../controlador/addventa.php method="POST">
                  <div class="col-md-4">
                    <div class="form-label-group">
                    <?php 
                      $pr = new Producto();
                      $pr->listarNombresPr();
                    ?>
                    </div>
                  </div><br>
                  <div class="col-md-4">
                    <div class="form-label-group">
                      <input type="number" name="cant-p" id="cant-p"  class="form-control" placeholder="Cantidad" required="required" autofocus="autofocus">
                      <label for="cant-p">Cantidad</label>
                    </div>
                  </div><br>
                  <div class="col-md-3">                
                      <input type="submit" value="Agregar"  class="form-control btn btn-primary" >      
                  </div>
                </form>  
              </div><br>
                
              <div class="msg">
                <?php
                   if ( isset($_GET['msg'])){
                    $msg = $_GET['msg'];
                      if ( $msg == 1 ) {
                        echo "<h2 class='bg-danger'>El producto no tiene stock</h2><br>";
                      }elseif ($msg == 2 ) {
                        echo "<h2 class='bg-danger'>La cantidad debe ser mayor a 0</h2><br>";
                      }elseif ($msg == 3) {
                        echo "<h2 class='bg-danger'>Debe seleccionar un producto</h2><br>";
                      }
                   }
                ?>
              </div>  

              <?php 

                if ( isset($_SESSION['ventad'] ) ) {
                  $ventasd = $_SESSION['ventad'];
                  echo "<h1>LISTADO DE COMPRAS</h1>";
                  echo "<table class='table table-bordered' width='100%' cellspacing='0'>";
                    echo "<tr>";
                      echo "<td>ID</td>";
                      echo "<td>NOMBRE</td>";
                      echo "<td>DESCRIPCION</td>";
                      echo "<td>PRECIO</td>";
                      echo "<td>STOCK ACTUAL</td>";
                      echo "<td>CANTIDAD</td>";
                      echo "<td>SUBTOTAL</td>";
                      echo "<td></td>";
                    echo "</tr>";

                    $total = 0 ;
                    $i = 0;

                    foreach ( $ventasd as $p ) {
                      echo "<tr>";
                        echo "<td>".$p->id."</td>";
                        echo "<td>".$p->nombre_p."</td>";
                        echo "<td>".$p->desc_p."</td>";
                        echo "<td>".$p->prec_p."</td>";
                        echo "<td>".$p->stock_p."</td>";
                        echo "<td>".$p->cant_p."</td>";
                        echo "<td>".$p->subtotal."</td>";
                        $total += $p->subtotal;
                        
                        echo "<td><a href='../controlador/eliminarprod.php?idpr=".$i."'>Eliminar</a></td>";

                        $i++;
                    echo "</tr>"; 
                    }

                    echo "<tr><td colspan='6'>Total: </td>";
                    echo "<td>".$total."</td></tr>";

                            $_SESSION['total'] = $total;

                    echo "<tr>";
                        echo "<td colspan='7'>
                                <form action='../controlador/realizarventa.php' method='POST'>
                                    <input type='submit' value='Comprar' class='btn btn-primary'>
                                </form>
                              </td>
                          </tr>";        

                    echo "</table>";             
                }
              ?>

                       
            </div>
          <div class="card-footer small text-muted">Actualizado</div>
        </div>

      </div>

      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>

  </div>


  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../controlador/cerrarsesion.php">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/funciones.js"></script>

</body>

</html>
