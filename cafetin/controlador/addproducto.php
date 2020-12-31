<?php
include "../modelo/clproductos.php";

		$prod = new Producto();

		$n = $_POST['nomb-p'];
		$d = $_POST['desc-p'];
		$p = $_POST['precio-p'];
		$c = $_POST['cant-p'];

		$prod->agregar($n,$d,$p,$c);

?>