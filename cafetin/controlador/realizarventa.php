<?php
include "../modelo/clproductos.php";
session_start();

		$venta = $_SESSION['ventad'];
		$total = $_SESSION['total'];

		$v = new Producto();
		
		$v->crearVenta($venta,$total);


		session_unset($_SESSION['ventad']);
		session_unset($_SESSION['total']);

		echo "<script language='javascript'>
				alert('Venta Realizada')
			  </script>	" ;

		echo '<meta http-equiv="Refresh" content="0; URL=../vistas/venta.php">';

?>