
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
	$('[data-toggle="tooltip"]').tooltip({trigger: "manual"});
	$("#create-btn").click( setCreateComponent );	
	$("#create-btn").show();
	$(".not-null").on("focusout", checkInputEmptyness );
	getAllUsers();
	$("#usuariosTable").DataTable({
		"columnDefs": [
        	{"className": "dt-center", "targets": "_all"},
        	{"render" : function(data, type, row){
				        		return "<span class='id'>" + data + "</span>";
				   		}, "targets" : 0 },
        	{"render" : function(data, type, row){
				        		return "<span class='name'>" + data + "</span>";
				   		}, "targets" : 1 },
        	{"render" : function(data, type, row){
				        		return "<span class='email'>" + data + "</span>";
				   		}, "targets" : 2 },
        	{"render" : function(data, type, row){
				        		return "<span class='uadmin'>" + data + "</span>";
				   		}, "targets" : 3 },
        	{"render" : function(data, type, row){
				        		return "<img data='" + data + "' class='edit' src='" + edit_img_route + "' height='30' width='30'/>";
				   		}, "targets" : 4 },
        	{"render" : function(data, type, row){
				        		return "<img data='" + data + "' class='delete' src='" + delete_img_route + "' height='30' width='30'/>";
				   		}, "targets" : 5 }
      	],
		language: lang_ES_EN,
		columns : [
			{title : "ID"},
			{title : "Nombre"},
			{title : "Usuario"},
			{title : "Rol"},
			{title : "Editar"},
			{title : "Eliminar"}
		],
		"fnDrawCallback": function( oSettings ) {
			$(".delete").off();
			$(".delete").on("click", deletePolicy );
			$(".edit").off();
			$(".edit").on("click", setUpdateComponent );
    	}
	});
});
function setCreateComponent(){
	clearForm();
	$("#create-instr").show();
	$("#update-instr").hide();
	$("#row-id").hide();
	$("#add-label").show();
	$("#update-label").hide();
	$("#action-btn span").text( "Guardar" );
	$("#action-btn").off();
	$("#action-btn").on("click", storeUser );
	$("#updateformulario").hide();
	//mostrar div depassword para que sea not null
	$("#passworddiv").show();
	$("#pass").addClass("not-null");
}
function getAllUsers(){
	$.get({
		url : route + "/all",
		processData : false,
		cache : false,
		success : function( response ){
			var data = response.data;
			showUsers( data );
			$("#data-loader").remove();
		}
	});
}
function showUsers( data ){
	var TABLE = $("#usuariosTable").DataTable();
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
}
function setUpdateComponent(event){
	clearForm();
	$("#create-instr").hide();
	$("#update-instr").show();
	$("#row-id").show();
	$("#add-label").hide();
	$("#update-label").show();
	$("#action-btn span").text( "Actualizar" );
	$("#action-btn").off();
	$("#action-btn").on("click", updateUser );
    $("#updateformulario").show();
    //esconder div e paswor para actualizar info 
    $("#passworddiv").hide();
    $("#pass").removeClass("not-null");
    
	var id = $(event.currentTarget).parents("tr").find(".id").text();
	var name = $(event.currentTarget).parents("tr").find(".name").text();
	var email = $(event.currentTarget).parents("tr").find(".email").text();
	var uadmin = $(event.currentTarget).parents("tr").find(".uadmin").text();
	$("#id").val( id );
	$("#name").val( name );
	$("#email").val( email );
	$("#uadmin").val( uadmin );
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
function validateForm(){
	var valid_count = 0;
	$(".not-null").each(function(){
		checkInputEmptyness( $(this) ) ? null : valid_count-- ;
	});
	return valid_count >= 0;
}
function storeUser(){
	$("#ajax-loader").show();
	if( validateForm() ){
		$.ajax({
			method : "POST",
			url : route,
			data : {
				"name" : $("#name").val(),
				"email" : $("#email").val(),
				"password": $("#pass").val(),
				"U_admin" : $("#uadmin").val() == "V" ? "" : $("#uadmin").val()
			},
			success : function( response ){
				if( response.status ){
					swal("OK", "Usuario agregada correctamente", "success");
					var TABLE = $("#usuariosTable").DataTable();
					TABLE.row.add([
						response.id,
						$("#name").val(),
						$("#email").val(),
						$("#uadmin").val(),
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
function updateUser(){
	$("#ajax-loader").show();
	if( validateForm() ){
		$.ajax({
			method : "POST",
			url : route + "/" + $("#id").val(),
			data : {
				"name" : $("#name").val(),
				"email" : $("#email").val(),
				"U_admin" : $("#uadmin").val(),
                'SlpCode': $("#slpcode").val(),
                'commission' : $("#commission").val(),
                'GroupCode' : $("#groupcode").val(),
                'Locked' : $("#locked").val(),
                'DataSource' : $("#datasource").val(),
                'UserSign' : $("#usersign").val(),
                'EmpID' : $("#empid").val(),
                'Active' : $("#active").val(),
                'Telephone' : $("#telephone").val(),
                'Mobil' : $("#mobil").val(),
                'U_branch' : $("#ubranch").val(),
                'U_salt' : $("#usalt").val(),
                'U_priceList' : $("#upricelist").val(),
                'U_manager' : $("#umanager").val(),
                'U_export' : $("#uexport").val(),
                'U_discounts' : $("#udiscounts").val(),
				"_method" : "PUT"
			},
			success : function( response ){
				if( response.status ){
					$("#ajax-loader").hide();
					swal("OK", "Usuario actualizada correctamente", "success");
					var parents = $("#usuariosTable span:contains('" + $("#id").val() +  "')").parents("tr");
					parents.find(".name").text($("#name").val());
					parents.find(".email").text($("#email").val());
					parents.find(".uadmin").text($("#uadmin").val());
					$("#close").click();
				}
			}
		});
	}
}
function deletePolicy(event){
	var id = $(event.currentTarget).parents('tr').find(".id").text();
	$(event.currentTarget).attr("src", ajax_loader_route);
	$.ajax({
		method : "DELETE",
		url : route + "/" + id,
		success : function( response ){
			if( response.status ){
				swal("OK", "Usuario eliminada correctamente", "success");
				var row = $("#usuariosTable").DataTable().row( $(event.currentTarget).parents('tr') ).remove().draw();
			}
		}
	});
}
function clearForm(){
	$("#id").val("");
	$("#name").val("");
	$("#email").val("");
	$("#uadmin").val("");
}