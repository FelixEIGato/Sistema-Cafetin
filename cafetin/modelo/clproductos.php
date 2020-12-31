<?php
require_once "conexion.php";

class Producto{

	public $id;
	public $nombre_p;
	public $desc_p;
	public $prec_p;
	public $cant_p;
	public $stock_p;
	public $subtotal;

	public function listar(){
		$conectar = new Conexion();
		$sql = "select * from productos";
		$resultado = mysqli_query($conectar->getConexion(),$sql);

		echo "<table class='table table-bordered' width='100%' cellspacing='0' >
			  <tr>
			  	<th>#</th>
			  	<th>NOMBRE</th>
			  	<th>DESCRIPCION</th>
			  	<th>PRECIO</th>
			  	<th>CANTIDAD</th>
			  	<th>ESTADO</th>
			  	<th></th>
			  </tr>	";

		while ( $columna = mysqli_fetch_array($resultado) ){
			echo   "<tr>
						<td>".$columna['idproducto']."</td>
						<td>".$columna['nombre_producto']."</td>
						<td>".$columna['descripcion']."</td>
						<td>S/".$columna['precio']."</td>
						<td>".$columna['cantidad']." unidades</td>
						<td>".$columna['estado']."</td>
						<td><a class='btn btn-success btn-xs' href='../controlador/editarprod.php?id=".$columna['idproducto']."'>Editar</a></td>
				    </tr>";
		}
		echo "</table>";

		$conectar->cerrarConexion();
	}

	public function agregar($n , $d , $p , $c ){
		$conectar = new Conexion();
		$sql = "insert into productos (nombre_producto , descripcion , precio , cantidad , estado ) values ( '$n' , '$d' , '$p' , '$c' , 'Activo' )";
		$resultado = mysqli_query($conectar->getConexion(),$sql);

		if ( $resultado ){
			
			echo '<meta http-equiv="Refresh" content="0; URL=../vistas/producto.php">'; 

		}else{
			
			echo '<meta http-equiv="Refresh" content="0; URL=../index.php">';
		}

		$conectar->cerrarConexion();

	}

	public function editar($id , $n , $d , $p , $c , $e){
		$conectar = new Conexion();
		$sql = "update productos set nombre_producto='$n' , descripcion='$d' , precio='$p' , cantidad='$c' , estado='$e' where idproducto='$id' ";

		$resultado = mysqli_query($conectar->getConexion(),$sql);

		if ( $resultado ){
			
			echo '<meta http-equiv="Refresh" content="0; URL=../vistas/producto.php">'; 


		}else{
		
			echo '<meta http-equiv="Refresh" content="0; URL=../index.php">';
		}

		$conectar->cerrarConexion();

	}

	public function buscarId($id){
		$conectar = new Conexion();

		$sql = "select * from productos where idproducto='$id' ";

		$resultado= mysqli_query($conectar->getConexion(),$sql);

		if ( $columna = mysqli_fetch_array($resultado) ){
			
			$this->id = $columna['idproducto'];
			$this->nombre_p = $columna['nombre_producto'];
			$this->desc_p = $columna['descripcion'];
			$this->prec_p = $columna['precio'];
			$this->stock_p = $columna['cantidad'];

		}

	}
	public function buscarProducto($id){
		$conectar = new Conexion();
		$sql = "select * from productos where idproducto='$id'";

		$resultado= mysqli_query($conectar->getConexion(),$sql);

		

		if ( $columna = mysqli_fetch_array($resultado) ){

			echo "<div class='col-md-4'>
                  <div class='form-label-group'>
                  	<input type='hidden' name='idp' id='idp' value='".$columna['idproducto']."' class='form-control' >
                    <input type='text' name='ed-nomb-p' id='ed-nomb-p' value='".$columna['nombre_producto']."' class='form-control' placeholder='Nombre' required='required' autofocus='autofocus'>
                    <label for='nomb-p'>Nombre del Producto</label>
                  </div>
                </div><br>
                <div class='col-md-4'>
                  <div class='form-label-group'>
                    <input type='text' name='ed-desc-p' id='ed-desc-p' value='".$columna['descripcion']."' class='form-control' placeholder='Descripcion' required='required' autofocus='autofocus'>
                    <label for='desc-p'>Descripcion del Producto</label>
                  </div>
                </div><br>
                <div class='col-md-4'>
                  <div class='form-label-group'>
                    <input type='text' name='ed-precio-p' id='ed-precio-p' value='".$columna['precio']."' class='form-control' placeholder='Precio' required='required' autofocus='autofocus'>
                    <label for='precio-p'>Precio</label>
                  </div>
                </div><br>
                <div class='col-md-4'>
                  <div class='form-label-group'>
                    <input type='text' name='ed-cant-p' id='ed-cant-p' value='".$columna['cantidad']."' class='form-control' placeholder='Cantidad' required='required' autofocus='autofocus'>
                    <label for='cant-p'>Cantidad</label>
                  </div>
                </div><br>
                <div class='col-md-4'>
                  <div class='form-label-group'>
                    <select name='ed-estado-p' class='form-control'>";
                     if ( $columna['estado'] == Activo ) {
                    	echo "<option value='Activo' selected> Activo </option>
                    		  <option value='Inactivo'>Inactivo</option>
                    </select>";
                    }else{
                    	echo "<option value='Activo'> Activo</option>
                    		  <option value='Inactivo' selected>Inactivo</option>";
                    }

                    echo "</select></div>
                		</div><br>
                		<div class='col-md-3'>                
                    		<input type='submit' value='Editar Producto' class='form-control btn btn-primary' >      
                		</div>";      	
		}else{

			echo 'error';
		}

		$conectar->cerrarConexion();		
	}

	public function listarNombresPr(){

		$conectar = new Conexion();
		$sql = "select idproducto , nombre_producto from productos order by nombre_producto ASC";
		$resultado = mysqli_query($conectar->getConexion(),$sql);

		echo "Productos:<br><select name='lista-productos' class='form-control' ><option value='0'>Seleccionar Producto...</option>";
		while ( $columna = mysqli_fetch_array($resultado) ){
			echo "<option value='".$columna['idproducto']."'>".$columna['nombre_producto']."</option>";
		}
		echo "</select>";

		$conectar->cerrarConexion();
	}

	public function crearVenta($listaProductos , $total){

		ini_set('date.timezone' , 'America/Lima');

		$time1 = date('Y-m-d , H:i:s', time());

		$conectar = new Conexion();

		$query = "insert into venta (fecha , total ) values (  '$time1' , '$total' )";

		$resultado = mysqli_query($conectar->getConexion(),$query);


		$query = "select max(idventa) from venta";

		$resultado = mysqli_query($conectar->getConexion(),$query);

		$idultimaventa = 0;


		if ( $columna = mysqli_fetch_array($resultado) ) {
			$idultimaventa = $columna[0];
		}

		foreach ($listaProductos as $p) {
			
			$query = "insert into detalle ( venta , producto , cantidad , subtotal) values ( '$idultimaventa' , '$p->id' , '$p->cant_p' , '$p->subtotal' ) ";		
			$resultado = mysqli_query($conectar->getConexion(),$query);

			$this->actualizarStock($p->id,$p->cant_p);
		}
		
		$conectar->cerrarConexion();
	}

	public function actualizarStock( $id ,$stockDesc){
		$conectar = new Conexion();

		$query = "select cantidad from productos where idproducto='$id' ";

		$resultado = mysqli_query($conectar->getConexion(),$query);

		$stock_actual = 0;

		if ( $columna = mysqli_fetch_array($resultado) ){
			$stock_actual = $columna[0];

		}

		$stock_actual -= $stockDesc;

		$query = "update productos set cantidad = $stock_actual where idproducto = $id ";

		$resultado = mysqli_query($conectar->getConexion(),$query);
	}

	public function existenciaProducto(){

		$conectar = new Conexion();

		$query = "select nombre_producto , descripcion , precio , cantidad from productos where cantidad < 10 and estado = 'Activo' ";

		$resultado = mysqli_query($conectar->getConexion(),$query);


		echo "<table class='table table-bordered' width='100%' cellspacing='0' >
			  <tr>
			  	<th>NOMBRE</th>
			  	<th>DESCRIPCION</th>
			  	<th>PRECIO</th>
			  	<th>CANTIDAD</th>
			  </tr>	";

		while ( $columna = mysqli_fetch_array($resultado) ){
			echo   "<tr>
						<td>".$columna[0]."</td>
						<td>".$columna[1]."</td>
						<td>S/".$columna[2]."</td>
						<td>".$columna[3]." unidades</td>
				    </tr>";
		}
		echo "</table>";

		$conectar->cerrarConexion();

	}


}
?>