<?php
require "../modelo/clproductos.php";
$prod = new Producto();

		$id = $_POST['idp'];
		$n = $_POST['ed-nomb-p'];
		$d = $_POST['ed-desc-p'];
		$p = $_POST['ed-precio-p'];
		$c = $_POST['ed-cant-p'];
		$e = $_POST['ed-estado-p'];

		$prod->editar($id,$n,$d,$p,$c,$e);
?>