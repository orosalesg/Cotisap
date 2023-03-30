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

	// Llenar tabla con registros
	getAllCP();

	// Inicializar tabla de personas de contacto
	$("#cpTable").DataTable({

		"columnDefs": [
        	{"className": "dt-center", "targets": "_all"},
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
				        		return "<img data='" + data + "' class='cpedit' src='" + edit_img_route + "' height='30' width='30'/>";
				   		}, "targets" : 4 },
        	{"render" : function(data, type, row){
				        		return "<img data='" + data + "' class='cpdelete' src='" + delete_img_route + "' height='30' width='30'/>";
				   		}, "targets" : 5 }
      	],
		language: lang_ES_EN,
		columns : [
			{title : "ID"},
			{title : "Nombre"},
			{title : "Correo"},
			{title : "Telefono"},
			{title : "Editar"},
			{title : "Eliminar"}
		],
		"fnDrawCallback": function( oSettings ) {
			$(".delete").off();
			$(".delete").on("click", deleteCP );
			$(".edit").off();
			$(".edit").on("click", setUpdateComponent );
    	}
	});

}); // End doc ready


// Obtener todas las personas de contacto
function getAllCP(){
	$.get({
		url : route + "/all",
		processData : false,
		cache : false,
		success : function( response ){
			var data = response.data;

			// Mostrar las personas de contacto en la tabla
			showCP( data );

			$("#data-loader").remove();
		}
	});
}

function showCP( data ){
	var TABLE = $("#cpTable").DataTable();
	data.forEach(function(e){
		var array = new Array();
		array.push(e.id);
		array.push(e.name);
		array.push(e.email);
		array.push(e.id);
		array.push(e.id);
		TABLE.row.add( array );
	});
	TABLE.draw();
	$("#container").show();
}


function storeCP(){
	$("#ajax-loader").show();
	if( validateForm() ){
		$.ajax({
			method : "POST",
			url : route,
			data : {
				"id_customer" : $("#clienteId").val(),
				"name" : $("#name").val(),
				"email" : $("#email").val(),
				"phone" : $("#phone").val()
			},
			success : function( response ){
				if( response.status ){
					swal("OK", "Persona de contacto creada correctamente", "success");
					var TABLE = $("#usuariosTable").DataTable();
					TABLE.row.add([
						response.id,
						$("#name").val(),
						$("#email").val(),
						$("#phone").val(),
						$("#id").val(),
						$("#id").val()
					]);
					$("#ajax-loader").hide();
					$("#close").click();
					TABLE.draw();
				}
			}
		});
	}
}

function setUpdateComponent(event){
	clearForm();
    
	var id = $(event.currentTarget).parents("tr").find(".cpid").text();
	var name = $(event.currentTarget).parents("tr").find(".cpname").text();
	var email = $(event.currentTarget).parents("tr").find(".cpemail").text();
	var phone = $(event.currentTarget).parents("tr").find(".cpphone").text();
	$("#cp_id").val( id );
	$("#cp_name").val( name );
	$("#cp_email").val( email );
	$("#cp_phone").val( phone );

	//Buscamos los datos del usuario para cargalos en el modal
	$.get({
		url : route + "/" + $("#id").val(),
		processData : false,
		cache : false,
		success : function( response ){
		    var data = response.data;
		    
		    console.log(data);
		    
		    $("#slpcode").val( data.SlpCode );
		    $("#commission").val( data.Commission );
		    $("#groupcode").val( data.GroupCode );
		    $("#locked").val( data.Locked );
		    $("#datasource").val( data.DataSource );
		    $("#usersign").val( data.UserSign );
		    $("#empid").val( data.EmpID );
		    $("#active").val( data.Active );
		    $("#telephone").val( data.Telephone );
		    $("#mobil").val( data.Mobil );
		    $("#ubranch").val( data.U_branch );
		    $("#usalt").val( data.U_salt );
		    $("#upricelist").val( data.U_priceList );
		    $("#umanager").val( data.U_manager );
		    $("#uexport").val( data.U_export );
		    $("#udiscounts").val( data.U_discounts );
		    
		    
		    /*var TABLE = $("#usuariosTable").DataTable();
        	data.forEach(function(e){
        		var array = new Array();
        		array.push(e.id);
        		array.push(e.name);
        		array.push(e.email);
        		array.push(e.U_admin);
        		array.push(e.id);
        		array.push(e.id);
        		TABLE.row.add( array );
        	});
        	TABLE.draw();
        	$("#container").show();
        	
			var data = response.data;
			$("#data-loader").remove();*/
		}
	});

	$("#update-btn-trigger").click();
}

// Por añadir
function updateUser(){
	$("#ajax-loader").show();
	if( validateForm() ){
		$.ajax({
			method : "POST",
			url : route + "/" + $("#id").val(),
			data : {
				"name" : $("#cp_name").val(),
				"email" : $("#cp_email").val(),
				"phone" : $("#cp_phone").val(),
				"_method" : "PUT"
			},
			success : function( response ){
				if( response.status ){
					$("#ajax-loader").hide();
					swal("OK", "Usuario actualizada correctamente", "success");
					var parents = $("#usuariosTable span:contains('" + $("#id").val() +  "')").parents("tr");
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
		url : route + "/" + id,
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
	$(".not-null").each(function(){
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