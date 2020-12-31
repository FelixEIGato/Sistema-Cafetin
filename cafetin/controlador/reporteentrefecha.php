<?php
include "../modelo/clventas.php";
$v = new Venta();
$f1 = $_POST['f1'];
$f2 = $_POST['f2'];
$v->listadeventasentrefecha($f1,$f2);
?>