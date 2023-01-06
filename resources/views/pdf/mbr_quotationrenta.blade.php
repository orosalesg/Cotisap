<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Cotización | MBR HOSTING</title>
    <style type="text/css">
    *,
    table {
        font-family: Arial, Helvetica, sans-serif;
    }

    table {
        width: 100%;
    }

    table tr td {
        vertical-align: top;
    }

    /*INICIO DETALLE*/
    #detalle {
        font-size: 9px;
    }

    #detalle tr:nth-child(even) {
        background: #c5d9f1;
    }

    #detalle tr:last-child {
        background: white !important;
    }

    #detalle th,
    .table-general th {
        border-bottom: 2px solid #538dd5;
    }

    #detalle tr td {
        vertical-align: middle;
    }

    #equipoPropuesto {
        font-size: 9px;
        width: 40%;
    }

    #equipoPropuesto tr:nth-child(even) {
        background: #c5d9f1;
    }

    #equipoPropuesto tr:last-child {
        background: white !important;
    }

    #equipoPropuesto th,
    .table-general th {
        border-bottom: 2px solid #538dd5;
    }

    #equipoPropuesto tr td {
        vertical-align: middle;
    }

    .text1 {
        font-size: 10px;
    }

    .text2 {
        font-size: 8px;
    }

    .bg-azul {
        background: #c5d9f1;
    }

    .textcuentas {
        font-size: 9px;
    }

    .texttotales {
        font-size: 8px;
    }

    #folio {
        color: red;
        font-size: 14px;
    }

    #espacio {
        width: 35%;
    }

    /*INICIO DETALLE PAGO INICIAL*/
    #detallePagoInicial {
        font-size: 9px;
    }

    #detallePagoInicial tr:nth-child(even) {
        background: #c5d9f1;
    }

    #detallePagoInicial tr:last-child {
        background: white !important;
    }

    #detallePagoInicial th,
    .table-general th {
        border-bottom: 2px solid #538dd5;
    }

    #detallePagoInicial tr td {
        vertical-align: middle;
    }

    /*FIN DETALLE PAGO INICIAL*/

    #cuentas tr:nth-child(even) {
        background: #c5d9f1;
    }

    #cuentas tr:last-child {
        background: white !important;
    }

    #cuentas th,
    .table-general th {
        border-bottom: 2px solid #538dd5;
    }

    #cuentas tr td {
        vertical-align: middle;
    }

    /*Fin DETALLE*/
    body {
        background-image: url(http://localhost/cotisap/public/assets/img/background.jpg);
        background-size: 100px;
        background-repeat: no-repeat;
        background-position: bottom;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .contenedor {
        display: block;
    }
    </style>
</head>

<body>

    <table>
        <tr>
            <td>
                <img width="90" src="http://account.cotisap.com/assets/img/logo-mbr.png"><br><br>
                {{$data['Cliente'][0][0]->CardName}} <br>
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                <font size="1">
                    México, D. F. - {!! substr($data['Quotation']->updated_at, 0, 10) !!}
                </font>
            </td>
            <td colspan="2">
                <span id="folio">
                    Folio: {{$data['Quotation']->numCotizacion}}
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <p class="text1">
                    Atendiendo a su solicitud, pongo a su consideración la siguiente propuesta, la cual incluye las
                    características técnicas así como las condiciones comerciales de nuestra empresa.
                </p>
            </td>
        </tr>
    </table>

    <!-- Detalle de productos -->

    <table id="equipoPropuesto">
        <thead>
            <tr>
                <th>
                    Equipo Propuesto
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['Articles'] as $a)
            <tr>
                <td>
                    {{$a['cantidad']}} x {{$a['descripcion']}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table id="detalle">
        <thead>
            <tr>
                <th colspan="5">Condiciones Comerciales</th>
            </tr>
            <tr>
                <th>
                    Descripcion
                </th>
                <th>
                    No. Parte
                </th>
                <th>
                    Cantidad
                </th>
                <th>
                    P. Unitario
                </th>
                <th>
                    Subtotal
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['Condiciones'] as $cc)
            <tr>
                <td>
                    {{$cc['descripcion']}}
                </td>
                <td class="text-center">
                    {{$cc['noparte']}}
                </td>
                <td class="text-center">
                    {{$cc['cantidad']}}
                </td>
                <td class="text-right">
                    $ {{$cc['punitario']}}
                </td>
                <td class="text-right">
                    $ {{$cc['monto']}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <table>
        <tbody>
            <tr>
                <td>
                    <table id="detallePagoInicial">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Pago Inicial
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    SUBTOTAL
                                </td>
                                <td>
                                    $ {{ $data['Totals']['subtotal'] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    IVA {{ '16' }}%
                                </td>
                                <td>
                                    $ {{ $data['Totals']['totalIVA'] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Total {{ $data['Moneda'] }} Pago Inicial</b>
                                </td>
                                <td>
                                    $ {{ $data['Totals']['totalPI'] }} {{ $data['Moneda'] }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td id="espacio">

                </td>
                <td>
                    <table id="detallePagoInicial">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Mensualidades Restantes Antes de Iva
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $data['QtyMensualidades'] }} mensualidades
                                </td>
                                <td>
                                    $ {{ $data['Totals']['Mensubtotal'] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    IVA {{ '16' }}%
                                </td>
                                <td>
                                    $ {{ $data['Totals']['MenstotalIVA'] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Total {{ $data['Moneda'] }} Mensualidades</b>
                                </td>
                                <td>
                                    $ {{ $data['Totals']['mensualidades'] }} {{ $data['Moneda'] }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <br>

    <table class="bg-azul textcuentas" style="width:60%;padding:10px;opacity:.5;">
        <tbody>
            <tr>
                <td colspan="6">
                    <center><b>Cuentas de depósito</b></center>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-right:5px;padding-left:5px">
                    MXN<br>
                    <b>Banco:</b> Scotiabank S.A. de C.V.<br>
                    <b>Beneficiario:</b> MBR Hosting, S.A. DE C.V.<br>
                    <b>No. de cuenta:</b> 00101929224<br>
                    <b>Clabe Interbancaria:</b> 044180001019292247<br>
                </td>
                <td colspan="3" style="padding-left:5px;">
                    USD<br>
                    <b>Banco:</b>Scotiabank S.A. de C.V.<br>
                    <b>Beneficiario:</b> MBR Hosting, S.A. DE C.V.<br>
                    <b>No. de Cuenta:</b> 00107235682<br>
                    <b>Clabe Interbancaria: </b>044180001072356829<br>
                    <b>Swift:</b> MBCOMXMM<br>
                </td>
            </tr>
        </tbody>
    </table>


    <!-- Conciones y notas comerciales aviso -->

    <p class="text2">
        *** Revisar condiciones y notas comerciales
    </p>

    <br>

    <!-- Notas comerciales -->

    <table class="text1 table-general">
        <thead>
            <tr>
                <th>
                    Notas comerciales
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {!!$data['Notes']->condiciones!!}
                </td>
            </tr>
        </tbody>
    </table>
    <!--Condiciones comerciales-->
    <br />
    @foreach($data['Specs'] as $key => $spec_type)
        @if(count($spec_type) === 0)
            @continue
    @endif
    <table class="text1 table-general">
        <thead>
            <tr>
                <th>
                    {{$key}}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($spec_type as $spec)
            <tr>
                <td>
                    {{$spec->descripcion}}
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    Impresa por {{ Auth::user()->name }}
                </td>
            </tr>
            <tr>
                <td>
                    Contacto: {{ Auth::user()->email }}
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach
    <br>
    <div id='PromMeraki' style="display:{{ $data['display'] }};">
        <img style="width: 100%;
    height: 150px;
    padding: 10px 20px;
    box-sizing: border-box;
    display: block;
    margin-top: 40px;
    margin-left: -20px;" src="http://account.cotisap.com/assets/img/prom-cisco.png"><br><br>
    </div>
</body>

</html>