@extends('theme.body')

@section('company', 'Alianza Electrica')

@section('custom-styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.min.css') }}">
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
              <li><a href="#">{{ 'Cotizaciones' }}</a></li>
              <li class="active">{{ 'Nuevo artículo' }}</li>
            </ol>
          </div>

          <div class="an-body-topbar wow fadeIn">
            <div class="an-page-title">
              <h2>{{ 'Nuevo artículo Pruebas' }}</h2>
            </div>
          </div>

          @include('theme.widgets.nuevo-articulo-fragmentPRUEBAS')

        </div>
      </div>

      @include('theme.widgets.footer')

    </div> 

@endsection

@section('scripts')
  <script src="{{ asset('assets/js/sweetalert2.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip({trigger: "manual"});
      $("input.not-null").on("focusout", checkInputEmptyness );
      $("#save").on("click", saveArticle );
      
      $("#descArt").on('input', function() {
        var max_length = 254;
        var curr = $("#descArt").val().length;
        var rem = Number(max_length) - Number(curr);
        
        $("#descArtCont").text(rem);
        console.log("max " + max_length + " curr " + curr + " rem " + rem);
        if(curr >= max_length)
        {
            toastr["warning"]("Descripcion Articulo", "No puedes ingresar mas de 254 caracteres");
            return false;
        }
      });
      $("#marca").on('input', function() {
        var max_length = 50;
        var curr = $("#marca").val().length;
        var rem = Number(max_length) - Number(curr);
        
        $("#marcaCont").text(rem);
        console.log("max " + max_length + " curr " + curr + " rem " + rem);
        if(curr >= max_length)
        {
            toastr["warning"]("Marca de Articulo", "No puedes ingresar mas de 50 caracteres");
            return false;
        }
      });
    });
    function saveArticle(){
      if(validateForm()){
        $("#save img").show();
        $.ajax({
          url : "{{URL::route('articulosPRUEBAS')}}",
          method : "POST",
          data : {
            "codigo" : $("#codArt").val(),
            "desc" : $("#descArt").val(),
            "clase" : "0",
            "grupo" : "0",
            "lista" : "0",
            "UMV" : $("#unidadMedida option:selected").text(),
            "precio" : $("#precioVenta").val(),
            "moneda" : $("#moneda option:selected").text(),
            "marca" : $("#marca").val(),
            "comm" : $("#comm").val()
          },
          success : function(response){
            if(response.status){
              swal({
                title : "Articulo agregado correctamente",
                text : "Puedes revisarlo en la sección de Artículos",
                type : "success"
              });
              $("#save img").hide();
              clearForm();
            }
          }
        });
      }
    }
    function clearForm(){
      $("#codArt").val("");
      $("#descArt").val("");
      $("#comm").val("");
      $("#precioVenta").val("");
    }
    
    function validateForm(){
      var valid_count = 0;
      $("input.not-null").each(function(){
        checkInputEmptyness( $(this) ) ? null : valid_count-- ;
      });
      var SELECT = $("#moneda").siblings("div");
      if($("select#moneda option:selected").val() == "0"){
        SELECT.attr("data-original-title", "Escoge una moneda");
        SELECT.attr("title", "Escoge una moneda");
        SELECT.tooltip("show");
        valid_count--;
      }else{
        SELECT.tooltip("hide");
      }
      SELECT = $("#unidadMedida").siblings("div");
      if($("select#unidadMedida option:selected").val() == "0"){
        SELECT.attr("data-original-title", "Escoge una unidad de medida");
        SELECT.attr("title", "Escoge una unidad de medida");
        SELECT.tooltip("show");
        valid_count--;
      }else{
        SELECT.tooltip("hide");
      }
      return valid_count >= 0;
    }
    //Borrar DANGER
    var dataInfo;
    
    $('#codArt').select2({
      tags: true,
      width: "100%",
      ajax: {
        url:  "{{ URL::route('getArticuloAllNew') }}",
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
                text: 'Articulos que ya se han registrados',
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
      placeholder: 'Ingrese el codigo del articulo',
      minimumInputLength: 3,
      language: 'es'
    });
    
    /*function matchCustom(params, data) {
        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
          var modifiedData = $.extend({}, data, true);
          modifiedData.text += ' (matched)';
    
          // You can return modified objects from here
          // This includes matching the `children` how you want in nested data sets
          return modifiedData;
        }
    
        // Return `null` if the term should not be displayed
        return null;
    }*/
  </script>
@endsection