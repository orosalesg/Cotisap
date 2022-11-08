
<!DOCTYPE html>
<html>
<head>
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
			font-size: 7px;
		}
		
		.text1{
			font-size: 8px;
		}

		.text2{
			font-size: 6px;
		}

		#folio{
			color: red;
			font-size: 12px;
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

		/* Add some padding on document's body to prevent the content
        to go underneath the header and footer */
        body{   
            background-image: url(http://localhost/cotisap/public/assets/img/background.jpg);
            background-size: 100px;
            background-repeat: no-repeat;
            background-position: bottom;     
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .fixed-header, .fixed-footer{
            width: 100%;
            position: fixed;        
            background: #fff;
            padding: 10px 0;
            color: #fff;
        }
        .fixed-header{
            top: 0;
        }
        .fixed-footer{
            bottom: 0;
            color: #000;
        }
        .container{
            width: 100%;
            margin: 0 auto; /* Center the DIV horizontally */
        }
        .content{
            position:absolute;
            top:10%;
            width: 100%;
            margin: 0 auto; /* Center the DIV horizontally */
        }

	</style>
</head>
<body>
    <div class="fixed-header">
            <img width="100%" height="25%" src="http://account.cotisap.com/assets/img/gsim-header1.jpg"><br><br>
    </div>
    <div class="content">
        
    
        <table>
        <tr>
            <td colspan="3"></td>
            <!--<td>			
                <img width="90" src="http://account.cotisap.com/assets/img/GrupoSIM.png"><br><br>
                    {{-- $data['Cliente'][0][0]->CardName --}} <br>
            </td>-->
            <td>
                &nbsp;
            </td>
            <td>
                <font size="1">
                Ciudad de México a -  {!! date("d-m-Y", strtotime($data['Quotation']->updated_at)) !!}
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
                    <b>Contacto Web</b>
                </p>
                <p class="text1">
                    <b>Presente</b>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="text1">
                    A continuación, ponemos a su consideración la siguiente propuesta de:
                </p>
            </td>
        </tr>
        </table>

        <!-- Detalle de productos -->
            <table id="detalle">
                <thead>
                    <tr>
                        <th>
                            Descripción
                        </th>
                        <th>
                            Presentacion
                        </th>
                        <th>
                            Cantidad
                        </th>
                        <th>
                            Precio Unitario
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['Articles'] as $a)
                    <tr>
                        <td>
                            {{$a['nombre']}}
                        </td>
                        <td>
                            {{ 'Presentacion' }}
                        </td>
                        <td>
                            {{$a['cantidad']}}
                        </td>
                        <td>
                            $ {{$a['precio_unitario']}}
                        </td>
                        <td>
                            $ {{$a['total_mxn']}}
                        </td>
                    </tr>
                    @endforeach
                
                    <tr>
                        <td colspan="2">
                            
                        </td>
                        <td colspan="2">
                            INVERSIÓN TOTAL EN {{ $data['Moneda'] }}
                        </td>
                        <td>
                            $ {{$data['Totals']['MXN']}} {{ $data['Moneda'] }}
                        </td>
                    </tr>
                </tbody>
            </table>    
        

        <!-- Conciones y notas comerciales aviso -->

        <p class="text2">
            *** Revisar condiciones comerciales y especificaciones.
        </p>

        <br>

        <!-- Notas comerciales -->

        <table class="text1 table-general">
            <thead>
                <tr>
                    <th>
                        Condiciones Comerciales.
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
                            {{$spec->descripcion}}				
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach

        <br>
        <br>
    </div>
    <div class="fixed-footer">
        <table>
            <tr>
                <td>

                </td>
                <td>
                    
                </td>
            </tr>
        </table>
        <div class="container">Copyright &copy; 2016 Your Company</div>        
    </div>
</body>
</html>