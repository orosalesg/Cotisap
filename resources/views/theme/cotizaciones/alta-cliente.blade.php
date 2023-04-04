@extends('theme.body')

@section('company', 'Alianza Electrica')


@section('content')

    <div class="main-wrapper">
      
      @include('theme.topheader')

      <div class="an-page-content">
        <div class="an-sidebar-nav js-sidebar-toggle-with-click">

          @include('theme.widgets.sidebar-widget')

          @include('theme.menu')
          
        </div>

        <div class="an-content-body home-body-content">
          
          <div class="an-breadcrumb wow fadeInUp">
            <ol class="breadcrumb">
              <li><a href="#">{{ 'Inicio' }}</a></li>
              <li><a href="#">{{ 'Cotizaciones' }}</a></li>
              <li class="active">{{ 'Alta de cliente' }}</li>
            </ol>
          </div>

          <div class="an-body-topbar wow fadeIn">
            <div class="an-page-title">
              <h2>{{ 'Nuevo cliente' }}</h2>
            </div>
          </div>

          @include('theme.widgets.alta-cliente-fragment')

        </div>
      </div>

      @include('theme.widgets.footer')

    </div> 

@endsection


@section('scripts')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
  
  var routeall = "{{ URL::route('allCP') }}";
  var routestore = "{{ URL::route('storeCP') }}";
  var routeupdate = "{{ URL::route('updateCP') }}";
  var routedelete = "{{ URL::route('deleteCP') }}";
  var routefindCP = "{{ URL::route('findCP') }}";
  // Get single CP info
  var routegetCP = "{{ URL::route('findsingleCP') }}";


  var edit_img_route = "{{asset('assets/img/edit.png')}}";
  var delete_img_route = "{{asset('assets/img/delete.png')}}";
  var ajax_loader_route = "{{ asset('assets/img/loading.gif') }}";
</script>

<script src="{{ asset('assets/js/cntctperson.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>


<script type="text/javascript">
    $(document).ready(function(){
        /**Buscar clientes registrados */
        $('#pContacto').select2({
          tags: true,
          width: "100%",
          ajax: {
            url:  "{{ URL::route('getClienteAllNew') }}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                q: params.term
            };
            },
            processResults: function (data) {
              dataInfo = data;
              return {
                results: [{
                    text: 'Clientes que ya se han registrados',
                    children: data
                }],
              };
            },
            cache: true
          },
          createTag: function (params) {
            var term = params.term;
            
            console.log(dataInfo);
            
            try{
                console.log(dataInfo[0].id.toUpperCase());
                if ( term.toUpperCase() == dataInfo[0].id.toUpperCase()) {
                  // Return null to disable tag creation
                  return null;
                }   
            }catch(error){
                console.log(error);
            }
            
            return {
              id: term,
              text: term,
              newTag: true // add additional parameters
            }
            
          },
          placeholder: 'Ingrese la persona de contacto',
          minimumInputLength: 3,
          language: 'es'
        });

        /**Actualizar el usuario */
        $("#updateCliente").click(function(){
            
            Swal.fire({
                title: '多Realmente quieres editar este cliente?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Editar Cliente',
                denyButtonText: `Cancelar`,
            }).then((result) => {
            
                if (result.isConfirmed) {
                    $.ajax({
                		url : "{{ route('editClienteData') }}",
                		type: "POST",
                		data:{
                		    "_token": "{{ csrf_token() }}",
                		    id: $("#clienteId").val(),
                		    nombre: $("#clienteNombre").val(),
                		    //razon: $("#clienteRazon").val(),
                		    email: $("#clienteEmail").val(),
                		    telefono: $("#clienteTelefono").val(),
                        domicilio: $("#clienteDomicilio").val(),
                		},
                		success : function( result ){
                		    
                		    console.log(result);
                		    Swal.fire({
                                icon: 'success',
                                title: 'Se ha actualizado correctamente la informacion',
                                text: 'El cliente ha sido actualizado',
                                showCloseButton: false,
                                showCancelButton: false,
                            });
                                
                            setTimeout(function(){
                                    window.location.reload(1);
                                }, 1000);
                		},
                        error: function( msgerror){
                            console.log("Error");
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al guardar los datos del cliente' + msgerror.responseJSON.error,
                                text: '',
                                showCloseButton: false,
                                showCancelButton: false,
                            });
                        }
                	});
                } else if (result.isDenied) {
                    Swal.fire('El cliente no ha sido borrado', '', 'info')
                }
            });
            
            
            
        });
        
        $(".not-null").on("focusout", checkInputEmptyness );
        $(".email").on("focusout", checkInputEmail );
        $(".phone").on("focusout", checkInputPhone );


        $("#registrar").on("click", registerClient)
        
        $("#clientesTable").DataTable({
            "order": [[ 0, "desc" ]],
            "language": {
                "url" : "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            },
            "scrollX": true,
        });
        
        $(".edit").click(function(){
          
           var id = $(this).attr("data-id");
           console.log("edit " + id);
           //mostrar modal para editar cliente
           $("#editCliente").modal("show");
           
           //ajax para llenar datos del cliente en modal
           $.ajax({
        		url : "{{ route('getClienteDataId') }}",
        		type: "POST",
        		data:{
        		    "_token": "{{ csrf_token() }}",
                    datosid: id,
        		},
        		success : function( result ){
        		    
        		    //console.log(result);
        		    $("#clienteId").val(result.id);
        		    $("#clienteNombre").val(result.clienteNombre);
        		    //$("#clienteRazon").val(result.clienteRazon);
        		    $("#clienteEmail").val(result.clienteEmail);
        		    $("#clienteTelefono").val(result.clienteTelefono);
                $("#clienteDomicilio").val(result.clienteDomicilio);


                // Al abrir modal traer los datos de las personas de contacto
                getAllCP();
        		}
        	});
        });
        
        $(".delete").click(function(){
            var id = $(this).attr("data-id");
            console.log("Delete " + id);
            
            
            Swal.fire({
              title: '多Realmente quieres borrar este cliente?',
              showDenyButton: true,
              showCancelButton: false,
              confirmButtonText: 'Borrar Cliente',
              denyButtonText: `Cancelar`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                
                $.ajax({
            		url : "{{ route('deleteCliente') }}",
            		type: "POST",
            		data:{
            		    "_token": "{{ csrf_token() }}",
                        datosid: id,
            		},
            		success : function( result ){
            		    console.log(result);
            		    Swal.fire('Se ha borrado el cliente', '', 'success')
            		    
            		    setTimeout(function(){         
                            window.location.reload(1);
                        }, 1500);
            		},
                    error: function(msgerror){
                        Swal.fire("Error al borrar cliente", msgerror.responseJSON.error, "error");
                    }
            	});
              } else if (result.isDenied) {
                Swal.fire('El cliente no ha sido borrado', '', 'info')
              }
            })
            
            
           
            
        });
        
        $("#editCliente").on('hidden.bs.modal', function() {
          
          // Limpiar formulario de persona de contacto
          clearFormCP();

        });
    });

    // Obtener todas las personas de contacto
  function getAllCP(){

    $.ajax({
      method: "POST",
      url : routefindCP,
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

    var TABLE = $("#cpTable").DataTable();
    TABLE.clear();

    $.each(data,function(index, element){
      console.log(element);
      var array = new Array();
      // este campo es del id del de la persona de contacto
      array.push(element.id);
      array.push(element.name);
      array.push(element.email);
      array.push(element.email);
      array.push(element.id);
      array.push(element.id);
      TABLE.row.add( array );
    });
    TABLE.draw();
    $("#container").show();


  }

  function validateForm(){
    var valid_count = 0;

    //validate emptyness
    $(".not-null").each(function(){
      checkInputEmptyness( $(this) ) ? null : valid_count-- ;
    });
    
    //validate email with correct string pattern
    $(".email").each(function(){
      checkInputEmail( $(this) ) ? null : valid_count-- ;
    });

    //validate phone val
    $(".phone").each(function(){
      checkInputPhone( $(this) ) ? null : valid_count-- ;
    });


    return valid_count >= 0;
  }
  function clearForm(){
    $("input").val('');
  }
  function registerClient(){
    if(validateForm()){
      $.ajax({
        method: "POST",
        data: {
          'name': $("#pContacto").val(),
          'tel': $("#telCliente").val(),
          'email': $("#emailCliente").val(),
          //'razon': $("#razonCliente").val(),
          'limiteCredito': $("#limiteCredito").val(),
          'domicilio': $("#domicilioCliente").val()
        },
        url: "{{URL::route('cliente_nosap')}}",
        success: function(response){
          if(response.status){
            clearForm();
            Swal.fire("Bien!", "Cliente agregado correctamente", "success");
            setTimeout(function(){         
                        window.location.reload(1);
                    }, 1500);
          }
        }
      });
    }
  }
</script>
@endsection