<?php
include "../modelo/clproductos.php";
session_start();

		$cant = $_POST['cant-p'];
		$id = $_POST['lista-productos'];

		if ( $id != 0 ) {
			if ( $cant > 0 ) {

				$p = new Producto();
				$p->buscarId($id);
				$p->cant_p = $cant;
				$p->subtotal = $p->cant_p * $p->prec_p ; 

				if( isset($_SESSION['ventad'])){
					$ventad = $_SESSION['ventad'];
				}else{
					$ventad = array();	
				}
				$sumacantidad = 0;

				foreach ($ventad as $prod) {
					if ( $prod->id == $p->id){
						$sumacantidad += $prod->cant_p; 
					}
				}
				$sumacantidad += $p->cant_p;

				if ( $p->stock_p >= $sumacantidad){
					array_push( $ventad, $p );
					$_SESSION['ventad'] = $ventad;
					echo '<meta http-equiv="Refresh" content="0; URL=../vistas/venta.php">';
				}else{
					echo '<meta http-equiv="Refresh" content="0; URL=../vistas/venta.php?msg=1">';
				}
			}else{
				echo '<meta http-equiv="Refresh" content="0; URL=../vistas/venta.php?msg=2">';
			}
		}else{
			echo '<meta http-equiv="Refresh" content="0; URL=../vistas/venta.php?msg=3">';
		}
		

?>