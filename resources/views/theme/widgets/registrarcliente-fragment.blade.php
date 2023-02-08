<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
<form id="alta-cliente-form">
    <div class="row">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6>{{ 'Datos del cliente' }}</h6>
            </div>
            <div class="an-component-body">
        
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="clienteCodigo">Código/Nombre del cliente: </label>
                            <div class="an-input-group">
                                <select class="an-form-control" id="clienteCodigo" name="clienteCodigo" >
                                </select>
                            </div>
                            <div id="divIdcustomer" class="d-none">
                                <label for="id_customer">{{ 'Id' }}: </label>
                                <div class="an-input-group">
                                    <div class="an-input-group-addon"><i class=""></i></div>
                                    <input type="text" id="CardCode" class="an-form-control not-null" name="CardCode" placeholder="{{ 'CardCode' }}" maxlength="50" />
                                </div>
                                <label for="id_customer">{{ 'isSap' }}: </label>
                                <div class="an-input-group">
                                    <div class="an-input-group-addon"><i class=""></i></div>
                                    <input type="text" id="isSAP" class="an-form-control not-null" name="isSAP" placeholder="{{ 'Id_customer' }}" maxlength="50" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="telCliente">{{ 'Teléfono' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class="ion-ios-telephone"></i></div>
                                <input type="tel" id="cpPhone" class="an-form-control not-null" name="cpPhone" placeholder="{{ 'Introduzca el teléfono' }}" maxlength="50" />
                            </div>
                            <label for="emailCliente">{{ 'Email' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class="ion-at"></i></div>
                                <input type="email" id="cpEmail" class="an-form-control not-null" name="cpEmail" placeholder="{{ 'Introduzca el email' }}" maxlength="50" />
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
    <div class="row">
        <div class="an-single-component with-shadow" id="Dventa">
            <div class="an-component-header">
                <h6>{{ 'Datos la venta' }}</h6>
            </div>
            <div class="an-component-body">
        
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="pContacto">{{ 'Monto de la venta antes de IVA' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class="ion-social-usd"></i></div>
                                <input type="number" id="cantidadventa" class="an-form-control not-null" name="cantidadventa" placeholder="{{ 'Cantidad de venta antes de IVA' }}" maxlength="50" />
                            </div>
                            <label for="descript">{{ 'Monto de la venta antes de IVA' }}: </label>
                            <div class="an-input-group">
                                <textarea id="descript" name="descript" class="an-form-control" placeholder="{{ 'Descripcion' }}"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="clienteCodigo">{{ 'Tipo de Venta' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><span class="iconify" data-icon="ic:baseline-design-services" data-inline="false"></span></div>
                                <select class="an-form-control" id="tipodeventa" name="tipodeventa" >
                                    <option value="Servicio">Servicio</option>
                                    <option value="Producto">Producto</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-9">
                            <label for="puntosganados">{{ 'Cantidad de puntos ganados' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><span class="iconify" data-icon="si-glyph:tag-price" data-inline="false"></span></div>
                                <input type="number" id="puntosganados" class="an-form-control not-null" name="puntosganados" placeholder="{{ 'Puntos ganados con la venta' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-9">
                            <label for="valorpuntos">{{ 'Valor en MXN' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><span class="iconify" data-icon="si-glyph:tag-price" data-inline="false"></span></div>
                                <input type="number" id="valorpuntos" class="an-form-control not-null" name="valorpuntos" placeholder="{{ 'Valor de los puntos ganados con la venta' }}" />
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-9">
            <div class="an-single-component with-shadow">
                <div class="an-component-body">
                    <div class="an-helper-block">
                        <button type="button" class="an-btn an-btn-danger">{{ 'Cancelar' }}</button>
                        <button type="button" id="registrar" class="an-btn an-btn-success">{{ 'Registrar' }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade primary" id="addCotizacion" tabindex="-1" role="dialog" aria-labelledby="addCotizacion">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <h4 id="addCotizacionLabel">{{ 'Puntos Guardados correctamente' }}</h4>
                </div>
                <div class="modal-body">
                    <p>
                        {{ 'Recuerda que los puntos tienen validez de un año' }}
                        <br>
                            <b>
                                <a id="pdfCoti" target="_blank" href="">
                                <!--Cotización: <span id="numCotizacionResult"></span>-->
                                </a>
                            </b>
                        <br>
                        <!--<i>Nota: Da clic en el número para ver el PDF.</i><span id="DescMayor"></span>-->
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('dashboard') }}"><button id="return-home" type="button" class="an-btn an-btn-danger" data-dismiss="modal">{{ 'Regresar' }}</button></a>
                </div>
            </div>
        </div>
    </div>
</form>
@section('scripts')
<script>
        $(document).ready(function () {
            $("#Dventa").hide();
            
            $('#clienteCodigo').on('select2:select', function (e) {

                var data = e.params.data;

                $.ajax({
                    method: 'GET',
                    url: "{{ URL::route('getClienteDataPuntos') }}",
                    data: { q: data.id },
                    success: function (result) {
                        console.log(result);
                        if (result.length > 0) {
                            $.each(result, function (inx, arrx) {
                                $.each(arrx[0], function (index, value) {
                                    console.log(index);
                                    $("#" + index).val(value);
                                    //$("#" + index).addClass("not-null ok");
                                    $("#" + index).addClass("disabled");
                                    $("#" + index).siblings(".an-input-group-addon").find("i").addClass("ion-ios-checkmark-outline");
                                    $("#" + index).attr("disabled","disabled");
                                    $("#Dventa").show();
                                })
                            });
                        }
                        //desabilitar la modificacion de datos
                        
                    },
                    error: function (result) {
                        console.log(result);
                        $("#clienteLg").hide();
                    }
                });

            });


            $('#clienteCodigo').select2({
                tags: true,
                width: "100%",
                ajax: {
                    url: "{{ URL::route('getCliente') }}",
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
                                text: 'Clientes ya registrados',
                                children: data
                            }],
                        };
                    },
                    cache: true
                },
                createTag: function (params) {
                    
                    
                    var term = params.term;

                    console.log(dataInfo);

                    try {
                        console.log(dataInfo[0].id.toString().toUpperCase());
                        if (term.toUpperCase() == dataInfo[0].id.toString().toUpperCase() ) {
                            // Return null to disable tag creation
                            return null;
                        }
                    } catch (error) {
                        console.log(error);
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    }

                },
                placeholder: 'Ingrese el nombre del cliente',
                minimumInputLength: 3,
                language: 'es'
            });
            
            $("#tipodeventa, \
                #cantidadventa").on('input', function() {
                
                var totalventa = $("#cantidadventa").val();
                var tipoventa = $("#tipodeventa option:selected").text();
                var puntosmbr = 0;
                var valorpuntos = 0;
                
                console.log(tipoventa);
                
                if(tipoventa == "Servicio"){
                    puntosmbr = totalventa * 5;
                }else if(tipoventa == "Producto"){
                    puntosmbr = totalventa * 2;
                }
                valorpuntos = puntosmbr / 100;
                
                console.log(puntosmbr);
                console.log(valorpuntos);
                
                $("#puntosganados").val(puntosmbr);
                $("#valorpuntos").val(valorpuntos);
            });
            
            $("#registrar").click(function(){
            
                //$("#cotizacionLg").show();
                var isSAP = "";
                if( $("#isSAP").val() == 'Y'){
                    isSAP = '1'
                }else{
                    isSAP = '0'
                }
                
                var vsale_type = "";
                if( $("#tipodeventa").val() == "Servicio"){
                    vsale_type = 'S'
                }else{
                    vsale_type = 'P'
                }
                
                $.ajax({
                    type: 'post',
                    url: '{{ URL::route("savepoints") }}',
                    data: { 
                        id_customer: $("#CardCode").val(),
                        from_sap: isSAP,
                        descript: $("#desc").val(),
                        sale_type: vsale_type,
                        qty: $("#puntosganados").val(),
                        qty_mxn: $("#valorpuntos").val(),
                    },
                    success: function(result){
                        $("#addCotizacion").modal();
                    },
                    error: function(){
                        console.log("Error");
                        $("#cotizacionLg").hide();
                    }
                });
            
            });
            
        });
    </script>
@endsection