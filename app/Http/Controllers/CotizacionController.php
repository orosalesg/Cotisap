<?php

namespace App\Http\Controllers;

use DateTime;
Use App\Models\User;
use DB;
use Auth;
use App\Models\Spec as Spec;
use App\Models\SpecsType as SpecsType;
use App\Models\Payment;
use App\Models\Customers as Clientes;
use App\Lib\Libraries as Lib;
use App\Models\ArtQuotation as Articulo;
use App\Models\Quotation as Cotizacion;
use App\Models\Notes as Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\General;
use Mail;
use App\Models\Rol;
use App\Models\Company;
use App\Http\Controllers\AcinfoController as Aci;

use Illuminate\Support\Facades\Http;
/**
 *
 * 
 * @author sergiomireles.com
 */


class CotizacionController extends Controller
{

    public function test(){
        return 'Esta es una respuesta de prueba';
    }

	/**
	 *
	 *
	 * @param
	 * @return
	 */

	public function index(){
        if(session('domain') == 'gruposim.com'){
            return view('theme.cotizaciones.new', [
			'monedas' => self::getMoneda(),
            'accounts' => self::getAccount(),
            'notas' => self::getNotasNosap(),
            'maxdesc' => self::getMaxdesc(),
            'especificacionesType' => self::getEspecificacionesTipo(),
            'getEspecificaciones' => self::getEspecificaciones()
		]);    
        }else{
           return view('theme.cotizaciones.new', [
			'monedas' => self::getMoneda(),
            'accounts' => self::getAccount(),
            'notas' => self::getNotas(),
            'maxdesc' => self::getMaxdesc(),
            'especificacionesType' => self::getEspecificacionesTipo(),
            'getEspecificaciones' => self::getEspecificaciones()
		]); 
        }
		
	}

    //retorna una vista con la info para crear una nueva cotizacion,
    //cada palabra dentro de las '' es una variable que se puede usar en esa vista y los fragmentos que se incluyan
    public function show($id = 0){
        return view('theme.cotizaciones.show-cotizacion', [
            'id' => $id,
            'monedas' => self::getMoneda(),
            'accounts' => self::getAccount(),
            'cotizacion' => self::getCotizacion($id),
            'maxdesc' => self::getMaxdesc(),
            'getPayment' => self::getPayment($id),
            'especificacionesType' => self::getEspecificacionesTipo(),
            'getEspecificaciones' => self::getEspecificaciones(),
            'notas' => self::getNotas(),
        ]);
    }

    /**
     *
     *
     * @param
     * @return
     */

    public function sendCotizacion(Request $Request){
        
        $numCotizacion = Lib::getGUID();

        $cotizacion = new Cotizacion();
        $cotizacion->numCotizacion = $numCotizacion;
        $cotizacion->nombreCliente = $Request->datosCotizacion['nombreCliente'] ? $Request->datosCotizacion['nombreCliente'] : '';
        $cotizacion->totalMXN = $Request->datosCotizacion['totalMXN'] ? $Request->datosCotizacion['totalMXN'] : 0 ;
        $cotizacion->totalUSD = $Request->datosCotizacion['totalUSD'] ? $Request->datosCotizacion['totalUSD'] : 0 ;
        $cotizacion->total = $Request->datosCotizacion['total'] ? $Request->datosCotizacion['total'] : 0 ;
        $cotizacion->comentarios = isset($Request->datosCotizacion['comentarios']) ? $Request->datosCotizacion['comentarios'] : '' ;
        $cotizacion->idVendedor = Auth::user()->email;
        $cotizacion->tc = $Request->datosCotizacion['tc'] ? $Request->datosCotizacion['tc'] : '0';
        $cotizacion->estatus = 'C';
        $cotizacion->numCliente = $Request->datosCotizacion['numCliente'] ? $Request->datosCotizacion['numCliente'] : '';
        $cotizacion->account = isset($Request->datosCotizacion['account']) ? $Request->datosCotizacion['account'] : 0 ;
        $cotizacion->notasCotizacion = $Request->datosCotizacion['notasCotizacion'] ? $Request->datosCotizacion['notasCotizacion'] : 0 ;
        $cotizacion->fechaEntrega = new DateTime();
        $cotizacion->Moneda = $Request->datosCotizacion['Moneda'] ? $Request->datosCotizacion['Moneda'] : null ;
        $cotizacion->tipoEntrega = isset($Request->datosCotizacion['tipoEntrega']) ? $Request->datosCotizacion['tipoEntrega'] : '' ;
        $cotizacion->personaEntrega = isset($Request->datosCotizacion['personaEntrega']) ? $Request->datosCotizacion['personaEntrega'] : '';
        $cotizacion->telefonoEntrega = isset($Request->datosCotizacion['telefonoEntrega']) ? $Request->datosCotizacion['telefonoEntrega'] : '';
        $cotizacion->correoEntrega = isset($Request->datosCotizacion['correoEntrega']) ? $Request->datosCotizacion['correoEntrega'] : '';
        $cotizacion->direccionEntrega = isset($Request->datosCotizacion['direccionEntrega']) ? $Request->datosCotizacion['direccionEntrega'] : '';
        $cotizacion->fleteraEntrega = isset($Request->datosCotizacion['fleteraEntrega']) ? $Request->datosCotizacion['fleteraEntrega'] : '';
        $cotizacion->tipodecambio = $Request->tipodecambio ? $Request->tipodecambio : '';
        /** tipo de formato de la cotizacion */
        $cotizacion->formato = $Request->formato ? $Request->formato : 'comp';
        $cotizacion->lang = $Request->datosCotizacion['language'] ? $Request->datosCotizacion['language'] : 'esp';

        $cotizacion->banners = isset($Request->datosCotizacion['bannersConfig']) ? $Request->datosCotizacion['bannersConfig'] : "";
        
        if(session('domain') == 'gruposim.com'){
            //$cotizacion->autorized = $Request->datosCotizacion['autorized'] ? $Request->datosCotizacion['autorized'] : 0;
            $cotizacion->autorized = 0;
        }
        
        $cotizacion->especificaciones = json_encode($Request->especificaciones);
        
        foreach ($Request->obtenerDatosArticulos as $product) {
            $articulo = new Articulo();
            $articulo->numCotizacion = $cotizacion->numCotizacion;
            $articulo->numLine = '0';
            $articulo->codigoArt = $product['codigoArt'];
            $articulo->nombreArt = $product['nombreArt'];
            $articulo->cantidad = $product['cantidad'];
            $articulo->moneda = $product['moneda'];
            $articulo->precioLista = $product['precioLista'];
            $articulo->UMV = $product['UMV'];
            $articulo->precioUnidad = $product['precioUnidad'];

            $articulo->PrecioVenta = $product['PrecioVenta'] ? $product['PrecioVenta'] : '';
            $articulo->importe = $product['importe'] ? $product['importe'] : '';
            $articulo->marca = $product['marca'] ? $product['marca'] : '- Ning&uacute;n fabricante -';
            $articulo->costo = $product['costo'] ? $product['costo'] : '';
            $articulo->desc = $product['desc'] ? $product['desc'] : '';
            $articulo->utilidad = $product['utilidad'] ? $product['utilidad'] : '';

            $articulo->factor = $product['factor'];
            $articulo->subTotalLinea = $product['subTotalLinea'];
            $articulo->almacen = $product['almacen'];
            $articulo->tiempoEntrega = $product['tiempoEntrega'] ? $product['tiempoEntrega'] : '';
            $articulo->observaciones = $product['observaciones'] ? $product['observaciones'] : '';
            $articulo->save();
        }



        return response()->json([ 
            'status' => $cotizacion->save() === true ? "true" : "false",
            'numCotizacionMD5' => $cotizacion->numCotizacion,
            'cotizacion' => Cotizacion::where('numCotizacion', $cotizacion->numCotizacion)->get()
            ]);
    }   


    /**
     * 
     * Duplicar cotizacion
     * 
     */

    public function duplicateCotizacion(Request $request){

        //buscamos la cotizacion a duplicar
        $quote = Cotizacion::find($request->id);

        //Llamamos la funcion replicate y lo asignamos a una nueva variable
        $newquote = $quote->replicate();

        //Obtenemos un nuevo numero de cotizacion
        $numCotizacion = Lib::getGUID();

        $newquote->numCotizacion = $numCotizacion;

        //Obtenemos la fecha de hoy para los campos de created_at y updated_at
        $newdate = new DateTime();

        $newquote->created_at = $newdate;

        $newquote->updated_at = $newdate;

        //Guardamos la informacion gneral de la cotizacion duplicada
        $newquote->save();

        //Obtenemos una matriz con los articulos que coincidan con el numero de cotizacion
        $articulosarr = Articulo::where('numCotizacion','=', $quote->numCotizacion)->get();

        foreach($articulosarr as $articulo){
            
            //Buscamos cada articulo dentro de la matriz para duplicarlo y 
            //cambiar los datos de referencia a la informacion general de la cotizacion
            $articuloaux = Articulo::find($articulo->id);

            $newarticulo = $articuloaux->replicate();

            $newarticulo->numCotizacion = $numCotizacion;

            $newarticulo->created_at = $newdate;

            $newarticulo->updated_at = $newdate;

            $newarticulo->save();

        }

        return response()->json([
            'status' => true,
            'numCotizacion' => $numCotizacion,
        ]);



    }
    
    
    /**
     *
     *
     * @param
     * @return 
     */
     
    public function altacliente(){
        return view('theme.cotizaciones.alta-cliente', [
			'clientes' => self::getClienteNosapAll(),
		]);
    }
    
    public function altaclientepruebas(){
        return view('theme.cotizaciones.alta-clientepruebas', [
			'clientes' => self::getClienteNosapAll(),
		]);
    }
    
    public function getClienteNosapAll() {
        
        $noSAP = Lib::querySQLMYSQL("SELECT * FROM 
        ".session('Company')."_customers
        ORDER BY created_at DESC");

        return $noSAP;
    }
    
    public function editClienteData(Request $request){
        $cliente = Clientes::find($request["id"]);
        
        $cliente->clienteNombre = $request["nombre"];
        $cliente->clienteEmail = $request["email"];
        $cliente->clienteTelefono = $request["telefono"];
        $cliente->clienteRazon = $request["razon"];
        $cliente->clienteDomicilio = $request["domicilio"];
        
        return response()->json([
            "status" => $cliente->save() === true ? true : false,
        ]);
    }
    
    public function getClienteDataId(Request $request) {
        
        $noSAP = Lib::querySQLMYSQL("SELECT * FROM 
        ".session('Company')."_customers WHERE id = ?",[$request->datosid]);


        return response()->json($noSAP[0]);

    }
    
    public function deleteCliente(Request $request){
        
        $cliente = Clientes::find($request->datosid);
        
        return response()->json([
                'status' => $cliente->delete() === true ? true : false,
            ]);
    }

    public function getClienteAll(Request $request) {
        
        $SAP = Lib::querySQLSRV("SELECT CardCode as id, ( 'SAP - ' + CardCode + ' - ' + CardName) as text FROM 
        OCRD WHERE VatStatus = 'Y' AND CardType = 'C' AND ( CardCode LIKE ? OR CardName LIKE ? )", [ "%".$request->q."%", "%".$request->q."%" ]);
        
        $noSAP = Lib::querySQLMYSQL("SELECT id as id, concat('NoSAP - ', id, ' - ', ifnull(clienteNombre, ''), ' - ', ifnull(clienteRazon, '')) as text FROM 
        ".session('Company')."_customers WHERE clienteNombre LIKE ? OR clienteRazon LIKE ? OR id LIKE ? ", [ "%".$request->q."%", "%".$request->q."%", "%".$request->q."%"] );


        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        return response()->json( array_merge($SAP , $noSAP), 200, $header, JSON_UNESCAPED_UNICODE);

    }

    public function getClienteAllEntrega(Request $request) {
        
        $SAP = Lib::querySQLSRV("SELECT CardCode as id, CardName as text FROM 
        OCRD WHERE VatStatus = 'Y' AND CardType = 'C' AND ( CardCode LIKE ? OR CardName LIKE ? )", [ "%".$request->q."%", "%".$request->q."%" ]);
        
        $noSAP = Lib::querySQLMYSQL("SELECT id as id, clienteNombre as text FROM 
        ".session('Company')."_customers WHERE clienteNombre LIKE ? OR clienteRazon LIKE ? OR id LIKE ? ", [ "%".$request->q."%", "%".$request->q."%", "%".$request->q."%"] );


        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        return response()->json( array_merge($SAP , $noSAP), 200, $header, JSON_UNESCAPED_UNICODE);

    }

    /** para alta de cliente no permitir crear  */
    public function getClienteAllNew(Request $request) {
        
        $SAP = Lib::querySQLSRV("SELECT CardCode as id, ( 'SAP - ' + CardCode + ' - ' + CardName) as text, 'true' as 'disabled' FROM 
        OCRD WHERE VatStatus = 'Y' AND CardType = 'C' AND ( CardCode LIKE ? OR CardName LIKE ? )", [ "%".$request->q."%", "%".$request->q."%" ]);
        
        $noSAP = Lib::querySQLMYSQL("SELECT id as id, concat('NoSAP - ', id, ' - ', clienteNombre, ' - ', clienteRazon)  as text, 'true' as 'disabled' FROM 
        ".session('Company')."_customers WHERE clienteNombre LIKE ? OR clienteRazon LIKE ? OR id LIKE ? ", [ "%".$request->q."%", "%".$request->q."%", "%".$request->q."%"] );


        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        return response()->json( array_merge($SAP , $noSAP), 200, $header, JSON_UNESCAPED_UNICODE);

    }


    public function  utf8_encode_deep(&$input) {
        if (is_string($input)) {
            $input = utf8_encode($input);
        } else if (is_array($input)) {
            foreach ($input as &$value) {
                utf8_encode_deep($value);
            }
            
            unset($value);
        } else if (is_object($input)) {
            $vars = array_keys(get_object_vars($input));
            
            foreach ($vars as $var) {
                utf8_encode_deep($input->$var);
            }
        }
    }
    /**
     *
     *
     * @param 
     * @return
     */

    public function getClienteData(Request $request){

    	$data = array();

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 T1.CardCode, T1.CardName, T1.CmpPrivate, T1.LicTradNum, T1.Phone1, T1.IntrntSite, T1.E_Mail, cast(T1.CreditLine as decimal(10,2)) cotiLimite, cast(T1.Balance as decimal(10,2)) cotiDeudor, cast((T1.CreditLine - T1.Balance) as decimal(10,2)) cotiDisp, T2.ExtraMonth + ' ' + T2.ExtraDays cotiDias, isSAP = 'Y' FROM OCRD T1 JOIN OCTG T2 ON T1.GroupNum = T2.GroupNum WHERE CardType = 'C' AND VatStatus = 'Y' AND CardCode = ? ", [ $request->q ]));

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 T3.FirstName cpName, T3.Tel1 cpPhone, T3.E_MailL cpEmail FROM OCPR T3 JOIN OCRD T1 ON T3.CardCode = T1.CardCode WHERE T3.CardCode = ? ", [ $request->q ]));

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 T2.Street fStreet, T2.Block fCol, T2.City fCity, T2.City fCity2, T2.ZipCode fZip, T2.County fCounty, T4.Name fState, T5.Name fCountry FROM CRD1 T2 JOIN OCRD T1 ON T2.CardCode = T1.CardCode JOIN OCST T4 ON T2.State = T4.Code JOIN OCRY T5 ON T2.Country = T5.Code WHERE T2.CardCode = ? AND T2.Address = 'FISCAL'", [ $request->q ]));

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 T2.Street eStreet, T2.Block eCol, T2.City eCity, T2.City eCity2, T2.ZipCode eZip, T2.County eCounty, T4.Name eState, T5.Name eCountry FROM CRD1 T2 JOIN OCRD T1 ON T2.CardCode = T1.CardCode JOIN OCST T4 ON T2.State = T4.Code JOIN OCRY T5 ON T2.Country = T5.Code WHERE T2.CardCode = ? AND T2.Address = 'ENVIO'", [ $request->q ]));

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 CONVERT(VARCHAR(10),T1.DocDate,103) DocDate, cast(T1.TrsfrSum as decimal(10, 2)) cotiMonto FROM ORCT T1 WHERE T1.CardCode = ? ORDER BY T1.DocDate DESC", [ $request->q ]));
        
        if(empty($data[0])){

            $data[0] = Lib::querySQLMYSQL("SELECT clienteNombre AS CardName2 FROM 
            ".session('Company')."_customers WHERE id LIKE ?",[ $request->q ]);

            return $data;
        }
        
        return $data;
    }

    public function getClienteDataE(Request $request){

    	$data = array();

        $data =
            Lib::querySQLSRV("SELECT TOP 1 T1.CardCode, T1.CardName, T1.CmpPrivate, T1.LicTradNum, T1.Phone1, T1.IntrntSite, 
            T1.E_Mail, 'isSAP' = 'Y', T3.FirstName cpName, T3.Tel1 cpPhone, T3.E_MailL cpEmail, 
			CONCAT(T4.Street, ' ' , T4.Block, ', ' ,T4.City, ', ', T4.City, ', ', T4.ZipCode, ', ', T4.County, ', ', T5.Name, ', ', T6.Name) as cpDomicilio
            FROM OCRD T1 
            JOIN OCTG T2 ON T1.GroupNum = T2.GroupNum 
            JOIN OCPR T3 ON T3.CardCode = T1.CardCode 
            JOIN CRD1 T4  ON t4.CardCode = t1.CardCode
            JOIN OCST T5 ON T4.State = T5.Code 
            JOIN OCRY T6 ON T4.Country = T6.Code 
            WHERE T1.CardType = 'C' AND VatStatus = 'Y' AND t4.Address LIKE '%fiscal%' AND T1.CardCode = ? ", [ $request->q ]);
            
        if(empty($data)){

            $data = Lib::querySQLMYSQL("SELECT clienteNombre AS cpNombre, clienteEmail as cpEmail, clienteTelefono as cpPhone, 
            clienteRazon as CardName, clienteDomicilio as cpDomicilio, 'isSAP' = 'N' FROM 
            ".session('Company')."_customers WHERE id LIKE ?",[ $request->q ]);

            return $data;
        }
        
        return $data;
    }
    
    public function getClienteDataPuntos(Request $request){

    	$data = array();

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 T1.CardCode, T1.CardName, T1.CmpPrivate, T1.LicTradNum, T1.Phone1, T1.IntrntSite, T1.E_Mail, cast(T1.CreditLine as decimal(10,2)) cotiLimite, cast(T1.Balance as decimal(10,2)) cotiDeudor, cast((T1.CreditLine - T1.Balance) as decimal(10,2)) cotiDisp, T2.ExtraMonth + ' ' + T2.ExtraDays cotiDias, isSAP = 'Y' FROM OCRD T1 JOIN OCTG T2 ON T1.GroupNum = T2.GroupNum WHERE CardType = 'C' AND VatStatus = 'Y' AND CardCode = ? ", [ $request->q ]));

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 T3.FirstName cpName, T3.Tel1 cpPhone, T3.E_MailL cpEmail FROM OCPR T3 JOIN OCRD T1 ON T3.CardCode = T1.CardCode WHERE T3.CardCode = ? ", [ $request->q ]));

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 T2.Street fStreet, T2.Block fCol, T2.City fCity, T2.City fCity2, T2.ZipCode fZip, T2.County fCounty, T4.Name fState, T5.Name fCountry FROM CRD1 T2 JOIN OCRD T1 ON T2.CardCode = T1.CardCode JOIN OCST T4 ON T2.State = T4.Code JOIN OCRY T5 ON T2.Country = T5.Code WHERE T2.CardCode = ? AND T2.Address = 'FISCAL'", [ $request->q ]));

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 T2.Street eStreet, T2.Block eCol, T2.City eCity, T2.City eCity2, T2.ZipCode eZip, T2.County eCounty, T4.Name eState, T5.Name eCountry FROM CRD1 T2 JOIN OCRD T1 ON T2.CardCode = T1.CardCode JOIN OCST T4 ON T2.State = T4.Code JOIN OCRY T5 ON T2.Country = T5.Code WHERE T2.CardCode = ? AND T2.Address = 'ENVIO'", [ $request->q ]));

        array_push($data,
            Lib::querySQLSRV("SELECT TOP 1 CONVERT(VARCHAR(10),T1.DocDate,103) DocDate, cast(T1.TrsfrSum as decimal(10, 2)) cotiMonto FROM ORCT T1 WHERE T1.CardCode = ? ORDER BY T1.DocDate DESC", [ $request->q ]));
        
        if(empty($data[0])){

            $data[0] = Lib::querySQLMYSQL("SELECT t1.id as CardCode, t1.clienteNombre as CardName, 
            t1.clienteEmail as cpEmail, t1.clienteTelefono as cpPhone, 'N' as isSAP FROM 
            ".session('Company')."_customers t1 WHERE id LIKE ?",[ $request->q ]);

            return $data;
        }
        
        return $data;
    }
    /**
     *
     *
     * @param
     * @return
     */

    public function getMoneda(){
    	
    	return	lib::querySQLSRV("SELECT T1.ISOCurrCod, CASE WHEN T1.ISOCurrCod = 'MXN' THEN 1 ELSE T2.Rate END Rate
    								FROM OCRN T1 LEFT JOIN ORTT T2 ON T1.ISOCurrCod = T2.Currency 
    									WHERE T2.RateDate = CONVERT(DATE, GETDATE()) AND T1.ISOCurrCod = 'USD' OR T1.ISOCurrCod = 'MXN'", null);

    }

    /**
     *
     *
     *
     * @param
     * @return
     */

    public function getArticuloAll(Request $request){
        
        $SAP = Lib::querySQLSRV("SELECT T1.ItemCode as  id, ('SAP - ' + T1.ItemCode + ' - ' + T1.ItemName) as text,
                                    T1.ItemCode as code FROM OITM T1 JOIN ITM1 T2 ON T1.ItemCode = T2.ItemCode 
                                WHERE T1.validFor = 'Y'
                                    AND T2.pricelist = '". Auth::user()->U_priceList . "'
                                    AND T1.frozenFor = 'N' 
                                    AND ( T1.ItemCode LIKE ? OR T1.ItemName LIKE ? )
                                ORDER BY T1.ItemCode ASC", [ "%".$request->q."%", "%".$request->q."%" ]);

        $noSAP = Lib::querySQLMYSQL("SELECT codigo as id, concat('NoSAP - ', codigo, ' - ', descripcion)  as text,
                                    codigo as code FROM ".session('Company')."_articulos WHERE codigo LIKE ? OR id LIKE ? ", 
                                    [ "%".$request->q."%", "%".$request->q."%"] );

        $aci = new Aci();
        
        $token = $aci->getSyscomToken();

        $request = Http::withToken($token)->get($aci->BaseUri . "productos?busqueda=" . str_replace(" ","+",$request->q) );

        $body = json_decode((string)$request->getBody());

        // $body->productos;
        $syscom = array();

        foreach($body->productos as $prod){
            $text = "Syscom - " . $prod->modelo . " - " . $prod->titulo;
            $aux = array(
                "id" => $prod->modelo,
                "text" => $text,
                "code" => $prod->producto_id
            );

            $syscom [] =  $aux;
        }

        return array_merge($SAP,$noSAP,$syscom); 
                                
    }

    /**
     *
     *
     *
     *
     * @param
     * @return
     */


    public function getArticuloData(Request $request){

        $sap = Lib::querySQLSRV("SELECT T1.ItemCode, 
                                        T1.ItemName, 
                                        T1.SalUnitMsr, 
                                        cast(T2.Price as decimal(10, 2)) Price, 
                                        cast(T1.LastPurPrc as decimal(10, 2)) LastPurPrc, 
                                        T1.LastPurCur AS LastPurCur, 
                                        T2.Currency AS Currency, 
                                        T4.FirmName,
                                        Cast(CONVERT(DECIMAL(10,2), T1.OnHand) - 0 as nvarchar) AS OnHand, 
                                        Cast(CONVERT(DECIMAL(10,2), T1.OnOrder) - 0 as nvarchar) AS OnOrder
                                FROM OITM T1 JOIN ITM1 T2 ON T1.itemcode = T2.itemcode JOIN OMRC T4 ON T1.FirmCode = T4.FirmCode 
                                        WHERE T2.pricelist = ? AND T1.ItemCode = ? ", [ Auth::user()->U_priceList, $request->q ] );

        if(!$sap){
            $noSap = Lib::querySQLMYSQL("SELECT 
                codigo as ItemCode,
                descripcion	as	ItemName,
                moneda as LastPurCur,
                UMV as SalUnitMsr,
                precio as Price,
                comentarios as FirmName
             FROM ".session('Company')."_articulos WHERE codigo = ? ", [ $request->q ] );

            if(!$noSap){

                $aci = new Aci();
        
                $token = $aci->getSyscomToken();

                $request = Http::withToken($token)->get($aci->BaseUri . "productos/" . $request->q );

                $body = json_decode((string)$request->getBody());
                
                $producto = array();

                $aux = array(
                    "ItemCode" => $body->producto_id,
                    "ItemName" => $body->titulo,
                    "SalUnitMsr" => $body->unidad_de_medida->nombre,
                    "LastPurPrc" => $body->precios->precio_descuento,
                    "LastPurCur" => "USD",
                    "Currency" => "USD",
                    "Price" => $body->precios->precio_lista ?? "0.00",
                );

                $producto [] = $aux;
                
                return $producto;
            }
            
             return $noSap;
        }

        return $sap;
    }

    /**
     *
     *
     *
     *
     * @param
     * @return
     */

    public function getStock(Request $request){

        $stock = Lib::querySQLSRV("SELECT WhsCode FROM OWHS WHERE Inactive <> 'Y' AND U_usable = 'Y' ORDER BY WhsCode ASC", null );

        $stockSt = '';

        foreach ($stock as $key => $value) {
            $stockSt .= "'".$value->WhsCode."',";
        }

         return Lib::querySQLSRV("SELECT T3.OnHand,T3.OnOrder,T5.WhsName
                                    FROM 
                                        OWHS T5 JOIN OITW T3 ON T3.WhsCode = T5.WhsCode, 
                                        OITM T1 JOIN ITM1 T2 ON T1.itemcode = T2.itemcode 
                                                JOIN OMRC T4 ON T1.FirmCode = T4.FirmCode 
                                    WHERE T2.pricelist = '7' 
                                        AND T1.ItemCode = ? 
                                        AND T3.ItemCode = T1.ItemCode 
                                        AND T3.WhsCode in (". substr($stockSt, 0, -1) .")", [ $request->q ]);
       
    }

    /**
     *
     *
     *
     * 
     * @param
     * @return
     */

    public function getAccount(){
        return Lib::querySQLSRV("SELECT AcctCode, AcctName, AccntntCod, U_account, U_clabe FROM OACT WHERE FatherNum = ? AND AccntntCod <> '' ORDER BY AccntntCod", [ session('FatherNum') ] );
    }

    /**
     *
     *
     *
     *
     *
     * @param
     * @return 
     */

    public function getNotas(){
        return Lib::querySQLSRV("SELECT Code, Name, U_conditions FROM [@CNOT] ORDER BY Name", null );
    }


    /**
     * Unidades de medida
     */

    public function getUDM(){
        return Lib::querySQLSRV("SELECT UomCode, UomName FROM OUOM", null);
    }

    /**
     *
     *
     *
     *
     * @param
     * @return
     */

    public function getNotasData(Request $request){
        return Lib::querySQLSRV("SELECT Code, Name, U_conditions FROM [@CNOT] WHERE Code = ? ORDER BY Name", [ $request->q ] );
    }
    
    public function getNotasNosap(){
        return Notes::all();
    }
    
    public function getNotasNosapData(Request $request){
        return Notes::find($request->q);
    }
    /**
     *
     *
     *
     *
     * @param
     * @return
     */

    public function getAllCotizaciones(Request $request){

        if(!strcmp($request->tipo, 'tipoBuscarCo')){
                
                $result = array();
                
                $data = Cotizacion::where('id', 'like', '%' . $request->q . '%')
                        ->orWhere('numCotizacion', 'like', '%' . $request->q . '%')->limit(10)->get();
        
                foreach ($data as $key => $item) {
                   $result[$key]['id'] = $item->id;
                   $result[$key]['text'] = $item->id . ' - ' . $item->nombreCliente;
                }

        } elseif(!strcmp($request->tipo, 'tipoBuscarCl')) {

                $result = self::getClienteAll($request);
        
        }

        return $result;
    }

    /**
     *
     *
     *
     *
     * @param
     * @return
     */


    public function getDataCotizacionReview(Request $request){

        if(is_array($request->r)){
             
        } else {
            if(!strcmp($request->q, '') && !strcmp($request->r, '') ){
                return array('data' => []);
            }
        }
            

        if(!strcmp($request->tipo, 'tipoBuscarCo')){

            $data = Cotizacion::where('id', $request->q )
                     ->orWhere('numCotizacion', $request->q )->get();
    
                    
            $data = array('data' => [
                [
                    $data[0]->nombreCliente,
                    $data[0]->numCotizacion,
                    $data[0]->nombreCliente,
                    $data[0]->fechaEntrega,
                    $data[0]->estatus,
                    $data[0]->total,
                    $data[0]->type,
                    ""                
                ]
            ]);

            return $data;

        } elseif(!strcmp($request->tipo, 'tipoBuscarCl')) {

            $data = array('data' => []);

            $datas = Cotizacion::where('numCliente', $request->q )
                    ->where('created_at', '>=', $request->date[0].' 00:00:00')
                    ->where('created_at', '<=', $request->date[1].' 23:59:59')
                    ->get();   
            
            foreach ($datas as $d) {
                array_push($data['data'],
                    [
                        $d->nombreCliente,
                        $d->numCotizacion,
                        $d->nombreCliente,
                        $d->fechaEntrega,
                        $d->estatus,
                        $d->total,
                        $d->type,
                        ""                
                    ]   
                );
            }

            return $data;

        } elseif (!strcmp($request->tipo, 'tipoBuscarVe')) {
            
            $data = array('data' => []);

            $datas = Cotizacion::whereIn('idVendedor', $request->r )
                    ->where('created_at', '>=', $request->date[0].' 00:00:00')
                    ->where('created_at', '<=', $request->date[1].' 23:59:59')
                    ->get();   
            
            foreach ($datas as $d) {
                array_push($data['data'],
                    [
                        $d->nombreCliente,
                        $d->numCotizacion,
                        $d->nombreCliente,
                        $d->fechaEntrega,
                        $d->estatus,
                        $d->total,
                        $d->type,
                        ""                
                    ]   
                );
            }

            return $data;
        }

    }

    /**
     *
     *
     *
     *
     * @param
     * @return
     */


    public function getDataCotizacionReviewAll(Request $request){

            
            $data = array('data' => []);

            $datas = Cotizacion::where('created_at', '>=', $request->date[0].' 00:00:00')
                    ->where('created_at', '<=', $request->date[1].' 23:59:59')
                    ->get();   
            
            foreach ($datas as $d) {
                array_push($data['data'],
                    [
                        $d->nombreCliente,
                        $d->numCotizacion,
                        $d->nombreCliente,
                        $d->fechaEntrega,
                        $d->estatus,
                        $d->total,
                        $d->type,
                        ""       
                    ]   
                );
            }

            return $data;

    }

    /**
     *
     *
     *
     *
     * @param
     * @return
     */

    public function getCotizacion($id){

        $Quotations = Cotizacion::where('numCotizacion', $id)->get();

        $ArtQuotation  = Articulo::where('numCotizacion', $Quotations[0]->numCotizacion)->orderby('numLine','ASC')->get();

        $Notes = Notes::find($Quotations[0]->notasCotizacion);
        
        $spectypes = SpecsType::all();

        if (!strcmp($Quotations[0]->especificaciones, 'null') || $Quotations[0]->especificaciones == null){
            $specs_json = [];
        } else {
            $specs_json = json_decode($Quotations[0]->especificaciones);
        }

        $types_aux = [];
        foreach($spectypes as $type)
          $types_aux []= $type->name;

        $types = [];
        foreach($types_aux as $e){
          $types[$e] = [];
        }

        foreach ($specs_json as $spec) {
            $aux = Spec::find($spec);
            switch($aux->tipo){
              case 0:
              $types['Condiciones comerciales'] []= $aux;
                break;
              case 1:
              $types['Consideraciones especiales'] []= $aux;
                break;
              case 2:
              $types['Factores a considerar'] []= $aux;
                break;
              case 3:
              $types['Entrega Express'] []= $aux;
                break;
              case 4:
              $types['Viáticos de consultores'] []= $aux;
                break;
              case 5:
              $types['Alcance de implementación'] []= $aux;
                break;
              case 6:
              $types['Otra'] []= $aux;
                break;
            }
          }
        
        return array(
            'Quotations' => $Quotations, 
            'ArtQuotation' => $ArtQuotation,
            'Notes' => $Notes,
            'Specs' => $types,
        );
    }


    public function searchCoti(){

        return view('theme.cotizaciones.buscar-cotizacion',[
                'vendedores' => User::where(function($query){
                    $query->where('U_admin','v')
                    ->where('email','LIKE','%'.session('domain'));     
                })->orWhere(function($query){
                    $query->where('U_admin','y')
                    ->where('email','LIKE','%'.session('domain'));  
                })->orWhere(function($query){
                    $query->where('email','LIKE','%'.session('domain'))
                    ->whereNull('U_admin');
                })->orWhere(function($query){
                    $query->where('U_admin','n')
                    ->where('email','LIKE','%'.session('domain'));   
                })->get()
            ]);
    }


    public function setPayment(Request $request){
     
     if(empty($request['datosPay']))
        return 'Listo';

        foreach ($request['datosPay'] as $pay) {
            
            $pagos = new Payment();
        
            $pagos->numCotizacion = $request['numCotizacion'];
            $pagos->metodo = $pay['metodo'];
            $pagos->moneda = $pay['moneda'];
            $pagos->monto = $pay['monto'];
            $pagos->referencia = $pay['referencia'];
            $pagos->comprobante = $pay['comprobante'];
            $pagos->date = $pay['date'];
            $pagos->status = $pay['status'];     

            $estatus = $pagos->save() === true ? "true" : "false";

        }
        


        return response()->json([ 
            'status' => $estatus
            ]);
    }


    public function getPayment($id){

        return Payment::where('numCotizacion', $id)->get();
    }

    public function getEspecificacionesTipo(){
        return SpecsType::all();
    }
    
    public function getEspecificaciones(){
        return Spec::all();
    } 


    /**
     * Delete Cotizacion
     */

    public function deleteProduct(Request $request){

        $product =  Articulo::find($request->id);

        $cotizacion = Cotizacion::where('numCotizacion', $product->numCotizacion)->get();

        $cotizacion[0]->total -=  $product->subTotalLinea;

        $cotizacion[0]->totalMXN = $cotizacion[0]->total;

        $cotizacion[0]->totalUSD = $cotizacion[0]->total;

        if(!$product->delete())
            return false;

        return response()->json([
            'status' => $cotizacion[0]->save(),
            'data' => $cotizacion[0]->total
        ]) ;
    }

    /**
     * Update Cotizacion
     */

    public function updateCotizacion(Request $request){
        
        $articulos = [];
        $cotizacion = Cotizacion::find($request->id);
        
        //actualizar cliente de la cotizacion
        $cotizacion->nombreCliente = $request->obtenerDatosCotizacion['nombreCliente'] ? $request->obtenerDatosCotizacion['nombreCliente'] : '';
        $cotizacion->numCliente = $request->obtenerDatosCotizacion['numCliente'] ? $request->obtenerDatosCotizacion['numCliente'] : '';
        
        $cotizacion->total = $request->obtenerDatosCotizacion['total'];
        $cotizacion->totalMXN = $request->obtenerDatosCotizacion['total'];
        $cotizacion->totalUSD = $request->obtenerDatosCotizacion['total'];
        $cotizacion->Moneda =  $request->obtenerDatosCotizacion['moneda'];
        $cotizacion->formato =  $request->obtenerDatosCotizacion['formato'];
        $cotizacion->lang =  $request->obtenerDatosCotizacion['language'];
        $cotizacion->comentarios = isset($request->obtenerDatosCotizacion['comentarios']) ? $request->obtenerDatosCotizacion['comentarios'] : '' ;

        $cotizacion->banners = isset($request->obtenerDatosCotizacion['bannersConfig']) ? $request->obtenerDatosCotizacion['bannersConfig'] : "";

        $cotizacion->notasCotizacion = isset($request->obtenerDatosCotizacion['notas']) ? $request->obtenerDatosCotizacion['notas'] : "";

        $cotizacion->especificaciones = json_encode($request->especificaciones);

        if(session('domain') == 'gruposim.com'){
            $cotizacion->autorized = $request->autorized ? $request->autorized : 0;
        }
        $cotizacion->save();
        

        foreach ($request->obtenerDatosArticulos as $product) {

            if(!strcmp($product['dataType'],"update")){

                $articulo = Articulo::find($product['id']);
                $articulo->cantidad = $product['cantidad'];
                $articulo->nombreArt = $product['nombreArt'];
                $articulo->moneda = $product['moneda'];
                $articulo->precioLista = $product['precioLista'];
                $articulo->UMV = $product['UMV'];
                $articulo->precioUnidad = $product['precioUnidad'];
                $articulo->PrecioVenta = $product['PrecioVenta'] ? $product['PrecioVenta'] : '';
                $articulo->importe = $product['importe'] ? $product['importe'] : '';
                $articulo->desc = $product['desc'] ? $product['desc'] : '';
                $articulo->utilidad = $product['utilidad'] ? $product['utilidad'] : '';
                $articulo->factor = $product['factor'];
                $articulo->subTotalLinea = $product['subTotalLinea'];
                $articulo->almacen = $product['almacen'];
                $articulo->tiempoEntrega = $product['tiempoEntrega'] ? $product['tiempoEntrega'] : '';
                $articulo->observaciones = $product['observaciones'] ? $product['observaciones'] : '';
                $articulo->save();

                $articulos[] = $articulo;
            } else {

                $articulo = new Articulo();
                $articulo->numCotizacion = $request->numCotizacion;
                $articulo->numLine = '0';
                $articulo->codigoArt = $product['codigoArt'];
                $articulo->nombreArt = $product['nombreArt'];
                $articulo->cantidad = $product['cantidad'];
                $articulo->moneda = $product['moneda'];
                $articulo->precioLista = $product['precioLista'];
                $articulo->UMV = $product['UMV'];
                $articulo->precioUnidad = $product['precioUnidad'];
    
                $articulo->PrecioVenta = $product['PrecioVenta'] ? $product['PrecioVenta'] : '';
                $articulo->importe = $product['importe'] ? $product['importe'] : '';
                $articulo->marca = $product['marca'] ? $product['marca'] : '- Ning&uacute;n fabricante -';
                $articulo->costo = $product['costo'] ? $product['costo'] : '';
                $articulo->desc = $product['desc'] ? $product['desc'] : '';
                $articulo->utilidad = $product['utilidad'] ? $product['utilidad'] : '';
    
    
    
                $articulo->factor = $product['factor'];
                $articulo->subTotalLinea = $product['subTotalLinea'];
                $articulo->almacen = $product['almacen'];
                $articulo->tiempoEntrega = $product['tiempoEntrega'] ? $product['tiempoEntrega'] : '';
                $articulo->observaciones = $product['observaciones'] ? $product['observaciones'] : '';
                $articulo->save();

                $articulos[] = $articulo;
            }


        }

        return response()->json([
            "status" => true,
            "articulos" => $articulos,
        ]);
    }

    
    /*
    **  Funcion para mandar email cuando el descuento es mayor al permitido
    */

    public function getMaxdesc(){
        $rolvalomar = Auth::user()->U_admin ? Auth::user()->U_admin : "V";
        $rolsessionomar = Rol::where('rol', $rolvalomar)->get();
        //$maxdesc = $rolsessionomar->maxdesc;
        return $rolsessionomar[0]->maxdesc;
    }

    public function sendmailaut(){
        //enviamos el numero de cotizacion y el usuario que lo cotizo
        Mail::send(new General());
    }

    public function sendmailgrant(){
        //enviamos el numero de cotizacion y el usuario que lo cotizo
        Mail::send(new General());
    }

}
