<div class="row">
    <div class="col-md-3">
        <div class="an-single-component with-shaúdow">
            <div class="an-component-header">
                <h6>{{ 'Datos del cliente' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">

                    <label for="clienteCodigo">{{ 'Código de cliente' }}: </label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon"><i class="ion-ios-checkmark-outline"></i></div>
                        <input type="text" class="an-form-control ok" id="clienteCodigo" name="clienteCodigo"
                            value="{{ $cotizacion['Quotations'][0]->numCliente }}">
                    </div>
                    <label for="CardName2">{{ 'Nombre del cliente' }}: </label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon"><i class="ion-ios-checkmark-outline"></i></div>
                        <input type="text" id="CardName2" class="an-form-control CardName ok" name="CardName2"
                            value="{{ $cotizacion['Quotations'][0]->nombreCliente }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6>{{ 'Operaciones de la cotización' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                {{ 'A continuación puedes seleccionar el estatus de la cotización.' }}
                            </p>
                            <div class="an-input-group">
                                <label for="estatus">Estatus: </label><br>
                                <select name="estatus" id="estatus">
                                    <option value="0">Cotizada</option>
                                    <option value="1">Completada</option>
                                    <option value="2">Pagada</option>
                                    <option value="3">Cancelada</option>
                                </select>
                            </div>
                            <br>
                            {{ 'Programar cotización' }} :
                            <br>

                            <input type="text" name="quotationCron" id="quotationCron">


                        </div>
                        <div class="col-md-6">
                            <div class="an-input-group">
                                <label for="coments">Comentarios:</label>
                                <textarea name="coments" id="coments" class="" cols="30" rows="3"
                                    style="resize: none;">{{ $cotizacion['Quotations'][0]->comentarios}}</textarea>
                            </div>
                            <br>
                            <div class="an-input-group">
                                <button id="update" class="an-btn btn-success block-icon"><i class="ion-check"></i>
                                    Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <!--<div>hacer flotante este bloque y que siga la pantalla</div>-->
        <div class="an-single-component with-shadow totales">
            <div class="an-component-header">
                <h6>{{ 'Total de la cotización' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">

                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="color: #E91E63;">{{ 'Total' }} : <span id="totalCoti">
                                    {{ $cotizacion['Quotations'][0]->total}} </span> <i class="moneda">
                                    {{ $cotizacion['Quotations'][0]->Moneda}}</i></h4>
                            <h5 style="color: #E91E63;">{{ 'Total de pagos' }} : <span id="totalpagos"></span></h5>
                            <h5 style="color: #E91E63;">{{ 'Restante' }} : <span id="restante"></span></h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            @if(session('domain') == 'gruposim.com' && $cotizacion['Quotations'][0]->autorized == 0)
                            <h5 class="text-danger">*Cotizacion pendiente de autorizacion*</h5>
                            @foreach($cotizacion['ArtQuotation'] as $articulo)
                            <div class="row bg-danger d-none">
                                descuento articulo: {{$articulo->desc}}
                                descuentp maximo usuraio: {{ $maxdesc }}
                            </div>
                            @if($maxdesc > $articulo->desc)
                            <br>
                            <button id="saveandupd" class="an-btn an-btn-warning btn-block">Autorizar y
                                Actualizar</button>
                            @break
                            @endif
                            @endforeach
                            <br>
                            <a><button class="an-btn an-btn-primary btn-block disabled">Ver en PDF</button></a>
                            <br>
                            <button class="an-btn an-btn-success btn-block disabled">Enviar e-mail</button>
                            @else
                            <input type="checkbox" id="includeProm" name="includeProm" value="hola">
                            <label for="includeProm"> Incluir Promocion Meraki</label>
                            <br>
                            <a id="verPDFProm" target="_blank" href='{{ URL::route("pdfQuotation2", $id ) }}'><button
                                    class="an-btn an-btn-primary btn-block">Ver en PDF</button></a>
                            <br>
                            <button class="an-btn an-btn-success  btn-block ">Enviar e-mail</button>
                            @endif
                            <br>
                            <button id="makeSAP" class="an-btn an-btn-info disabled btn-block">Crear en SAP</button>
                            <br>
                            <button class="an-btn an-btn-danger disabled btn-block">Solicitar pedido</button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Informacion de pago -->

<div class="row">
    <div class="col-md-12">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6>{{ 'Información de pago' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-2">
                            Método de pago *
                        </div>
                        <div class="col-md-1">
                            Monto *
                        </div>
                        <div class="col-md-1">
                            Moneda *
                        </div>
                        <div class="col-md-2">
                            Referencia *
                        </div>
                        <div class="col-md-2">
                            Fecha de pago *
                        </div>
                        <div class="col-md-2">
                            Comprobante
                        </div>
                        <div class="col-md-2">
                            Status
                        </div>
                    </div>

                    <div id="container-pay" class="row">

                        @foreach($getPayment as $payment)

                        <div id="save-pay[{{ $loop->iteration }}]" class="row item-pay save">
                            <div class="col-md-2">
                                <div class="an-input-group">

                                    <select id='formPay[{{ $loop->iteration }}]' class="an-form-control formPay"
                                        disabled>
                                        @if (!strcmp($payment->metodo, '01'))
                                        <option value="01" selected="selected">Efectivo</option>
                                        <option value="02">Cheque</option>
                                        <option value="03">Transferencia electrónica</option>
                                        <option value="04">Tarjeta de crédito</option>
                                        @elseif (!strcmp($payment->metodo, '02'))
                                        <option value="01">Efectivo</option>
                                        <option value="02" selected="selected">Cheque</option>
                                        <option value="03">Transferencia electrónica</option>
                                        <option value="04">Tarjeta de crédito</option>
                                        @elseif (!strcmp($payment->metodo, '03'))
                                        <option value="01">Efectivo</option>
                                        <option value="02">Cheque</option>
                                        <option value="03" selected="selected">Transferencia electrónica</option>
                                        <option value="04">Tarjeta de crédito</option>
                                        @elseif (!strcmp($payment->metodo, '04'))
                                        <option value="01">Efectivo</option>
                                        <option value="02">Cheque</option>
                                        <option value="03">Transferencia electrónica</option>
                                        <option value="04" selected="selected">Tarjeta de crédito</option>
                                        @endif
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="an-input-group">
                                    <input id="formMonto[{{ $loop->iteration }}]" type="text" class="an-form-control"
                                        value="{{ $payment->monto }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="an-input-group">
                                    <input type="text" id="formCurrency[{{ $loop->iteration }}]"
                                        class="an-form-control formCurrency" value="{{ $payment->moneda }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="an-input-group">
                                    <input id="formRef[{{ $loop->iteration }}]" type="text" name=""
                                        class="an-form-control" value="{{ $payment->referencia }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="an-input-group">
                                    <input id="formDate[{{ $loop->iteration }}]" type="date" name=""
                                        class="an-form-control" value="{{ $payment->date }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="an-input-group">
                                    <input id="formFile[{{ $loop->iteration }}]" type="file" name=""
                                        class="an-form-control disabled" value="{{ $payment->comprobante }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="an-input-group">
                                    <select id='statusPay[{{ $loop->iteration }}]' class="an-form-control statusPay">

                                        @if (!strcmp($payment->status, '01'))
                                        <option value="01" selected="selected">Pagado</option>
                                        <option value="02">En proceso</option>
                                        <option value="03">No pago</option>
                                        @elseif (!strcmp($payment->status, '02'))
                                        <option value="01">Pagado</option>
                                        <option value="02" selected="selected">En proceso</option>
                                        <option value="03">No pago</option>
                                        @elseif (!strcmp($payment->status, '03'))
                                        <option value="01">Pagado</option>
                                        <option value="02">En proceso</option>
                                        <option value="03" selected="selected">No pago</option>
                                        @endif


                                    </select>
                                </div>
                            </div>
                        </div>



                        @endforeach



                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button id="addPay" class="an-btn an-btn-success block-icon"><i class="ion-plus-round"></i>
                                Agregar pago</button>
                        </div>
                        <div class="col-md-12">
                            <p>&nbsp;</p>
                        </div>

                        <div class="col-md-12 text-right">
                            @if (count($getPayment) > 0)
                            <button id="validarPay" class="an-btn an-btn-warning">Validar Pagos</button>
                            @else
                            <button id="validarPay" class="an-btn an-btn-warning disabled">Validar Pagos</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Operaciones sobre la cotizacion -->

<div class="col-md-12">
    <div class="an-single-component with-shadow">

        <!--
  ______                          _                                _                 _            _             _   _         _           
 |  ____|                        | |                              | |               | |          | |           | | (_)       | |          
 | |__     _ __     ___    __ _  | |__     ___   ____   __ _    __| |   ___       __| |   ___    | |   __ _    | |  _   ___  | |_    __ _ 
 |  __|   | '_ \   / __|  / _` | | '_ \   / _ \ |_  /  / _` |  / _` |  / _ \     / _` |  / _ \   | |  / _` |   | | | | / __| | __|  / _` |
 | |____  | | | | | (__  | (_| | | |_) | |  __/  / /  | (_| | | (_| | | (_) |   | (_| | |  __/   | | | (_| |   | | | | \__ \ | |_  | (_| |
 |______| |_| |_|  \___|  \__,_| |_.__/   \___| /___|  \__,_|  \__,_|  \___/     \__,_|  \___|   |_|  \__,_|   |_| |_| |___/  \__|  \__,_|
-->


        <div class="an-component-header">
            <div class="col-md-3">
                <h6>{{ 'Productos cotizados' }}</h6>
            </div>
            <div class="col-md-3">
                <div class="an-input-group" style="padding: 15px 0;">
                    <div class="col-md-6 text-right">
                        <span>{{ 'Mensualidad' }}</span>
                    </div>
                    <div class="col-md-6">
                        <select id="mesesRenta" name="mesesRenta" class="an-form-control disabledA" disabled>
                            <option selected>{{ $cotizacion['Quotations'][0]->mensualidad }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="an-input-group" style="padding: 15px 0;">
                    <div class="col-md-6 text-right">
                        <span> {{ 'Tipo de Cambio al momento de cotizar' }} :</span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="tipodecambio" class="tipodecambio an-form-control disabledA"
                            value="{{ $cotizacion['Quotations'][0]->tipodecambio }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="an-input-group" style="padding: 15px 0;">
                    <div class="col-md-7 text-right">
                        <span> {{ 'Selecciona moneda' }} :</span>
                    </div>
                    <div class="col-md-5">
                        <select id="modenaGeneral" class="an-form-control">
                            @foreach($monedas as $moneda)
                            @if(!strcmp($moneda->ISOCurrCod, $cotizacion['Quotations'][0]->Moneda))
                            <option value="{{ $moneda->Rate }}" selected="selected">{{ $moneda->ISOCurrCod }}</option>
                            @else
                            <option value="{{ $moneda->Rate }}">{{ $moneda->ISOCurrCod }}</option>
                            @endif
                            @endforeach
                        </select>



                    </div>
                </div>
            </div>
        </div>



        <!--
  _        _         _                   _                                       _                  _                 
 | |      (_)       | |                 | |                                     | |                | |                
 | |       _   ___  | |_    __ _      __| |   ___     _ __    _ __    ___     __| |  _   _    ___  | |_    ___    ___ 
 | |      | | / __| | __|  / _` |    / _` |  / _ \   | '_ \  | '__|  / _ \   / _` | | | | |  / __| | __|  / _ \  / __|
 | |____  | | \__ \ | |_  | (_| |   | (_| | |  __/   | |_) | | |    | (_) | | (_| | | |_| | | (__  | |_  | (_) | \__ \
 |______| |_| |___/  \__|  \__,_|    \__,_|  \___|   | .__/  |_|     \___/   \__,_|  \__,_|  \___|  \__|  \___/  |___/
                                                     | |                                                              
                                                     |_|                                                              
-->

        <div class="an-component-body">
            <div class="an-helper-block">

                <div class="row menu-product">
                    <div class="col-md-1">
                        <span>{{ '#' }}<br><br></span>
                    </div>
                    <div class="col-md-2">
                        <span>{{ 'Cantidad' }}<br></span>
                    </div>
                    <div class="col-md-4">
                        <span>{{ 'Descripcion' }}<br></span>
                    </div>
                    <div class="col-md-2">
                        <span>{{ 'Costo de Renta' }}<br></span>
                    </div>
                    <div class="col-md-2">
                        <span>{{ 'Costo Inicial' }}<br></span>
                    </div>
                </div>

                <div id="contenerdor-products">
                    @foreach($cotizacion['ArtQuotation'] as $articulo)
                    <div id="item-product[{{ $loop->iteration }}]" class="item-product row"
                        data-product="{{ $articulo->id }}" data-type="update">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <span class="item-id">{{ $loop->iteration }}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="an-input-group">
                                            <input type="number" id="itemCantidadProd[{{ $loop->iteration }}]"
                                                name="itemCantidadProd[{{ $loop->iteration }}]"
                                                class="itemCantidadProd an-form-control disabledA"
                                                value="{{ $articulo->cantidad }}" data-toggle="tooltip"
                                                data-placement="top" title="{{ $articulo->cantidad }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="an-input-group">
                                            <textarea id="itemDesc[{{ $loop->iteration }}]"
                                                name="itemDesc[{{ $loop->iteration }}]"
                                                class="itemDesc an-form-control disabledA" data-toggle="tooltip"
                                                data-placement="top" title="{{ $articulo->nombreArt }}"
                                                readonly>{{ $articulo->descripcion }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="an-input-group">
                                            <input type="text" id="itemCostoRenta[{{ $loop->iteration }}]"
                                                name="itemCostoRenta[{{ $loop->iteration }}]"
                                                class="itemCostoRenta an-form-control disabledA"
                                                value="{{ $articulo->costoRenta }}" data-toggle="tooltip"
                                                data-placement="top" title="{{ $articulo->costoRenta }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="an-input-group">
                                            <input type="text" id="itemCostoInicial[{{ $loop->iteration }}]"
                                                name="itemCostoInicial[{{ $loop->iteration }}]"
                                                class="itemCostoInicial an-form-control disabledA"
                                                value="{{ $articulo->costoInicial }}" data-toggle="tooltip"
                                                data-placement="top" title="{{ $articulo->costoInicial }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">

                    <div class="col-md-12 text-right">
                        <button id="createProduct" class="an-btn an-btn-success block-icon"> <i
                                class="ion-plus-round"></i>Agregar artículo</button>
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
                <div class="col-md-4">
                    <h6>{{ 'Condiciones Comerciales' }}</h6>
                </div>
                <div class="col-md-8">
                    <div class="an-input-group">
                        <div class="col-md-8 text-right">
                            <span> {{-- 'Selecciona moneda' --}} </span>
                        </div>
                        <div class="col-md-4">
                            <!--<select id="modenaGeneral" class="an-form-control">
                        {{-- @foreach($monedas as $moneda)
                            <option value="{{ $moneda->Rate }}">{{ $moneda->ISOCurrCod }}</option>
                        @endforeach
                        --}}
                    </select>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block block-renta-menu">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Descripcion</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="row" 1>
                                <div class="col-md-12">
                                    <h6>No. Parte</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Cantidad</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>P. Unitario</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Subtotal</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Monto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="an-helper-block">
                    <div id="contenerdor-products-renta">
                        @foreach($cotizacion['CondComerciales'] as $condicion)
                        <div id="item-renta[{{ $loop->iteration }}]" class="item-renta row"
                            data-product="{{ $condicion->id }}" data-type="update">
                            <div class="an-helper-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <span class="item-id">{{ $loop->iteration }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <textarea class="an-form-control disabledA"
                                                    id="itemDescripcion[{{ $loop->iteration }}]"
                                                    name="itemDescripcion[{{ $loop->iteration }}]"
                                                    value="{{ $condicion->descripcion }}" data-toggle="tooltip"
                                                    data-placement="top" title="{{ $condicion->descripcion }}"
                                                    readonly>{{$condicion->descripcion}}</textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" class="an-form-control disabledA"
                                                    id="itemNoParte[{{ $loop->iteration }}]"
                                                    name="itemNoParte[{{ $loop->iteration }}]"
                                                    value="{{ $condicion->noparte }}" data-toggle="tooltip"
                                                    data-placement="top" title="{{ $condicion->noparte }}" readonly
                                                    style="padding:0px 0px 0px 3px;">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" id="itemCantidad[{{ $loop->iteration }}]"
                                                    name="itemCantidad[{{ $loop->iteration }}]"
                                                    class="itemCantidad an-form-control disabledA"
                                                    value="{{ $condicion->cantidad }}" data-toggle="tooltip"
                                                    data-placement="top" title="{{ $condicion->cantidad }}" readonly
                                                    style="padding:0px 0px 0px 3px;">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" id="itemPUnitario[{{ $loop->iteration }}]"
                                                    name="itemPUnitario[{{ $loop->iteration }}]"
                                                    class="itemPUnitario an-form-control disabledA"
                                                    value="{{ $condicion->punitario }}" data-toggle="tooltip"
                                                    data-placement="top" title="{{ $condicion->punitario }}" readonly>
                                            </div>
                                            <div class="col-md-1">
                                                <span id="itemSubtotal[{{ $loop->iteration }}]"
                                                    name="itemSubtotal[{{ $loop->iteration }}]">{{ $condicion->punitario }}</span>
                                                <i class="moneda"></i>
                                            </div>
                                            <div class="col-md-2">
                                                <span id="itemMonto[{{ $loop->iteration }}]"
                                                    name="itemMonto[{{ $loop->iteration }}]"
                                                    class="itemImporteT"><b>{{ $condicion->monto }}</b></span><i
                                                    class="moneda"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="an-component-footer">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            <label>Comentario (250 Max.): </label>
                        </div>
                        <div class="col-md-8">
                            <div class="an-helper-block">
                                <div class="an-input-group">
                                    <input type="text" id="itemComentario" name="itemComentario"
                                        class="itemComentario an-form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="an-helper-block">
                                <button id="createProductRenta" class="an-btn an-btn-success block-icon "> <i
                                        class="ion-plus-round"></i>Agregar fila</button>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-md-12 text-right">
                            <span><a class="d-none" target="_black">Agregar productos (No SAP) </a></span>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="an-single-component with-shadow">
            <div class="an-component-header text-center">
                <h6>{{ 'Pago Inicial' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row text-right">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>
                                        <h6>{{ 'Subtotal' }}</h6>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    $<span id="subtotalPI">{{ $cotizacion['subtotalPI'] }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <span>
                                            <h6>{{ 'IVA' }}</h6>
                                        </span>
                                    </div>
                                    <div class="col-md-6" style="padding:0;">
                                        <div class="an-input-group">
                                            <select id="itemFactor" name="itemFactor" class="itemFactor an-form-control"
                                                style="padding: 0px 0px 0px 3px">
                                                <option selected="selected">16</option>
                                                <option>0</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    $<span id="ivaPI">{{ $cotizacion['ivaPI'] }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>
                                        <h6>{{ 'Total ' }}<span id="currencyPI"></span> {{ 'Pago Inicial' }}</h6>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    $<span id="totalPI">{{ $cotizacion['subtotalPI'] + $cotizacion['ivaPI'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="an-single-component with-shadow">
            <div class="an-component-header text-right">
                <div class="col-md-6">
                    <h6>{{ 'Renta Mensual Antes de IVA' }}</h6>
                </div>
                <div class="col-md-6">
                    <select id="mesesRenta" name="mesesRenta" class="an-form-control">
                        <option>24</option>
                        <option>36</option>
                        <option>48</option>
                    </select>
                </div>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-12">
                            <span>
                                <h5><b>Mensualidades antes de iva</b></h5>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <span id="mesesRNumber"></span>
                                    <h6>{{ ' meses' }}</h6>
                                </div>
                                <div class="col-md-6">
                                    <span id="totalmensualidad"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="an-single-component with-shadow ">

            <div class="an-component-header">
                <h6>Notas comerciales</h6>
            </div>

            <div class="an-component-body">
                <div class="an-helper-block">

                    {!! $cotizacion['Notes']->condiciones !!}

                </div>
            </div>

        </div>

    </div>

    <div class="col-md-6">
        <div class="an-single-component with-shadow ">

            <div class="an-component-header">
                <h6>Especificaciones</h6>
            </div>

            <div class="an-component-body">
                <div class="an-helper-block">

                    {!! $cotizacion['Notes']->condiciones !!}

                </div>
            </div>

        </div>

    </div>


</div>

<!--
  ______   _                                     _                                            _   _                 
 |  ____| | |                                   | |                                          | | | |                
 | |__    | |   ___   _ __ ___     ___   _ __   | |_    ___    ___      ___     ___   _   _  | | | |_    ___    ___ 
 |  __|   | |  / _ \ | '_ ` _ \   / _ \ | '_ \  | __|  / _ \  / __|    / _ \   / __| | | | | | | | __|  / _ \  / __|
 | |____  | | |  __/ | | | | | | |  __/ | | | | | |_  | (_) | \__ \   | (_) | | (__  | |_| | | | | |_  | (_) | \__ \
 |______| |_|  \___| |_| |_| |_|  \___| |_| |_|  \__|  \___/  |___/    \___/   \___|  \__,_| |_|  \__|  \___/  |___/
                                                                                                                    
                                                                                                                    
-->

<div class="d-none">

    <!-- Inicio producto -->
    <div id="product-base">
        <div id="item-product[Element]" data-type="new" class="item-product row" data-product="0">
            <div class="row">
                <div class="col-md-1">
                    <span class="item-id">{{ 'Element' }}</span>
                </div>
                <div class="col-md-2">
                    <input type="number" id="itemCantidadProd[Element]" name="itemCantidadProd[Element]"
                        class="itemCantidad an-form-control">
                </div>
                <div class="col-md-4">
                    <textarea class="an-form-control" id="itemDesc[Element]" name="itemDesc[Element]"></textarea>
                </div>
                <div class="col-md-2">
                    <input type="number" id="itemCostoRenta[Element]" name="itemCostoRenta[Element]"
                        class="itemCostoRenta an-form-control">
                </div>
                <div class="col-md-2">
                    <input type="number" id="itemCostoInicial[Element]" name="itemCostoInicial[Element]"
                        class="itemCostoInicial an-form-control">
                </div>
                <div class="col-md-1 itemCloseE">
                    <span>
                        <i id="itemCloseE[Element]" class="ion-android-close"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div id="product-base-renta">
        <div class="an-helper-block">
            <div id="item-renta[Element]" data-type="new" class="item-renta row" data-product="0">
                <div class="col-md-1">
                    <span class="item-id">{{ 'Element' }}</span>
                </div>
                <div class="col-md-10"></div>
                <div class="col-md-1 itemClose">
                    <span>
                        <i id="itemClose[Element]" class="ion-android-close"></i>
                    </span>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <textarea class="an-form-control" id="itemDescripcion[Element]"
                                name="itemDescripcion[Element]"></textarea>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="an-form-control" id="itemNoParte[Element]"
                                name="itemNoParte[Element]" style="padding:0px 0px 0px 3px;">
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="an-form-control" id="itemCantidad[Element]"
                                name="itemCantidad[Element]" style="padding:0px 0px 0px 3px;">
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="an-form-control" id="itemPUnitario[Element]"
                                name="itemPUnitario[Element]">
                        </div>
                        <div class="col-md-1">
                            <span id="itemSubtotal[Element]" name="itemSubtotal[Element]"></span><i class="moneda"></i>
                        </div>
                        <div class="col-md-2">
                            <span id="itemMonto[Element]" name="itemMonto[Element]"
                                class="itemImporteT"><b></b></span><i class="moneda"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin producto -->

    <div id="payBase">
        <div id="item-pay[Element]" class="row item-pay">
            <div class="col-md-2">
                <div class="an-input-group">
                    <select id='formPay[Element]' class="an-form-control formPay">
                        <option value="01">Efectivo</option>
                        <option value="02">Cheque</option>
                        <option value="03">Transferencia electrónica</option>
                        <option value="04">Tarjeta de crédito</option>
                    </select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="an-input-group">
                    <input id="formMonto[Element]" type="text" name="" class="an-form-control">
                </div>
            </div>
            <div class="col-md-1">
                <div class="an-input-group">
                    <select id="formCurrency[Element]" class="an-form-control formCurrency">
                        <option value="MXN">MXN</option>
                        <option value="USD">USD</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="an-input-group">
                    <input id="formRef[Element]" type="text" name="" class="an-form-control" value="Efectivo" readonly>
                </div>
            </div>
            <div class="col-md-2">
                <div class="an-input-group">
                    <input id="formDate[Element]" type="date" name="" class="an-form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="an-input-group">
                    <input id="formFile[Element]" type="file" name="" class="an-form-control disabled">
                </div>
            </div>
            <div class="col-md-2">
                <div class="an-input-group">
                    <select id='statusPay[Element]' class="an-form-control statusPay">
                        <option value="01">Pagado</option>
                        <option value="02">En proceso</option>
                        <option value="03">No pago</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="floatButtons">
    <button id="updateFloat" class="an-btn btn-success block-icon"><i class="ion-check"></i> Actualizar</button>
</div>-->

@section('scripts')

<script type="text/javascript">
@if(Session::has('access_token'))

var token = "{!! Session::get('access_token')['access_token'] !!}";

@endif


@if(count($cotizacion['ArtQuotation']) > 0)
var productos = {
    {
        count($cotizacion['ArtQuotation']) + 1
    }
};
@else
var productos = 1;
@endif

@if(count($cotizacion['CondComerciales']) > 0)
var productosRenta = {
    {
        count($cotizacion['CondComerciales']) + 1
    }
};
@else
var productosRenta = 1;
@endif
@if(count($getPayment) > 0)
var pago = {
    {
        count($getPayment) + 1
    }
}
@else
var pago = 1;
@endif






toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
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



$(document).ready(function() {

    calculoTotalCotizacion();

    var totalint = 0;

    $("#container-pay").find("[id^='formMonto']").each(function(key, obj) {
        totalint += Number($(obj).val());
    });

    $("#totalpagos").text(totalint);

    $("#restante").text(Number(Number($("#totalCoti").text()) - totalint).toFixed(2));

    $("#contenerdor-products").find(".item-id").each(function(key, item) {

        var producIni = key + 1;

        $('#itemCantidad\\[' + producIni + '\\], \
      #itemPlista\\[' + producIni + '\\], \
       #itemDesc\\[' + producIni + '\\], \
        #itemFactor\\[' + producIni + '\\], \
         #modenaGeneral').change(function() {

            $('#item-product\\[' + producIni + '\\]').attr("data-type", "update");

            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

    });


    $('[data-toggle="tooltip"]').tooltip();

    $("#estatus").select2();

    $("#contenerdor-products").find(".itemFactor").select2();

    $("#addPay").click(function() {

        $("#container-pay").append($("#payBase").html().replace(/Element/g, pago));

        recargar(pago);

        pago++;

    });

    function recargar(pago) {

        $("#formPay\\[" + pago + "\\]").select2();

        $("#statusPay\\[" + pago + "\\]").select2();

        $("#formCurrency\\[" + pago + "\\]").select2();

        $("#validarPay").removeClass('disabled');

        $("#container-pay").find("[id^='formPay']").on('select2:select', function(e) {

            var data = e.params.data;

            var id = $(this).attr("id")
                .split("formPay")[1]
                .split("[")[1]
                .split("]")[0]

            if (data.id != '01') {
                $("#formRef\\[" + id + "\\]").attr('readonly', false);
            } else {
                $("#formRef\\[" + id + "\\]").attr('readonly', true);
                $("#formRef\\[" + id + "\\]").val('Efectivo');
            }

        });

    }

    $("#validarPay").click(function() {
        if (!$(this).hasClass('disabled')) {

            var total = 0;

            $("#container-pay").find("[id^='formMonto']").each(function(key, obj) {
                total += Number($(obj).val());
            });

            $.ajax({
                url: "{{ URL::route('setPayment') }}",
                type: 'post',
                data: {
                    datosPay: obtenerDatosPagos(),
                    numCotizacion: '{{ $id }}'
                },
                success: function() {

                    if (Number($("#totalCoti").text()) <= total) {
                        toastr.success('Puedes crear la Cotización en SAP',
                            'Pago completado');
                        $("#makeSAP").removeClass('disabled');
                    } else {

                        toastr.error(
                            "Necesita realizar más pagos para poder completar el monto",
                            "Monto incompleto * ");
                    }

                    $("#totalpagos").text(total);
                    $("#restante").text(Number(Number($("#totalCoti").text()) - total)
                        .toFixed(2));


                },
                error: function() {
                    toastr.error("Erro al guardar los datos", "Monto incompleto * ");
                }

            });

        }

    });


    function obtenerDatosPagos() {

        var arrPagos = new Array();

        $("[id^='item-pay']").each(function(index, element) {

            if (!$(this).hasClass('save')) {
                arrPagos.push({
                    metodo: $(this).find("[id^='formPay']").val(),
                    monto: $(this).find("[id^='formMonto']").val(),
                    moneda: $(this).find("[id^='formCurrency']").val(),
                    referencia: $(this).find("[id^='formRef']").val(),
                    comprobante: $(this).find("[id^='formFile']").val(),
                    date: $(this).find("[id^='formDate']").val(),
                    status: $(this).find("[id^='statusPay']").val()
                });

                $(this).addClass('save');

            }
        });

        arrPagos.pop();

        return arrPagos;
    }

    $("#quotationCron").datepicker();


    /*
     * Agregar y actualizar productos
     *
     */


    $("#update").click(function() {
        $("#loading").show();

        $.ajax({
            type: 'post',
            url: '{{ URL::route("updateCotizacionrenta") }}',
            data: {
                id: {{ $cotizacion['Quotations'][0]->id }},
                numCotizacion: "{{ $cotizacion['Quotations'][0]->numCotizacion }}",
                obtenerDatosEquipo: obtenerDatosEquipo(), //datos de equipo propuesto
                obtenerDatosCondiciones: obtenerDatosCondiciones(), //datos decondiciones comerciales
                obtenerDatosCotizacion: obtenerDatosCotizacion() //datos de la cotizacion
            },
            success: function(result) {
                console.log(result);
                $("#loading").hide();
            },
            error: function() {
                console.log("Error");
            }
        });


    });


    $("#createProduct").click(function() {
        if (!validarCotizacionCliente())
            return;

        $("#contenerdor-products").append($("#product-base").html().replace(/Element/g, productos));
        eventosEquipoProp(productos);

        productos++;

    });

    $("#createProductRenta").click(function() {
        addLineaCondiciones();
    });


    function eventosProduct(products) {

        var producIni = products;

        /**** Eliminar Producto ****/

        $(".itemClose i").click(function() {
            //Total de lineas de productos (productosRenta - 1)
            var indClose = $(this).attr("id").split("itemClose")[1].split("[")[1].split("]")[0];

            if (productosRenta <= 3 || indClose < 3) {
                console.log("productosRenta" + productosRenta)
                console.log("producIni" + producIni);
                return;
            }
            $("#item-renta\\[" + $(this).attr("id")
                    .split("itemClose")[1]
                    .split("[")[1]
                    .split("]")[0] + "\\]")
                .remove();
            calculoTotalCotizacion();

            productosRenta--;
        });

        $('#itemMonto\\[' + producIni + '\\], \
            #itemFactor, \
             #mesesRenta, \
              #itemCantidad\\[' + producIni + '\\]').change(function() {

            //$('#item-product\\[' + producIni +'\\]').attr("data-type", "update");

            /*asignamos valor de meses de renta*/
            $("#mesesRNumber").text($("#mesesRenta").val());
            console.log("Meses renta " + $("#mesesRenta").val());

            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        $('#modenaGeneral').change(function() {

            $('#item-product\\[' + producIni + '\\]').attr("data-type", "update");

            calculoTipoCambioMG(producIni);
            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        $('#itemPUnitario\\[' + producIni + '\\]').on('input', function() {

            $('#itemSubtotal\\[' + producIni + '\\]').text($(this).val());

            //$('#item-product\\[' + producIni +'\\]').attr("data-type", "update");

            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        /**** Iniciar factor ****/

        $('#itemFactor\\[' + producIni + '\\]').select2();


        /**** Iniciar UMV ****/

        $('#itemUMV\\[' + producIni + '\\]').select2();
    }

    function eventosEquipoProp(products) {

        var producIni = products;

        /**** Eliminar Equipo Propuesto ****/

        $(".itemCloseE i").click(function() {
            $("#item-product\\[" + $(this).attr("id")
                    .split("itemCloseE")[1]
                    .split("[")[1]
                    .split("]")[0] + "\\]")
                .remove();
            //En lugar de calculo total cotizacion debe llevar calcular total del pago inicial y renta primer mes
            //calculoTotalCotizacion();

            productos--;
        });

        /**** Recalcular total si hay algun cambio ****/

        /**** Cambio en la divisa ****/

        $('#modenaGeneral').change(function() {

            $('#item-product\\[' + producIni + '\\]').attr("data-type", "update");


            calculoTipoCambioMG(producIni);
            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        /****  ****/

        $('#itemCantidadProd\\[' + producIni + '\\], \
            #itemDesc\\[' + producIni + '\\], \
            #itemCostoRenta\\[' + producIni + '\\], \
            #itemCostoInicial\\[' + producIni + '\\]').on('change', function() {

            //$('#item-product\\[' + producIni +'\\]').attr("data-type", "update");

            if (!(validarEquipo())) {
                //toastr["error"]("Código de cliente", "Campo requerido * ");
                return;
            } else {
                pagoInicial(producIni);
            }
        });
    }

    function validarEquipo() {
        var count = 0;
        var status = true;

        $("#contenerdor-products").find("[id^='item-product']").each(function(index, element) {

            var articulo = $(this).find(".item-id").text();

            if (!($(this).find("[name^='itemCantidadProd']").val() == null || $(this).find(
                    "[name^='itemCantidadProd']").val() == "")) {
                //alert("itemcantidad");
                count++;
            }

            if (!($(this).find("[name^='itemDesc']").val() == null || $(this).find("[name^='itemDesc']")
                    .val() == "")) {
                //alert("itemDesc");
                count++;
            }

            if (!($(this).find("[name^='itemCostoRenta']").val() == null || $(this).find(
                    "[name^='itemCostoRenta']").val() == "")) {
                //alert("itemCostoRenta");
                count++;
            }

            if (!($(this).find("[name^='itemCostoInicial']").val() == null || $(this).find(
                    "[name^='itemCostoInicial']").val() == "")) {
                //alert("itemCostoInicial");
                count++;
            }

            console.log("count = " + count);
            if (count < 4) {
                //toastr["error"]("Código de cliente", "Campo requerido * ");
                status = false;
            }
        });

        return status;
    }

    function changePUnitario(prod, total) {
        var productItem = prod;

        $('#itemPUnitario\\[' + productItem + '\\]').val(total);
        $('#itemSubtotal\\[' + productItem + '\\]').text(total);
        $('#itemMonto\\[' + productItem + '\\] b').text(total);

        //Finalmente llamamos a calculoCotizacion() y  calculoTotalCotizacion() para calcular el total de la cotizacion
        calculoCotizacion(productItem);
    }

    function addLineaCondiciones() {
        if (!validarCotizacionCliente())
            return;

        $("#contenerdor-products-renta").append($("#product-base-renta").html().replace(/Element/g,
            productosRenta));
        eventosProduct(productosRenta);

        productosRenta++;
    }

    function pagoInicial(prod) {
        var aux = prod;
        var productItem = 1;
        var productItemm = 2;
        /**** Si es la primer linea de equipo propuesto insertamos una linea 
         * de condiciones para la suma del costo inicial y otra para el costo de renta
         ****/

        //uso prdo para validar que no se vaya creando una nueva linea 
        if (productosRenta == 1) {
            addLineaCondiciones();
            addLineaCondiciones();
        }

        /**** insertar informacion de costo inical y costo de renta en nueva linea de producto ****/

        $('#itemDescripcion\\[' + productItem + '\\]').val("Pago Inicial");
        $('#itemNoParte\\[' + productItem + '\\]').attr("placeholder", "No. Parte");
        $('#itemCantidad\\[' + productItem + '\\]').val("1");
        $('#itemClose\\[' + productItem + '\\]').attr("title", "No puedes eliminar esta linea");

        $('#itemDescripcion\\[' + productItemm + '\\]').val("Renta mensual");
        $('#itemNoParte\\[' + productItemm + '\\]').attr("placeholder", "No. Parte");
        $('#itemCantidad\\[' + productItemm + '\\]').val("1");
        $('#itemClose\\[' + productItemm + '\\]').attr("title", "No puedes eliminar esta linea");

        /**** calculo de total costo incial****/

        calculoPagoInicial(aux);

        //Por ultimo calculamos el total de la cotizacion

        calculoTotalCotizacion();
    }

    function calculoPagoInicial(productItemI) {
        var prod = productItemI;
        var productItem = 1;
        var productItemm = 2;
        var vtotalCRenta = 0;
        var vtotalCInicial = 0;
        var status = true;

        $("#contenerdor-products").find("[id^='item-product']").each(function(index, element) {

            //var articulo = $(this).find(".item-id").text();
            var cantidad = $(this).find("[name^='itemCantidadProd']").val();

            vtotalCRenta += Number($(this).find("[name^='itemCostoRenta']").val() * cantidad);
            vtotalCInicial += Number($(this).find("[name^='itemCostoInicial']").val() * cantidad);
        });

        //Cambiamos los valores de los campos de condiciones comerciales par acalcular el total de la cotizacion
        changePUnitario(productItemm, vtotalCRenta);
        changePUnitario(productItem, vtotalCInicial);
    }

    function calculoCotizacion(prod) {

        var productItem = prod;
        var moneda = $("#modenaGeneral").val();
        var monedaLabel = $("#modenaGeneral option:selected").text();

        $('#itemMoneda\\[' + productItem + '\\]').text(monedaLabel);

        //console.log(productItem);


        /*-------------INICIO DE CALCULO CONDICIONES COMERCIALES------------*/

        //Tomamos el valor de itemPUNitario[Element] y lo asignamos al monto
        //var PUnitario = $("#itemPUnitario\\[" + productItem +"\\]").val();
        var cantidad = $("#itemCantidad\\[" + productItem + "\\]").val();
        var monto = 0;

        //console.log(PUnitario + " " + cantidad);

        //Ponemos el valor de Punitario a subtotal para la conversion

        var subtotal = $("#itemSubtotal\\[" + productItem + "\\]").text();

        monto = Number(cantidad) * Number(subtotal);
        console.log("Monto = " + monto);

        $("#itemMonto\\[" + productItem + "\\] b").text(Number(monto).toFixed(2));

        //$('#itemImporteT\\[' + productItem +'\\] b').text( Number(monto).toFixed(2));

    }

    function calculoMensualidades() {

        var totalRenta = $("#itemMonto\\[" + 2 + "\\]").text();
        console.log(totalRenta);
        $("#totalmensualidad24").text(Number(totalRenta).toFixed(2) * 24);
        $("#totalmensualidad36").text(Number(totalRenta).toFixed(2) * 36);
        $("#totalmensualidad48").text(Number(totalRenta).toFixed(2) * 48);
    }

    function calculoTotalCotizacion() {

        var antesSubTotalCoti = 0;

        $("#contenerdor-products-renta").find(".item-renta .itemImporteT b").each(function() {
            antesSubTotalCoti += Number($(this).text());
        }).promise().done(function() {
            //asignamos el valor total de las filas de condiciones comerciales en subtotal para calcular el iva y poder calcular el total de la cotizacion
            $('#subtotalPI').text(Number($("#itemMonto\\[" + 1 + "\\]").text()).toFixed(2));
            var calcIVA = 0;
            var totalwoIVA = Number($("#itemMonto\\[" + 1 + "\\]").text()).toFixed(2);
            var factorIVA = $('#itemFactor').val();
            var totalCotizacion = 0;
            //calculamos el valor del iva
            calcIVA = totalwoIVA * (factorIVA / 100);

            //asignamos el valor del iva a su etiqueta
            $('#ivaPI').text(Number(calcIVA).toFixed(2));

            //Calcular el total con iva
            totalCotizacion = Number(totalwoIVA) + Number(calcIVA);

            //Asignamos el valor a sus etiquetas
            $("#totalPI").text(Number(totalCotizacion).toFixed(2));
            $("#totalCoti").text(Number(totalCotizacion).toFixed(2));
            totalRestante(Number(totalCotizacion).toFixed(2));
        });
        //asignar la divisa a las etiquetas y a la cotizacion
        $(".moneda").text($("#modenaGeneral option:selected").text());
    }

    function obtenerDatosCotizacion() {

        datos = {
            moneda: $("#modenaGeneral option:selected").text(),
            total: Number($("#totalCoti").text()),
        };

        return datos;

    }

    function obtenerDatosEquipo() {
        var arrArticulos = new Array();

        $("[id^='item-product']").each(function(index, element) {
            arrArticulos.push({
                id: $(this).attr("data-product"),
                dataType: $(this).attr("data-type"),
                numLine: $(this).find(".item-id").text(), // Numero de line
                cantidad: $(this).find("[name^='itemCantidadProd']")
            .val(), // cantidad del articulo
                desc: $(this).find("[name^='itemDesc']")
            .val(), // articulo y especificaciones sin marca 
                costoRenta: $(this).find("[name^='itemCostoRenta']").val(),
                costoInicial: $(this).find("[name^='itemCostoInicial']").val()
            });
        });
        //Con esta funcion quitamos el ultimo elemento del arregro, por la busqueda nos toma en cuenta el elemento escondido
        //que usamos para generer dinamicamente las lineas de articulos
        arrArticulos.pop();

        return arrArticulos;
    }

    function obtenerDatosCondiciones() {
        var arrArticulos = new Array();
        $("[id^='item-renta']").each(function(index, element) {
            arrArticulos.push({
                id: $(this).attr("data-product"),
                numLine: $(this).find(".item-id").text(), // Numero de line
                dataType: $(this).attr("data-type"),
                cantidad: $(this).find("[name^='itemCantidad']").val(), // cantidad del articulo
                noparte: $(this).find("[name^='itemNoParte']").val(), // cantidad del articulo
                desc: $(this).find("[name^='itemDescripcion']")
            .val(), // articulo y especificaciones sin marca
                punitario: $(this).find("[name^='itemPUnitario']")
            .val(), // articulo y especificaciones sin marca
                monto: $(this).find("[name^='itemMonto']")
            .text(), // articulo y especificaciones sin marca
                observaciones: $(this).find("[name^='itemComentario']").val()
            });
        });

        arrArticulos.pop();
        return arrArticulos;
    }

    function validarCotizacionCliente() {

        if ($("#clienteCodigo").val() == null) {
            toastr["error"]("Código de cliente", "Campo requerido * ");
            return false;
        }

        return true
    }

    function validarCotizacionArticulos() {

        var status = true;

        $("[id^='item-product']").each(function(index, element) {

            var articulo = $(this).find(".item-id").text();

            if (articulo == 'Element')
                return;

            if ($(this).find("[name^='itemCantidadProd']").val() == "" || $(this).find(
                    "[name^='itemCantidadProd']").val() == null) {
                toastr["error"]("Cantidad de Equipo Propuesto [" + articulo + "]",
                "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemDesc']").val() == "" || $(this).find("[name^='itemDesc']")
                .val() == null) {
                toastr["error"]("Descripcion de Equipo Propuesto [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemDescripcion']").val() == "" || $(this).find(
                    "[name^='itemDescripcion']").val() == null) {
                toastr["error"]("Descripcion de Condiciones Comerciales [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemNoParte']").val() == "" || $(this).find(
                    "[name^='itemNoParte']").val() == null) {
                toastr["error"]("No. de Parte de Condiciones Comerciales [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemCantidad']").val() == "" || $(this).find(
                    "[name^='itemCantidad']").val() == null) {
                toastr["error"]("Cantidad de Condiciones Comerciales [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemPUnitario']").val() == "" || $(this).find(
                    "[name^='itemPUnitario']").val() == null) {
                toastr["error"]("Precio Unitario de Condiciones Comerciales [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

        });

        if ($("#notes").val() == null || $("#notes").val() == "") {
            toastr["error"]("Notas comerciales de la cotizacion", "Campo requerido * ");
            status = false;
        }

        /*if($("#accounts").val() == null){
          toastr["error"]("Cuenta de pago de la cotizacion", "Campo requerido * ");
          status = false;
        }
        
        if($("#tipo-entrega").val() == null){
          toastr["error"]("Información de entrega de la cotizacion", "Campo requerido * ");
          status = false;
        }*/


        return status;
    }

    function totalRestante(total) {
        //funcion para validar el total de pagos y calcular el restante
        //total de la cotizacion - pagos recibidos

        var totalPagos = 0;

        $.ajax({
            type: 'POST',
            url: '{{ URL::route("getPaymentInfo") }}',
            data: {
                id: {
                    {
                        $cotizacion['Quotations'][0] - > id
                    }
                },
                numCotizacion: "{{ $cotizacion['Quotations'][0]->numCotizacion }}"
            },
            success: function(result) {
                //console.log(result[0].monto);

                $.each(result, function(index, value) {

                    //console.log("Monto "+ index + " " + value.monto);
                    totalPagos += Number(value.monto);

                });

                //console.log("Total= " + total);
                //console.log("Totalpago = " + totalPagos);

                $("#restante").text(Number(Number(total) - Number(totalPagos)).toFixed(2));
                $("#loading").hide();
            },
            error: function(result2) {
                //console.log("Error al buscar informacion de pagos");
                $("#loading").hide();
            }
        });
    }

    /**** Eliminar Producto Inicio ****/

    $(".itemClose i").click(function() {

        if (confirm(" ¿Estás seguro que deseas eliminar este producto de la cotización?")) {
            var idContent = $(this).attr("id")
                .split("itemClose")[1]
                .split("[")[1]
                .split("]")[0];

            $("#loading").show();

            $.ajax({
                method: 'post',
                url: "{{ URL::route('deleteProduct') }}",
                data: {
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    $("#item-product\\[" + idContent + "\\]")
                        .remove();

                    $("#totalCoti").text(response.data);

                    $("#loading").hide();

                }

            });



        }
        //calculoTotalCotizacion();
    });


    /**** Inicia Moneda General ****/

    $('#modenaGeneral').select2({
        placeholder: 'Selecciona ...'
    });


    /*** Guardar cotizacion en SAP ***/


    validarSAP();



    function validarSAP() {

        var products = [];

        $("#contenerdor-products").find(".itemCodigo").each(function() {
            products.push($(this).val());
        });

        data = {
            q: $("#clienteCodigo").val(),
            r: products
        };

        $.ajax({
            method: "post",
            url: "{{ URL::route('validateQuotation') }}",
            data: data,
            success: function(data) {

                var next = 0;

                $.each(data.data[1].Products, function(key, value) {
                    if (value[0].status == '0')
                        $($("#contenerdor-products").find(".itemCodigo")[key]).css({
                            backgroundColor: '#5cb85c',
                            color: 'white'
                        })
                    else
                        $($("#contenerdor-products").find(".itemCodigo")[key]).css({
                            backgroundColor: '#F44336',
                            color: 'white'
                        })
                    next += Number(value[0].status);
                });

                if (data.data[0].CardCode[0].status == '0')
                    $("#clienteCodigo").css({
                        backgroundColor: '#5cb85c',
                        color: 'white'
                    });
                else
                    $("#clienteCodigo").css({
                        backgroundColor: '#F44336',
                        color: 'white'
                    });

                next += Number(data.data[0].CardCode[0].status);

                if (next == 0) {
                    $("#makeSAP").removeClass("disabled").css({
                        backgroundColor: '#4CAF50'
                    });
                }

            },
            error: function() {
                console.log('Error :(');
            }

        });


    }

    // **** Crear en SAP


    $("#makeSAP").click(function() {
        if (!$(this).hasClass('disabled')) {
            $.ajax({
                method: "post",
                url: "http://{!! Session::get('HOST_SAP_API') !!}/api/sap/cotizacion",
                headers: {
                    "Authorization": "Bearer " + token
                },
                data: {
                    "CardCode": "0127",
                    "NumAtCard": "1000002",
                    "products": [{
                        "ItemCode": "OMS24",
                        "Quantity": 50,
                        "UnitPrice": 1
                    }, {
                        "ItemCode": "OMS24",
                        "Quantity": 90,
                        "UnitPrice": 1
                    }]
                },
                success: function(data) {
                    console.log(data);
                },
                error: function() {
                    console.log("Error :(");
                }

            });
        }

    });


    /***    Incluir promocion de meraki      ***/
    $('#includeProm').change(function() {
        if (this.checked) {
            var returnVal = confirm("¿Desea agregar la promocion al pdf?");
            $(this).prop("checked", returnVal);
            $("#verPDFProm").attr('href', '{{ URL::route("pdfQuotation2", $id ) }}/{{"hola"}}')
        } else {
            var returnVal = confirm("¿Desea quitar la promocion al pdf?");
            $(this).prop("checked", !returnVal);
            $("#verPDFProm").attr('href', '{{ URL::route("pdfQuotation2", $id ) }}')
        }
    });

});
</script>


@endsection