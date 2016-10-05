$(function(){
	$("#add-terms").on('click', function(){
		//Obtengo los valores de los input
		var terms = $("#terms").val();

		if(terms == ""){
			//comienzo la cadena de errores en blanco
			var errors = "";
			//Comienzo en cero una variable de errores para saber si debo utilizar el br
			var cont = 0;
			//Verifico cada input y si esta en blanco o si no es válido coloco su cadena de error en la variable mensaje
			if(terms == ""){
				errors = errors + "Debes agregar un Término o Condición válida.";
				cont = 1;
			}
			//Elimino la alerta ya existente si la hay
			$("#errors-my-form").children("div").remove();
			//Muestro el nuevo alert con la nueva cadena.
			$("#errors-my-form").append("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+errors+"</div>");
		}else{
			//Elimino el alert existente si lo hay
			$("#errors-my-form").children("div").remove();
			
			$("#table-add-terms tbody").append("<tr><td><input type='hidden' name='tableterms[]' value='"+terms+"' />"+terms+"</td><td class='text-center'><button class='delete-row-terms btn btn-danger'>Eliminar</button></td></tr>");
			
			//Elimino los valores de los input
			$("#terms").val('');
		}
	});

	// Evento que selecciona la fila y la elimina 
	$(document).on("click",".delete-row-terms",function(){
		//Obtengo la fila a eliminar desde el botón
		var parent = $(this).parents().parents().get(0);
		//Elimino la fila obtenida
		$(parent).remove();
	});
});