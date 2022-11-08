@extends('theme.body')

@section('company', 'Alianza Electrica')

@section('custom-styles')
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
              <li class="active">{{ 'General' }}</li>
            </ol>
          </div>

          <div class="an-body-topbar wow fadeIn">
            <div class="an-page-title">
              <h2>{{ 'Datos de la cuenta' }}</h2>
            </div>
          </div>

          @include('theme.widgets.profile-fragment')

        </div>
      </div>

      @include('theme.widgets.footer')

    </div> 

@endsection

@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="{{ asset('assets/js/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>
  
  <script type="text/javascript">
  var route = "{{Request::url()}}";
  
    $.ajax({
      url : "{{ URL::route('getInfo') }}",
      data : { "email" : "{{Auth::user()->email}}"},
      method : "GET",
      success : function( response ){
          var data = response.general_info[0];
        console.log( response );
        console.log( data );
        $("#info-loader").slideUp();
        $("#id").val( data.id);
        $("#name").val( data.name);
        $("#slpcode").val( data.SlpCode);
        $("#email").val( data.email);
        $("#phone").val( data.Telephone);
        $("#manager").va;( data.Gerente);
      }
    });
    $(document).ready(function(){
        
        $("#newPass").click(function(){
            $("#ajax-loader").show();
            var pass = $("#pass").val();
            var passconf = $("#passconf").val();
            
            if(!(pass === passconf)){
                toastr["error"]("Contrase&ntilde;a", "Las contrase&ntilde;as no coinciden");
                $("#ajax-loader").hide();
                return false;
            }
            
            console.log($("#passconf").val());
            
            var retval = confirm("¿Esta seguro de cambiar su contraseña?");
            if(!retval){
                $("#ajax-loader").hide();
                return false;    
            }
            
            console.log("Parte Ajax");
              $.ajax({
        			method : "POST",
        			url : " {{URL::route('updateUser') }}",
        			data : {
        				"password" : $("#passconf").val(),
        				"id" : $("#id").val()
        			},
        			success : function( response ){
        				if( response.status ){
        					$("#ajax-loader").hide();
        					toastr["success"]("Contrase&ntilde;a", "Su contrase&ntilde;a ha sido actualizada");
        					$("#close").click();
        					$("#pass").val("");
                            $("#passconf").val("");
        				}
        			}
        		});
        });
    });
    
  </script>


@endsection