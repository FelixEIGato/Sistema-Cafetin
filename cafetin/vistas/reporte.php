<?php
session_start();

include "../modelo/clventas.php";
$v = new Venta();
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
            <a href="#">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Info</li>
        </ol>

        <div class="card mb-4">
          <div class="card-header">
            BUSCAR VENTAS
          </div>
          <div class="card-body">
            <select class="form-group" name="buscar-por" id="buscar-por">
              <option value="0">Buscar por...</option>
              <option value="1">Mes</option>
              <option value="2">Fechas</option>
              <option value="3">Productos</option>
            </select>
          </div>
        </div>

        <div class="card mb-3" id="tabla1">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Ventas Realizadas por Meses </div>
          <div class="card-body">
            Seleccionar Mes
            <select class="form-group" name="meses" id="meses">
              <option value="0">Buscar...</option>
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
            <div class="table-responsive" id="reporte-mes">
              
            </div>
          </div>
          <div class="card-footer small text-muted">Actualizado</div>
        </div>
      </div>

      <div class="container-fluid">
        

        <div class="card mb-3" id="tabla2">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Ventas Realizadas del Mes</div>
          <div class="card-body">
            Buscar ventas entre 
            <form id="form-entrefecha" type="POST">
            <input type="text" placeholder="2019-00-00" name="f1" id="f1" class="form-group"> y 
            <input type="text" placeholder="2019-12-31" name="f2" id="f2" class="form-group">
            <input type="button" value="Buscar" id="buscar-entrefechas">
            </form>
            <div class="table-responsive" id="resultado-entrefechas">
              
            </div>
          </div>
          <div class="card-footer small text-muted">Actualizado</div>
        </div>

        <div class="card mb-3" id="tabla3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Ventas Realizadas del Producto</div>
          <div class="card-body">
             
            <form id="form-porproducto" type="POST">
            <input type="text" placeholder="Ingresar Producto" name="nombre-producto" id="nombre-producto" class="form-group">
            <input type="button" value="Buscar" id="buscarproducto" class="btn btn-primary">
            </form>
            <div class="table-responsive" id="resultado-producto">
              
            </div>
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
        <div class="modal-body">
			Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="controlador/cerrarsesion.php">Cerrar sesión</a>
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

  <script>

    $(document).ready(function(){

      $("#tabla1").hide();
      $("#tabla2").hide(); 
      $("#tabla3").hide();

      $("#buscar-por").change(function(){

            if ( $('select[name=buscar-por').val() == 1 ){

                $("#tabla1").show();
                $("#tabla2").hide();
                $("#tabla3").hide();

            }else if ( $('select[name=buscar-por').val() == 2) {

                $("#tabla1").hide();
                $("#tabla2").show();
                $("#tabla3").hide();
                
            }else if ( $('select[name=buscar-por').val() == 0 ){

                 $("#tabla1").hide();
                 $("#tabla2").hide(); 
                 $("#tabla3").hide();

            }else if ( $('select[name=buscar-por').val() == 3){

                $("#tabla1").hide();
                $("#tabla2").hide();
                $("#tabla3").show();
            }
          })
        

      $("#nombre-producto").keyup(function(){
          
          $.ajax({

            url : '../controlador/reporteporproducto.php',
            type : 'POST',
            data : $("#nombre-producto"),
            success : function(data){
              $("#resultado-producto").html(data);
            },
            error : function(){
              alert("Error");
            }
          })
      })

      $("#meses").change(function(){

        $.ajax({
          url : '../controlador/reportepormes.php',
          type : 'POST',
          data : $("#meses"),
          success : function (data ){
            $("#reporte-mes").html(data);
          }
        })
      })

      $("#buscar-entrefechas").click(function(){

        $.ajax({
          url : '../controlador/reporteentrefecha.php',
          type: 'POST',
          data : $("#form-entrefecha").serialize(),
          success: function(data){
            $("#resultado-entrefechas").html(data);
          }
        })
      })

    })

      

    
  </script>

</body>

</html>

