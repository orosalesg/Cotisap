<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Cotización | MBR HOSTING</title>
	<style type="text/css">
		
		*, table {
			font-family: Arial, Helvetica, sans-serif;
		}

		table {
			width: 100%;
		}

		table tr td {
    		vertical-align: top;
		}

		#detalle{
			font-size: 9px;
		}
		
		.text1{
			font-size: 10px;
		}

		.text2{
			font-size: 8px;
		}
		
		.textcuentas{
			font-size: 10px;
		}
		.bg-azul {
  			background: #c5d9f1;
		}

		#folio{
			color: red;
			font-size: 14px;
		}

		#detalle tr:nth-child(even) {
  			background: #c5d9f1;
		}
		#detalle tr:last-child{
			background: white !important;
		}
 
		#detalle th, .table-general th{
  			border-bottom: 2px solid #538dd5;
		}  
		
		#detalle tr td {
  		  vertical-align: middle;
		}
		
		#cuentas tr:nth-child(even) {
  			background: #c5d9f1;
		}
		#cuentas tr:last-child{
			background: white !important;
		}
 
		#cuentas th, .table-general th{
  			border-bottom: 2px solid #538dd5;
		}  
		
		#cuentas tr td {
  		  vertical-align: middle;
		}

		body {
			background-image: url(http://localhost/cotisap/public/assets/img/background.jpg);
    		background-size: 100px;
    		background-repeat: no-repeat;
    		background-position: bottom;
		}

		.text-right{
            text-align: right;
        }
        .text-center{
            text-align: center;
        }

        .contenedor{
            display:block;   
        }

	</style>
</head>
<body>

<table>
  <tr>
    <td>			
    	<img width="90" src="https://account.cotisap.com/assets/img/logo-mbr.png"><br><br>
			<font size="1">
			    {!! $data['Cliente'][0][0]->clienteNombre ?? $data['Quotation']->nombreCliente !!} <br>
			    {!! $data['Cliente'][0][0]->clienteRazon ?? '' !!}
			 </font>
	</td>
    <td>
    	&nbsp;
    </td>
    <td>
    	<font size="1">
    	México, CDMX -  {!! date("d-m-Y", strtotime($data['Quotation']->updated_at)) !!}
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
  			Atendiendo a su solicitud, pongo a su consideración la siguiente propuesta, la cual incluye las características técnicas así como las condiciones comerciales de nuestra empresa.
  		</p>
  	</td>
  </tr>
</table>

<!-- Detalle de productos -->

<table id="detalle">
	<thead>
		<tr>
			<th>
				N°. Parte
			</th>
			<th>
				Descripción
			</th>
			<th>
				Cantidad
			</th>
			<th>
				Desc
			</th>
			<th>
				Total Por producto
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data['Articles'] as $a)
		<tr>
			<td style="width:15%">
				{{$a['codigo']}}
			</td>
			<td style="width:40%;">
				{{$a['nombre']}}<br>
				{{ "Entrega: " . $a['tiempoEntrega'] }}
			</td>
			<td class="text-center" style="width:10%;">
				{{$a['cantidad']}}
			</td>
			<td class="text-right" style="width:15%">
				{{$a['descuento']}}%
			</td>
			<td class="text-right" style="width:20%">
				$ {{$a['total_mxn']}}
			</td>
		</tr>
		@if ($a['observaciones'] != "" || $a['observaciones'] != null)
		<tr>
			<td>
				
			</td>
		    <td colspan="2">
		        {{$a['observaciones']}}    
		    </td>
		</tr>
		    
		@endif
		@endforeach
		<tr class="text-right" style="background: white !important;">
			<td colspan="2">
				
			</td>
			<td colspan="2">
                {{-- Tota --}}
				INVERSIÓN TOTAL EN {{ $data['Moneda'] }}
			</td>
			<td>
				$ {{ $data['Totals']['MXN']}} {{ $data['Moneda'] }}
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
	*** Checar condiciones y notas comerciales
</p>

<br>

<!-- Notas comerciales -->
@isset($data['Notes']->condiciones)


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
				{!! $data['Notes']->condiciones ?? '' !!}
				
			</td>
		</tr>
	</tbody>
</table>

@endisset
<!--Condiciones comerciales-->
<br/>
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
					{!! $spec->descripcion ?? '' !!}				
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
@endforeach
<br>
@if ($data['Quotation']->comentarios != "" || $data['Quotation']->comentarios != null)
<table class="text1 table-general">
    <thead>
		<tr>
			<th>
				Comentarios generales.
			</th>
		</tr>
	</thead>
    <tr>
        <td>
            {{ $data['Quotation']->comentarios }} 
        </td>
    </tr>
</table>
<br><br>
@endif

    <table class="text1 table-general">
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
	</table>
<br>

<div id='promocion'>
<img style="width: 100%;height: 150px;padding: 10px 20px;box-sizing: border-box;display: block; 
            position:absolute; bottom:0;margin-top:100%-150" 
            src="{{ $data['rutaimg'] }}"></img>
</div>
</body>
</html>