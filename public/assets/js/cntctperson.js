var lang_ES_EN = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}

$(document).ready(function(){

	// Evento crear Persona de contacto
	$("#btnSaveCP").on("click", storeCP );

	// Inicializar tabla de personas de contacto
	$("#cpTable").DataTable({

		"columnDefs": [
        	{"className": "dt-center", "targets": "_all"},
			// este campo es del id del de la persona de contacto
			{"render" : function(data, type, row){
								return "<span class='cpid'>" + data + "</span>";
						}, "targets" : 0 },
        	{"render" : function(data, type, row){
				        		return "<span class='cpname'>" + data + "</span>";
				   		}, "targets" : 1 },
        	{"render" : function(data, type, row){
				        		return "<span class='cpemail'>" + data + "</span>";
				   		}, "targets" : 2 },
        	{"render" : function(data, type, row){
				        		return "<span class='cpphone'>" + data + "</span>";
				   		}, "targets" : 3 },
        	{"render" : function(data, type, row){
				        		return "<img data='" + data + "' class='editcp' src='" + edit_img_route + "' height='30' width='30'/>";
				   		}, "targets" : 4 },
        	{"render" : function(data, type, row){
				        		return "<img data='" + data + "' class='deletecp' src='" + delete_img_route + "' height='30' width='30'/>";
				   		}, "targets" : 5 }
      	],
		language: lang_ES_EN,
		columns : [
			// este campo es del id del de la persona de contacto
			{title : "ID"},
			{title : "Nombre"},
			{title : "Correo"},
			{title : "Telefono"},
			{title : "Editar"},
			{title : "Eliminar"}
		],
		"fnDrawCallback": function( oSettings ) {
			$(".deletecp").off();
			$(".deletecp").on("click", deleteCP );
			$(".editcp").off();
			$(".editcp").on("click", updateUser );
    	}
	});

}); // End doc ready

// Obtener todas las personas de contacto
function getAllCP(){

	$.ajax({
		method: "POST",
		url : routefind,
		data: {
			"id_customer" : $("#clienteId").val(), 
		},
		success : function( response ){
			var data = response;

			// Mostrar las personas de contacto en la tabla
			showCP( data );

			$("#data-loader").remove();
		}
	});
}

function showCP( data ){

	console.log(data);

	var TABLE = $("#cpTable").DataTable();
	$.each(data,function(e){
		var array = new Array();
		// este campo es del id del de la persona de contacto
		array.push(e.id);
		array.push(e.name);
		array.push(e.email);
		array.push(e.email);
		array.push(e.id);
		array.push(e.id);
		TABLE.row.add( array );
	});
	TABLE.draw();
	$("#container").show();


}


function storeCP(){
	$("#loader-cp").show();
	//if( validateForm() ){
		$.ajax({
			method : "POST",
			url : routestore,
			data : {
				// Id de cliente
				"id_customer" : $("#clienteId").val(),
				//  Estos input corresponden al formulario arriba de la tabla de personas de contacto
				"name" : $("#cp_name").val(),
				"email" : $("#cp_email").val(),
				"phone" : $("#cp_phone").val()
			},
			success : function( response ){
				if( response.status ){
					Swal.fire({
						icon: 'success',
						title: 'Persona de contacto',
						text: 'Creada correctamente',
						showCloseButton: true,
						showCancelButton: false,
					});

					// Al ejecutarse correctamente la solicitud agregamos los datos a una nueva linea de la tabla
					var TABLE = $("#cpTable").DataTable();
					TABLE.row.add([
						response.id,
						//  Estos input corresponden al formulario arriba de la tabla de personas de contacto
						$("#cp_name").val(),
						$("#cp_email").val(),
						$("#cp_phone").val(),
						$("#cp_id").val(),
						$("#cp_id").val()
					]);

					// Detener el gif de carga
					$("#loader-cp").hide();
					TABLE.draw();
				}
			}
		});
	//}
}

// Por añadir
function updateUser(){
	$("#loader-cp").show();
	if( validateForm() ){
		$.ajax({
			method : "POST",
			url : routeupdate,
			data : {
				"name" : $("#cp_name").val(),
				"email" : $("#cp_email").val(),
				"phone" : $("#cp_phone").val(),
				"_method" : "PUT"
			},
			success : function( response ){
				if( response.status ){
					$("#loader-cp").hide();
					swal("OK", "Usuario actualizada correctamente", "success");

					// Ajustar a nueva forma de actualizar
					var parents = $("#cpTable span:contains('" + $("#id").val() +  "')").parents("tr");
					parents.find(".name").text($("#cp_name").val());
					parents.find(".email").text($("#cp_email").val());
					parents.find(".phone").text($("#cp_phone").val());
					$("#close").click();
				}
			}
		});
	}
}


function deleteCP(event){
	var id = $(event.currentTarget).parents('tr').find(".id").text();
	$(event.currentTarget).attr("src", ajax_loader_route);
	$.ajax({
		method : "DELETE",
		url : routedelete,
		success : function( response ){
			if( response.status ){
				swal("OK", "Persona de contacto eliminada correctamente", "success");
				var row = $("#cpTable").DataTable().row( $(event.currentTarget).parents('tr') ).remove().draw();
			}
		},
		error: function( result ){
			swal("OK", "Error al eliminar a la persona de contacto " + result, "error");
		}
	});
}

function validateForm(){
	var valid_count = 0;
	$("#cpdiv").find(".not-null").each(function(){
		checkInputEmptyness( $(this) ) ? null : valid_count-- ;
	});
	return valid_count >= 0;
}

// Vaciar campos del formulario de personas de contacto
function clearForm(){
	$("#cp_name").val("");
	$("#cp_email").val("");
	$("#cp_phone").val("");
}