<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de entrega | MBR HOSTING</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
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

    .text1 {
        font-size: 10px;
    }

    .text2 {
        font-size: 8px;
    }
    .text3 {
        font-size: 9px;
    }

    .textcuentas {
        font-size: 10px;
    }

    .bg-azul {
        background: #c5d9f1;
    }
    .bg-grey {
        background: #D8D8D8;
    }

    body {
        background-image: url();
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

    #theader tr td {
        border: 1px solid;
    }

    /** estilo de tabla equipos */

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

    .footer{
        bottom:70;
        position:absolute;
        page-break-after: auto;
    }
    .firma{
        border-top: 1px solid;
        margin-left:20px;
        margin-right:20px;
        margin-top:35;
    }

    .align-bottom{
        bottom:0;
        position:abolute;
    }
    .clausulas{
        width:33.33%;
        padding-left:3px;
        padding-right:3px;
    }
    </style>
</head>

<body>
    <div class="cuerpo">
        {{-- TABLA PARA HEADER --}}
        <table class="text1">
            <tr>
                <td style="width:30%">
                    <img width="90" src="http://account.cotisap.com/assets/img/logo-mbr.png">
                    <br>
                </td>
                <td class="text-center" style="width:30%">
                    <b>MBR Hosting, S.A DE C.V.</b> <br>
                    <b>Regimen Fiscal:</b> 601 - General de Ley Personas Morales <br>
                    Ruiseñor 26, el Rosedal, Deleg. Coyoacán, C.P. 04200, Ciudad de México <br>
                    <b>R.F.C.: </b> MHO09011524A <br>
                    Tel./Fax: 5363-4040, 4336-7060 <br>
                    www.mbrhosting.com <br>
                </td>
                <td style="width:40%">
                    <table id="theader">
                        <tr class="text-center">
                            <td>
                                <span>Original</span>
                            </td>
                            <td>
                                <b>ACTA DE ENTREGA DE EQUIPO.</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td class="text-center">
                                            <p>Numero de documento: </p>
                                            <br>
                                            <p>{{  $data["Entrega"]->numdelivery }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p>Fecha de documento:</p>
                                            <br>
                                            <p>{{ $data["Entrega"]->created_at }}</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>

        {{-- TABLA PARA CUERPO --}}
        <table class="tbody text1">
            <tr>
                <td style="border: 1px solid;width:50%;"><br>
                    <p>
                        <b>Nombre de la empresa:</b> <span>{{ $data["Entrega"]->nombreCliente }}</span>
                    </p>
                    <p>
                        <b>Razón Social: </b> <span> {{ $data["Entrega"]->razonCliente }} </span>
                    </p>
                    <p>
                        <b>RFC: </b> <span> {{-- $data["Entrega"]->RFC --}}</span>
                    </p>
                    <p>
                        <b>Telefono: </b> <span> {{ $data["Entrega"]->telefonoCliente }} </span>
                    </p>
                    <p>
                        <b>Domicilio: </b> <span> {{ $data["Entrega"]->direccionCliente }}</span>
                    </p>
                </td>
                <td style="border: 1px solid;width:50%;"><br>
                    <p>
                        <b>Domicilio de entrega: </b> <span> {{ $data["Entrega"]->direccionEntrega ?? $data["Entrega"]->direccionCliente }}</span>
                    </p>
                    <p>
                        <b>Persona de contacto</b> <span> {{ $data["Entrega"]->personaContacto ?? $data["Entrega"]->nombreCliente }}</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>
                        MBR HOSTING agradece a <b>{{ $data["Entrega"]->razonCliente }}</b>, la preferencia, confianza y adquisición de
                        nuestras Soluciones Integrales en Tecnología. Nuestro principal objetivo es ser sus
                        socios estratégicos, motivo por el cual permanecemos a sus órdenes en cualquier
                        momento.
                    </p>
                </td>
            </tr>
        </table>

        {{-- detalle de equipos  --}}
        <table id="detalle" class="text-center text1">
            <thead>
                <tr>
                    <th>
                        Pzas
                    </th>
                    <th>
                        Equipo
                    </th>
                    <th>
                        Modelo
                    </th>
                    <th>
                        MACID/Numero de Serie
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data['ArtEntrega'] as $a)
                <tr>
                    <td style="width:10%">
                        {{ $a['cantidad'] }}
                    </td>
                    <td style="width:30%;">
                        {{ $a['descripcion'] }}
                    </td>
                    <td class="text-center" style="width:30%;">
                        {{ $a['modelo'] }}
                    </td>
                    <td class="text-right" style="width:30%">
                        {{ $a['noserie'] }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{-- Footer primer pagina style="page-break-after: always;" --}}

        <table class="text-center footer text1" style="page-break-after:always;">
            <thead>
                <tr class="bg-grey">
                    <th>
                        Entregado por:
                    </th>
                    <th>
                        Recibió a satisfaccion:
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-azul">
                    <td style="width:50%;height:100px;">
                        {{ Auth::user()->name }}
                        <div class="firma">
                            <span class="align-bottom">Nombre y firma</span>
                        </div>
                    </td>
                    <td style="width:50%;height:100px;">
                        <br>
                        <div class="firma">
                            <span class="align-bottom">Nombre y firma</span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Segunda página --}}


        {{-- Header segunda pagina --}}

        <table class="text1">
            <tr>
                <td style="width:30%">
                    <img width="90" src="http://account.cotisap.com/assets/img/logo-mbr.png">
                    <br>
                </td>
                <td class="text-center" style="width:30%">
                    <b>MBR Hosting, S.A DE C.V.</b> <br>
                    <b>Regimen Fiscal:</b> 601 - General de Ley Personas Morales <br>
                    Ruiseñor 26, el Rosedal, Deleg. Coyoacán, C.P. 04200, Ciudad de México <br>
                    <b>R.F.C.: </b> MHO09011524A <br>
                    Tel./Fax: 5363-4040, 4336-7060 <br>
                    www.mbrhosting.com <br>
                </td>
                <td style="width:40%">
                    <table id="theader">
                        <tr class="text-center">
                            <td>
                                <span>Original</span>
                            </td>
                            <td>
                                <b>ACTA DE ENTREGA DE EQUIPO.</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td>
                                            <p>Numero de documento: </p>
                                            <br>
                                            <p>{{-- NO, de documento --}}</p>
                                        </td>
                                        <td>
                                            <p>Fecha de documento:</p>
                                            <br>
                                            <p>{{-- fecha de documento --}}</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        {{-- Cuepro pagina --}}

        <table class="tbody text1" style="border-collapse: collapse;">
            <tr>
                <td colspan="3" style="text-align: justify;text-justified: inter-word;">
                    <p>
                        CONTRATO  DE  SERVICIOS  Y  EQUIPOS DE SOLUCIONES INTEGRALES EN  TECNOLOGIA  (en lo sucesivo el 
                        “Contrato”, que celebran   por   una   parte   las empresas MBR HOSTING S.A.  DE  C.V.  (ambas  
                        sociedades  para  efecto  del  presente  contrato  celebran  conjuntamente  o  individualmente  
                        según  sea  el  caso  como “EL PROVEEDOR”, en lo sucesivo se les denominara las “ Partes”, 
                        manejando el tenor de las siguientes:
                    </p>
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="3">
                    <span> Cláusulas</span>
                </td>
            </tr>
            <tr class="text3" style="text-align:justify;text-justify:inter-word;border: 1px solid;">
                <td class="clausulas">
                    <p>
                        PRIMERA: DEFINICIONES. - Para efectos del presente Contrato se entenderá por: “Acta de Entrega”. Significa el documento en el cual se describe el Equipo de Acceso y/o el Equipo para el Cliente que el PROVEEDOR entregue a EL CLIENTE bajo el presente CONTRATO, la cual podrá ser firmada por un representante, empleado y/o personal del CLIENTE. “Domicilio del Servicio”. Es el lugar señalado por el CLIENTE en el presente Contrato, en donde EL PROVEEDOR instalará el Equipo y prestara los servicios objeto del presente CONTRATO, el cual podrá ser igual o diferente al domicilio de facturación, según se indica en el presente CONTRATO. “Equipo para el CLIENTE”. Significa aquel equipo solicitado por el CLIENTE bajo una Orden de Contratación, el cual es otorgado al CLIENTE bajo la modalidad de arrendamiento y/o venta. “Comprobante Fiscal”. Significa la factura emitida por el PROVEEDOR, en el cual se establecen los cargos por la prestación del Servicio y/o la venta, arrendamiento del Equipo para el CLIENTE. “Orden de Contratación” significa la orden del CLIENTE en la que solicita al PROVEEDOR la prestación de Servicios y/o venta, arrendamiento de Equipo, los que se sujetaran a los términos y condiciones del presente CONTRATO y sus Anexos. La Orden de contratación podrá hacerse por escrito o vía electrónica. La orden de contratación será parte integrante del presente CONTRATO, así mismo para todos los efectos legales a que haya lugar, los Servicios y/o Equipos para el CLIENTE descritos en (la carátula del presenta contrato) el presente CONTRATO, se consideraran como una Orden de Contratación del CLIENTE. “Pago Inicial”. Significa el pago que realizará el CLIENTE al PROVEEDOR, para que el PROVEEDOR inicie la prestación de los Servicios, el cual estará sujeto al tipo de Plan Comercial seleccionado por el CLIENTE. “Proveedor”. Con respecto a cada uno de los servicios y/o Equipos para el CLIENTE que se contraten bajo una Orden de Contratación, el Proveedor es MBR HOSTING S.A. DE C.V. “Saldo”. Es la cantidad en dinero que por consumo de los Servicios y/o por cualquier otro cargo administrativo establecido en el presente CONTRATO, incluyendo por la venta y/o arrendamiento de los Equipos para el CLIENTE, el CLIENTE haya generado y éste resulte a favor de el PROVEEDOR, mismo que se detallará en el comprobante fiscal siendo este documento el idóneo para acreditar el monto del saldo del CLIENTE.
                    </p>
                    <p>
                        SEGUNDA: OBJETO. - Durante la vigencia del presente CONTRATO, EL PROVEEDOR se compromete a prestar al CLIENTE los Servicios, de conformidad con lo establecido en el presente CONTRATO y sus Anexos, así como en las Ordenes de Contratación. Sujeto a la emisión por parte del CLIENTE y la aceptación por parte del PROVEEDOR de una Orden de Contratación, EL ´PROVEEDOR otorgará al CLIENTE, ya sea en arrendamiento y/o y en el presente CONTRATO y sus Anexos. venta el Equipo para el CLIENTE, de conformidad con los términos y condiciones
                    </p>
                </td>
                <td class="clausulas">
                    <p>
                         establecidas en la Orden de Contratación respectiva y en el presente CONTRATO y sus Anexos. El CLIENTE se compromete a pagar las contraprestaciones y demás cargos aplicables por los Servicios y/o Equipos para el CLIENTE, lo anterior de conformidad con la Cláusula Séptima así como en las Ordenes de Contratación respectivas. Durante la vigencia del presente CONTRATO, el CLIENTE podrá adquirir a través de Ordenes de Contratación, Servicios y/o Equipos adicionales, los cuales formaran parte integrante del presente CONTRATO, así como también sus Anexos, siempre y cuando el CLIENTE se encuentre al corriente en sus pagos de conformidad a lo establecido en el presente CONTRATO y sus Anexos.
                    </p>
                    <p>
                        TERCERA: OBLIGACIONES   Y   DERECHOS   DEL   PROVEEDOR. - Son obligaciones de EL PROVEEDOR: Instalar (siempre y cuando sea factible técnicamente y sea adquirido y liquidado el pago de implementación). Elaborar y entregar al CLIENTE su Comprobante Fiscal por los Servicios y Equipos para el CLIENTE bajo el presente CONTRATO y/o por la venta y/o arrendamiento del Equipo para el CLIENTE, de conformidad con los tiempos establecidos de EL PROVEEDOR, aplicando los costos correspondientes y desglosando los cargos por tipo de Servicios y Equipos para el CLIENTE, su fuere aplicable. Llevar a cabo la prestación del Servicio y/o venta y/o arrendamiento de Equipo para el CLIENTE de conformidad dispuesto en el presente CONTRATO, la Orden de Contratación y las Disposiciones Aplicables.  
                    </p>
                    <p>
                        CUARTA: OBLIGACIONES Y DERECHOS DEL CLIENTE.- Son obligaciones de EL CLIENTE: Pagar EL PROVEEDOR los cargos establecidos en el Comprobante Fiscal antes o en la fecha límite de pago, aun y cuando por alguna razón no haya recibido el Comprobante Fiscal de conformidad con lo estipulado. En caso de que el CLIENTE no haya recibido el Comprobante Fiscal correspondiente, tendrá la obligación de solicitar al PROVEEDOR que le proporcione antes o en la fecha límite de pago, la información necesaria para que el CLIENTE pueda efectuar el pago correspondiente, ya que el hecho de no recibir el Comprobante Fiscal no exime al CLIENTE del pago mismo. Responsabilizarse y hace buen uso del Servicio y/o Equipo para el CLIENTE proporcionado por el PROVEEDOR. Cubrir a EL PROVEEDOR todos los cargos por pagos extemporáneos, intereses moratorios y los gastos de cobranza.
                    </p>
                    <p>
                        QUINTA: TARIFAS Y FORMA DE PAGO.- Estas estarán estipuladas en la Cotización previamente aceptada por parte de EL CLIENTE, mismas que se notificarán en la Orden de Compra previamente enviada y aceptada por parte de el CLIENTE a el PROVEEDOR. En el caso de venta de equipo se pacta un 60% de anticipo en el envío de Orden de Compra y el 40% restante a la entrega del equipo. En arrendamiento se marcará la fecha de pago mensual por parte del CLIENTE a el 
                    </p>
                </td>
                <td class="clausulas">
                    <p>
                    PROVEEDOR, teniendo como obligación el CLIENTE liquidar la cantidad pactada en la fecha estipulada por el PROVEEDOR.
                    </p>
                    <p>
                    SEXTA: EXCLUYENTE   DE   RESPONSABILIDAD.-   Se   hace constar que el PROVEEDOR no será responsable por las interrupciones, fallas o degradaciones en el servicio por “Caso Fortuito” y/o “Fuerza Mayor”, entendiéndose por “Caso Fortuito” y/o “Fuerza Mayor” todo evento de la naturaleza o hechos del hombre que por su esencia haga imposible el cumplimiento de determinadas obligaciones, entre las cuales, en forma enunciativa mas no limitativa, están comprendidas las fallas o interrupciones en la Red o en el Equipo ajenas a la voluntad de EL PROVEEDOR, huelgas, terremotos, inundaciones, tornados, ciclones, incendios, guerras, motines, epidemias, deslizamientos de tierra, explosiones, accidentes que afecten la Red o al Equipo, disposiciones de las autoridades competentes, daños en las vías de comunicación, asaltos y otros eventos similares inevitables, que esta razonablemente fuera de control de EL PROVEEDOR, y que después de toda diligencia o actuación de su parte no haya podido prevenirse o subsanarse en todo o en parte. 
                    </p>
                    <p>
                    SEPTIMA: RENUNCIA Y VALIDEZ DEL CONTRATO.- Las manifiestan su plena    conformidad    con    todo    lo manifestado y pactado en este Contrato, y están de acuerdo en que en el mismo no existe error, enriquecimiento ilegitimo, dolo, lesión, violencia, ni cualquier otro vicio del consentimiento que pudiera afectar su validez y eficacia jurídica, renunciando en consecuencia a cualquier acción que por tales conceptos les pudiere competir, firmándolo de absoluta conformidad plenamente enterados de su contenido y alcance legal. Leído que fue el presente CONTRATO y enterada las partes de sus obligaciones, manifiestan que en el mismo no hay error, dolo o lesión que pudiera invalidarlo, por lo que es firmado en dos original en la Ciudad que firma el presente contrato
                    </p>
                    <div class="firmas">
                        <br>
                        <table class="text-center text1">
                            <thead>
                                <tr>
                                    <th>
                                        MBR HOSTING
                                    </th>
                                    <th>
                                        EL CLIENTE
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:50%;height:100px;">
                                        <div class="firma" style="margin-left:0;margin-right:0;">
                                            <span class="align-bottom">Firma y Nombre</span>
                                        </div>
                                    </td>
                                    <td style="width:50%;height:100px;">
                                        <div class="firma" style="margin-left:0;margin-right:0;">
                                            <span class="align-bottom">Firma y Nombre</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        {{-- Footer primer pagina style="page-break-after: always;" --}}

        <table class="text-center footer text1">
            <thead>
                <tr class="bg-grey">
                    <th>
                        Entregado por:
                    </th>
                    <th>
                        Recibió a satisfaccion:
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-azul">
                    <td style="width:50%;height:100px;">
                        {{ Auth::user()->name }}
                        <div class="firma">
                            <span class="align-bottom">Nombre y firma</span>
                        </div>
                    </td>
                    <td style="width:50%;height:100px;">
                        <br>
                        <div class="firma">
                            <span class="align-bottom">Nombre y firma</span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>