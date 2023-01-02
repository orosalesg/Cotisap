<div class="row">
    <div class="col-md-12">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6>{{ 'Productos syscom' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-xs-10">
                            <input type="text" name="busqueda" id="busqueda" class="an-form-control" />
                        </div>
                        <div class="col-xs-2">
                            <button id="prueba" class="btn btn-success">Buscar</button>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <table id="tbProductos" class="table" width="100%" style="font-size:10px;">
                                <thead>
                                    <tr>
                                        <th style="width:10%;">Id</th>
                                        <th style="width:30%;">Modelo</th>
                                        <th style="width:30%;">Nombre</th>
                                        <th style="width:20%;">Marca</th>
                                        <th style="width:10%;">Total Existencia</th>
                                        <th style="width:10%;">Precio Lista (USD)</th>
                                        <th style="width:10%;">Precio Descuento (USD)</th>
                                        <th style="width:10%;"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">

            <div class="an-helper-block">
                <div class="row">
                    <div class="col-xs-10">
                        <h6>{{ 'Exportar datos' }}</h6>
                    </div>
                    <div class="col-xs-2">
                        <button id="btnExport" class="btn btn-success">Exportar .csv</button>
                    </div>
                </div>
            </div>
                
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">

                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tbExport" class="table" width="100%" style="font-size:10px;">
                                <thead>
                                    <tr>
                                        <th style="width:10%;">Id</th>
                                        <th style="width:30%;">Modelo</th>
                                        <th style="width:30%;">Nombre</th>
                                        <th style="width:20%;">Marca</th>
                                        <th style="width:10%;">Total Existencia</th>
                                        <th style="width:15%;">Precio Lista (USD)</th>
                                        <th style="width:15%;">Precio Descuento (USD)</th>
                                        <th style="width:10%;"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $("#prueba").click(function() {

        if(!validar())
            return

        getProductos();
    });

    /**
     * 
     */

    function getProductos() {
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
            success: function(result) {

                console.log("Productos");
                console.log(result);

            },
            error: function(errormsg) {
                console.log(errormsg);
            }
        });
        var language_ESP = {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Filtrar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",
                "collection": "Colección",
                "colvisRestore": "Restaurar visibilidad",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %ds fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "renameState": "Cambiar nombre",
                "updateState": "Actualizar",
                "createState": "Crear Estado",
                "removeAllStates": "Remover Estados",
                "removeState": "Remover",
                "savedStates": "Estados Guardados",
                "stateRestore": "Estado %d"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmentemente"
            },
            "decimal": ",",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "conditions": {
                    "date": {
                        "after": "Despues",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "notBetween": "No entre",
                        "notEmpty": "No Vacio",
                        "not": "Diferente de"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacio",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual que",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío",
                        "not": "Diferente de"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina en",
                        "equals": "Igual a",
                        "notEmpty": "No Vacio",
                        "startsWith": "Empieza con",
                        "not": "Diferente de",
                        "notContains": "No Contiene",
                        "notStartsWith": "No empieza con",
                        "notEndsWith": "No termina con"
                    },
                    "array": {
                        "not": "Diferente de",
                        "equals": "Igual",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "notEmpty": "No Vacío",
                        "without": "Sin"
                    }
                },
                "data": "Data",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "showMessage": "Mostrar Todo",
                "collapseMessage": "Colapsar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ".",
            "datetime": {
                "previous": "Anterior",
                "next": "Proximo",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "AM",
                    "PM"
                ],
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Dom",
                    "Lun",
                    "Mar",
                    "Mie",
                    "Jue",
                    "Vie",
                    "Sab"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                }
            },
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "stateRestore": {
                "creationModal": {
                    "button": "Crear",
                    "name": "Nombre:",
                    "order": "Clasificación",
                    "paging": "Paginación",
                    "search": "Busqueda",
                    "select": "Seleccionar",
                    "columns": {
                        "search": "Búsqueda de Columna",
                        "visible": "Visibilidad de Columna"
                    },
                    "title": "Crear Nuevo Estado",
                    "toggleLabel": "Incluir:"
                },
                "emptyError": "El nombre no puede estar vacio",
                "removeConfirm": "¿Seguro que quiere eliminar este %s?",
                "removeError": "Error al eliminar el registro",
                "removeJoiner": "y",
                "removeSubmit": "Eliminar",
                "renameButton": "Cambiar Nombre",
                "renameLabel": "Nuevo nombre para %s",
                "duplicateError": "Ya existe un Estado con este nombre.",
                "emptyStates": "No hay Estados guardados",
                "removeTitle": "Remover Estado",
                "renameTitle": "Cambiar Nombre Estado"
            }
        };

        $('#tbProductos').DataTable({
            "ajax": {
                "url": '{{ URL::route("searchSyscomProductos") }}',
                dataSrc: '',
                "type": "POST",
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "data": {
                    param: $("#busqueda").val(),
                },
            },
            "language" : language_ESP,
            "columns": [{
                "data": "producto_id"
            }, {
                "data": "modelo"
            }, {
                "data": "titulo"
            }, {
                "data": "marca"
            }, {
                "data": "total_existencia",
                "defaultContent": "Sin existencias"
            }, {
                "data": "precios.precio_lista",
                "defaultContent": "Sin precio de lista"
            }, {
                "data": "precios.precio_descuento",
                "defaultContent": "Sin precio descuento"
            }, {
                "data": "producto_id"
            }],
            "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                },
                {
                    "render": function(data, type, row) {
                        return "<button data-id='" + data +
                            "' class='addProd an-btn an-btn-success' width='40px' style='font-size:15px;'>+</button>";
                    },
                    "targets": 7
                }
            ],
            "order": [
                [0, 'asc']
            ],
            "displayLength": 5,
            "initComplete": function(settings, json) {
                //$("#cotizacionLg").hide();
            }
        });

    }


    /**
     * Remove row form export table
     */

    $("#tbExport").on("click", ".deleteProd1", function() {
        var row = $(this).closest("tr").remove();
    });

    /**
     * Add row to export table
     */

    $("#tbProductos").on("click", ".addProd", function() {
        var row = $(this).closest("tr").html();
        
        $("#tbExport > tbody").append("<tr>" + row.replace("addProd", "deleteProd1").replace("+","x") + "</tr>");

    });

    $("#btnExport").click(function() {

        if(!validarexport())
            return;

        tableToCSV();
    });

    function tableToCSV() {

        // Variable to store the final csv data
        var csv_data = [];

        // Get each row data
        var rows = $("#tbExport").find('tr');
        console.log(rows);

        for (var i = 0; i < rows.length; i++) {
            // Get each column data
            var cols = rows[i].querySelectorAll('td,th');

            // Stores each csv row data
            var csvrow = [];
            for (var j = 0; j < cols.length; j++) {

                // Get the text data of each cell
                // of a row and push it to csvrow
                
                var col = cols[j].innerText;

                col = col.replace(/,/g,"")

                console.log(col);

                csvrow.push(col);
            } 

            // Combine each column value with comma
            csv_data.push(csvrow.join(","));
        }

        // Combine each row data with new line character
        csv_data = csv_data.join('\n');

        // Call this function to download csv file 
        downloadCSVFile(csv_data);

    }

    function downloadCSVFile(csv_data) {

        // Create CSV file object and feed
        // our csv_data into it
        CSVFile = new Blob([csv_data], {
            type: "text/csv"
        });

        // Create to temporary link to initiate
        // download process
        var temp_link = document.createElement('a');

        // Download csv file
        temp_link.download = "Syscomexport_{{ date('Y-m-d') }}.csv";
        var url = window.URL.createObjectURL(CSVFile);
        temp_link.href = url;

        // This link should not be displayed
        temp_link.style.display = "none";
        document.body.appendChild(temp_link);

        // Automatically click the link to
        // trigger download
        temp_link.click();
        document.body.removeChild(temp_link);
    }

    function validar(){

        if( !$("#busqueda").val() || $("#busqueda").val().length < 3 ){
            toastr.error('Ingresa al menos 3 caracteres.');
            $("#busqueda").focus();
            return false;
        }

        return true;
 
    }

    function validarexport(){

        var count_rows = $("#tbExport tr").length;

        if(count_rows < 2 ){
            toastr.error('Agregue productos a la tabla para exportar.');
            return false;
        }

        return true;
    }
});
</script>
@endsection