<?php
require_once "conexion.php";

class Venta{

	public function listarVentas(){
		$conexion = new Conexion();

		$sql = "select * from venta" ;

		

		$resultado = mysqli_query($conexion->getConexion(), $sql);

		echo "<table class='table table-bordered' width='100%' cellspacing='0' >
				<thead>
			  		<tr>
			  			<th>#</th>
			  			<th>FECHA</th>
			  			<th>TOTAL</th>
			  			<th></th>
			  		</tr>	";

		while ( $columna = mysqli_fetch_array($resultado)){

			echo   "<tbody>
						<tr>
							<td>".$columna[0]."</td>
							<td>".$columna[1]."</td>
							<td>".$columna[2]."</td>
							<td>
								<a href='detalles.php?id=".$columna[0]."' class='btn btn-success'>Ver Detalles</a>
							</td>
				    	</tr>
				    <tbody>";			    
		}
		echo "</table>";
		$conexion->cerrarConexion();
	}

	public function listadeventas($mes){

		switch ($mes) {

			case 1: 
				$f1 = '2019-01-0';
				$f2 = '2019-01-31'; break;

			case 2: 
				$f1 = '2019-02-0';
				$f2 = '2019-02-28'; break;
			
			case 3: 
				$f1 = '2019-03-0';
				$f2 = '2019-03-31'; break;

			case 4: 
				$f1 = '2019-04-0';
				$f2 = '2019-04-30'; break;

			case 5: 
				$f1 = '2019-05-0';
				$f2 = '2019-05-31'; break;
				
			case 6: 
				$f1 = '2019-06-0';
				$f2 = '2019-06-30'; break;
			
			case 7: 
				$f1 = '2019-07-0';
				$f2 = '2019-07-31'; break;

			case 8: 
				$f1 = '2019-08-0';
				$f2 = '2019-08-31'; break;

			case 9: 
				$f1 = '2019-09-0';
				$f2 = '2019-09-30'; break;

			case 10: 
				$f1 = '2019-10-0';
				$f2 = '2019-10-31'; break;

			case 11: 
				$f1 = '2019-11-0';
				$f2 = '2019-11-30'; break;

			case 12: 
				$f1 = '2019-12-0';
				$f2 = '2019-12-31'; break;				

		}

		$conexion = new Conexion();

		$sql = " select  * FROM venta WHERE fecha BETWEEN '$f1' and  '$f2' " ;

		

		$resultado = mysqli_query($conexion->getConexion(), $sql);

		echo "<table class='table table-bordered' width='100%' cellspacing='0' >
				<thead>
			  		<tr>
			  			<th>#</th>
			  			<th>FECHA</th>
			  			<th>TOTAL</th>
			  			<th></th>
			  		</tr>	";

		while ( $columna = mysqli_fetch_array($resultado)){

			echo   "<tbody>
						<tr>
							<td>".$columna[0]."</td>
							<td>".$columna[1]."</td>
							<td>".$columna[2]."</td>
							<td>
								<a href='detalles.php?id=".$columna[0]."' class='btn btn-success'>Ver Detalles</a>
							</td>
				    	</tr>
				    <tbody>";			    
		}
		echo "</table>";
		$conexion->cerrarConexion();
	}
	

	public function listadeventaspornombre($n){
		$conexion = new Conexion();

		$sql = "select v.fecha , p.nombre_producto , d.cantidad ,d.subtotal total from venta v , detalle d , productos p where d.venta = v.idventa and d.producto = p.idproducto and p.nombre_producto like '%$n%' ";

		$resultado = mysqli_query($conexion->getConexion(), $sql);

		echo "<table class='table table-bordered' width='100%' cellspacing='0' >
				<thead>
			  		<tr>
			  			<th>FECHA</th>
			  			<th>PRODUCTO</th>
			  			<th>CANTIDAD</th>
			  			<th>TOTAL</th>
			  		</tr>";

		while ( $columna = mysqli_fetch_array($resultado) ){

			echo   "<tbody>
						<tr>
							<td>".$columna[0]."</td>
							<td>".$columna[1]."</td>
							<td>".$columna[2]."</td>
							<td>".$columna[3]."</td>
				    	</tr>
				    <tbody>";
		}

		echo "</table>";
		$conexion->cerrarConexion();
	}

	public function listadeventasentrefecha($f1,$f2){

				
		$conexion = new Conexion();

		$sql = " select  * FROM venta WHERE fecha BETWEEN '$f1' and  '$f2' " ;

		

		$resultado = mysqli_query($conexion->getConexion(), $sql);

		echo "<table class='table table-bordered' width='100%' cellspacing='0' >
				<thead>
			  		<tr>
			  			<th>#</th>
			  			<th>FECHA</th>
			  			<th>TOTAL</th>
			  			<th></th>
			  		</tr>	";

		while ( $columna = mysqli_fetch_array($resultado)){

			echo   "<tbody>
						<tr>
							<td>".$columna[0]."</td>
							<td>".$columna[1]."</td>
							<td>".$columna[2]."</td>
							<td>
								<a href='detalles.php?id=".$columna[0]."' class='btn btn-success'>Ver Detalles</a>
							</td>
				    	</tr>
				    <tbody>";			    
		}

		echo "</table>";
		$conexion->cerrarConexion();
	}

	public function verDetalle($id){
		$conexion = new Conexion();
		$sql = "select d.iddetalle , v.fecha , p.nombre_producto , d.cantidad , d.subtotal from detalle d , venta v , productos p where d.venta = v.idventa and d.producto = p.idproducto and d.venta = $id";
		$resultado = mysqli_query($conexion->getConexion(),$sql);

		echo "<table class='table table-bordered' width='100%' cellspacing='0' >
				<thead>
			  		<tr>
			  			<th>#</th>
			  			<th>FECHA</th>
			  			<th>PRODUCTO</th>
			  			<th>CANTIDAD</th>
			  			<th>SUBTOTAL</th>
			  			<th></th>
			  		</tr>";

		while ( $columna = mysqli_fetch_array($resultado)){

			echo   "<tbody>
						<tr>
							<td>".$columna[0]."</td>
							<td>".$columna[1]."</td>
							<td>".$columna[2]."</td>
							<td>".$columna[3]."</td>
							<td>".$columna[4]."</td>
				    	</tr>
				    <tbody>";			    
		}
		echo "</table>";
		$conexion->cerrarConexion();

	}
}
?>