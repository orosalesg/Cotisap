
@extends('theme.body')

@section(Session::get('Company'), 'Alianza Electrica')

@section('custom-styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
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
          
          @include('theme.widgets.review')

        </div>
      </div>

      @include('theme.widgets.footer')

    </div> 

@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    var route = "{{Request::url()}}";
    var getSLPInfo = "{{ URL::route('getSLPInfo') }}";
    var getGralInfo = "{{ URL::route('getGralInfo') }}";
    var getPartners = "{{ URL::route('getPartners') }}";
    @if(session('domain') == 'gruposim.com' && !empty(Auth::user()->U_admin))
    var getPendAuthCot = "{{ URL::route('getPendAuthCot') }}"
    @endif
    var show_q = "{{ URL::route('show-cotizacion', 'XXX') }}";
    var show_qrenta = "{{ URL::route('show-cotizacionRenta', 'XXX') }}";
    var company = "{{session('Company')}}";
  </script>
  <script type="text/javascript">
    $(document).ready(function(){

      @if(!Session::has('access_token'))

        $.ajax({
          method: 'get',
          url: "{{ URL::route('AuthToken') }}",
          data:{},
          success: function(data){
            console.log(data);
          }
        }); 

      @endif


      $("#descuento").on("change", function(event){
        var elem = $(event.currentTarget);
        var d = Number(elem.val());
        $("#precio").text( (Number($("#precioLista").text()) - Number($("#precioLista").text()) * (d/100.0)).toFixed(2) );
      });
      $('#artCode').select2({
          ajax: {
            url:  "{{ URL::route('getArticuloAll') }}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                q: params.term
             };
            },
            processResults: function (data) {
              return {
                results: data
              };
            },
            cache: true
          },
          placeholder: 'Código o nombre',
          minimumInputLength: 3,
          language: 'es'
      });

      $('#artCode').on('select2:select', function (e) {
        $("#quick-loader").show();
        var data = e.params.data;
        $.ajax({
          method: 'GET',
          url: "{{ URL::route('getArticuloData') }}",
          data: { q: data.id },
          success: function (result) {
            $("#artName").val(result[0].ItemName);
            $("#precioLista").text(Number(result[0].Price == ".00" ? result[0].LastPurPrc : result[0].Price));
            $("#precio").text(Number(result[0].Price == ".00" ? result[0].LastPurPrc : result[0].Price));
            $("#quickCurr").text(result[0].LastPurCur);
            $("#quickCurrLista").text(result[0].LastPurCur);
          },
          error: function(result) {
            console.log(result);
          }
        });
        
        $.ajax({
          method: 'GET',
          url: "{{ URL::route('getStock') }}",
          data: { q: data.id },
          success: function(result){
            
            var Names = '';
            var values = '';
            var totalValues = 0;
            
            var valueso = '';
            var totalValueso = 0;
            
            $.each(result, function(index, value){
              Names +=  "<td>" + value.WhsName.substring(0,3) + "</td>";
              
              values += "<td>" + Number(value.OnHand).toFixed(0) + "</td>"; 
              totalValues += Number(Number(value.OnHand).toFixed(0));
              
              valueso += "<td>" + Number(value.OnOrder).toFixed(0) + "</td>"; 
              totalValueso += Number(Number(value.OnOrder).toFixed(0));
            });

            $('#total').text(totalValues);
            $('#names' ).html(Names);
            $('#values' ).html(values);
            
            $('#totalo').text(totalValueso);
            $('#nameso' ).html(Names);
            $('#valueso' ).html(valueso);
            
            $("#quick-loader").hide();
          }, 
          error: function(){
          }
        });
      });
    });
    @if(session('domain') == 'gruposim.com')
        $('#cotpend').DataTable({
        "ajax" : {
          "url" : '{{ URL::route("getPendAuthCot") }}',
          "type" : "GET",
        }, 
          "columnDefs": [{
                  "className":"dt-center",
                  "orderable": false,
                    "targets": -1,
                    "data": function ( row, type, val, meta ) {
                      return '<a target="_blank" href="/dashboard/cotizaciones/nueva-cotizacion/show/' + row[0] + '" class="an-btn an-btn-icon small update-btn"><i class="icon-search"></i></a>';
                    }
                    
                 }],
          "order": [[ 0, 'asc' ]],
          "displayLength": 10,
          "initComplete": function(settings, json){
            $("#cotizacionLg").hide();
          }
        });
        @endif
  </script>
  <script src="{{ asset('assets/js/dashboard.js') }}" type="text/javascript"></script>
@endsection
