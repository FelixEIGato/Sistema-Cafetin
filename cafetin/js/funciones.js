function mensaje(){
	var id = document.getElementById("buscar-p");

	var parametros = {
		"id" : id;
	};

	$.ajax({
		data : parametros,
		url : 'Clases/clproductos.php',
		type: 'POST',
		success: function(data){
			$("#resultado").html(data);
		}
	});
}
