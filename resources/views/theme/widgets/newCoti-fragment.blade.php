<style>
.gg-info {
    box-sizing: border-box;
    position: relative;
    display: block;
    transform: scale(var(--ggs, 1));
    width: 20px;
    height: 20px;
    border: 2px solid;
    border-radius: 40px
}

.gg-info::after,
.gg-info::before {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    border-radius: 3px;
    width: 2px;
    background: currentColor;
    left: 7px
}

.gg-info::after {
    bottom: 2px;
    height: 8px
}

.gg-info::before {
    height: 2px;
    top: 2px
}
</style>
<div class="row mb-3">
    <div class="col-md-3">
        <input type="hidden" id="maxdescsession" value="{{ $maxdesc }}">
        <div class="an-single-component with-shadow h-100">
            <div class="an-component-header">
                <h6>{{ 'Datos del cliente' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">

                    <label for="clienteCodigo">{{ 'Código/Nombre del cliente' }}:
                        <img id="clienteLg" hidden="hidden" height="18" src="{{ asset('assets/img/loading.gif') }}"
                            style="display: none;">
                    </label>
                    <div class="an-input-group">
                        <select class="an-form-control" id="clienteCodigo" name="clienteCodigo">
                        </select>
                    </div>
                    <br>
                    <label for="CardName2">{{ 'Nombre del cliente' }}: </label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon"><i></i></div>
                        <input type="text" id="CardName2" class="an-form-control CardName" name="CardName2"
                            data-toggle="tooltip" data-placement="top" title="{{ 'Nombre del cliente' }}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" data-toggle="detalleCliente">{{ 'Más información del cliente' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="an-single-component with-shadow h-100">
            <div class="an-component-header">
                <h6>{{ 'Información de crédito' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">


                        <div class="col-md-3">
                            <label for="cotiLimite">{{ 'Limite de crédito' }} (MXN)</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiLimite" class="an-form-control dinero" name="cotiLimite"
                                    readonly="true">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cotiDeudor">{{ 'Saldo deudor' }} (MXN)</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiDeudor" class="an-form-control dinero" name="cotiDeudor"
                                    readonly="true">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cotiDisp">{{ 'Crédito disponible'  }} (MXN)</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiDisp" class="an-form-control dinero" name="cotiDisp"
                                    readonly="true">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cotiDias">{{ 'Días de crédito' }}</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiDias" class="an-form-control" name="cotiDias"
                                    readonly="true">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="DocDate">{{ 'Fecha último pago' }}</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="DocDate" class="an-form-control" name="DocDate" readonly="true">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cotiMonto">{{ 'Monto último pago' }}</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiMonto" class="an-form-control dinero" name="cotiMonto"
                                    readonly="true">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="an-single-component with-shadow h-100">

            <!--
      ______                          _                                _                 _            _             _   _         _           
     |  ____|                        | |                              | |               | |          | |           | | (_)       | |          
     | |__     _ __     ___    __ _  | |__     ___   ____   __ _    __| |   ___       __| |   ___    | |   __ _    | |  _   ___  | |_    __ _ 
     |  __|   | '_ \   / __|  / _` | | '_ \   / _ \ |_  /  / _` |  / _` |  / _ \     / _` |  / _ \   | |  / _` |   | | | | / __| | __|  / _` |
     | |____  | | | | | (__  | (_| | | |_) | |  __/  / /  | (_| | | (_| | | (_) |   | (_| | |  __/   | | | (_| |   | | | | \__ \ | |_  | (_| |
     |______| |_| |_|  \___|  \__,_| |_.__/   \___| /___|  \__,_|  \__,_|  \___/     \__,_|  \___|   |_|  \__,_|   |_| |_| |___/  \__|  \__,_|
    -->

            <div class="an-component-header">
                <div class="row" style="padding-top:15px;">
                    <div class="col-md-2" style="border-right:1px solid #adadad; height:100%;">
                        <div class="an-input-group">
                            <h6>{{ 'Productos a cotizar' }}</h6>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right:1px solid #adadad; height:100%;">
                        <div class="an-input-group">
                            
                            <div class="col-md-12" style="display: inline;">
                                <div>
                                    <span> {{ 'Formato de cotizacion' }} :</span>
                                </div>
                                <select id="formatoCoti" class="">
                                    <option value="comp">CON IVA</option>
                                    <option value="opc">OPCIONES</option>
                                    <option value="siva">SIN IVA</option>
                                </select>
                                <button id="formatorescomp" class="btn" data-toggle="formatorescomp"><i class="gg-info"></i></button>
                                <button id="formatoresopc" class="btn" data-toggle="formatoresopc" style="display: none;"><i class="gg-info"></i></button>
                                <button id="formatoressiva" class="btn" data-toggle="formatoressiva" style="display: none;"><i class="gg-info"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2" style="border-right:1px solid #adadad; height:100%;">
                        <div class="an-input-group">
                            <span>Idioma</span>
                            <select id="langCoti" class="an-form-control">
                                <option value="esp">Español</option>
                                <option value="eng">Inglés</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3" style="border-right:1px solid #adadad; height:100%;">
                        <div class="an-input-group">
                                <span> {{ 'Tipo de Cambio' }} :</span>
                                <input type="text" id="tipodecambio" class="an-form-control" style="padding-left:5;"
                                    value="{{ isset($monedas[1]->Rate) ? $monedas[1]->Rate : '0' }}">
                                <!--<input type="text" id="tipodecambio" class="tipodecambio an-form-control" value="$monedas[1]->Rate ?? '0'">-->
                        </div>
                    </div>
                    <div class="col-md-2" style="border-right:1px solid #adadad; height:100%;">
                        <div class="an-input-group">
                                <span> {{ 'Selecciona moneda' }} :</span>
                                <select id="modenaGeneral" class="an-form-control">
                                    @foreach($monedas as $moneda)
                                    <option value="{{ $moneda->Rate }}">{{ $moneda->ISOCurrCod }}</option>
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
                        <div class="col-md-2">
                            <span>{{ '# Artículo *' }}<br><br></span>
                        </div>
                        <div class="col-md-3">
                            <span>{{ 'Descripcion *' }}<br><br></span>
                        </div>
                        <div class="col-md-1 ">
                            <span>{{ 'P. Lista *' }}<br></span>
                        </div>
                        <div class="col-md-1 ">
                            <span>{{ 'Moneda *' }}<br></span>
                        </div>

                        <div class="col-md-1 ">
                            <span>{{ 'P.Venta' }}<br></span>
                        </div>
                        <div class="col-md-1 ">
                            <span>{{ 'Cantidad *' }}<br></span>
                        </div>
                        <div class="col-md-1 ">
                            <span>{{ 'IVA' }}<br></span>
                        </div>
                        <div class="col-md-1 ">
                            <span>{{ 'Importe' }}<br></span>
                        </div>
                    </div>

                    <div id="contenerdor-products"></div>

                    <div class="row">

                        <div class="col-md-12 text-right">
                            <button id="createProduct" class="an-btn an-btn-success block-icon disabled"> <i
                                    class="ion-plus-round"></i>Agregar artículo</button>
                        </div>

                    </div>

                </div>
            </div>

            <div class="an-component-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <span><a href="{{ URL::route('nuevo-articulo') }}" class="an-btn btn-success btn-no-sap"
                                target="_black">Agregar productos (No SAP) </a></span>
                        <br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="row mb-3">
    <div class="col-md-6">

        <div class="an-single-component with-shadow totales h-100" id="especificacionesdiv">
            <div class="an-component-header">
                <h6>{{ 'Especificaciones' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">

                    <div class="row">
                        <div class="col-md-12">
                            <select name="speci" id="speci" class="an-form-control" multiple>
                                @foreach($getEspecificaciones as $getEspecificacionesItem)
                                <option value="{{ $getEspecificacionesItem->id }}">
                                    {{ $getEspecificacionesItem->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <div class="an-single-component with-shadow totales h-100">
            <div class="an-component-header">
                <h6>{{ 'Total de la cotización' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">

                    <div class="row">
                        <div class="col-md-8">
                            <span>{{ 'IVA' }}:</span>
                        </div>
                        <div class="col-md-4">
                            <span id="totalCotiIva"></span><i class="moneda"></i>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <span>{{ 'Total' }}:</span>
                        </div>
                        <div class="col-md-4">
                            <span id="totalCoti"></span><i class="moneda"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mb-3">
    <div class="col-md-6" id="notascomercialesdiv">
        <div class="an-single-component with-shadow h-100">
            <div class="an-component-header">
                <h6>{{ 'Notas comerciales *' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <select id="notes" class="an-form-control">
                        <option value=""></option>
                        @if(session('domain') == 'gruposim.com')
                            @foreach($notas as $nota)
                                <option value="{{ $nota->id }}">{{ $nota->name }}</option>
                            @endforeach
                        @else
                            @foreach($notas as $nota)
                                <option value="{{ $nota->Code }}">{{ $nota->Name }}</option>
                            @endforeach
                        @endif

                    </select>
                    <p id="notas-condiciones"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="cuentapagodiv">
        <div class="an-single-component with-shadow h-100">
            <div class="an-component-header">
                <h6>{{ 'Cuenta de pago *' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <select id="accounts" class="an-form-control">
                        <option value=""></option>
                        @foreach($accounts as $account)
                        <option value="{{ $account->AcctCode }}">{{ $account->AcctName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mb-3">
    <div class="col-md-6" id="informacionentregadiv">
        <div class="an-single-component with-shadow h-100">
            <div class="an-component-header">
                <h6>{{ 'Información de entrega' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-12">
                            <select id="tipo-entrega" name="tipo-entrega" class="an-form-control">
                                <option value=""></option>
                                <option value="1">{{ 'Recoge en sucursal' }}</option>
                                <option value="2">{{ 'Entrega en oficina' }}</option>
                                <option value="3">{{ 'Entrega en obra' }}</option>
                                <option value="4">{{ 'Ocurre' }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <p>&nbsp;</p>
                    </div>
                    <div class="row form-entrega">
                        <div class="col-md-6">
                            <label for="cotiEntregaPersona">{{ 'Persona que recibe' }}</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiEntregaPersona" class="an-form-control"
                                    name="cotiEntregaPersona">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cotiEntregaDireccion">{{ 'Dirección de entrega' }}</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiEntregaDireccion" class="an-form-control"
                                    name="cotiEntregaDireccion">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cotiEntregaTele">{{ 'Teléfono de contacto' }}</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiEntregaTele" class="an-form-control" name="cotiEntregaTele">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cotiEntregaEmail">{{ 'E-mail de contacto' }}</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiEntregaEmail" class="an-form-control"
                                    name="cotiEntregaEmail">
                            </div>
                        </div>
                        <div class="col-md-6 cotiEntregaFletera">
                            <label for="cotiEntregaFletera">{{ 'Fletera' }}</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i></i></div>
                                <input type="text" id="cotiEntregaFletera" class="an-form-control"
                                    name="cotiEntregaFletera">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="bannersCoti">
        <div class="an-single-component with-shadow h-100">
            <div class="an-component-header">
                <h5>Banners de cotizacion</h5>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div id="list-banners">
                        <div id="bnr1">
                            <span>Incluir promociones Meraki</span>
                            <input type="checkbox" name="brMeraki" id="brMeraki" data-name="meraki" class="chkMarca"> 
                        </div>
                        <div id="bnr2">
                            <span>Incluir promociones Verkada</span>
                            <input type="checkbox" name="brVerkada" id="brVerkada" data-name="verkada" class="chkMarca">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-6" id="comentariosdiv">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6>{{ 'Comentarios' }}</h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="an-input-group">
                        <label for="Comentarios">Comentarios:</label>
                        <div class="an-input-group">
                            <textarea id="Comentarios" class="an-form-control" placeholder="Comentarios ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="an-single-component">
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="submit" id="cancel" class="an-btn an-btn-danger" name="cancel"
                                value="Cancelar">
                            <input type="submit" id="success" class="an-btn an-btn-primary" name="success"
                                value="Finalizar cotización">
                            <img id="cotizacionLg" hidden="hidden" height="18"
                                src="http://localhost:8000/assets/img/loading.gif" style="display: none;">
                        </div>
                    </div>
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
        <div id="item-product[Element]" class="item-product row">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-1">
                            <span class="item-id">{{ 'Element' }}</span>
                        </div>
                        <div class="col-md-4">
                            <div class="an-input-group">
                                <select id="itemCodigo[Element]" name="itemCodigo[Element]"
                                    class="itemCodigo an-form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="an-input-group">
                                <textarea name="itemName[Element]" id="itemName[Element]"
                                    class="itemName an-form-control" cols="30" rows="10" maxlength="255"></textarea>
                                <!--<input type="text" id="itemName[Element]" name="itemName[Element]" class="itemName an-form-control" maxlength="255">-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="an-input-group">
                                <input type="text" id="itemPlista[Element]" name="itemPlista[Element]"
                                    class="itemPlista an-form-control dinero" maxlength="255">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="an-input-group">
                                <span id="itemMoneda[Element]" name="itemMoneda[Element]"
                                    class="itemMoneda ">{{ $monedas[0]->ISOCurrCod }}</span>
                            </div>
                        </div>

                        <div class="col-md-2 text-center">
                            <div class="an-input-group">
                                <span id="itemPVenta[Element]" name="itemPVenta[Element]"
                                    class="itemPVenta dinero"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="an-input-group">
                                <input type="number" id="itemCantidad[Element]" name="itemCantidad[Element]"
                                    class="itemCantidad an-form-control" value="1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="an-input-group">
                                <select id="itemFactor[Element]" name="itemFactor[Element]"
                                    class="itemFactor an-form-control">
                                    <option selected="selected">16</option>
                                    <option>0</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 text-right">
                            <div class="an-input-group">
                                <span id="itemImporteS[Element]" name="itemImporteS[Element]"
                                    class="itemImporteS"></span><i class="moneda"></i>
                            </div>
                        </div>
                        <div class="col-md-1 itemClose">
                            <span>
                                <i id="itemClose[Element]" class="ion-android-close"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-1 text-right">
                            <label>UMV: </label>
                        </div>
                        <div class="col-md-2">
                            <div class="an-input-group">
                                <select id="itemUMV[Element]" name="itemUMV[Element]" class="itemUMV an-form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 text-right">
                            <label>Entrega: </label>
                        </div>
                        <div class="col-md-3">
                            <div class="an-input-group">
                                <input type="text" id="itemEntrega[Element]" name="itemEntrega[Element]"
                                    class="itemEntrega an-form-control" maxlength="255">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="an-input-group">
                                <label>Marca: </label>
                                <span id="itemMarca[Element]" name="itemMarca[Element]"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <label>Descuentos a otorgar [%]: </label>
                        </div>
                        <div class="col-md-2">
                            <div class="an-input-group">
                                <input type="number" id="itemDesc[Element]" name="itemDesc[Element]"
                                    class="itemDesc an-form-control" maxlength="255">
                            </div>
                        </div>

                        <div class="col-md-3 text-right">
                            <span>Total sin IVA: </span>
                        </div>
                        <div class="col-md-2">
                            <span id="itemPrecioC[Element]"></span>
                        </div>
                        <div class="col-md-3">
                            <div class="an-input-group">

                                <label>Utilidad: </label>
                                <span id="itemUtilidad[Element]" name="itemUtilidad[Element]"
                                    class="itemUtilidad"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            <label>Comentario (250 Max.): </label>
                        </div>
                        <div class="col-md-8">
                            <div class="an-input-group">
                                <input type="text" id="itemComentario[Element]" name="itemComentario[Element]"
                                    class="itemComentario an-form-control" maxlength="255">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-1 d-none">
                            <span>Descuento otorgado: </span>
                            <span id="itemDescOto[Element]"></span>
                        </div>
                        <div class="col-md-5">
                            <div class="an-input-group">
                                <label>CostoPr: </label>
                                <span id="itemCosto[Element]" name="itemCosto[Element]" class="itemCosto"></span>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <span>Importe Total: </span>
                            <span id="itemImporteT[Element]" class="itemImporteT"><b></b></span><i class="moneda"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <th>
                                <td colspan="10" class="qSubSec" style="color:#3e631a">
                                    Existencia por almacén (Total <span id="itemExistenciasAl[Element]">0</span>)
                                </td>
                                </th>
                            </thead>
                            <tbody>

                                <tr style="color:#3e631a" id="itemNameExitT[Element]">
                                </tr>
                                <tr style="color:#3e631a" id="itemValueExitT[Element]">
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <th>
                                <td colspan="10" class="qSubSec" style="color:#a50000">
                                    Pendiente por recibir en almacén (Total <span id="itemOnOrderAl[Element]">0</span>)
                                </td>
                                </th>
                            </thead>
                            <tbody>

                                <tr style="color:#a50000" id="itemNameOrderT[Element]">
                                </tr>
                                <tr style="color:#a50000" id="itemValueOrderT[Element]">
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Fin producto -->

<div id="cliDetallediv" style="display:none;">
    <div class="row" id="cliDetalle">

        <div class="col-md-4">
            <label for="CardName">{{ 'Nombre' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="CardName" class="an-form-control CardName" name="CardName" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="CardCode">{{ 'Código' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="CardCode" class="an-form-control" name="CardCode" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="LicTradNum">{{ 'RFC' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="LicTradNum" class="an-form-control" name="LicTradNum" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="Phone1">{{ 'Teléfono' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="Phone1" class="an-form-control" name="Phone1" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="E_Mail">{{ 'E-mail' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="E_Mail" class="an-form-control" name="E_Mail" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="IntrntSite">{{ 'Website' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="IntrntSite" class="an-form-control" name="IntrntSite" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="">{{ 'Tipo de persona' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="" class="an-form-control" name="" readonly="true">
            </div>
        </div>

        <div class="col-md-12">
            <h6><b>{{ 'Persona de contacto' }}</b></h6>
        </div>

        <div class="col-md-4">
            <label for="cpName">{{ 'Nombre' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="cpName" class="an-form-control" name="cpName" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="cpPhone">{{ 'Teléfono' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="cpPhone" class="an-form-control" name="cpPhone" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="cpEmail">{{ 'E-mail' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="cpEmail" class="an-form-control" name="cpEmail" readonly="true">
            </div>
        </div>

        <div class="col-md-12">
            <h6><b>{{ 'Dirección fiscal' }}</b></h6>
        </div>

        <div class="col-md-4">
            <label for="fStreet">{{ 'Calle y número' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="fStreet" class="an-form-control" name="fStreet" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="fCol">{{ 'Colonia' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="fCol" class="an-form-control" name="fCol" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="fCity">{{ 'Ciudad' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="fCity" class="an-form-control" name="fCity" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="fCity2">{{ 'Municipio / Delegación' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="fCity2" class="an-form-control" name="fCity2" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="fState">{{ 'Estado' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="fState" class="an-form-control" name="fState" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="fCountry">{{ 'País' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="fCountry" class="an-form-control" name="fCountry" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="fZip">{{ 'Código postal' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="fZip" class="an-form-control" name="fZip" readonly="true">
            </div>
        </div>

        <div class="col-md-12">
            <h6><b>{{ 'Dirección de envío' }}</b></h6>
        </div>

        <div class="col-md-4">
            <label for="eStreet">{{ 'Calle y número' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="eStreet" class="an-form-control" name="eStreet" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="eCol">{{ 'Colonia' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="eCol" class="an-form-control" name="eCol" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="eCity">{{ 'Ciudad' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="eCity" class="an-form-control" name="eCity" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="eCity2">{{ 'Municipio / Delegación' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="eCity2" class="an-form-control" name="eCity2" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="eState">{{ 'Estado' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="eState" class="an-form-control" name="eState" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="eCountry">{{ 'País' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="eCountry" class="an-form-control" name="eCountry" readonly="true">
            </div>
        </div>

        <div class="col-md-4">
            <label for="eZip">{{ 'Código postal' }}</label>
            <div class="an-input-group">
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="eZip" class="an-form-control" name="eZip" readonly="true">
            </div>
        </div>

    </div>

    <div class="row" id="democomp">
        <img id="imgformatoscoti" src="{{ asset('assets/img/formatoscoti/coti_comp.png') }}" width="600" heigth="500"
            alt="demo formato cotizacion" srcset="">
    </div>
    <div class="row" id="demoopc">
        <img id="imgformatoscoti" src="{{ asset('assets/img/formatoscoti/coti_opc.png') }}" width="600" heigth="500"
            alt="demo formato cotizacion" srcset="">
    </div>
    <div class="row" id="demosiva">
        <img id="imgformatoscoti" src="{{ asset('assets/img/formatoscoti/coti_siva.png') }}" width="600" heigth="500"
            alt="demo formato cotizacion" srcset="">
    </div>
</div>
</div>

<!-- Agregar nuevo registro -->
<div class="modal fade primary" id="addCotizacion" tabindex="-1" role="dialog" aria-labelledby="addCotizacion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="addCotizacionLabel">{{ 'Nueva cotización creada' }}</h4>
            </div>
            <div class="modal-body">
                <p>
                    {{ 'La cotización fue creada con exito con el siguiente numero de cotización' }}
                    <br>
                    <b>
                        <a id="pdfCoti" target="_blank" href="">
                            Cotización: <span id="numCotizacionResult"></span>
                        </a>
                    </b>
                    <br>
                    <i>Nota: Da clic en el número para ver el PDF.</i><span id="DescMayor"></span>
                </p>
            </div>
            <div class="modal-footer">
                <a href=""><button id="return-home" type="button" class="an-btn an-btn-danger"
                        data-dismiss="modal">{{ 'Regresar' }}</button></a>
                <a href="{{ URL::route('nueva-cotizacion') }}"><button id="new-Cotizacion" type="button"
                        class="an-btn an-btn-success">{{ 'Nueva cotización' }}</button></a>
            </div>
        </div>
    </div>
</div>

@section('scripts')

<script type="text/javascript">
var productos = 1;
var Resiltado;

$(document).ready(function() {

    /**************************
     * Cargar modulos visibles
     *************************/

    $.ajax({
        url: "{{ URL::route('getCotConfig') }}",
        type: 'post',
        data: {
            id: 1
        },
        success: function(result) {
            //obtiene el arreglo json cotc
            var cotc = JSON.parse(result.cots);

            //para utilizar parent como objeto json
            var parent = cotc[0];

            //
            console.log(parent[0].children);
            //                          posicion de arreglo, propiedad
            $.each(parent[0].children, function(key, value) {

                //alert( key + ": " + value[0].name + " : " + value[0].status );

                if (value[0].status == false) {
                    $("#" + value[0].name + "div").remove();
                } else {
                    $("#" + value[0].name + "div").show();
                }
            });

        }
    });

    /****************************************
     * Validar un solo checkbox seleccionado
     ***************************************/

     $("#list-banners").find('input[type="checkbox"]').on('change', function() {
        $("#list-banners").find('input[type="checkbox"]').not(this).prop('checked', false);
    });

    $('[data-toggle="detalleCliente"]').popover({

        html: true,
        container: 'body',
        trigger: 'focus',
        title: 'Información detallada',
        content: $('#cliDetalle').html()

    });

    $('[data-toggle="formatorescomp"]').popover({

        html: true,
        container: 'body',
        trigger: 'focus',
        title: 'Formato: ' /*$("#formatoCoti option:selected").text() */,
        content: $('#democomp').html()

    });

    $('[data-toggle="formatoresopc"]').popover({

    html: true,
    container: 'body',
    trigger: 'focus',
    title: 'Formato: ' /*$("#formatoCoti option:selected").text() */,
    content: $('#demoopc').html()

    });

    $('[data-toggle="formatoressiva"]').popover({

    html: true,
    container: 'body',
    trigger: 'focus',
    title: 'Formato: ' /*$("#formatoCoti option:selected").text() */,
    content: $('#demosiva').html()

    });

    $("#formatoCoti").on('change', function() {
        
        switch ($(this).val()) {
            case "comp":
                $("#formatorescomp").show();
                $("#formatoresopc").hide();
                $("#formatoressiva").hide();
                break;
            case "opc":
                $("#formatorescomp").hide();
                $("#formatoresopc").show();
                $("#formatoressiva").hide();
                break;
            case "siva":
                $("#formatorescomp").hide();
                $("#formatoresopc").hide();
                $("#formatoressiva").show();
                break;
        
            default:
                break;
        }
    });

    $('[data-toggle="detalleCliente"]').click(function() {
        console.log($("#" + $(this).attr("aria-describedby")).find(".popover-content").html($(
            '#cliDetalle').clone()));
    });

    $('#clienteCodigo').select2({

        ajax: {
            url: "{{ URL::route('getCliente') }}",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Introduzca el cliente ...',
        minimumInputLength: 3,
        language: 'es'

    });

    $('#clienteCodigo').on('select2:select', function(e) {

        var data = e.params.data;

        $("#clienteLg").show();

        $.ajax({
            method: 'GET',
            url: "{{ URL::route('getClienteData') }}",
            data: {
                q: data.id
            },
            success: function(result) {
                console.log("Cargando datos clienteData");
                console.log(result);
                if (result.length > 0) {

                    
                    if(result[0][0].isSAP == 'Y'){

                        // Si es sap mostrar la lista de personas de contacto de esas personas
                        

                    }

                    // Para llenar info del cliente
                    $.each(result, function(inx, arrx) {
                        $.each(arrx[0], function(index, value) {
                            $("#" + index).val(value);
                            $("#" + index).addClass("not-null ok");
                            $("#" + index).siblings(".an-input-group-addon")
                                .find("i").addClass(
                                    "ion-ios-checkmark-outline");
                            $("." + index).val(value);
                            $("." + index).addClass("not-null ok");
                            $("." + index).siblings(".an-input-group-addon")
                                .find("i").addClass(
                                    "ion-ios-checkmark-outline");
                        })
                    });
                }
                //  $('.dinero').unmask().mask('000,000,000,000,000.00', {reverse: true});
                $("#clienteLg").hide();
                $("#createProduct").removeClass('disabled');
            },
            error: function(result) {
                console.log(result);
                $("#clienteLg").hide();
            }
        });

    });
    //var rol= {{ URL::route('dashboard') }};

    function showCntctPerson(){

        

    }


    $('[data-toggle="tooltip"]').tooltip();

    /**** Agregar Producto ****/

    $("#createProduct").click(function() {

        if (!validarCotizacionCliente())
            return;

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
            calculoTotalCotizacion();
        });

        /**** Buscar Productos ****/

        $('#itemCodigo\\[' + producIni + '\\]').select2({
            width: "100%",
            ajax: {
                url: "{{ URL::route('getArticuloAll') }}",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            placeholder: 'Artículo #' + producIni,
            minimumInputLength: 3,
            language: 'es'
        });

        /**** Buscar detalles del producto ****/

        $('#itemCodigo\\[' + producIni + '\\]').on('select2:select', function(e) {

            var data = e.params.data;
            console.log("Var e");
            console.log(e);

            $.ajax({
                method: 'GET',
                url: "{{ URL::route('getArticuloData') }}",
                data: {
                    q: data.code
                },
                success: function(result) {
                    console.log(result);
                    var productItem = producIni;
                    var modenaLabel = $("#modenaGeneral option:selected").text()

                    //
                    //$('#itemCodigo\\[' + producIni + '\\]').val(result[0].ItemCode);
                    $('#itemName\\[' + producIni + '\\]').val(result[0].ItemName);
                    $('#itemPlista\\[' + producIni + '\\]').val(result[0].Price == ".00" ?
                        result[0].LastPurPrc : result[0].Price);

                    //var Currency = new Option(result[0].Currency, result[0].Currency, false, false);
                    //$('#itemMoneda\\[' + producIni + '\\]' ).append(Currency).trigger('change');

                    $('#itemPVenta\\[' + productItem + '\\]').html(result[0].Price);
                    $('#itemImporteS\\[' + productItem + '\\]').text('');

                    var UMV = new Option(result[0].SalUnitMsr, result[0].SalUnitMsr, false,
                        false);
                    $('#itemUMV\\[' + productItem + '\\]').append(UMV).trigger('change');

                    $('#itemCosto\\[' + productItem + '\\]').text(result[0].LastPurPrc +
                        ' ' + result[0].LastPurCur);

                    //sap / nosap
                    if (result[0].LastPurPrc == null || result[0].LastPurPrc == "") {
                        $('#itemCosto\\[' + productItem + '\\]').text(result[0].Price +
                            ' ' + result[0].LastPurCur);
                    }

                    $('#itemMarca\\[' + productItem + '\\]').html(result[0].FirmName);


                    if (result[0].LastPurCur == "{{$monedas[1]->ISOCurrCod ?? '0'}}" &&
                        modenaLabel == "{{$monedas[0]->ISOCurrCod ?? '0'}}") {
                        calculoProdLoadUSDtoMXN(productItem);
                    } else if ((result[0].LastPurCur ==
                            "{{$monedas[0]->ISOCurrCod ?? '0'}}" || result[0].LastPurCur ==
                            "MXP") && modenaLabel == "{{$monedas[1]->ISOCurrCod ?? '0'}}") {
                        calculoProdLoadMXNtoUSD(productItem);
                    }

                    calculoCotizacion(productItem);
                    calculoTotalCotizacion();
                },
                error: function(result) {
                    console.log(result);
                }
            });

            $.ajax({
                method: 'GET',
                url: "{{ URL::route('getStock') }}",
                data: {
                    q: data.id
                },
                success: function(result) {
                    var Names = '';
                    var values = '';
                    var totalValues = 0;

                    var valueso = '';
                    var totalValueso = 0;

                    $.each(result, function(index, value) {
                        Names += "<td>" + value.WhsName.substring(0, 3) + "</td>";

                        values += "<td>" + Number(value.OnHand).toFixed(0) +
                        "</td>";
                        totalValues += Number(Number(value.OnHand).toFixed(0));

                        valueso += "<td>" + Number(value.OnOrder).toFixed(0) +
                            "</td>";
                        totalValueso += Number(Number(value.OnOrder).toFixed(0));
                    });

                    $('#itemExistenciasAl\\[' + producIni + '\\]').text(totalValues);
                    $('#itemNameExitT\\[' + producIni + '\\]').html(Names);
                    $('#itemValueExitT\\[' + producIni + '\\]').html(values);

                    $('#itemOnOrderAl\\[' + producIni + '\\]').text(totalValueso);
                    $('#itemNameOrderT\\[' + producIni + '\\]').html(Names);
                    $('#itemValueOrderT\\[' + producIni + '\\]').html(valueso);
                },
                error: function() {

                }
            });

        });

        /**** Calcular precio All ****/

        $('#itemCantidad\\[' + producIni + '\\], \
          #itemPlista\\[' + producIni + '\\], \
           #itemDesc\\[' + producIni + '\\], \
            #itemFactor\\[' + producIni + '\\]').change(function() {

            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        $('#modenaGeneral').change(function() {
            calculoTipoCambioMG(producIni);
            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        /**** Iniciar factor ****/

        $('#itemFactor\\[' + producIni + '\\]').select2();


        /**** Iniciar UMV ****/

        $('#itemUMV\\[' + producIni + '\\]').select2();

    }

    function calculoTipoCambioMG(prod) {
        var productItem = prod;
        var monedaLabel = $("#modenaGeneral option:selected").text();
        var tc = $("#tipodecambio").val();

        //si la moneda seleccionada es igual a mxn multiplica el total (que se toma como usd) por el tipo de cambio, si es usd multiplica el total (se toma como en mxn) por el tipo de cambio
        if (monedaLabel == "{{ $monedas[0]->ISOCurrCod }}") {
            $('#itemPlista\\[' + productItem + '\\]').val(Number($('#itemPlista\\[' + productItem + '\\]')
            .val() * Number(tc)).toFixed(2));
        } else {
            $('#itemPlista\\[' + productItem + '\\]').val(Number($('#itemPlista\\[' + productItem + '\\]')
            .val() / Number(tc)).toFixed(2));
        }
    }

    function calculoProdLoadUSDtoMXN(prod) {
        var productItem = prod;
        var monedaLabel = $("#modenaGeneral option:selected").text();
        var tc = $("#tipodecambio").val();
        var totalconv = 0;

        totalconv = $('#itemPlista\\[' + productItem + '\\]').val() * Number(tc);

        $('#itemPrecioC\\[' + productItem + '\\]').html(totalconv.toFixed(2));
        $('#itemPlista\\[' + productItem + '\\]').val(totalconv.toFixed(2));
        $('#itemPVenta\\[' + productItem + '\\]').html(totalconv.toFixed(2));
    }

    function calculoProdLoadMXNtoUSD(prod) {
        var productItem = prod;
        var monedaLabel = $("#modenaGeneral option:selected").text();
        var tc = $("#tipodecambio").val();
        var totalconv = 0;

        totalconv = $('#itemPlista\\[' + productItem + '\\]').val() / Number(tc);

        $('#itemPrecioC\\[' + productItem + '\\]').html(totalconv.toFixed(2));
        $('#itemPlista\\[' + productItem + '\\]').val(totalconv.toFixed(2));
        $('#itemPVenta\\[' + productItem + '\\]').html(totalconv.toFixed(2));
    }

    function calculoCotizacion(prod) {
        var productItem = prod;
        var monedaLabel = $("#modenaGeneral option:selected").text();

        $('#itemMoneda\\[' + productItem + '\\]').text(monedaLabel);

        console.log(productItem);

        var cantidad = $('#itemCantidad\\[' + productItem + '\\]').val();
        var precioLista = $('#itemPlista\\[' + productItem + '\\]').val();
        var itemPVenta = $('#itemPVenta\\[' + productItem + '\\]').text();
        var factor = $('#itemFactor\\[' + productItem + '\\]').val();
        var costo = $('#itemCosto\\[' + productItem + '\\]').text();
        var descuento = $('#itemDesc\\[' + productItem + '\\]').val();

        console.log("Intem [ " + productItem + " ) : " + cantidad);
        console.log("Intem [ " + productItem + " ) : " + precioLista);
        console.log("Intem [ " + productItem + " ) : " + itemPVenta);
        console.log("Intem [ " + productItem + " ) : " + factor);
        console.log("Intem [ " + productItem + " ) : " + costo);
        console.log("Intem [ " + productItem + " ) : " + descuento);

        $('#itemDescOto\\[' + productItem + '\\]').text(descuento + '%');

        itemPVenta = Number(parseFloat(Number(precioLista) - Number(descuento * precioLista / 100))).toFixed(2);

        $('#itemPrecioC\\[' + productItem + '\\]').text(Number(itemPVenta * cantidad).toFixed(2));


        $('#itemUtilidad\\[' + productItem + '\\]').text(
            Number((itemPVenta * 100 / costo.substr(0, costo.length - 4) - 100).toFixed(2)) + '%');

        $('#itemPVenta\\[' + productItem + '\\]').text(Number(itemPVenta).toFixed(2));

        var precioCantidad = (itemPVenta * cantidad) + (((itemPVenta * cantidad) * factor) / 100);


        $('#itemImporteS\\[' + productItem + '\\]').text(Number(precioCantidad).toFixed(2));

        $('#itemImporteT\\[' + productItem + '\\] b').text(Number(precioCantidad).toFixed(2));
    }

    function calculoTotalCotizacion() {

        var antesSubTotalCoti = 0;

        $("#contenerdor-products").find(".item-product .itemImporteT b").each(function() {
            antesSubTotalCoti += Number($(this).text());
        }).promise().done(function() {

            var totalCotiIva = Number(antesSubTotalCoti) / 1.16 * .16;

            $("#totalCotiIva").text(Number(totalCotiIva).toFixed(2));
            $("#totalCoti").text(Number(antesSubTotalCoti).toFixed(2));

        });

        $(".moneda").text($("#modenaGeneral option:selected").text());
    }

    function calculoTotalCotizacionComentario() {
        var totalComentario = 0;

        $("[id^='item-product']").each(function(index, element) {
            //si esta definido el input itemComment[i] entra a este if
            if ($(this).find("[name^='itemComment']").length) {
                $(this).find("[id^='subtotalComentario']").text(Number(totalComentario).toFixed(2));
                totalComentario = 0;
            } else {
                totalComentario += Number($(this).find("[id^='itemImporteT'] b").text());
            }
        });
    }

    $('#notes').on('select2:select', function(e) {
        var data = e.params.data;
        console.log(data.id);
        $.ajax({
            @if(session('domain') == 'gruposim.com')
            url: '{{ URL::route("getNotasNosapData") }}',
            @else
            url: '{{ URL::route("getNotasData") }}',
            @endif
            type: 'get',
            data: {
                q: data.id
            },
            success: function(result) {
                $("#notas-condiciones").html(result[0].U_conditions);
            },
            error: function() {

            }
        });
    });

    $('#tipo-entrega').on('select2:select', function(e) {
        var data = e.params.data;

        console.log(data.id);

        $(".form-entrega").css({
            'display': 'block'
        });

        switch (data.id) {
            case '1':
                $("label[for='cotiEntregaDireccion']").text('Dirección de sucursal');
                $(".cotiEntregaFletera").css({
                    'display': 'none'
                });
                break;
            case '2':
                $("label[for='cotiEntregaDireccion']").text('Dirección de entrega');
                $(".cotiEntregaFletera").css({
                    'display': 'none'
                });
                break;
            case '3':
                $("label[for='cotiEntregaDireccion']").text('Dirección de entrega');
                $(".cotiEntregaFletera").css({
                    'display': 'none'
                });
                break;
            case '4':
                $("label[for='cotiEntregaDireccion']").text('Dirección de entrega');
                $(".cotiEntregaFletera").css({
                    'display': 'block'
                });
                break;
        }

    });

    $("#descCotiInput, #descIVACotiInput").change(function() {
        calculoTotalCotizacion();
    });


    /**** Guardar cotizacion ****/

    $("#success").click(function() {
        //console.log(getbanners());

        if (!validarCotizacionCliente())
            return;

        if (!validarCotizacionArticulos())
            return;

        $("#cotizacionLg").show();

        $.ajax({
            type: 'post',
            url: '{{ URL::route("sendCotizacion") }}',
            data: {
                datosCotizacion: obtenerDatosCotizacion(),
                obtenerDatosArticulos: obtenerDatosArticulos(),
                especificaciones: $("#speci").val(),
                tipodecambio: $("#tipodecambio").val(),
                formato: $("#formatoCoti").val(),
            },
            success: function(result) {
                $("#addCotizacion").modal("show");
                $("#pdfCoti").attr('href', "/dashboard/cotizaciones/pdf/" + result
                    .numCotizacionMD5);
                $("#numCotizacionResult").text(result.numCotizacionMD5);
                $("#cotizacionLg").hide();

            },
            error: function() {
                console.log("Error");
                $("#cotizacionLg").hide();
            }
        });

    });

    $('#addCotizacion').on('hidden.bs.modal', function() {
        window.location.href = "/dashboard/cotizaciones/nueva-cotizacion/show/" + $(
            "#numCotizacionResult").html();
    });

    function getbanners(){

        var arrBanners = new Array();

        console.log($("[id^='bnr']").length)

        $("[id^='bnr']").each(function(index,element){
            
            //var chkx = $(this).find("input:checkbox").attr("data-name");

            //console.log();

            var nombre = $(this).find("input").attr("data-name");

            arrBanners.push({
                name: nombre,
                checked: $(this).find("input").prop("checked")
            });

        });


        return arrBanners;

    }

    function obtenerDatosCotizacion() {

        datos = {
            nombreCliente: $("#CardName2").val(),
            totalMXN: $("#totalCoti").text(),
            totalUSD: $("#totalCoti").text(),
            total: $("#totalCoti").text(),
            comentarios: $("#Comentarios").val(),
            tc: '0',
            numCliente: $("#clienteCodigo").val(),
            account: $("#accounts").val(),
            notasCotizacion: $("#notes").val(),
            fechaEntrega: '0000-00-00',
            Moneda: $("#modenaGeneral option:selected").text(),
            tipoEntrega: $("#tipo-entrega").val(),
            personaEntrega: $("#cotiEntregaPersona").val(),
            telefonoEntrega: $("#cotiEntregaTele").val(),
            correoEntrega: $("#cotiEntregaEmail").val(),
            direccionEntrega: $("#cotiEntregaDireccion").val(),
            fleteraEntrega: $("#cotiEntregaFletera").val(),
            language: $("#langCoti").val(),
            bannersConfig: JSON.stringify(getbanners())
        };
        console.log(datos);

        return datos;

    }

    function obtenerDatosArticulos() {
        var arrArticulos = new Array();

        $("[id^='item-product']").each(function(index, element) {
            arrArticulos.push({
                codigoArt: $(this).find("[name^='itemCodigo']").val(), // Codigo Articulo
                nombreArt: $(this).find("[name^='itemName']").val(), // Nombre del articulo
                cantidad: $(this).find("[name^='itemCantidad']").val(), // Cantidad
                moneda: $(this).find("[id^='itemMoneda']").text(), // Moneda
                precioLista: $(this).find("[name^='itemPlista']").val(), // P.Lista
                UMV: $(this).find("[name^='itemUMV']").val(), // UMV
                precioUnidad: $(this).find("[id^='itemPrecioC']")
            .text(), // Precio Unitario con descuento

                PrecioVenta: $(this).find("[id^='itemPVenta']").text(),
                importe: $(this).find("[id^='itemImporteS']").text(),
                marca: $(this).find("[id^='itemMarca']").text(),
                costo: $(this).find("[id^='itemCosto']").text(),
                desc: $(this).find("[id^='itemDesc']").val(),
                utilidad: $(this).find("[id^='itemUtilidad']").text(),

                factor: $(this).find("[name^='itemFactor']").val(), // Factor  
                subTotalLinea: $(this).find("[id^='itemImporteT'] b").text(),
                almacen: '0',
                tiempoEntrega: $(this).find("[name^='itemEntrega']").val(),
                observaciones: $(this).find("[name^='itemComentario']").val()
            });
        });

        arrArticulos.pop();

        console.log(arrArticulos);

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

            if ($(this).find("[name^='itemCodigo']").val() == null) {
                toastr["error"]("Código de Articulo [" + articulo + "]", "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemName']").val() == "") {
                toastr["error"]("Nombre de Articulo [" + articulo + "]", "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemCantidad']").val() == "") {
                toastr["error"]("Cantidad de Articulos [" + articulo + "]", "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemPlista']").val() == "") {
                toastr["error"]("Precio de lista [" + articulo + "]", "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemUMV']").val() == null) {
                toastr["error"]("Unidad de medida [" + articulo + "]", "Campo requerido * ");
                status = false;
            }

        });

        if ($("#descIVACotiInput").val() == "") {
            toastr["error"]("IVA de la cotizacion", "Campo requerido * ");
            $("#descIVACotiInput").focus()
            status = false;
        }

        if ($("#formatoCoti").val() == "") {
            toastr["error"]("Formato de la cotización", "Campo requerido * ");
            $("#formatoCoti").focus()
            status = false;
        }

        /*if($("#notes").val() == null || $("#notes").val() == ""){
          toastr["error"]("Notas comerciales de la cotizacion", "Campo requerido * ");
          status = false;
        }*/
        /*
        if($("#accounts").val() == null){
          toastr["error"]("Cuenta de pago de la cotizacion", "Campo requerido * ");
          status = false;
        }
        
        if($("#tipo-entrega").val() == null){
          toastr["error"]("Información de entrega de la cotizacion", "Campo requerido * ");
          status = false;
        }*/


        return status;
    }


    /**** Inicia Moneda General ****/

    $('#modenaGeneral').select2({
        placeholder: 'Selecciona ...'
    });

    $('#formatoCoti').select2({
        placeholder: 'Selecciona ...'
    });

    /**** Iniciar cuentas de pago  ****/

    $('#accounts').select2({
        placeholder: 'Selecciona ...'
    });

    /*** Iniciar Notas comerciales ***/

    $("#notes").select2({
        placeholder: 'Selecciona ...'
    });

    /*** Tipo de entrega ***/

    $("#tipo-entrega").select2({
        placeholder: 'Selecciona ...'
    });

    $("#descIVACotiInput").select2();

    $("#speci").select2({
        placeholder: "Selecciona las especificaciones",
        width: 'resolve'
    });

});
</script>


@endsection