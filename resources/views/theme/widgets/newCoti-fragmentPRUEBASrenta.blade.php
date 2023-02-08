<style>
table {
    font-family: Arial, Helvetica, sans-serif;
}

table {
    width: 100%;
}

table tr td {
    vertical-align: top;
}

#detalle tr:nth-child(even) {
    background: #EFECEB;
}

#detalle tr:last-child {
    background: white !important;
}

#detalle th,
.table-general th {
    border-bottom: 2px solid #EFECEB;
}

#detalle tr td {
    vertical-align: middle;
}

.toggle.ios,
.toggle-on.ios,
.toggle-off.ios {
    border-radius: 20px;
    padding: ;
}

.toggle.ios .toggle-handle {
    border-radius: 20px;
}

.text-right{
  text-align: right;
}
.text-left{
  text-align: left;
}
</style>
<div class="row">
    <div class="col-md-3">
        <input type="hidden" id="maxdescsession" value="{{ $maxdesc }}">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6><b>{{ 'Datos del cliente' }}</b></h6>
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
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6><b>{{ 'Información de crédito' }}</b></h6>
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

<div class="row">
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
                <div class="row" style="padding-top:15px;">

                
                    <div class="col-md-2" style="border-right:1px solid #adadad; height:100%;padding: 15px;">
                        <h6>{{ 'Equipo propuesto' }}</h6>
                    </div>
                    <div class="col-md-3" style="border-right:1px solid #adadad; height:100%;">
                        <div class="an-input-group" style="padding: 15px 0;">
                            <div class="col-md-12">
                                <span>{{ 'Mensualidad' }}</span>
                                <select id="mesesRenta" name="mesesRenta" class="an-form-control"
                                    style="padding: 0px 0px 0px 3px">
                                    <option>12</option>
                                    <option>24</option>
                                    <option>36</option>
                                    <option>48</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="border-right:1px solid #adadad; height:100%;">
                        <div class="an-input-group" style="padding: 15px 0;">
                            <div class="col-md-12">
                                <span>{{ 'Tipo de Cambio' }}:</span>
                                <input type="text" id="tipodecambio" class="tipodecambio an-form-control"
                                    value="{{ $monedas[1]->Rate ?? '0' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="an-input-group" style="padding: 15px 0;">
                            <div class="col-md-12">
                                <span>{{ 'Selecciona moneda' }}:</span>
                                <select id="modenaGeneral" class="an-form-control">
                                    @foreach($monedas as $moneda)
                                    <option value="{{ $moneda->Rate }}">{{ $moneda->ISOCurrCod }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                    <div class="row">

                        <div class="col-md-9">

                        </div>
                        <div class="col-md-3">
                            <div class="row">

                            </div>
                        </div>

                    </div>
                    <div class="row menu-product">
                        <div class="col-md-1">
                            <span>{{ '#' }}<br><br></span>
                        </div>
                        <div class="col-md-2">
                            <span>{{ 'Cantidad' }}<br></span>
                        </div>
                        <div class="col-md-4">
                            <span>{{ 'Descripcion del equipo' }}<br></span>
                        </div>
                        <div class="col-md-2">
                            <span>{{ 'Costo de Renta (mensual)' }}<br></span>
                        </div>
                        <div class="col-md-2">
                            <span>{{ 'Costo Inicial' }}<br></span>
                        </div>
                        <div class="col-md-1">
                            <span>{{ '' }}<br></span>
                        </div>
                    </div>

                    <div id="contenerdor-products">

                    </div>

                </div>
            </div>

            <div class="an-component-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <div class="an-helper-block">
                            <button id="createProduct" class="btn btn-success block-icon disabled"> <i
                                    class="ion-plus-round"></i>Agregar artículo</button>
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
                <div class="col-md-4">
                    <h6><b>{{ 'Condiciones Comerciales' }}</b></h6>
                </div>
                <!--<div class="col-md-4">
              <div class="col-md-6 text-right">
                <span> {{ 'Tipo de Cambio' }} :</span>
              </div>
              <div class="col-md-6"> 
                <input type="text" id="tipodecambio" class="tipodecambio an-form-control" value="{{ $monedas[1]->Rate ?? '0' }}">
              </div>
          </div>
          <div class="col-md-5">
            <div class="an-input-group">
              <div class="col-md-8 text-right">
                <span> {{ 'Selecciona moneda' }} :</span>
              </div>
              <div class="col-md-4"> 
                <select id="modenaGeneral" class="an-form-control">
                  @foreach($monedas as $moneda)
                    <option value="{{ $moneda->Rate }}">{{ $moneda->ISOCurrCod }}</option>
                  @endforeach
                </select>
              </div>
            </div>            
          </div>-->
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
                                    <h6>Moneda</h6>
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
                        <div class="col-md-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Monto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="contenerdor-products-renta"></div>


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
                                <button id="createProductRenta"
                                    class="an-btn an-btn-success block-icon disabled">Agregar fila</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
        <div class="an-single-component with-shadow h-100">
            <div class="an-component-header">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h6><b>{{ 'Primer Pago Mensual' }}</b></h6>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="tituloPago" name="tituloPago" class="an-form-control"
                                placeholder="Concepto del pago">
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>
                                        <h6>{{ 'Subtotal' }}</h6>
                                    </span>
                                </div>
                                <div class="col-md-6" style="justify-content: space-between;">
                                    <span>$</span><span id="subtotalPI"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>
                                        <h6>{{ 'IVA' }}</h6>
                                    </span>
                                    <div class="an-input-group">
                                        <select id="itemFactor" name="itemFactor" class="itemFactor an-form-control"
                                            style="padding: 0px 0px 0px 3px">
                                            <option selected="selected">16</option>
                                            <option>0</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    $<span id="ivaPI"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>
                                        <h6>{{ 'Total ' }}<span id="currencyPI"></span> {{ 'Pago inicial' }}</h6>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    $<span id="totalPI"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="an-single-component with-shadow h-100" >
            <div class="an-component-header text-right">
                <div class="col-md-5 text-left">
                    <h6><b>{{ 'Mensualidades Restantes Antes de IVA' }}</b></h6>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-4">
                    <input id="omitirmeses" name="omitirmeses" type="checkbox" data-size="mini" data-toggle="toggle"
                        data-style="ios" data-on=" " data-off=" "><span>Omitir en cotizacion</span>
                </div>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="detalle">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            Mensualidades antes de iva
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span id="mesesRNumber12">12</span>{{ ' meses' }}
                                        </td>
                                        <td>
                                            $<span id="totalmensualidad12"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span id="mesesRNumber24">24</span>{{ ' meses' }}
                                        </td>
                                        <td>
                                            $<span id="totalmensualidad24"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span id="mesesRNumber36">36</span>{{ ' meses' }}
                                        </td>
                                        <td>
                                            $<span id="totalmensualidad36"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span id="mesesRNumber48">48</span>{{ ' meses' }}
                                        </td>
                                        <td>
                                            $<span id="totalmensualidad48"></span>
                                        </td>
                                    </tr>
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
    <div class="col-md-6">
        <div class="an-single-component with-shadow totales" id="especificacionesdiv">
            <div class="an-component-header">
                <h6><b>{{ 'Especificaciones' }}</b></h6>
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
        <div class="an-single-component with-shadow totales">
            <div class="an-component-header">
                <h6><b>{{ 'Total de la cotización' }}</b></h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">

                    <div class="row">
                        <div class="col-md-8">
                            <span>{{ 'Total' }}:</span>
                        </div>
                        <div class="col-md-4">
                            <span id="totalCoti">NaN</span><i class="moneda"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6" id="polizadiv">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6><b>{{ 'Poliza' }}</b></h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-12">
                            <select name="policy" id="policy" class="an-form-control">
                                @foreach($policies as $policiesItem)
                                <option value="{{ $policiesItem->id }}">{{ $policiesItem->titulo }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6" id="notascomercialesdiv">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6><b>{{ 'Notas comerciales *' }}</b></h6>
            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <select id="notes" class="an-form-control">
                        <option value=""></option>
                        @foreach($notas as $nota)
                        <option value="{{ $nota->Code }}">{{ $nota->Name }}</option>
                        @endforeach
                    </select>
                    <p id="notas-condiciones"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="cuentapagodiv">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6><b>{{ 'Cuenta de pago *' }}</b></h6>
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


<div class="row">
    <div class="col-md-6" id="informacionentregadiv">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6><b>{{ 'Información de entrega' }}</b></h6>
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
    <div class="col-md-6" id="comentariosdiv">
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
                <h6><b>{{ 'Comentarios' }}</b></h6>
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
                            <input type="submit" id="cancel" class="btn an-btn-danger" name="cancel" value="Cancelar">
                            <input type="submit" id="success" class="btn an-btn-primary" name="success"
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
    <!-- Fin producto -->

    <div id="product-base-renta">
        <div class="an-helper-block">
            <div id="item-renta[Element]" class="item-renta row">
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
                                name="itemDescripcion[Element]" placeholder="Ingresa la descripcion del articulo"></textarea>
                        </div>
                        <div class="col-md-1">
                            <input type="text" class="an-form-control" id="itemNoParte[Element]"
                                name="itemNoParte[Element]" style="padding:0px 0px 0px 3px;">
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="an-form-control" id="itemCantidad[Element]"
                                name="itemCantidad[Element]" style="padding:0px 0px 0px 3px;">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="an-form-control" id="itemPUnitario[Element]"
                                name="itemPUnitario[Element]">
                        </div>
                        <div class="col-md-1">
                            <span id="itemMoneda[Element]" name="itemMoneda[Element]"
                                class="itemMoneda ">{{ $monedas[0]->ISOCurrCod }}</span>
                        </div>
                        <div class="col-md-1">
                            <span id="itemSubtotal[Element]" name="itemSubtotal[Element]"></span><i class="moneda"></i>
                        </div>
                        <div class="col-md-1">
                            <span id="itemMonto[Element]" name="itemMonto[Element]"></span><i class="moneda"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">

                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <span>Importe Total: </span>
                                <span id="itemImporteTR[Element]" class="itemImporteTR"><b></b></span><i
                                    class="moneda"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

</div>

<!-- Agregar nuevo registro -->
<div class="modal fade primary" id="addCotizacion" tabindex="-1" role="dialog" aria-labelledby="addCotizacion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">x</span></button>
                <h4 id="addCotizacionLabel">{{ 'Nueva cotización creada' }}</h4>
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
                <a href="{{ URL::route('dashboard') }}"><button id="return-home" type="button"
                        class="an-btn an-btn-danger" data-dismiss="modal">{{ 'Regresar' }}</button></a>
                <a href="{{ URL::route('nueva-cotizacion') }}"><button id="new-Cotizacion" type="button"
                        class="an-btn an-btn-success">{{ 'Nueva cotización' }}</button></a>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
var productos = 1;
var productosRenta = 1;
var Resiltado;

$(document).ready(function() {

    /********************
     * Cargar modulos visibles
     *********************/

    $.ajax({
        url: "{{ URL::route('getCotConfig') }}",
        type: 'post',
        data: {
            id: 2
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

    $('[data-toggle="detalleCliente"]').popover({

        html: true,
        container: 'body',
        trigger: 'focus',
        title: 'Información detallada',
        content: $('#cliDetalle').html()

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
                if (result.length > 0) {
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
                $("#createProductRenta").removeClass('disabled');
            },
            error: function(result) {
                console.log(result);
                $("#clienteLg").hide();
            }
        });

    });
    //var rol= {{ URL::route('dashboard') }};
    @if(session('domain') == 'gruposim.com')
    $("[id^='itemDesc']").on('input', function(e) {
        if ($(this).find("[id^='itemDesc']").val() > $("#maxdescsession").val()) {
            //toastr["error"]("Unidad de medida [" + articulo + "]", "Autorizacion necesaria para la cotizacion * ");
            //11status = false;
            alert('El descuento es mayor al autorizado, necesitara autorizacion la cotizacion');
            /*$("#DescMayor").text(" La cotizacion debera ser autorizada");
            $("#pdfCoti").addClass("btn disabled");*/
        }

    });
    @endif

    $('[data-toggle="tooltip"]').tooltip();

    /**** Agregar Producto ****/

    $("#createProduct").click(function() {
        if (!validarCotizacionCliente())
            return;

        $("#contenerdor-products").append($("#product-base").html().replace(/Element/g, productos));
        eventosEquipoProp(productos);

        productos++;

    });

    $("#createProductRenta").click(function() {
        //Si no se han agregado lineas a equipo no se puede agregar condiciones
        if (!validarEquipo()) {
            return;
        } else {
            addLineaCondiciones();
        }
    })

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

            /*asignamos valor de meses de renta*/
            $("#mesesRNumber").text($("#mesesRenta").val());
            console.log("Meses renta " + $("#mesesRenta").val());

            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        $("#mesesRenta").change(function() {
            cambiarMeses();
        });

        $('#modenaGeneral').change(function() {
            calculoTipoCambioMG(producIni);
            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        $('#itemPUnitario\\[' + producIni + '\\]').on('input', function() {

            $('#itemSubtotal\\[' + producIni + '\\]').text($(this).val());
            //console.log( $(this).val() );

            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        /**** Iniciar factor ****/

        $('#itemFactor\\[' + producIni + '\\]').select2();


        /**** Iniciar UMV ****/

        $('#itemUMV\\[' + producIni + '\\]').select2();

    }

    function cambiarMeses() {
        var productItemm = 2;

        $('#itemNoParte\\[' + productItemm + '\\]').val("R-" + $("#mesesRenta").val());

        calculoCotizacion(producIni);
        calculoTotalCotizacion();
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
            calculoTotalCotizacion();

            productos--;
        });

        /**** Recalcular total si hay algun cambio ****/

        /**** Cambio en la divisa ****/

        $('#modenaGeneral').change(function() {
            calculoTipoCambioMG(producIni);
            calculoCotizacion(producIni);
            calculoTotalCotizacion();
        });

        /****  ****/

        $('#itemCantidadProd\\[' + producIni + '\\], \
            #itemDesc\\[' + producIni + '\\], \
            #itemCostoRenta\\[' + producIni + '\\], \
            #itemCostoInicial\\[' + producIni + '\\]').on('change', function() {
            if (!(validarEquipo())) {
                //toastr["error"]("Código de cliente", "Campo requerido * ");
                return;
            } else {
                pagoInicial(producIni);
            }
        });
    }

    function calculoTipoCambioMG(prod) {

        //console.log("conversion tipo de cambio");
        var productItem = prod;
        var monedaLabel = $("#modenaGeneral option:selected").text();
        var tc = $("#tipodecambio").val();
        //console.log(productItem + " " + monedaLabel + " " + tc + " {{ $monedas[0]->ISOCurrCod }}");
        //si la moneda seleccionada es igual a mxn multiplica el total (que se toma como usd) por el tipo de cambio, si es usd multiplica el total (se toma como en mxn) por el tipo de cambio
        if (monedaLabel == "{{ $monedas[0]->ISOCurrCod }}") {
            var tot = Number($('#itemSubtotal\\[' + productItem + '\\]').text() * Number(tc)).toFixed(2);

            changePUnitario(productItem, tot);
            //console.log(tot)
        } else {
            var tot = Number($('#itemSubtotal\\[' + productItem + '\\]').text() / Number(tc)).toFixed(2);

            changePUnitario(productItem, tot);
            //console.log(tot)
        }
    }

    function changePUnitario(prod, total) {
        var productItem = prod;
        console.log("ChangePUNITARIO");
        $('#itemPUnitario\\[' + productItem + '\\]').val(total);
        $('#itemPUnitario\\[' + productItem + '\\]').addClass("disabledA");
        $('#itemPUnitario\\[' + productItem + '\\]').attr("disabled", true);
        $('#itemPUnitario\\[' + productItem + '\\]').attr("title",
            "Este valor cambia dependiendo el equipo propuesto");
        $('#itemSubtotal\\[' + productItem + '\\]').text(total);
        $('#itemMonto\\[' + productItem + '\\]').text(total);

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
        $('#itemNoParte\\[' + productItem + '\\]').val("P-I");
        $('#itemCantidad\\[' + productItem + '\\]').val("1");
        $('#itemClose\\[' + productItem + '\\]').attr("title", "No puedes eliminar esta linea");

        $('#itemDescripcion\\[' + productItemm + '\\]').val("Renta mensual");
        $('#itemNoParte\\[' + productItemm + '\\]').attr("placeholder", "No. Parte");
        $('#itemNoParte\\[' + productItemm + '\\]').val("R-" + $("#mesesRenta").val());
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
        $("#itemMonto\\[" + productItem + "\\]").text(Number(monto).toFixed(2));

        $('#itemImporteTR\\[' + productItem + '\\] b').text(Number(monto).toFixed(2));

    }

    function calculoMensualidades() {

        var totalRenta = $("#itemMonto\\[" + 2 + "\\]").text();
        console.log(totalRenta);
        $("#totalmensualidad12").text(Number(totalRenta).toFixed(2) * 11);
        $("#totalmensualidad24").text(Number(totalRenta).toFixed(2) * 23);
        $("#totalmensualidad36").text(Number(totalRenta).toFixed(2) * 35);
        $("#totalmensualidad48").text(Number(totalRenta).toFixed(2) * 47);
    }

    function calculoTotalCotizacion() {

        var antesSubTotalCoti = 0;

        $("#contenerdor-products-renta").find(".item-renta .itemImporteTR b").each(function() {
            antesSubTotalCoti += Number($(this).text());
        }).promise().done(function() {
            //asignamos el valor total de las filas de condiciones comerciales en subtotal 
            //para calcular el iva y poder calcular el total de la cotizacion

            //Se suma la columna de costo inicial mas la primer renta
            var montoPinicial = Number($("#itemMonto\\[" + 1 + "\\]").text());
            var montoPrimerRenta = Number($("#itemMonto\\[" + 2 + "\\]").text());

            $('#subtotalPI').text(Number(montoPinicial + montoPrimerRenta).toFixed(2) );

            var calcIVA = 0;
            var totalwoIVA = Number($('#subtotalPI').text()).toFixed(2);
            var factorIVA = $('#itemFactor').val();
            var totalCotizacion = 0;
            //calculamos el valor del iva
            calcIVA = totalwoIVA * (factorIVA / 100);

            //asignamos el valor del iva a su etiqueta
            $('#ivaPI').text(Number(calcIVA).toFixed(2));

            //Calcular el total del pago inicial con iva
            totalCotizacion = Number(totalwoIVA) + Number(calcIVA);

            //Calcular Mensualidades 
            calculoMensualidades();

            //Asignamos el valor a sus etiquetas
            $("#totalPI").text(Number(totalCotizacion).toFixed(2));
            $("#totalCoti").text(Number(totalCotizacion).toFixed(2));

        });
        //asignar la divisa a las etiquetas y a la cotizacion
        $(".moneda").text($("#modenaGeneral option:selected").text());
    }

    $('#notes').on('select2:select', function(e) {
        var data = e.params.data;
        console.log(data.id);
        $.ajax({
            url: '{{ URL::route("getNotasData") }}',
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

        if (!validarCotizacionCliente())
            return;

        if (!validarCotizacionArticulos())
            return;

        $("#cotizacionLg").show();

        console.log(obtenerDatosCotizacion());
        console.log(obtenerDatosEquipo());
        console.log(obtenerDatosCondiciones());

        $.ajax({
            type: 'post',
            url: '{{ URL::route("sendCotizacionPRUEBASrenta") }}',
            data: {
                datosCotizacion: obtenerDatosCotizacion(),
                obtenerDatosArticulos: obtenerDatosEquipo(),
                obtenerDatosCondiciones: obtenerDatosCondiciones(),
                especificaciones: $("#speci").val(),
                poliza: $('#policy').val(),
                tipodecambio: $("#tipodecambio").val()
            },
            success: function(result) {
                $("#addCotizacion").modal();
                $("#pdfCoti").attr('href', "/dashboard/cotizaciones/pdf2/" + result
                    .numCotizacionMD5);
                $("#numCotizacionResult").text(result.cotizacion[0].id);
                $("#cotizacionLg").hide();
                @if(session('domain') == 'gruposim.com')

                $.ajax({
                    type: 'post',
                    url: '{{ URL::route("sendmailaut") }}',
                    data: {
                        id: result.cotizacion[0].id,
                        creador: result.cotizacion[0].idVendedor,
                        msg: 'Se ha creado una nueva cotizacion con un descuento mayor al permitido.Para revisarla ingrese a https://account.cotisap.com/ o de click al boton siguiente:'
                    },
                    success: function(result1) {
                        console.log(result1);
                    },
                    error: function() {
                        console.log("Error");
                    }
                });

                @endif
            },
            error: function() {
                console.log("Error");
                $("#cotizacionLg").hide();
            }
        });

    });

    $('#addCotizacion').on('hidden.bs.modal', function() {
        location.reload();
    });

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
            conceptopago: $("#tituloPago").val(),
            mensualidad: $("#mesesRenta").val(),
            mesesrenta: $("#omitirmeses").val()
        };
        return datos;

    }

    function obtenerDatosEquipo() {
        var arrArticulos = new Array();

        $("[id^='item-product']").each(function(index, element) {
            arrArticulos.push({
                numLine: $(this).find(".item-id").text(), // Numero de line
                cantidad: $(this).find("[name^='itemCantidadProd']")
            .val(), // cantidad del articulo
                desc: $(this).find("[name^='itemDesc']")
            .val(), // articulo y especificaciones sin marca 
                costoRenta: $(this).find("[name^='itemCostoRenta']").val(),
                costoInicial: $(this).find("[name^='itemCostoInicial']").val()
            });
        });

        arrArticulos.pop();

        return arrArticulos;
    }

    function obtenerDatosCondiciones() {
        var arrArticulos = new Array();
        $("[id^='item-renta']").each(function(index, element) {
            arrArticulos.push({
                numLine: $(this).find(".item-id").text(), // Numero de line
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

        $("#contenerdor-products").find("[id^='item-product']").each(function(index, element) {
            console.log("Item Product")
            console.log($(this));
            
            var articulo = $(this).find(".item-id").text();

            if (($(this).find("[name^='itemCantidadProd']").val() == null || $(this).find(
                    "[name^='itemCantidadProd']").val() == "")) {

                $(this).find("[name^='itemCantidadProd']").focus();
                toastr["error"]("Cantidad de Equipo Propuesto [" + articulo + "]","Campo requerido * ");
                status = false;
            }

            if (($(this).find("[name^='itemDesc']").val() == null || $(this).find("[name^='itemDesc']")
                    .val() == "")) {
                
                        $(this).find("[name^='itemDesc']").focus();
                toastr["error"]("Descripcion de Equipo Propuesto [" + articulo + "]","Campo requerido * ");
                status = false;
            }

            if (($(this).find("[name^='itemCostoRenta']").val() == null || $(this).find(
                    "[name^='itemCostoRenta']").val() == "")) {
                
                        $(this).find("[name^='itemCostoRenta']").focus();
                toastr["error"]("Costo de Renta [" + articulo + "]","Campo requerido * ");
                status = false;
            }

            if (($(this).find("[name^='itemCostoInicial']").val() == null || $(this).find(
                    "[name^='itemCostoInicial']").val() == "")) {
                
                $(this).find("[name^='itemCostoInicial']").focus();
                toastr["error"]("Costo Inicial [" + articulo + "]","Campo requerido * ");
                status = false;
            }

            return status;
        });

        $("#contenerdor-products-renta").find("[id^='item-renta']").each(function(index, element) {

            console.log("Item Product renta")
            console.log($(this));

            var articulo = $(this).find(".item-id").text();

            if (articulo == 'Element')
                return;

            if ($(this).find("[name^='itemCantidadProd']").val() == "" || $(this).find(
                    "[name^='itemCantidadProd']").val() == null) {

                        $(this).find("[name^='itemCantidadProd']").focus();
                toastr["error"]("Cantidad de Equipo Propuesto [" + articulo + "]",
                "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemDesc']").val() == "" || $(this).find("[name^='itemDesc']")
                .val() == null) {
                    
                    $(this).find("[name^='itemDesc']").focus()
                toastr["error"]("Descripcion de Equipo Propuesto [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemDescripcion']").val() == "" || $(this).find(
                    "[name^='itemDescripcion']").val() == null) {

                        $(this).find("[name^='itemDescripcion']").focus()
                toastr["error"]("Descripcion de Condiciones Comerciales [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemNoParte']").val() == "" || $(this).find(
                    "[name^='itemNoParte']").val() == null) {

                        $(this).find("[name^='itemNoParte']").focus()
                toastr["error"]("No. de Parte de Condiciones Comerciales [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemCantidad']").val() == "" || $(this).find(
                    "[name^='itemCantidad']").val() == null) {

                        $(this).find("[name^='itemCantidad']").focus()
                toastr["error"]("Cantidad de Condiciones Comerciales [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            if ($(this).find("[name^='itemPUnitario']").val() == "" || $(this).find(
                    "[name^='itemPUnitario']").val() == null) {

                        $(this).find("[name^='itemPUnitario']").focus()
                toastr["error"]("Precio Unitario de Condiciones Comerciales [" + articulo + "]",
                    "Campo requerido * ");
                status = false;
            }

            return status;

        });



        if ($("#notes").val() == null || $("#notes").val() == "") {
            toastr["error"]("Notas comerciales de la cotizacion", "Campo requerido * ");
            status = false;
        }


        return status;
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

    /**** Inicia Moneda General ****/

    $('#modenaGeneral').select2({
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

    $("#policy").select2({
        placeholder: "Selecciona la poliza",
        width: 'resolve'
    });

});
</script>


@endsection