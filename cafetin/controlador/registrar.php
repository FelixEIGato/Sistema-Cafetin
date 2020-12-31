<?php
require "../modelo/clusuarios.php";
$u = $_POST['add-usu'];
		$p = $_POST['add-pass'];
		$n = $_POST['add-nomb'];

		echo strlen($u);
		if ( trim($u) == '' || trim($p) == '' || trim($n) == ''  ) {
			echo '<meta http-equiv="Refresh" content="0; URL=registrarse.php?msg=1">';
		}else{
			if ( strlen($u) > 5 ){				
				echo '<meta http-equiv="Refresh" content="0; URL=registrarse.php?msg=2">';
			}else{
				$usuario = new Usuario();
				$usuario->registrar($u,$p,$n);
			}
			
		}
?>