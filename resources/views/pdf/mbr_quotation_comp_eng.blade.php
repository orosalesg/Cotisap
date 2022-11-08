<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Quotation | MBR HOSTING</title>
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
    	<img width="90" src="http://account.cotisap.com/assets/img/logo-mbr.png"><br><br>
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
    		Document No.: {{$data['Quotation']->numCotizacion}}
    	</span>
    </td>
  </tr>
  <tr>
  	<td colspan="5">
  		<p class="text1">
            Attending your request, we send this proposal with the following technical information, as well as our selling conditions.
  		</p>
  	</td>
  </tr>
</table>

<!-- Detalle de productos -->

<table id="detalle">
	<thead>
		<tr>
			<th>
				Part Number
			</th>
			<th>
				Detail
			</th>
			<th>
				Quantity
			</th>
			<th>
				List price
			</th>
			<th>
				Discount
			</th>
			<th>
                Unit Price
			</th>
			<th>
				Subtotal
			</th>
			{{--<th>
				Tax 16%
			</th>
			<th>
				Product total
			</th>--}}
		</tr>
	</thead>
	<tbody>
		@foreach($data['Articles'] as $a)
		<tr>
			
			<td style="width:10%">
				{{$a['codigo']}}
			</td>
			<td style="width:30%;">
				{{$a['nombre']}}
			</td>
			<td class="text-center" style="width:4%;">
				{{$a['cantidad']}}
			</td>
			<td class="text-right" style="width:9%">
				$ {{$a['precio_lista']}}
			</td>
			<td class="text-right" style="width:7%">
				{{$a['descuento']}}%
			</td>
			<td class="text-right" style="width:10%">
				$ {{$a['precio_unitario']}}
			</td>
			<td class="text-right" style="width:10%">
				$ {{$a['subtotal']}}
			</td>
			{{--<td class="text-right" style="width:9%">
				$ {{$a['iva']}}
			</td>
			<td class="text-right" style="width:11%">
				$ {{$a['total_mxn']}}
			</td>--}}
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
			<td colspan="4">
				
			</td>
			<td colspan="2">
				Subtotal: 
			</td>
			<td>
				$ {{$data['Totals']['subtotal']}} {{ $data['Moneda'] }}
			</td>
		</tr>
		<tr class="text-right" style="background: white !important;">
			<td colspan="4">
				
			</td>
			<td colspan="2">
				Tax 16%: 
			</td>
			<td>
				$ {{$data['Totals']['totaliva']}} {{ $data['Moneda'] }}
			</td>
		</tr>
		<tr class="text-right" style="background: white !important;">
			<td colspan="4">
				
			</td>
			<td colspan="2">
				Total Investment: {{ $data['Moneda'] }}
			</td>
			<td>
				$ {{$data['Totals']['MXN']}} {{ $data['Moneda'] }}
			</td>
		</tr>
	</tbody>
</table>
<br>
<table class="bg-azul textcuentas" style="width:60%;padding:10px;opacity:.5;">
    <tbody>
        <tr>
		    <!--<td colspan="3">
		        Cuentas de depósito
		    </td>
		        @foreach($data['account'] as $a)
                    <td>
                        {{ $a->AcctName }}    
                    </td>
                @endforeach
                -->
            <td colspan="6">
                <center><b>Bank accounts</b></center>
            </td>
		</tr>
		<tr>
		    <td colspan="3" style="padding-right:5px;padding-left:5px">
                MXN<br>
                <b>Bank:</b> Scotiabank S.A. de C.V.<br>
                <b>Account Holder:</b> MBR Hosting, S.A. DE C.V.<br>
                <b>Account Number:</b> 00101929224<br>
                <b>Bank Code:</b> 044180001019292247<br>
            </td>
            <td colspan="3" style="padding-left:5px;">
                USD<br>
                <b>Bank:</b>Scotiabank S.A. de C.V.<br>
                <b>Account Holder:</b> MBR Hosting, S.A. DE C.V.<br>
                <b>Account Number:</b> 00107235682<br>
                <b>Bank Code: </b>044180001072356829<br>
                <b>Swift:</b> MBCOMXMM<br>
            </td>
		</tr>
    </tbody>
</table>

<!-- Conciones y notas comerciales aviso -->

<p class="text2">
	*** Read conditions y selling notes
</p>

<br>

<!-- Notas comerciales -->
@isset($data['Notes']->condiciones)


<table class="text1 table-general">
	<thead>
		<tr>
			<th>
				Selling conditions
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
				Comments.
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
		        Printed by {{ Auth::user()->name }}
		    </td>
		</tr>
		<tr>
		    <td>
		        Contact: {{ Auth::user()->email }}
		    </td>
		</tr>
	</table>
<br>

<div id='promocion'>
    <img style="width: 100%;height: 150px;padding: 10px 20px;box-sizing: border-box;display: block; position:fixed; bottom:0;" src="assets/img/bannerscotizacion/{{ $data['NoImagen'] }}.jpg"></img>
</div>
<!--<img style="width: 100%;
    height: 150px;
    padding: 10px 20px;
    box-sizing: border-box;
    display: block;
    margin-top: 40px;
    margin-left: -20px;" src="http://account.cotisap.com/assets/img/bannercoti2.jpg"><br><br>--->
</body>
</html>