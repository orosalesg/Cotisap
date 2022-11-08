<div class="row">
    <div class="col-lg-12">
        <div class="an-single-component with-shadow h-100">
            <div class="an-component-header">
                <h6>{{ 'Datos del cliente' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="col-lg-12" style="display:inline-block;">
                        <input type="text" name="busqueda" id="busqueda" class="an-form-control" />
                        <button id="prueba" class="btn btn-success">Buscar</button>
                    </div>

                    <div class="col-lg-12">
                        <table id="tbProductos" class="table" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Total Existencia</th>
                                    <th>Precio Lista</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Total Existencia</th>
                                    <th>Precio Lista</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function(){
        
        $("#prueba").click(function(){
            getProductos();
        });
        
        function getProductos(){
            $('#tbProductos').dataTable().fnDestroy();
            $.ajax({
                type: "POST",
                url: "{{ URL::route('searchSyscomProductos') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    param: $("#busqueda").val(),
                },
                success: function(result){
                    
                    console.log("Productos");
                    console.log(result);
                    
                },error: function(errormsg){
                    console.log(errormsg);
                }
            });

            $('#tbProductos').DataTable({
                "ajax" : {
                    "url" : '{{ URL::route("searchSyscomProductos") }}',
                    dataSrc : '',
                    "type" : "POST",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "data" : {
                        param: $("#busqueda").val(),
                    },
                },
                "columns" : [ {
                    "data" : "producto_id"
                }, {
                    "data" : "titulo"
                }, {
                    "data" : "marca"
                }, {
                    "data" : "total_existencia"
                }, {
                    "data" : "precios.precio_lista"
                }],
                "order": [[ 0, 'asc' ]],
                "displayLength": 15,
                "initComplete": function(settings, json){
                    //$("#cotizacionLg").hide();
                }
            });
        
        }
    });

</script>
@endsection