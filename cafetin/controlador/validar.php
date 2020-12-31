<?php
include "../modelo/clusuarios.php";

$u = $_POST['usuario'];
$p = $_POST['password'];

		if ( trim($u) == '' || trim($p) == ''){
			echo '<meta http-equiv="Refresh" content="0; URL=../index.php?msg=2">';
		}else{
			$usuario = new Usuario();
			$usuario->validar($u,$p);
		}

?>