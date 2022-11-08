@extends('theme.body')

@section('company', 'Alianza Electrica')


@section('custom-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multiple-select/multiple-select.css') }}">
@endsection

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
                    <li><a href="#">{{ 'Entregas' }}</a></li>
                    <li class="active">{{ 'Buscar Hoja de Entrega' }}</li>
                </ol>
            </div>

            <div class="an-body-topbar wow fadeIn">
                <div class="an-page-title">
                    <h2>{{ 'Buscar Hoja de Entrega' }}</h2>
                </div>
            </div>


            @include('theme.widgets.showbuscarHE')

        </div>
    </div>

    @include('theme.widgets.footer')

</div>

@endsection


@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script type="text/javascript">
</script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/entregas.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
    var productos = 1;

    $("#saveDeliver").click(function(){
        //console.log(obtenerdatosequipo());

        if(!validarDatosCliente())
        return;

        $("#loading").show();
        $.ajax({
            method : "POST",
            url : "{{ URL::route('saveDelivery') }}",
            data: {
                razon: $("#razonCliente").val(),
                nombre: $("#pContacto").text(),
                direccion: $("#domicilioCliente").val(),
                telefono: $("#telCliente").val(),
                correo: $("#emailCliente").val(),
                rfc: $("#rfcCliente").val(),
                personaContacto: $("#personaContacto").val(),
                domiclioEntrega: $("#domicilioEntrega").val(),
                datosequipo: obtenerdatosequipo(),
            },
            success : function( response ){
                
                $("#loading").remove();
                $("#addCotizacion").modal("show");
                $("#pdfCoti").attr('href', "/dashboard/entregas/pdf/" + response.numdelivery);
                $("#numCotizacionResult").text(response.numdelivery);
                console.log(response);
            },
            error : function( result){
                console.log( result );
                $("#loading").remove();
            }
        });
    });

    $('#pContacto').select2({
        tags: true,
        width: "100%",
        ajax: {
        url:  "{{ URL::route('getClienteAllEntrega') }}",
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
                text: 'Clientes registrados',
                children: data
            }],
            };
        },
        cache: true
        },
        createTag: function (params) {
        var term = params.term;
        /*console.log("params");
        console.log(params);
        console.log("dataInfo");
        console.log(dataInfo);*/
        
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
        placeholder: 'Buscar cliente',
        minimumInputLength: 3,
        language: 'es'
    });

    $('#pContacto').on('select2:select', function(e) {

        var data = e.params.data;

        $("#razonCliente").val("");
        $("#domicilioCliente").val("");
        $("#telCliente").val("");
        $("#emailCliente").val("");

        $("#clienteLg").show();

        $.ajax({
            method: 'GET',
            url: "{{ URL::route('getClienteDataE') }}",
            data: {
                q: data.id
            },
            success: function(result) {
                console.log("Cargando datos clienteData");
                console.log(result);
                $("#clienteLg").hide();

                $("#razonCliente").val(result[0].CardName ?? "");
                $("#domicilioCliente").val(result[0].cpDomicilio ?? "");
                $("#telCliente").val(result[0].cpPhone ?? "");
                $("#emailCliente").val(result[0].cpEmail ?? "");
                
                console.log(result[0].CardName);
                console.log(result[0].cpDomicilio);
                console.log(result[0].cpPhone);
                console.log(result[0].cpEmail);

                /*if (result.length > 0) {
                    //console.log(result);
                    $.each(result, function(inx, arrx) {

                        console.log(arrx[0].isSAP)

                        
                    });
                }
                //  $('.dinero').unmask().mask('000,000,000,000,000.00', {reverse: true});
                $("#clienteLg").hide();
                $("#createProduct").removeClass('disabled');*/
            },
            error: function(result) {
                console.log(result);
                $("#clienteLg").hide();
            }
        });

    });

    function obtenerdatosequipo(){
        var arrArticulos = new Array();

        $("[id^='item-product']").each(function(index, element) {
            arrArticulos.push({
                modelo: $(this).find("[name^='itemCodigo']").val(), // Codigo Articulo
                descripcion: $(this).find("[name^='itemName']").val(), // Nombre del articulo
                cantidad: $(this).find("[name^='itemCantidad']").val(), // Cantidad
                noserie: $(this).find("[id^='itemNoserie']").val(), // Moneda
            });
        });

        arrArticulos.pop();

        return arrArticulos;
    }

    $("#createProduct").click(function() {

        /*if (!validarCotizacionCliente())
            return;*/

        $("#contenerdor-products").append($("#product-base").html().replace(/Element/g, productos));
        eventosProduct(productos);

        productos++;

    });

    function eventosProduct(products) {

        var producIni = products;

        /**** Eliminar Producto ****/

        $(".itemClose i").click(function() {
            $("#item-product\\[" + $(this).attr("id")
                    .split("itemClose")[1]
                    .split("[")[1]
                    .split("]")[0] + "\\]")
                .remove();
        });
    }

    function validarDatosCliente() {

        /**
         * 
         * 
         * $("#razonCliente").val(result[0].CardName ?? "");
                $("#domicilioCliente").val(result[0].cpDomicilio ?? "");
                $("#telCliente").val(result[0].cpPhone ?? "");
                $("#emailCliente").val(result[0].cpEmail ?? "");
         */

        if ($("#razonCliente").val() == null || $("#razonCliente").val() == "") {
            toastr["error"]("Razón social de cliente requerida", "Campo requerido * ");
            $("#razonCliente").focus();
            return false;
        }
        if ($("#domicilioCliente").val() == null || $("#domicilioCliente").val() == "") {
            toastr["error"]("Domicilio de cliente requerido", "Campo requerido * ");
            $("#domicilioCliente").focus();
            return false;
        }
        if ($("#telCliente").val() == null || $("#telCliente").val() == "") {
            toastr["error"]("Telefono de cliente requerido", "Campo requerido * ");
            $("#telCliente").focus();
            return false;
        }
        if ($("#emailCliente").val() == null || $("#emailCliente").val() == "") {
            toastr["error"]("Correo del cliente requerido", "Campo requerido * ");
            $("#emailCliente").focus();
            return false;
        }



        return true
    }

});
</script>
@endsection