$(function(){
	$("#add-product").on('click', function(){
		//Obtengo los valores de los input
		var description = $("#description").val();
		var quantity = $("#quantity").val();
		var price = $("#price").val();

		if(description == "" || (quantity == "" || !$.isNumeric(quantity)) || (price != "" && !$.isNumeric(price))){
			//comienzo la cadena de errores en blanco
			var errors = "";
			//Comienzo en cero una variable de errores para saber si debo utilizar el br
			var cont = 0;
			//Verifico cada input y si esta en blanco o si no es válido coloco su cadena de error en la variable mensaje
			if(description == ""){
				errors = errors + "Debes agregar una Descripción al producto.";
				cont = 1;
			}
			if(quantity == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar una Cantidad válida al producto.";
				cont = 1;
			}else if(!$.isNumeric(quantity)){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar una Cantidad válida al producto.";
				cont = 1;
			}
			if(price == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Precio válido al producto.";
				cont = 1;
			}else if(!$.isNumeric(price)){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Precio válido al producto.";
				cont = 1;
			}
			//Elimino la alerta ya existente si la hay
			$("#errors-my-form").children("div").remove();
			//Muestro el nuevo alert con la nueva cadena.
			$("#errors-my-form").append("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+errors+"</div>");
		}else{
			//Elimino el alert existente si lo hay
			$("#errors-my-form").children("div").remove();
			//Obtengo el precio ingresado y lo forzo a dos decimales
			price = parseFloat(price);
			price = price.toFixed(2);
			//Obtengo el precio total de la cantidad de productos
			totalproduct = parseFloat(price) * parseFloat(quantity);
			totalproduct = totalproduct.toFixed(2);

			//Agrego la nueva fila a la tabla
			$("#table-add-product tbody").append("<tr><td class='text-right'><input type='hidden' name='tablequantity[]' value='"+quantity+"' />"+quantity+"</td><td><input type='hidden' name='tabledescription[]' value='"+description+"' />"+description+"</td><td class='text-right'><input type='hidden' name='tableprice[]' value='"+price+"' />"+price+"</td><td class='text-right'><input type='hidden' name='tabletotalproduct[]' value='"+totalproduct+"' />"+totalproduct+"</td><td class='text-center'><button class='delete-row-product btn btn-danger' value="+totalproduct+">Eliminar</button></td></tr>");

			//Si el total esta vacío ingreso el monto obtenido.
			if($("#table-total").text() == ""){
				$("#table-total").text(""+totalproduct+"");
			//Si el total ya tiene valor, le sumo el nuevo monto
			}else{
				var total = parseFloat($("#table-total").text()) + parseFloat(totalproduct);
				total = total.toFixed(2);
				$("#table-total").text(total);
			}
			
			//Elimino los valores de los input
			$("#description").val('');
			$("#quantity").val('');
			$("#price").val('');
		}
	});

	// Evento que selecciona la fila y la elimina 
	$(document).on("click",".delete-row-product",function(){
		//Obtengo el valor almacenado en el botón, es el monto
		var totalproduct = $(this).val();
		//Hago la resta del monto eliminado al total
		var total = parseFloat($("#table-total").text()) - parseFloat(totalproduct);
		//Forzo al total a ser de dos decimales
		total = total.toFixed(2);
		//Si el total es igual a cero, elimino el número de la celda
		if(total == 0){
			$("#table-total").text("");
		//Si no, agrego el nuevo total a la celda			
		}else{
			$("#table-total").text(total);
		}

		//Obtengo la fila a eliminar desde el botón
		var parent = $(this).parents().parents().get(0);
		//Elimino la fila obtenida
		$(parent).remove();
	});
});