<?php
include "../modelo/clventas.php";

$v = new Venta();

$n = $_POST['nombre-producto'];

if ( trim($n) != '' ){
	$v->listadeventaspornombre($n);

}else{
	echo "";
}



?>