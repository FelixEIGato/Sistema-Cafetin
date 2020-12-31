<?php
include "../modelo/clventas.php";

$mes = $_POST['meses'];

if ( $mes != 0 ) {
	$v = new Venta();
	$v->listadeventas($mes);
}else{
	echo "";
}


?>