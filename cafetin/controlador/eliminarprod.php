<?php

$id = $_GET['idpr'];

		session_start();

		if ( isset ($_SESSION['ventad']) ){

			$ventad = $_SESSION['ventad'];
			unset( $ventad [$id] );

			$ventad = array_values($ventad);

			$_SESSION['ventad'] = $ventad;

			echo '<meta http-equiv="Refresh" content="0; URL=../vistas/venta.php">';
		}

?>