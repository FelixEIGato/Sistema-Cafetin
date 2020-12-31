<?php 
session_start();

require_once ("conexion.php");

class Usuario{
	
	public function validar( $u , $p ){
		$conectar = new Conexion();
		$sql = "select * from usuarios where usuario='$u' and password='$p'";
		$resultado = mysqli_query($conectar->getConexion(),$sql);

		if ( $columna = mysqli_fetch_array($resultado) ){

			$_SESSION['nombre'] = $columna[3];
			echo '<meta http-equiv="Refresh" content="0; URL=../vistas/index.php">'; 
				
		}else{
			echo '<meta http-equiv="Refresh" content="0; URL=../index.php?msg=1">';
		}

		$conectar->cerrarConexion();

	}

	/*public function registrar($u ,$p ,$n ){
		$conectar = new Conexion();
		$sql = "insert into usuarios (usuario , password , nombres , estado ) values ( '$u' , '$p' , '$n' , 'activo' )";

		$resultado = mysqli_query($conectar->getConexion(),$sql);

		if ( $resultado ){

			echo '<meta http-equiv="Refresh" content="0; URL=../login.php">'; 

		}else{
			echo '<meta http-equiv="Refresh" content="0; URL=../registrarse.php">';
		}

		$conectar->cerrarConexion();
	}*/

}
	
?>